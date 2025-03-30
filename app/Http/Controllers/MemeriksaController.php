<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemeriksaController extends Controller
{
    public function index()
    {
        return view('dokter.memeriksa');
    }
}
