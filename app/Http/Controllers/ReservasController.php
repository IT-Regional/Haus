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
        $amenidad = Amenidad::with('horarios')->findOrFail($amenidad_id);
        $horarios = $amenidad->horarios; // Obtener horarios asociados a la amenidad

        return view('reservas.create', compact('amenidad', 'horarios'));
    }
    
 public function store(Request $request)
{
    $validatedData = $request->validate([
        'amenidad_id' => 'required|exists:amenidades,id',
        'fecha_reserva' => 'required|date',
        'horario' => 'required|string',
    ]);

    list($start_time, $end_time) = explode('|', $request->horario);

    // Crear la reserva
    Reserva::create([
        'amenidad_id' => $request->amenidad_id,
        'user_id' => auth()->id(),
        'fecha_reserva' => $request->fecha_reserva,
        'start_time' => $start_time,
        'end_time' => $end_time,
    ]);

    // Actualizar el estado de la amenidad
    $amenidad = Amenidad::findOrFail($request->amenidad_id);
    $amenidad->status = true; // O el valor adecuado para el estado de reservada
    $amenidad->save();

    return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
}

public function reservadas(){
    $user_id = Auth::id();
    $reservas = Reserva::where('user_id', $user_id)->with('amenidad')->get();
    return view('reservas.reservadas', compact('reservas'));
}


}
