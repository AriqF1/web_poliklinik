<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller
{
    public function index()
    {
        $jumlahDokter = User::where('role', 'dokter')->count();
        $pasien = auth()->user();
        return view('pasien.index', compact('pasien', 'jumlahDokter'));
    }
    public function logout()
    {
        Auth::logout(); // Logout user yang sedang login

        return redirect()->route('login'); // Redirect ke halaman login
    }

}
