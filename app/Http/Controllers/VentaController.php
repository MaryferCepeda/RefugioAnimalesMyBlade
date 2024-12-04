<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_producto' => 'required|integer',
            'cantidad_vendida' => 'required|integer',
            'fecha_venta' => 'required|date',
            'id_cliente' => 'required|integer',
            'monto_total' => 'required|numeric'
        ]);

        Venta::create($validatedData);

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }

    public function show(Venta $venta)
    {
        return view('ventas.show', compact('venta'));
    }

    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $validatedData = $request->validate([
            'id_producto' => 'required|integer',
            'cantidad_vendida' => 'required|integer',
            'fecha_venta' => 'required|date',
            'id_cliente' => 'required|integer',
            'monto_total' => 'required|numeric'
        ]);

        $venta->update($validatedData);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
