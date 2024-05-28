<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;


class ReservasController extends Controller
{
    public function index()
    {
        $amenidades = Amenidad::where('status', false)->get();
        return view('reservas.index', compact('amenidades'));
    }

    /* public function create($amenidad_id)
    {
        $amenidad = Amenidad::findOrFail($amenidad_id);
        return view('reservas.create', compact('amenidad'));
    } */

    public function create($amenidad_id)
    {
        // Lógica para crear una reserva, utilizando el amenidad_id
        $amenidad_id = Amenidad::findOrFail($amenidad_id);
        return view('reservas.create', compact('amenidad_id'));
    }

    public function store(Request $request, $amenidad_id)
{
    $request->validate([
        'fecha_reserva' => 'required|date',
    ]);

    $amenidad = Amenidad::findOrFail($amenidad_id);

    Reserva::create([
        'user_id' => Auth::id(),
        'amenidad_id' => $amenidad->id,
        'fecha_reserva' => $request->fecha_reserva,
    ]);
    

    $amenidad->status = true;
    $amenidad->save();

    return redirect()->route('reservas.index')->with('success', 'Amenidad reservada correctamente.');
}

public function reservadas(){

    $user_id = Auth::id();
    $reservas = Reserva::where('user_id', $user_id)->with('amenidad')->get();
    return view('reservas.reservadas', compact('reservas'));
}


}
