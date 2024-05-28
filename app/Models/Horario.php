<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Amenidad;

class Horario extends Model
{
    use HasFactory;
    protected $fillable = [
        'amenidad_id',
        'start_time',
        'end_time',
    ];

    public function amenidad(){
        return $this->belongsTo(Amenidad::class);
    }
}
