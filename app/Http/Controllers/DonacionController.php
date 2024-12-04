<?php

namespace App\Http\Controllers;

use App\Models\Donacion;
use Illuminate\Http\Request;

class DonacionController extends Controller
{
    public function index()
    {
        $donaciones = Donacion::all();
        return view('donaciones.index', compact('donaciones'));
    }

    public function create()
    {
        return view('donaciones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_donante' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'fecha_donacion' => 'required|date',
            'metodo_donacion' => 'required|string|max:255',
        ]);

        Donacion::create($request->all());

        return redirect()->route('donaciones.index')->with('success', 'Donación creada correctamente.');
    }

    public function show($id)
    {
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.show', compact('donacion'));
    }

    public function edit($id)
    {
        $donacion = Donacion::findOrFail($id);
        return view('donaciones.edit', compact('donacion'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre_donante' => 'required|string|max:255',
            'cantidad' => 'required|numeric',
            'fecha_donacion' => 'required|date',
            'metodo_donacion' => 'required|string|max:255',
        ]);

        $donacion = Donacion::findOrFail($id);
        $donacion->update($request->all());

        return redirect()->route('donaciones.index')->with('success', 'Donación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $donacion = Donacion::findOrFail($id);
        $donacion->delete();

        return redirect()->route('donaciones.index')->with('success', 'Donación eliminada correctamente.');
    }
}
