<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;

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
        ]);

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

        Amenidad::create($validatedData);

        return redirect()->route('amenidades.index');
    }

    public function edit($id){

        $amenidad = Amenidad::findOrFail($id);
        return view('amenidades.edit', compact('amenidad'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'photo' => 'nullable|image',
            'status' => 'required|boolean',
            'description' => 'required',
            'ability' => 'required|integer',
        ]);

        $amenidad = Amenidad::findOrFail($id);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $destinationPath = 'images/amenidades/';
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move($destinationPath, $fileName);
            $validatedData['photo'] = $destinationPath . $fileName;

            // Si se sube una nueva foto, elimina la anterior
            if ($amenidad->photo && file_exists(public_path($amenidad->photo))) {
                unlink(public_path($amenidad->photo));
            }
        }

        $amenidad->update($validatedData);

        return redirect()->route('amenidades.index')->with('success', 'Amenidad actualizada correctamente.');
    }

    public function destroy($id){
        $amenidad = Amenidad::findOrFail($id);
        $amenidad->delete();

        return redirect()->route('amenidades.index')->with('success', 'Amenidad eliminada correctamente.');
    }

}
