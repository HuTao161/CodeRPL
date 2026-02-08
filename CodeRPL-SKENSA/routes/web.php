<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Alumni;
use App\Models\Industri;

/*
|--------------------------------------------------------------------------
| HOME (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $totalAlumni = Alumni::count();
    $totalIndustri = Industri::count();
    $industriTersedia = Industri::where('status', 'tersedia')->count();

    return view('pages.home', compact(
        'totalAlumni',
        'totalIndustri',
        'industriTersedia'
    ));
})->name('home');

/*
|--------------------------------------------------------------------------
| PUBLIC ALUMNI ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('alumni')->name('alumni.')->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('index');
    Route::get('/search', [AlumniController::class, 'search'])->name('search');

    // FILTER ANGKATAN HARUS DI ATAS {alumni}
    Route::get('/angkatan/{angkatan}', [AlumniController::class, 'getByAngkatan'])
        ->name('by-angkatan');

    // DETAIL ALUMNI (MODEL BINDING)
    Route::get('/{alumni}', [AlumniController::class, 'show'])
        ->name('show');
});

/*
|--------------------------------------------------------------------------
| PUBLIC INDUSTRI ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/industri', [IndustriController::class, 'index'])
    ->name('industri.index');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES (CUSTOM LOGIN REGISTER)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');

/*
|--------------------------------------------------------------------------
| DASHBOARD REDIRECT
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('home');
})->middleware('auth')->name('dashboard');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

        /*
        |--------------------------------------------------------------------------
        | ALUMNI MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('manage-alumni')->name('manage.alumni.')->group(function () {
            Route::get('/', [AdminController::class, 'alumniIndex'])->name('index');
            Route::get('/create', [AdminController::class, 'alumniCreate'])->name('create');
            Route::post('/', [AdminController::class, 'alumniStore'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'alumniEdit'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'alumniUpdate'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'alumniDestroy'])->name('destroy');

            // Import Export
            Route::get('/export', [AdminController::class, 'exportAlumni'])->name('export');
            Route::post('/import', [AdminController::class, 'importAlumni'])->name('import');
            Route::get('/template', [AdminController::class, 'downloadTemplate'])->name('template');
        });

        /*
        |--------------------------------------------------------------------------
        | INDUSTRI MANAGEMENT
        |--------------------------------------------------------------------------
        */
        Route::prefix('manage-industri')->name('manage.industri.')->group(function () {
            Route::get('/', [AdminController::class, 'industriIndex'])->name('index');
            Route::get('/create', [AdminController::class, 'industriCreate'])->name('create');
            Route::post('/', [AdminController::class, 'industriStore'])->name('store');
            Route::get('/{id}/edit', [AdminController::class, 'industriEdit'])->name('edit');
            Route::put('/{id}', [AdminController::class, 'industriUpdate'])->name('update');
            Route::delete('/{id}', [AdminController::class, 'industriDestroy'])->name('destroy');
        });

        // Users
        Route::get('/users', [AdminController::class, 'usersIndex'])->name('users.index');

        // Statistik
        Route::get('/statistics', [AdminController::class, 'getStatistics'])->name('statistics');
    });

/*
|--------------------------------------------------------------------------
| API ROUTES (ADMIN ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('api')
    ->name('api.')
    ->group(function () {
        Route::get('/alumni/angkatan/{angkatan}', [AlumniController::class, 'getByAngkatan']);
        Route::get('/alumni/statistics', [AlumniController::class, 'statistics']);
    });

/*
|--------------------------------------------------------------------------
| FALLBACK 404
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});