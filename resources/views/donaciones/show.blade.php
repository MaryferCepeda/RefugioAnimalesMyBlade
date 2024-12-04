<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Donación</title>
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
        <h1>Detalles de la Donación</h1>
        <div class="details">
            <p><strong>ID Donación:</strong> {{ $donacion->id }}</p>
            <p><strong>Nombre del Donante:</strong> {{ $donacion->nombre_donante }}</p>
            <p><strong>Cantidad:</strong> {{ $donacion->cantidad }}</p>
            <p><strong>Fecha de Donación:</strong> {{ $donacion->fecha_donacion }}</p>
            <p><strong>Método de Donación:</strong> {{ $donacion->metodo_donacion }}</p>
        </div>
        <a href="{{ route('donaciones.index') }}">Volver</a>
    </div>
</body>
</html>
