<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    use HasFactory;

    protected $table = 'donaciones'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'nombre_donante',
        'cantidad',
        'fecha_donacion',
        'metodo_donacion',
    ];
}
