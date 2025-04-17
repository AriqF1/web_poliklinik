<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periksa;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Auth::user();
        $jumlahDokter = User::where('role', 'dokter')->count();
        $janjiTemu = Periksa::where('id_pasien', $pasien->id)
            ->whereDate('tgl_periksa', today())
            ->count();
        $jumlahPemeriksaan = Periksa::where('id_pasien', $pasien->id)
            ->where('status', 'selesai')
            ->count();
        return view('pasien.index', compact('pasien', 'jumlahDokter', 'janjiTemu', 'jumlahPemeriksaan'));
    }
    public function logout()
    {
        Auth::logout(); // Logout user yang sedang login

        return redirect()->route('login'); // Redirect ke halaman login
    }
}
