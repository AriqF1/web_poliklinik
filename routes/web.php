<?php

use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.app');
});
Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
});

Route::get('/dokter/obat', [ObatController::class, 'index'])->name('dokter.obat');
Route::post('/dokter/obat', [ObatController::class, 'store'])->name('dokter.obat.store');
Route::get('/dokter/obat/{id}/edit', [ObatController::class, 'edit'])->name('dokter.obat.edit');
Route::put('/dokter/obat/{id}', [ObatController::class, 'update'])->name('dokter.obat.update');


Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});


