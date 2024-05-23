<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Reserva;

class Amenidad extends Model
{
    use HasFactory;
    protected $table = 'amenidades';
    protected $fillable = [
        'name',
        'photo',
        'status',
        'description',
        'ability',
    ];

    public function reservas(){
        return $this->hasMany(Reserva::class);
    }
}
