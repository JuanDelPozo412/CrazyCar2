<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClientController;

Route::middleware(['auth'])->group(function () {
    Route::get('/perfil-cliente', function () {
        return view('cliente.perfil');
    })->name('cliente.perfil');
});

