<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Industri;

/*
|--------------------------------------------------------------------------
| HOME (PUBLIC)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $totalIndustri = Industri::count();
    $industriTersedia = Industri::where('status', 'tersedia')->count();

    return view('pages.home', compact(
        'totalIndustri',
        'industriTersedia'
    ));
})->name('home');

/*
|--------------------------------------------------------------------------
| PUBLIC INDUSTRI ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/industri', [IndustriController::class, 'index'])
    ->name('industri.index');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    // LOGIN
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::get('/guest-login', [AuthController::class, 'showLogin'])->name('guest.login');
    Route::post('/login', [AuthController::class, 'login']);

    // REGISTER
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    // PASSWORD RESET
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forgot-password', function () {
        return back()->with('status', 'Reset link sent!');
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password', function () {
        return redirect()->route('login');
    })->name('password.update');
});

/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/
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

        // DASHBOARD
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');

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
            
            // Route untuk industri available
            Route::get('/available', [AdminController::class, 'industriAvailable'])
                ->name('available');
        });

        // ALIAS UNTUK ROUTE INDUSTRI (admin.industri.*)
        Route::get('/industri', [AdminController::class, 'industriIndex'])
            ->name('industri.index');
            
        Route::get('/industri/create', [AdminController::class, 'industriCreate'])
            ->name('industri.create');
            
        Route::post('/industri', [AdminController::class, 'industriStore'])
            ->name('industri.store');
            
        Route::get('/industri/{id}', [AdminController::class, 'industriShow'])
            ->name('industri.show');
            
        Route::get('/industri/{id}/edit', [AdminController::class, 'industriEdit'])
            ->name('industri.edit');
            
        Route::put('/industri/{id}', [AdminController::class, 'industriUpdate'])
            ->name('industri.update');
            
        Route::delete('/industri/{id}', [AdminController::class, 'industriDestroy'])
            ->name('industri.destroy');
            
        Route::get('/industri/available', [AdminController::class, 'industriAvailable'])
            ->name('industri.available');

        // USERS
        Route::get('/users', [AdminController::class, 'usersIndex'])
            ->name('users.index');

        // STATISTICS
        Route::get('/statistics', [AdminController::class, 'getStatistics'])
            ->name('statistics');
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
    });

/*
|--------------------------------------------------------------------------
| FALLBACK 404
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});