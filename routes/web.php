    <?php

    use App\Http\Controllers\ProfileController;

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\UserServicesController;

    use App\Http\Controllers\UserVehiclesController;

    use App\Http\Controllers\UserVehicleReservationController;

    use App\Http\Controllers\GuestConsultaController;

    use App\Http\Controllers\HomeController;

    use App\Http\Controllers\VehiculoController;


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/', [HomeController::class, 'index'])->name('home');


    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/consultas/crear', [ProfileController::class, 'createForClient'])
            ->name('consultas.createForClient');
        Route::post('/consultas', [ProfileController::class, 'storeConsultaCliente'])
            ->name('consultas.storeForClient');
    });
    Route::patch('/perfil/foto', [ProfileController::class, 'updatePhoto'])->name('imagen.update');

    Route::get('/servicios', [UserServicesController::class, 'index']);

    Route::get('/galeria', [UserVehiclesController::class, 'index']);

    Route::middleware('auth')->group(function () {
        Route::get('/vehiculos/{vehiculo}/reservar', [UserVehicleReservationController::class, 'showForm'])
            ->name('vehiculos.reservar.form');
    });
    Route::post('/vehiculos/reservar', [UserVehicleReservationController::class, 'store'])
        ->name('vehiculos.reservar.store');


    Route::get('/contacto', [GuestConsultaController::class, 'create'])
        ->name('guest.consultas.create');

    Route::post('/consultas/guest/store', [GuestConsultaController::class, 'store'])
        ->name('guest.consultas.store');


    Route::put('/vehiculos/{vehiculo}', [VehiculoController::class, 'update'])->name('vehiculos.update');


    require __DIR__ . '/employee.php';
    require __DIR__ . '/cliente.php';
    require __DIR__ . '/auth.php';
