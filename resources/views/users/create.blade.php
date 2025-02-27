<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            margin-top: 150px;
            margin-left: 200px;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #495057;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            color: white;
            text-decoration: none;
            background-color: #007bff;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
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
        <h1>Crear Usuario</h1>
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>
