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
        }

        .container {
            max-width: 1000px;
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
    </style>
</head>
<body>
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

