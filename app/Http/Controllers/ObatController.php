<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::all();
        return view('dokter.obat', compact('obats'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);
        $obats = Obat::create($request->all());
        return redirect()->route('dokter.obat')->with('success', 'Data Obat Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $obats = Obat::findOrFail($id);
        return view('dokter.edit', compact('obats'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'kemasan' => 'required',
            'harga' => 'required|numeric',
        ]);
        $obats = Obat::findOrFail($id);
        $obats->update($request->all());
        return redirect()->route('dokter.obat')->with('success', 'Data Obat Berhasil Diupdate');
    }
}
