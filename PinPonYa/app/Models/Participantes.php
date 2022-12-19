<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participantes extends Model
{
    use HasFactory;
    protected $table="_participantes";
    protected $primaryKey="NumeroAsociado";
    protected $fillable = [
        'Nombre', 
        'Direccion', 
        'Telefono', 
        'CampeonatosJugador', 
        'CampeonatosJuez', 
        'NivelJuego', 
    ];
}
