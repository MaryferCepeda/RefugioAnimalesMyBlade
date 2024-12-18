<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CrudProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\EmpleadoVoluntarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DonacionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Página de inicio pública
Route::get('/', function () {
    return view('PaginaInicial'); // Página inicial para usuarios normales y visitantes
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

// Ruta de Productos, accesible para todos, sin necesidad de estar autenticado
Route::get('/Productos', [ProductoController::class, 'index'])->name('productos.index');

// Ruta de actualización de productos, protegida por autenticación
Route::post('/productos/{id}/update', [ProductoController::class, 'update'])->middleware('auth');

Route::post('/enviarcorreo', [App\Http\Controllers\EmailController::class,'enviarcorreo'])->name('enviarcorreo');




// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    // Redirección después del inicio de sesión
    //El crudo
    //users
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::get('users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('users', [UserController::class, 'store'])->name('users.store');
    Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    //productos
    Route::get('/crudproduct', [CrudProductoController::class, 'index'])->name('productos.index');
    Route::get('/crudproduct/create', [CrudProductoController::class, 'create'])->name('productos.create');
    Route::post('/crudproduct', [CrudProductoController::class, 'store'])->name('productos.store');
    Route::get('/crudproduct/{producto}', [CrudProductoController::class, 'show'])->name('productos.show');
    Route::get('/crudproduct/{producto}/edit', [CrudProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/crudproduct/{producto}', [CrudProductoController::class, 'update'])->name('productos.update');
    Route::delete('/crudproduct/{producto}', [CrudProductoController::class, 'destroy'])->name('productos.destroy');

    //proveedor
    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
    Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/{proveedor}', [ProveedorController::class, 'show'])->name('proveedores.show');
    Route::get('/proveedores/{proveedor}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{proveedor}', [ProveedorController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{proveedor}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

    //EmpleadoVoluntario
    Route::get('/empleados', [EmpleadoVoluntarioController::class, 'index'])->name('empleados.index');
    Route::get('/empleados/create', [EmpleadoVoluntarioController::class, 'create'])->name('empleados.create');
    Route::post('/empleados', [EmpleadoVoluntarioController::class, 'store'])->name('empleados.store');
    Route::get('/empleados/{empleadoVoluntario}', [EmpleadoVoluntarioController::class, 'show'])->name('empleados.show');
    Route::get('/empleados/{empleadoVoluntario}/edit', [EmpleadoVoluntarioController::class, 'edit'])->name('empleados.edit');
    Route::put('/empleados/{empleadoVoluntario}', [EmpleadoVoluntarioController::class, 'update'])->name('empleados.update');
    Route::delete('/empleados/{empleadoVoluntario}', [EmpleadoVoluntarioController::class, 'destroy'])->name('empleados.destroy');

    //ventas
    Route::get('/ventas', [VentaController::class, 'index'])->name('ventas.index');
    Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas.create');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/{venta}', [VentaController::class, 'show'])->name('ventas.show');
    Route::get('/ventas/{venta}/edit', [VentaController::class, 'edit'])->name('ventas.edit');
    Route::put('/ventas/{venta}', [VentaController::class, 'update'])->name('ventas.update');
    Route::delete('/ventas/{venta}', [VentaController::class, 'destroy'])->name('ventas.destroy');

    //donaciones
    Route::get('/donaciones', [DonacionController::class, 'index'])->name('donaciones.index');
    Route::get('/donaciones/create', [DonacionController::class, 'create'])->name('donaciones.create');
    Route::post('/donaciones', [DonacionController::class, 'store'])->name('donaciones.store');
    Route::get('/donaciones/{donacion}', [DonacionController::class, 'show'])->name('donaciones.show');
    Route::get('/donaciones/{donacion}/edit', [DonacionController::class, 'edit'])->name('donaciones.edit');
    Route::put('/donaciones/{donacion}', [DonacionController::class, 'update'])->name('donaciones.update');
    Route::delete('/donaciones/{donacion}', [DonacionController::class, 'destroy'])->name('donaciones.destroy');

    Route::get('/redirect', function () {
        $user = Auth::user();

        // Verificar si es administrador
        if ($user instanceof \App\Models\Administrador) {
            return redirect('/users'); // Redirigir al dashboard si es admin
        }

        // Redirigir a la página inicial si es un usuario normal
        return redirect('/');
    });

    // Dashboard solo para administradores
    Route::get('/dashboard', function () {
        return view('dashboard'); 
        // Vista del dashboard
    })->name('dashboard');

    // Rutas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación manejada por Laravel Breeze
require __DIR__ . '/auth.php';

