<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class ObatController extends Controller
{
    public function index()
    {
        $obats = Obat::latest()->paginate(10);
        return view('dokter.obat.obat', compact('obats'));
    }
    public function create()
    {
        $pasiens = User::where('role', 'pasien')->get();
        return view('dokter.obat.create', compact('pasiens'));
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

    public function destroy($id)
    {
        $obats = Obat::findOrFail($id);
        $obats->delete();
        return redirect()->route('dokter.obat')->with('success', 'Data Obat Berhasil Dihapus');
    }
}
