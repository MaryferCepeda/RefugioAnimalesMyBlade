<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpleadoVoluntario extends Model
{
    use HasFactory;

    protected $table = 'empleados_voluntarios'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'nombre',
        'rol',
        'fecha_ingreso',
        'telefono',
        'correo_electronico',
    ];
}
