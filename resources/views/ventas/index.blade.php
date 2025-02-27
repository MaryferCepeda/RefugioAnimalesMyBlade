<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
        }

        .container {
            max-width: 1000px;
            margin: 200px;
            margin-left:500px;
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

        .mt-3 {
            margin-top: 20px;
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
            left: 0;
            top: 0;
            height: 100%;
        }

        nav a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
        }

        nav a:hover {
            background-color: #495057;
        }.header-Izquierda {
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
        <h1>Ventas</h1>
        <a href="{{ route('ventas.create') }}" class="btn">Crear Venta</a>
        @if (session('success'))
            <div class="alert">{{ session('success') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>ID Venta</th>
                    <th>ID Producto</th>
                    <th>Cantidad Vendida</th>
                    <th>Fecha de Venta</th>
                    <th>ID Cliente</th>
                    <th>Monto Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->id_producto }}</td>
                    <td>{{ $venta->cantidad_vendida }}</td>
                    <td>{{ $venta->fecha_venta }}</td>
                    <td>{{ $venta->id_cliente }}</td>
                    <td>{{ $venta->monto_total }}</td>
                    <td>
                        <a href="{{ route('ventas.edit', $venta->id) }}" class="btn btn-edit">Editar</a>
                        <a href="{{ route('ventas.show', $venta->id) }}" class="btn btn-view">Ver</a>
                        <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" style="display:inline;">
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

