<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amenidad;
use App\Models\Reserva;
use App\Models\Horario;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ReservasController extends Controller
{
    public function index()
    {
        $amenidades = Amenidad::all();
        return view('reservas.index', compact('amenidades'));
    }

    

    public function create($amenidad_id)
    {
        $amenidad = Amenidad::with('horarios')->findOrFail($amenidad_id);
        $fechaSeleccionada = request('fecha', \Carbon\Carbon::today()->format('Y-m-d'));

        // Obtener los horarios reservados para la fecha seleccionada
        $reservados = Reserva::where('amenidad_id', $amenidad_id)
                            ->where('fecha_reserva', $fechaSeleccionada)
                            ->get(['start_time', 'end_time']);

        // Añadir la propiedad disponible a cada horario
        $horariosDisponibles = $amenidad->horarios->map(function ($horario) use ($reservados) {
            $horario->disponible = true;
            foreach ($reservados as $reservado) {
                if (
                    ($horario->start_time >= $reservado->start_time && $horario->start_time < $reservado->end_time) ||
                    ($horario->end_time > $reservado->start_time && $horario->end_time <= $reservado->end_time) ||
                    ($horario->start_time < $reservado->start_time && $horario->end_time > $reservado->end_time)
                ) {
                    $horario->disponible = false;
                    break;
                }
            }
            return $horario;
        });

        return view('reservas.create', compact('amenidad', 'horariosDisponibles', 'fechaSeleccionada'));
    }


    /* public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'amenidad_id' => 'required|exists:amenidades,id',
                'fecha_reserva' => 'required|date|after_or_equal:today',
                'horario' => 'required|string',
            ], [
                'fecha_reserva.after_or_equal' => 'No puedes reservar una amenidad en una fecha anterior a la de hoy.',
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
        } catch (\Exception $e) {
            // Registrar el error y redirigir con un mensaje de error
            \Log::error('Error al crear la reserva: ' . $e->getMessage());
            return redirect()->route('reservas.create', ['amenidad_id' => $request->amenidad_id])
                            ->with('error', $e->getMessage());
        }
    } */

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'amenidad_id' => 'required|exists:amenidades,id',
                'fecha_reserva' => 'required|date|after_or_equal:today',
                'horario' => 'required|string',
            ], [
                'fecha_reserva.after_or_equal' => 'No puedes reservar una amenidad en una fecha anterior a la de hoy.',
            ]);

            list($start_time, $end_time) = explode('|', $request->horario);

            // Verificar si la fecha de la reserva es hoy
            if (Carbon::parse($request->fecha_reserva)->isToday()) {
                $current_time = Carbon::now()->format('H:i');
                // Comparar la hora actual con la hora de inicio de la reserva
                if ($current_time > $start_time) {
                    return redirect()->back()->with('error', 'No puedes reservar una amenidad en una hora que ya ha pasado.');
                }
            }

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
        } catch (\Exception $e) {
            // Registrar el error y redirigir con un mensaje de error
            \Log::error('Error al crear la reserva: ' . $e->getMessage());
            return redirect()->route('reservas.create', ['amenidad_id' => $request->amenidad_id])
                            ->with('error', $e->getMessage());
        }
    }

    public function reservadas(){
        $user_id = Auth::id();
        $reservas = Reserva::where('user_id', $user_id)->with('amenidad')->get();
        return view('reservas.reservadas', compact('reservas'));
    }

    public function verifyPayment(Request $request)
    {
        $validatedData = $request->validate([
            'amenidad_id' => 'required|exists:amenidades,id',
            'fecha_reserva' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $amenidad = Amenidad::findOrFail($validatedData['amenidad_id']);

        // Verifica si la amenidad es de pago
        if (!$amenidad->is_paid) {
            return redirect()->route('reservas.create', $amenidad->id)->with('error', 'Esta amenidad no requiere pago.');
        }

        return view('reservas.verify_payment', [
            'amenidad' => $amenidad,
            'fecha_reserva' => $validatedData['fecha_reserva'],
            'start_time' => $validatedData['start_time'],
            'end_time' => $validatedData['end_time'],
        ]);
    }



}
