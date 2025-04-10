<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\MemeriksaController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PeriksaController;

Route::get('/', function () {
    return view('layout.app');
});

// Dashboard Pasien
Route::prefix('pasien')->name('pasien.')->group(function () {

    // Dashboard Pasien
    Route::get('/dashboard', [PasienController::class, 'index'])->name('index');


    Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa');
    Route::get('/periksa/create', [PeriksaController::class, 'create'])->name('periksa.create');
    Route::post('/periksa', [PeriksaController::class, 'store'])->name('periksa.store');
});

// Group Dokter
Route::prefix('dokter')->name('dokter.')->group(function () {

    // Dashboard Dokter
    Route::get('/dashboard', [DokterController::class, 'index'])->name('index');

    // Memeriksa (Index = Form Create + List)
    Route::get('/memeriksa', [MemeriksaController::class, 'index'])->name('memeriksa');
    Route::get('/memeriksa/create', [MemeriksaController::class, 'create'])->name('memeriksa.create');
    Route::post('/memeriksa', [MemeriksaController::class, 'store'])->name('memeriksa.store');

    // Obat
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
});
