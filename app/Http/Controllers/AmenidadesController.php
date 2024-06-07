<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;
use App\Models\Horario;
use App\Models\Reserva;
use App\Exports\AmenidadReservadaExport;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class AmenidadesController extends Controller
{
    public function dashboard(){
        
        $totalAmenidades = Amenidad::count();
        $amenidadesDisponibles = Amenidad::where('status',false)->count();
        $amenidadesReservadas = Amenidad::where('status', true)->count();
        return view('amenidades.dashboard', compact(
            'totalAmenidades', 
            'amenidadesDisponibles',
            'amenidadesReservadas',
        ));
    }

    public function index(){

        $amenidades = Amenidad::all();
        return view('amenidades.index', compact('amenidades'));
    }

    public function create(){

        return view('amenidades.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
            'status' => 'required|boolean',
            'description' => 'required',
            'ability' => 'required|integer',
            'is_paid' => 'sometimes|boolean',
            'cost' => 'nullable|required_if:is_paid,true|numeric|min:0',
            'horarios' => 'required|array',
            'horarios.*.start_time' => 'required|date_format:H:i',
            'horarios.*.end_time' => 'required|date_format:H:i',
        ]);

        $validatedData['is_paid'] = $request->has('is_paid');

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $destinationPath = 'images/amenidades/';
            $fileName = time(). '-'.$file->getClientOriginalName();
            $uploadSuccess = $file->move($destinationPath, $fileName);
            if (!$uploadSuccess) {
                return redirect()->back()->with('error', 'Failed to upload file.');
            }
            $validatedData['photo'] = $destinationPath . $fileName;
        }

        $amenidad = Amenidad::create($validatedData);

       foreach ($request->horarios as $horario) {
    $horario['start_time'] = Carbon::createFromFormat('H:i', $horario['start_time']);
    $horario['end_time'] = Carbon::createFromFormat('H:i', $horario['end_time']);
    $amenidad->horarios()->create($horario);
}

        return redirect()->route('amenidades.index');
    }

    public function edit($id){

        $amenidad = Amenidad::with('horarios')->findOrFail($id);
        $horarios = $amenidad->horarios; // Obtener horarios asociados a la amenidad

        return view('amenidades.edit', compact('amenidad', 'horarios'));
    }

    public function update(Request $request, $id)
{
    try {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|integer',
            'description' => 'nullable|string',
            'ability' => 'required|integer',
            'is_paid' => 'sometimes|boolean',
            'cost' => 'nullable|required_if:is_paid,true|numeric|min:0',
            'photo' => 'nullable|image',
            'horarios' => 'array',
            'horarios.*.start_time' => 'required|date_format:H:i',
            'horarios.*.end_time' => 'required|date_format:H:i|after:horarios.*.start_time',
        ]);

        $validatedData['is_paid'] = $request->has('is_paid');

        $amenidad = Amenidad::findOrFail($id);
        $amenidad->update($validatedData);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('amenidades', 'public');
            $amenidad->photo = $path;
            $amenidad->save();
        }

        // Actualizar horarios
        $amenidad->horarios()->delete();
        foreach ($request->horarios as $horario) {
            $amenidad->horarios()->create([
                'start_time' => $horario['start_time'],
                'end_time' => $horario['end_time']
            ]);
        }

        return redirect()->route('amenidades.index')->with('success', 'Amenidad actualizada correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al actualizar la amenidad: ' . $e->getMessage());
    }
}



    public function destroy($id)
    {
        $amenidad = Amenidad::findOrFail($id);

        // Elimina la foto asociada si existe
        if ($amenidad->photo && file_exists(public_path($amenidad->photo))) {
            unlink(public_path($amenidad->photo));
        }

        // Elimina los horarios asociados
        $amenidad->horarios()->delete();

        // Elimina la amenidad
        $amenidad->delete();

        return redirect()->route('amenidades.index')->with('success', 'Amenidad eliminada correctamente.');
    }


    public function reservas(){

       $reservas = Reserva::with(['user', 'amenidad'])->get();
        return view('amenidades.reservas', compact('reservas'));
    }

    public function export(){
        return Excel::download(new AmenidadReservadaExport, 'amenidades_reservadas.xlsx');
    }

  

    public function calendar()
    {
        $reservas = Reserva::with(['user', 'amenidad'])->get();

        $arrReservas = [];
        foreach ($reservas as $reserva) {
            $arrReserva['id'] = $reserva->id;
            $arrReserva['title'] = $reserva->amenidad->name . ' - ' . $reserva->user->name;
            $arrReserva['start'] = $reserva->fecha_reserva . 'T' . $reserva->start_time;
            $arrReserva['end'] = $reserva->fecha_reserva . 'T' . $reserva->end_time;
            $arrReserva['className'] = 'event-blue';
            $arrReservas[] = $arrReserva;
        }

        $arrReservas = json_encode($arrReservas);
        /* dd($arrReservas); */
        return view('amenidades.calendar', compact('arrReservas'));
    }
    public function show($id){
        $reserva = Reserva::with('user','amenidad')->findOrFail($id);
        return view('amenidades.show', compact('reserva'));
    }

}
