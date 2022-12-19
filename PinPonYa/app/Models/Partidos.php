<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    use HasFactory;
    protected $table="_partidos";
    protected $primaryKey="Codigo";
    protected $fillable = [
        'FKJugador1', 
        'FkJugador2', 
        'FkJuez', 
        'Marcador', 
        'Comentario',
    ];
}
