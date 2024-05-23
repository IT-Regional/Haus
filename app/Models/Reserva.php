<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'amenidad_id',
        'fecha_reserva',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function amenidad()
    {
        return $this->belongsTo(Amenidad::class);
    }
}
