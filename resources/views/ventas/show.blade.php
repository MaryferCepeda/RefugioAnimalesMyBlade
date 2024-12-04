<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Venta</title>
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
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        p {
            margin: 10px 0;
            color: #495057;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            color: white;
            text-decoration: none;
            background-color: #6c757d;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }

        .mt-3 {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detalles de la Venta</h1>
        <div class="card">
            <div class="card-body">
                <p><strong>ID Venta:</strong> {{ $venta->id }}</p>
                <p><strong>ID Producto:</strong> {{ $venta->id_producto }}</p>
                <p><strong>Cantidad Vendida:</strong> {{ $venta->cantidad_vendida }}</p>
                <p><strong>Fecha de Venta:</strong> {{ $venta->fecha_venta }}</p>
                <p><strong>ID Cliente:</strong> {{ $venta->id_cliente }}</p>
                <p><strong>Monto Total:</strong> {{ $venta->monto_total }}</p>
            </div>
        </div>
        <a href="{{ route('ventas.index') }}" class="btn btn-secondary mt-3">Volver</a>
    </div>
</body>
</html>