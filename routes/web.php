    <?php

    use App\Http\Controllers\ProfileController;

    use Illuminate\Support\Facades\Route;

    use App\Http\Controllers\UserServicesController;

    use App\Http\Controllers\UserVehiclesController;

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/perfil', [ProfileController::class, 'show'])->name('profile.show');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::get('/servicios', [UserServicesController::class, 'index']);

    Route::get('/galeria', [UserVehiclesController::class, 'index']);

    require __DIR__ . '/employee.php';
    require __DIR__ . '/cliente.php';
    require __DIR__ . '/auth.php';
