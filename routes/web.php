<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');


// =========================
// Dashboard PASIEN
// =========================
Route::prefix('pasien')
    ->name('pasien.')
    ->middleware(['auth', 'role:pasien']) // 👈 Tambahkan ini
    ->group(function () {
        Route::get('/dashboard', [PasienController::class, 'index'])->name('index');
        Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa');
        Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('periksa.create');
        Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store');
        // Route untuk logout pasien
        Route::post('/pasien/logout', [PasienController::class, 'logout'])->name('logout');
    });

// =========================
// Dashboard DOKTER
// =========================
Route::prefix('dokter')
    ->name('dokter.')
    ->middleware(['auth', 'role:dokter']) // 👈 Tambahkan ini
    ->group(function () {
        Route::get('/dashboard', [DokterController::class, 'index'])->name('index');

        Route::get('/memeriksa', [MemeriksaController::class, 'index'])->name('memeriksa');
        Route::get('/memeriksa/create/{id?}', [MemeriksaController::class, 'create'])->name('memeriksa.create');
        Route::post('/memeriksa', [MemeriksaController::class, 'store'])->name('memeriksa.store');

        Route::get('/obat', [ObatController::class, 'index'])->name('obat');
        Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
        Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
        Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
        Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
        Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');

        // Route untuk logout dokter
        Route::post('/dokter/logout', [DokterController::class, 'logout'])->name('logout');
    });
