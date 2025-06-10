<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\ClientController;

Route::middleware(['auth', 'empleado'])->group(function () {
    Route::get('/dashboard/employee', function () {
        return view('dashboard.employee.index');
    })->name('dashboard');

    Route::get('/dashboard/employee/clients', [ClientController::class, 'index'])->name('clientes');
    Route::get('/dashboard/employee/vehicles', [VehiculoController::class, 'index'])->name('vehiculos');
});