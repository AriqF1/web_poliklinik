<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Periksa;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Auth::user();
        $jumlahPasien = Periksa::where('id_dokter', $dokter->id)
            ->whereDate('created_at', today())
            ->count();

        $janjiTemu = Periksa::where('id_dokter', $dokter->id)
            ->whereDate('tgl_periksa', today())
            ->count();
        $jumlahPemeriksaan = Periksa::where('id_dokter', $dokter->id)
            ->where('status', 'selesai')
            ->count();
        return view('dokter.index', compact('dokter', 'jumlahPasien', 'janjiTemu', 'jumlahPemeriksaan'));
    }
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
