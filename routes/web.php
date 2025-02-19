<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoVoluntarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DonacionController;

// Página de inicio pública
Route::get('/', function () {
    return view('PaginaInicial');
});

// Rutas públicas
Route::get('/Donar', function () {
    return view('Donaciones');
});
Route::get('/Nosotros', function () {
    return view('Nosotros');
});
Route::get('/Contactanos', function () {
    return view('Contactanos');
});

// Ruta de Productos, accesible para todos
Route::get('/Productos', [ProductoController::class, 'index'])->name('productos.index');

// Ruta de actualización de productos, protegida por autenticación
Route::post('/productos/{id}/update', [ProductoController::class, 'update'])->middleware('auth');

Route::middleware(['auth'])->group(function () {

    // 🔹 Proteger todas las rutas ADMIN manualmente
    Route::get('users', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
        return app(UserController::class)->index();
    })->name('users.index');

    Route::get('users/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(UserController::class)->create();
    })->name('users.create');

    Route::post('users', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(UserController::class)->store(request());
    })->name('users.store');

    Route::get('users/{user}', function ($user) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(UserController::class)->show($user);
    })->name('users.show');

    Route::get('users/{user}/edit', function ($user) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar usuarios.');
        }
        return app(UserController::class)->edit($user);
    })->name('users.edit');

    Route::put('users/{user}', function ($user) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(UserController::class)->update(request(), $user);
    })->name('users.update');

    Route::delete('users/{user}', function ($user) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(UserController::class)->destroy($user);
    })->name('users.destroy');

    // 🔹 Proteger CRUD de productos
    Route::get('/crudproduct', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes acceder.');
        }
        return app(CrudProductoController::class)->index();
    })->name('productos.index');

    Route::get('/crudproduct/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(CrudProductoController::class)->create();
    })->name('productos.create');

    Route::post('/crudproduct', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(CrudProductoController::class)->store(request());
    })->name('productos.store');

    Route::get('/crudproduct/{producto}', function ($producto) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(CrudProductoController::class)->show($producto);
    })->name('productos.show');

    Route::get('/crudproduct/{producto}/edit', function ($producto) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar.');
        }
        return app(CrudProductoController::class)->edit($producto);
    })->name('productos.edit');

    Route::put('/crudproduct/{producto}', function ($producto) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(CrudProductoController::class)->update(request(), $producto);
    })->name('productos.update');

    Route::delete('/crudproduct/{producto}', function ($producto) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acción denegada.');
        }
        return app(CrudProductoController::class)->destroy($producto);
    })->name('productos.destroy');
    
    Route::get('/proveedores', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(ProveedorController::class)->index();
    })->name('proveedores.index');
    Route::get('/proveedores/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(ProveedorController::class)->create();
    })->name('proveedores.create');
    
    Route::post('/proveedores', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acción no permitida.');
        }
        return app(ProveedorController::class)->store(request());
    })->name('proveedores.store');
    Route::get('proveedores/{proveedor}', function ($proveedor) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(ProveedorController::class)->show($proveedor);
    })->name('proveedores.show');
    
    // ✅ Editar un proveedor
    Route::get('proveedores/{proveedor}/edit', function ($proveedor) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar proveedores.');
        }
        return app(ProveedorController::class)->edit($proveedor);
    })->name('proveedores.edit');
    
    // ✅ Actualizar un proveedor
    Route::put('proveedores/{proveedor}', function ($proveedor) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(ProveedorController::class)->update(request(), $proveedor);
    })->name('proveedores.update');
    
    // ✅ Eliminar un proveedor
    Route::delete('proveedores/{proveedor}', function ($proveedor) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(ProveedorController::class)->destroy($proveedor);
    })->name('proveedores.destroy');
    
    // ✅ Listar empleados
    Route::get('/empleados', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(EmpleadoVoluntarioController::class)->index();
    })->name('empleados.index');

    // ✅ Crear un empleado
    Route::get('/empleados/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(EmpleadoVoluntarioController::class)->create();
    })->name('empleados.create');

    // ✅ Guardar un empleado
    Route::post('/empleados', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acción no permitida.');
        }
        return app(EmpleadoVoluntarioController::class)->store(request());
    })->name('empleados.store');

    // ✅ Mostrar un empleado
    Route::get('empleados/{empleado}', function ($empleado) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(EmpleadoVoluntarioController::class)->show($empleado);
    })->name('empleados.show');

    // ✅ Editar un empleado
    Route::get('empleados/{empleado}/edit', function ($empleado) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar empleados.');
        }
        return app(EmpleadoVoluntarioController::class)->edit($empleado);
    })->name('empleados.edit');

    // ✅ Actualizar un empleado
    Route::put('empleados/{empleado}', function ($empleado) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(EmpleadoVoluntarioController::class)->update(request(), $empleado);
    })->name('empleados.update');

    // ✅ Eliminar un empleado
    Route::delete('empleados/{empleado}', function ($empleado) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(EmpleadoVoluntarioController::class)->destroy($empleado);
    })->name('empleados.destroy');

    // ✅ Listar ventas
    Route::get('/ventas', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(VentaController::class)->index();
    })->name('ventas.index');

    // ✅ Crear una venta
    Route::get('/ventas/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(VentaController::class)->create();
    })->name('ventas.create');

    // ✅ Guardar una venta
    Route::post('/ventas', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acción no permitida.');
        }
        return app(VentaController::class)->store(request());
    })->name('ventas.store');

    // ✅ Mostrar una venta
    Route::get('ventas/{venta}', function ($venta) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(VentaController::class)->show($venta);
    })->name('ventas.show');

    // ✅ Editar una venta
    Route::get('ventas/{venta}/edit', function ($venta) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar ventas.');
        }
        return app(VentaController::class)->edit($venta);
    })->name('ventas.edit');

    // ✅ Actualizar una venta
    Route::put('ventas/{venta}', function ($venta) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(VentaController::class)->update(request(), $venta);
    })->name('ventas.update');

    // ✅ Eliminar una venta
    Route::delete('ventas/{venta}', function ($venta) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(VentaController::class)->destroy($venta);
    })->name('ventas.destroy');

    // ✅ Listar donaciones
    Route::get('/donaciones', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso denegado.');
        }
        return app(DonacionController::class)->index();
    })->name('donaciones.index');

    // ✅ Crear una donación
    Route::get('/donaciones/create', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(DonacionController::class)->create();
    })->name('donaciones.create');

    // ✅ Guardar una donación
    Route::post('/donaciones', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acción no permitida.');
        }
        return app(DonacionController::class)->store(request());
    })->name('donaciones.store');

    // ✅ Mostrar una donación
    Route::get('donaciones/{donacion}', function ($donacion) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes acceso.');
        }
        return app(DonacionController::class)->show($donacion);
    })->name('donaciones.show');

    // ✅ Editar una donación
    Route::get('donaciones/{donacion}/edit', function ($donacion) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No puedes editar donaciones.');
        }
        return app(DonacionController::class)->edit($donacion);
    })->name('donaciones.edit');

    // ✅ Actualizar una donación
    Route::put('donaciones/{donacion}', function ($donacion) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'No tienes permisos.');
        }
        return app(DonacionController::class)->update(request(), $donacion);
    })->name('donaciones.update');

    // ✅ Eliminar una donación
    Route::delete('donaciones/{donacion}', function ($donacion) {
        if (Auth::user()->role !== 'admin') {
            return redirect('/Productos')->with('error', 'Acceso restringido.');
        }
        return app(DonacionController::class)->destroy($donacion);
    })->name('donaciones.destroy');
    
    // 🔹 Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación manejada por Laravel Breeze
require __DIR__ . '/auth.php';
