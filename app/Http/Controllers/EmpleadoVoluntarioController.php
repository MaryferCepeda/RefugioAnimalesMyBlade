<?php

namespace App\Http\Controllers;

use App\Models\EmpleadoVoluntario;
use Illuminate\Http\Request;

class EmpleadoVoluntarioController extends Controller
{
    public function index()
    {
        $empleadosVoluntarios = EmpleadoVoluntario::all();
        return view('empleados.index', compact('empleadosVoluntarios'));
    }

    public function create()
    {
        return view('empleados.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|in:Empleado,Voluntario',
            'fecha_ingreso' => 'required|date',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'required|string|email|max:255',
        ]);

        EmpleadoVoluntario::create($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado/Voluntario creado correctamente.');
    }

    public function show($id)
    {
        $empleadoVoluntario = EmpleadoVoluntario::findOrFail($id);
        return view('empleados.show', compact('empleadoVoluntario'));
    }

    public function edit($id)
    {
        $empleadoVoluntario = EmpleadoVoluntario::findOrFail($id);
        return view('empleados.edit', compact('empleadoVoluntario'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|in:Empleado,Voluntario',
            'fecha_ingreso' => 'required|date',
            'telefono' => 'required|string|max:20',
            'correo_electronico' => 'required|string|email|max:255',
        ]);

        $empleadoVoluntario = EmpleadoVoluntario::findOrFail($id);
        $empleadoVoluntario->update($request->all());

        return redirect()->route('empleados.index')->with('success', 'Empleado/Voluntario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $empleadoVoluntario = EmpleadoVoluntario::findOrFail($id);
        $empleadoVoluntario->delete();

        return redirect()->route('empleados.index')->with('success', 'Empleado/Voluntario eliminado correctamente.');
    }
}

