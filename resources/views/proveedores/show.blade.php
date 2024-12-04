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
            margin: 50px auto;
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

        a {
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
    </style>
</head>
<body>
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
        <a href="{{ route('proveedores.index') }}">Volver</a>
    </div>
</body>
</html>
