<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Horario;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amenidad_id',
        'fecha_reserva',
        'start_time',
        'end_time',
    ];

    public function amenidad()
    {
        return $this->belongsTo(Amenidad::class, 'amenidad_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
