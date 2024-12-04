<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Asegúrate de que el nombre de la tabla sea correcto

    protected $fillable = [
        'nombre_proveedor',
        'contacto_principal',
        'direccion',
        'telefono',
        'correo_electronico',
        'tipo_producto',
    ];
}

