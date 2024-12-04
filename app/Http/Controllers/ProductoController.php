<?php

namespace App\Http\Controllers;

use App\Models\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtén todos los productos de la base de datos
        return view('Productos', compact('productos')); // Envía los productos a la vista
    }
}
