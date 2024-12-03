<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('PaginaInicial');
});


Route::get('/Donar', function () { 
    return view('Donaciones'); 
});

Route::get('/Nosotros', function () { 
    return view('Nosotros'); 
});

Route::get('/Contactanos', function () { 
    return view('Contactanos'); 
});

Route::get('/Contactanos', function () { 
    return view('Contactanos'); 
});

Route::get('/Productos', function () { 
    return view('Productos'); 
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
