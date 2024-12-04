<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Donación</title>
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
        <h1>Crear Donación</h1>
        <form method="POST" action="{{ route('donaciones.store') }}">
            @csrf
            <div class="form-group">
                <label for="nombre_donante">Nombre del Donante</label>
                <input type="text" class="form-control" id="nombre_donante" name="nombre_donante" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="number" step="0.01" class="form-control" id="cantidad" name="cantidad" required>
            </div>
            <div class="form-group">
                <label for="fecha_donacion">Fecha de Donación</label>
                <input type="date" class="form-control" id="fecha_donacion" name="fecha_donacion" required>
            </div>
            <div class="form-group">
                <label for="metodo_donacion">Método de Donación</label>
                <input type="text" class="form-control" id="metodo_donacion" name="metodo_donacion" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</body>
</html>

