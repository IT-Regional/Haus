<?php

namespace App\Exports;

use App\Models\Reserva;
use App\Models\Amenidad;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class AmenidadReservadaExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $reservas = Reserva::with(['amenidad', 'user'])->get();
    
        // Formatea los datos
        $data = $reservas->map(function($reserva) {
            return [
                'Amenidad' => $reserva->amenidad->name,
                'Usuario' => $reserva->user->name,
                'Fecha de Reserva' => $reserva->fecha_reserva,
                'Hora de Inicio' => $reserva->start_time,
                'Hora de Fin' => $reserva->end_time,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Amenidad',
            'Usuario',
            'Fecha de Reserva',
            'Hora de Inicio',
            'Hora de Fin',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Estilo para los encabezados
            1 => ['font' => ['bold' => true]],
        ];
    }
}
