<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\IndustriController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\AdminMiddleware;

// Public Routes
Route::get('/', function () {
    $totalAlumni = \App\Models\Alumni::count();
    $totalIndustri = \App\Models\Industri::count();
    $industriTersedia = \App\Models\Industri::where('status', 'tersedia')->count();
    
    return view('pages.home', compact('totalAlumni', 'totalIndustri', 'industriTersedia'));
})->name('home');

Route::get('/alumni', [AlumniController::class, 'index'])->name('alumni.index');
Route::get('/industri', [IndustriController::class, 'index'])->name('industri.index');

// Auth Routes (Custom - dari kode CodeRPL)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Dashboard redirect untuk kompatibilitas
Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->role == 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect('/');
})->middleware(['auth'])->name('dashboard');

// Admin Routes
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Alumni Management
    Route::get('/alumni', [AdminController::class, 'alumniIndex'])->name('alumni.index');
    Route::get('/alumni/create', [AdminController::class, 'alumniCreate'])->name('alumni.create');
    Route::post('/alumni', [AdminController::class, 'alumniStore'])->name('alumni.store');
    Route::get('/alumni/{id}/edit', [AdminController::class, 'alumniEdit'])->name('alumni.edit');
    Route::put('/alumni/{id}', [AdminController::class, 'alumniUpdate'])->name('alumni.update');
    Route::delete('/alumni/{id}', [AdminController::class, 'alumniDestroy'])->name('alumni.destroy');
    
    // Industri Management
    Route::get('/industri', [AdminController::class, 'industriIndex'])->name('industri.index');
    Route::get('/industri/create', [AdminController::class, 'industriCreate'])->name('industri.create');
    Route::post('/industri', [AdminController::class, 'industriStore'])->name('industri.store');
    Route::get('/industri/{id}/edit', [AdminController::class, 'industriEdit'])->name('industri.edit');
    Route::put('/industri/{id}', [AdminController::class, 'industriUpdate'])->name('industri.update');
    Route::delete('/industri/{id}', [AdminController::class, 'industriDestroy'])->name('industri.destroy');
});