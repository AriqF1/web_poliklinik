<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\DetailPeriksa;

class PeriksaController extends Controller
{
    public function index()
    {
        $periksas = Periksa::where('id_pasien', auth()->id())->latest()->paginate(10);
        return view('pasien.periksa.index', compact('periksas'));
    }

    public function create()
    {
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa.create', compact('dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'obats' => 'required|array',
            'obats.*' => 'exists:obats,id',
        ]);

        $biaya_periksa = 150000;
        $total_obat = Obat::whereIn('id', $request->obats)->sum('harga');
        $total = $biaya_periksa + $total_obat;

        $periksa = Periksa::create([
            'id_pasien' => auth()->id(),
            'id_dokter' => null, // bisa null dulu
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

        return redirect()->route('pasien.periksa')->with('success', 'Permintaan pemeriksaan berhasil dikirim.');
    }
}

