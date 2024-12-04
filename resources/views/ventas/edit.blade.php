<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Venta</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Venta</h1>
        <form action="{{ route('ventas.update', $venta->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="id_producto">ID Producto</label>
                <input type="number" name="id_producto" id="id_producto" class="form-control" value="{{ $venta->id_producto }}" required>
            </div>
            <div class="form-group">
                <label for="cantidad_vendida">Cantidad Vendida</label>
                <input type="number" name="cantidad_vendida" id="cantidad_vendida" class="form-control" value="{{ $venta->cantidad_vendida }}" required>
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de Venta</label>
                <input type="date" name="fecha_venta" id="fecha_venta" class="form-control" value="{{ $venta->fecha_venta }}" required>
            </div>
            <div class="form-group">
                <label for="id_cliente">ID Cliente</label>
                <input type="number" name="id_cliente" id="id_cliente" class="form-control" value="{{ $venta->id_cliente }}" required>
            </div>
            <div class="form-group">
                <label for="monto_total">Monto Total</label>
                <input type="number" step="0.01" name="monto_total" id="monto_total" class="form-control" value="{{ $venta->monto_total }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
