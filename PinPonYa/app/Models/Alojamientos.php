<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alojamientos extends Model
{
    use HasFactory;
    protected $table="_alojamientos";
    protected $primaryKey="Participante";
    protected $fillable = [
        'FkHotel', 
        'FechaInicio', 
        'FechaFin', 
    ];
}
