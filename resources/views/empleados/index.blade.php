<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleados/Voluntarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #343a40;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            color: white;
            text-decoration: none;
            background-color: #007bff;
            border-radius: 5px;
            display: inline-block;
            margin-bottom: 10px;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-info {
            background-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
        }

        .table td {
            background-color: #fff;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .alert-success {
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        form {
            display: inline;
        }

        button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button.btn-danger {
            background-color: #dc3545;
            color: white;
        }

        button.btn-danger:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Empleados/Voluntarios</h1>
        <a href="{{ route('empleados.create') }}" class="btn btn-primary">Crear Empleado/Voluntario</a>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>Fecha de Ingreso</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleadosVoluntarios as $empleadoVoluntario)
                <tr>
                    <td>{{ $empleadoVoluntario->id }}</td>
                    <td>{{ $empleadoVoluntario->nombre }}</td>
                    <td>{{ $empleadoVoluntario->rol }}</td>
                    <td>{{ $empleadoVoluntario->fecha_ingreso }}</td>
                    <td>{{ $empleadoVoluntario->telefono }}</td>
                    <td>{{ $empleadoVoluntario->correo_electronico }}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleadoVoluntario->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('empleados.show', $empleadoVoluntario->id) }}" class="btn btn-info">Ver</a>
                        <form action="{{ route('empleados.destroy', $empleadoVoluntario->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>


