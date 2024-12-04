<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_producto',
        'cantidad_vendida',
        'fecha_venta',
        'id_cliente',
        'monto_total',
        '_token' // Agregar aquí
    ];

    // Otros métodos y propiedades del modelo
}
