<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\DashboardController;

Route::middleware(['auth', 'empleado'])->group(function () {
    Route::get('/dashboard/employee', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/dashboard/employee/clients', [ClientController::class, 'index'])->name('clientes');

    Route::get('/dashboard/employee/users', [ClientController::class, 'index'])->name('usuarios');

    Route::post('/dashboard/employee/clients', [ClientController::class, 'store'])->name('clientes.store');
    Route::put('/dashboard/employee/clients/{cliente}', [ClientController::class, 'update'])->name('clientes.update');

    Route::get('/dashboard/employee/vehicles', [VehiculoController::class, 'index'])->name('vehiculos');
    Route::get('/dashboard/employee/vehicles/{id}', [VehiculoController::class, 'show'])->name('vehiculos.show');
    Route::delete('/dashboard/employee/vehicles/{id}', [VehiculoController::class, 'destroy'])->name('vehiculos.destroy');

    Route::post('/dashboard/employee/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
    Route::put('/dashboard/employee/consultas/{consulta}/actualizar', [ConsultaController::class, 'actualizar'])->name('consultas.actualizar');
    Route::delete('/dashboard/employee/consultas/{consulta}', [ConsultaController::class, 'destroy'])->name('consultas.destroy');
});
