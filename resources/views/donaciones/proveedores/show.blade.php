<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Proveedor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            
        }

        .container {
            max-width: 600px;
            margin: 150px 0 0 250px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h1 {
            color: #343a40;
            margin-bottom: 20px;
            text-align: center;
        }

        .details {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
            color: #495057;
        }

        .boton {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        a:hover {
            background-color: #0056b3;
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
            top: 0; 
            left: 0;
            height: calc(100% - 60px)        
        }

        nav a {
            display: block;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
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
        <h1>Detalles del Proveedor</h1>
        <div class="details">
            <p><strong>ID:</strong> {{ $proveedor->id }}</p>
            <p><strong>Nombre del Proveedor:</strong> {{ $proveedor->nombre_proveedor }}</p>
            <p><strong>Contacto Principal:</strong> {{ $proveedor->contacto_principal }}</p>
            <p><strong>Dirección:</strong> {{ $proveedor->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $proveedor->telefono }}</p>
            <p><strong>Correo Electrónico:</strong> {{ $proveedor->correo_electronico }}</p>
            <p><strong>Tipo de Producto:</strong> {{ $proveedor->tipo_producto }}</p>
        </div>
        <a class="boton" href="{{ route('proveedores.index') }}">Volver</a>
    </div>
</body>
</html>
