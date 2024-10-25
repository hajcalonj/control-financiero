<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyeccionController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\ReporteController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::middleware(['web'])->group(function () {
        Route::get('/', 'HomeController@index');
    });
    
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/usuarios', [HomeController::class, 'usuarios'])->name('usuarios');
    // Route::get('/perfil', [HomeController::class, 'index'])->name('perfil');

    // Ruta para las transacciones
    Route::resource('/transaccion', TransaccionController::class);

    Route::resource('/proyeccion', ProyeccionController::class);
    Route::get('/reporte', [ReporteController::class, 'index'])->name('reporte');
    Route::get('/debug-config', function () {
        return config('session.domain');
    });
    
});


