<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periksa;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = auth()->user();
        $jumlahPasien = Periksa::where('id_dokter', $dokter->id)
            ->whereDate('created_at', today())
            ->count();

        $janjiTemu = Periksa::where('id_dokter', $dokter->id)
            ->whereDate('tgl_periksa', today())
            ->count();
        return view('dokter.index', compact('dokter', 'jumlahPasien', 'janjiTemu'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
