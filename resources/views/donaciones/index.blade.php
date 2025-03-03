<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: 150px 0 0 250PX;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
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
        header {
            width: 100%;
            padding: 20px;
            background-color: #ff9800;
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
            top: 0;
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
        .header-Izquierda {
            display: flex;
            align-items: center;
        }
        .logo {
            flex: 0 0 auto;
            margin-right: 20px;
            height: 80px;
            width: auto;
            padding: 15px 0 10px 20px;
            object-fit: cover;
            filter: brightness(80%);
            transition: 0.5sease;
        }
    </style>
</head>
<body>
    <header>
        <h1>Administrar</h1>
    </header>
    <nav>
        <div class="header-Izquierda">
            <a href="/">
                <img class="logo" src="/Imagenes/logo.png" alt="Logo de la página"/>
            </a>      
        </div>
        <a href="{{ route('users.index') }}">Usuarios</a>
        <a href="{{ route('productos.index') }}">Productos</a>
        <a href="{{ route('proveedores.index') }}">Proovedores</a>
        <a href="{{ route('empleados.index') }}">Empleados</a>
        <a href="{{ route('ventas.index') }}">Ventas</a>
        <a href="{{ route('donaciones.index') }}">Donaciones</a>
        @guest
            <a href="login" title="Iniciar Sesión">Inicio de Sesión</a>
        @endguest

        @auth
            <!-- Botón de Cerrar Sesión fijo -->
            <div class="fixed-logout-btn">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger">Cerrar Sesión</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        @endauth
    </nav>
    <div class="container">
        <h1>Donaciones</h1>
        <a href="{{ route('donaciones.create') }}" class="btn btn-primary">Crear Donación</a>
        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID Donación</th>
                    <th>Nombre del Donante</th>
                    <th>Cantidad</th>
                    <th>Fecha de Donación</th>
                    <th>Método de Donación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donaciones as $donacion)
                <tr>
                    <td>{{ $donacion->id }}</td>
                    <td>{{ $donacion->nombre_donante }}</td>
                    <td>{{ $donacion->cantidad }}</td>
                    <td>{{ $donacion->fecha_donacion }}</td>
                    <td>{{ $donacion->metodo_donacion }}</td>
                    <td>
                        <a href="{{ route('donaciones.edit', $donacion->id) }}" class="btn btn-warning">Editar</a>
                        <a href="{{ route('donaciones.show', $donacion->id) }}" class="btn btn-info">Ver</a>
                        <form action="{{ route('donaciones.destroy', $donacion->id) }}" method="POST">
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
