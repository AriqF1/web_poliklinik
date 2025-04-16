<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periksa;
use App\Models\User;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use Illuminate\Support\Facades\Auth;

class PeriksaController extends Controller
{
    public function index()
    {
        $pasien = auth()->user();
        $periksaIds = Periksa::where('id_pasien', $pasien->id)->pluck('id');
        $obats = DetailPeriksa::whereIn('id_periksa', $periksaIds)->with('obat')->get();
        $periksas = Periksa::where('id_pasien', $pasien->id)->latest()->paginate(10);

        return view('pasien.periksa.index', compact('periksas', 'pasien', 'obats'));
    }


    public function create()
    {
        $pasien = auth()->user();
        $dokters = User::where('role', 'dokter')->get();
        return view('pasien.periksa.create', compact('dokters', 'pasien'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tgl_periksa' => 'required|date',
            'catatan' => 'required|string',
            'id_dokter' => 'required|exists:users,id',
        ]);

        $biaya_periksa = 150000;

        $periksa = Periksa::create([
            'id_pasien' => auth()->id(),
            'id_dokter' => $request->id_dokter,
            'tgl_periksa' => $request->tgl_periksa,
            'catatan' => $request->catatan,
            'biaya_periksa' => $biaya_periksa,
        ]);

        return redirect()->route('pasien.periksa')->with('success', 'Permintaan pemeriksaan berhasil dikirim.');
    }
}

