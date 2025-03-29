<?php

use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout.app');
});
Route::get('/dokter/dashboard', function () {
    return view('dokter.index');
});

Route::get('/dokter/obat', [ObatController::class, 'index']);

Route::get('/pasien/dashboard', function () {
    return view('pasien.index');
});


