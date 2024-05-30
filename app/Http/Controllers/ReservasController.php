<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;
use App\Models\Reserva;
use App\Models\Horario;
use Illuminate\Support\Facades\Auth;


class ReservasController extends Controller
{
    public function index()
    {
        $amenidades = Amenidad::all();
        return view('reservas.index', compact('amenidades'));
    }

    public function create($amenidad_id)
    {
        // Lógica para crear una reserva, utilizando el amenidad_id
        $amenidad = Amenidad::findOrFail($amenidad_id);
        $horarios = $amenidad->horarios;
        return view('reservas.create', compact('amenidad', 'horarios'));
    }

    public function store(Request $request, $amenidad_id)
{
    $request->validate([
        'fecha_reserva' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
    ]);

    $amenidad = Amenidad::findOrFail($amenidad_id);

    try {
        Reserva::create([
            'user_id' => Auth::id(),
            'amenidad_id' => $amenidad->id,
            'fecha_reserva' => $request->fecha_reserva,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        $amenidad->status = true;
        $amenidad->save();

        return redirect()->route('reservas.index')->with('success', 'Amenidad reservada correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Error al reservar la amenidad: ' . $e->getMessage());
    }
}

public function reservadas(){
    $user_id = Auth::id();
    $reservas = Reserva::where('user_id', $user_id)->with('amenidad')->get();
    return view('reservas.reservadas', compact('reservas'));
}


}
