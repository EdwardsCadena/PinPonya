<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoteles extends Model
{
    use HasFactory;
    protected $table="_hoteles";
    protected $primaryKey="IdHoteles";
    protected $fillable = [
        'Nombre', 
        'Direccion', 
        'Telefonos', 
    ];
}
