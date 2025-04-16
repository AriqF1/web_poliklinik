<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\Obat;
use App\Models\DetailPeriksa;
use Illuminate\Support\Facades\Auth;

class MemeriksaController extends Controller
{
    public function index()
    {
        $periksas = Periksa::latest()->paginate(10);
        return view('dokter.memeriksa.index', compact('periksas'));
    }

    public function create($id = null)
    {
        $obats = Obat::all();
        $dokter = auth()->user();
        if ($id) {
            $periksas = Periksa::findOrFail($id);
        }
        return view('dokter.memeriksa.create', compact('periksas', 'obats', 'dokter'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pasien' => 'required|exists:users,id',
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'obats' => 'required|array',
            'obats.*' => 'exists:obats,id',
        ]);

        $biaya_periksa = 150000;
        $total_obat = Obat::whereIn('id', $request->obats)->sum('harga');
        $total = $biaya_periksa + $total_obat;

        $periksa = Periksa::create([
            'id_pasien' => $request->id_pasien,
            'id_dokter' => auth()->id(),
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $total,
        ]);

        foreach ($request->obats as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,
            ]);
        }

        return redirect()->route('dokter.memeriksa')->with('success', 'Data pemeriksaan berhasil disimpan.');
    }
}
