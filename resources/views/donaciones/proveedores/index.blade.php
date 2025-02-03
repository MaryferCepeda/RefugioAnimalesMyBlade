<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        header {
            width: 100%;
            padding: 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
        }

        nav {
            width: 200px;
            background-color: #343a40;
            padding-top: 150px;
            position: fixed;
            
            left: 0;
            height: calc(100% - 60px); /* Altura restante después del header */
        }

        nav a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #495057;
        }


        .container {
            max-width: 1000px;
            margin: 150px 0 0 250px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
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

        .btn:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px 20px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
            color: #333;
        }

        table td {
            background-color: #fff;
        }

        .btn-edit {
            background-color: #ffc107;
        }

        .btn-view {
            background-color: #17a2b8;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-edit:hover, .btn-view:hover, .btn-delete:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <header>
        <h1>Administrar</h1>
    </header>
    <nav>
        <a href="{{ route('users.index') }}">Usuarios</a>
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('proveedores.index') }}">Proovedores</a>
        <a href="{{ route('empleados.index') }}">Empleados</a>
        <a href="{{ route('ventas.index') }}">Ventas</a>
        <a href="{{ route('donaciones.index') }}">Donaciones</a>
    </nav>
    <div class="container">
        <h1>Proveedores</h1>
        <a href="{{ route('proveedores.create') }}" class="btn">Crear Proveedor</a>
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Proveedor</th>
                    <th>Contacto Principal</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Correo Electrónico</th>
                    <th>Tipo de Producto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre_proveedor }}</td>
                    <td>{{ $proveedor->contacto_principal }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->correo_electronico }}</td>
                    <td>{{ $proveedor->tipo_producto }}</td>
                    <td>
                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-view">Ver</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
