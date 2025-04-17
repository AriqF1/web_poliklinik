<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
| pengaturan routing untuk login dan register pengguna
| Termasuk tampilan form dan proses autentikasi
*/

Route::get('/', [LoginController::class, 'index'])->name('login'); // Form login
Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // Proses login

Route::get('/register', [RegisterController::class, 'index'])->name('register'); // Form register
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit'); // Proses register

/*
|--------------------------------------------------------------------------
| PASIEN ROUTES
|--------------------------------------------------------------------------
| ini akan mengatur semua rute yang hanya dapat diakses oleh user dengan role 'pasien'
| Menggunakan prefix 'pasien' dan middleware untuk autentikasi serta role-based access control
*/
Route::prefix('pasien')
    ->name('pasien.') // Penamaan route dengan prefix 'pasien.'
    ->middleware(['auth', 'role:pasien']) // Hanya bisa diakses oleh user yang login sebagai pasien
    ->group(function () {
        Route::get('/dashboard', [PasienController::class, 'index'])->name('index'); // Dashboard pasien
        Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa'); // Daftar pemeriksaan
        Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('periksa.create'); // Form buat pemeriksaan
        Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store'); // Proses simpan pemeriksaan
        Route::post('/pasien/logout', [PasienController::class, 'logout'])->name('logout'); // Logout pasien
    });

/*
|--------------------------------------------------------------------------
| DOKTER ROUTES
|--------------------------------------------------------------------------
| ini akan mengatur semua rute yang hanya dapat diakses oleh user dengan role 'dokter'
| Menggunakan prefix 'dokter' dan middleware untuk autentikasi serta role-based access control
*/
Route::prefix('dokter')
    ->name('dokter.') // Penamaan route dengan prefix 'dokter.'
    ->middleware(['auth', 'role:dokter']) // Hanya bisa diakses oleh user yang login sebagai dokter
    ->group(function () {
        Route::get('/dashboard', [DokterController::class, 'index'])->name('index'); // Dashboard dokter

        // Pemeriksaan pasien
        Route::get('/memeriksa', [MemeriksaController::class, 'index'])->name('memeriksa'); // Daftar pemeriksaan
        Route::get('/memeriksa/create/{id?}', [MemeriksaController::class, 'create'])->name('memeriksa.create'); // Form isi pemeriksaan
        Route::post('/memeriksa', [MemeriksaController::class, 'store'])->name('memeriksa.store'); // Simpan hasil pemeriksaan

        // Manajemen obat
        Route::get('/obat', [ObatController::class, 'index'])->name('obat'); // Daftar obat
        Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create'); // Form tambah obat
        Route::post('/obat', [ObatController::class, 'store'])->name('obat.store'); // Simpan data obat
        Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit'); // Form edit obat
        Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update'); // Update data obat
        Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy'); // Hapus data obat

        Route::post('/dokter/logout', [DokterController::class, 'logout'])->name('logout'); // Logout dokter
    });
