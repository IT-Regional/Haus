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

    /* public function create($amenidad_id)
    {
        $amenidad = Amenidad::with('horarios')->findOrFail($amenidad_id);
        $fechaSeleccionada = \Carbon\Carbon::today(); // Puedes cambiar esto según tu lógica de selección de fecha
        $reservados = Reserva::where('amenidad_id', $amenidad_id)
                            ->where('fecha_reserva', $fechaSeleccionada)
                            ->pluck('start_time', 'end_time')
                            ->toArray();

        $horariosDisponibles = $amenidad->horarios->filter(function ($horario) use ($reservados) {
            return !in_array($horario->start_time, array_keys($reservados)) && !in_array($horario->end_time, array_values($reservados));
        });

        return view('reservas.create', compact('amenidad', 'horariosDisponibles'));
    } */

    public function create($amenidad_id)
    {
        $amenidad = Amenidad::with('horarios')->findOrFail($amenidad_id);
        $fechaSeleccionada = \Carbon\Carbon::today(); // Ajusta según tu lógica de selección de fecha

        // Obtener los horarios reservados para la fecha seleccionada
        $reservados = Reserva::where('amenidad_id', $amenidad_id)
                            ->where('fecha_reserva', $fechaSeleccionada)
                            ->pluck('start_time', 'end_time')
                            ->toArray();

        // Filtrar horarios disponibles
        /* $horariosDisponibles = $amenidad->horarios->filter(function ($horario) use ($reservados) {
            return !in_array($horario->start_time, array_keys($reservados)) && !in_array($horario->end_time, array_values($reservados));
        }); */

        $horariosDisponibles = $amenidad->horarios->filter(function ($horario) use ($reservados) {
            foreach ($reservados as $reservado_start => $reservado_end) {
                if ($horario->start_time == $reservado_start && $horario->end_time == $reservado_end) {
                    return false;
                }
            }
            return true;
        });

        return view('reservas.create', compact('amenidad', 'horariosDisponibles', 'fechaSeleccionada', 'reservados'));
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

        // Obtener la amenidad y sus horarios reservados
        $amenidad = Amenidad::find($request->amenidad_id);
        $totalHorarios = $amenidad->horarios()->count();
        $reservados = Reserva::where('amenidad_id', $request->amenidad_id)
                            ->where('fecha_reserva', $request->fecha_reserva)
                            ->count();

        // Verificar si todos los horarios están reservados
        if ($totalHorarios == $reservados) {
            $amenidad->status = true;
            $amenidad->save();
        }

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }

    public function reservadas(){
        $user_id = Auth::id();
        $reservas = Reserva::where('user_id', $user_id)->with('amenidad')->get();
        return view('reservas.reservadas', compact('reservas'));
    }


}
