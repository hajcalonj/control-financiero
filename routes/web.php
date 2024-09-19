<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProyeccionController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/usuarios', [HomeController::class, 'usuarios'])->name('usuarios');

    // Route::get('/perfil', [HomeController::class, 'index'])->name('perfil');
    Route::get('/real', [HomeController::class, 'index'])->name('real');
    Route::resource('/proyeccion', ProyeccionController::class);
    Route::get('/reporte', [HomeController::class, 'index'])->name('reporte');
});
