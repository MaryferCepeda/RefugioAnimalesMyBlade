<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor</title>
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
        <h1>Editar Proveedor</h1>
        <form method="POST" action="{{ route('proveedores.update', $proveedor->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre_proveedor">Nombre del Proveedor</label>
                <input type="text" class="form-control" id="nombre_proveedor" name="nombre_proveedor" value="{{ $proveedor->nombre_proveedor }}" required>
            </div>
            <div class="form-group">
                <label for="contacto_principal">Contacto Principal</label>
                <input type="text" class="form-control" id="contacto_principal" name="contacto_principal" value="{{ $proveedor->contacto_principal }}" required>
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $proveedor->direccion }}" required>
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="{{ $proveedor->correo_electronico }}" required>
            </div>
            <div class="form-group">
                <label for="tipo_producto">Tipo de Producto</label>
                <input type="text" class="form-control" id="tipo_producto" name="tipo_producto" value="{{ $proveedor->tipo_producto }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</body>
</html>
