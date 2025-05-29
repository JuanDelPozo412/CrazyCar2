<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard.employee.index');
})->name('dashboard');

// Route::get('/clientes', function () {
//     return view('dashboard.employee.clients');
// })->name('clientes');

// Route::get('/vehiculos', function () {
//     return view('dashboard.employee.vehicles');
// })->name('vehiculos');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
