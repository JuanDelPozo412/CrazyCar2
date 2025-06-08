<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\ClientController;

Route::middleware('auth')->group(function () {
    Route::get('/dashboard/employee', function () {
        return view('dashboard.employee.index');
    })->name('dashboard');

    Route::get('/dashboard/employee/clients', [ClientController::class, 'index'])->name('clientes');
    Route::get('/dashboard/employee/vehicles', [VehicleController::class, 'index'])->name('vehiculos');
});
