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
        // Menampilkan daftar pemeriksaan yang tersedia
        $periksas = Periksa::latest()->paginate(10);
        return view('dokter.memeriksa.index', compact('periksas'));
    }

    public function create($id = null)
    {
        // Mengambil data obat dan pemeriksaan berdasarkan ID
        $obats = Obat::all();
        $dokter = Auth::user();

        // Jika ID ada, ambil data pemeriksaan
        if ($id) {
            $periksas = Periksa::findOrFail($id);
        }

        return view('dokter.memeriksa.create', compact('periksas', 'obats', 'dokter'));
    }

    public function store(Request $request)
    {
        // Validasi inputan yang dikirimkan
        $request->validate([
            'id' => 'required|exists:periksas,id',    // Pastikan ID pemeriksaan ada
            'id_pasien' => 'required|exists:users,id', // Pastikan ID pasien valid
            'tgl_periksa' => 'required|date',          // Tanggal pemeriksaan valid
            'catatan' => 'required|string',            // Catatan pemeriksaan dokter
            'obats' => 'required|array',               // Obat yang digunakan harus berupa array
            'obats.*' => 'exists:obats,id',             // Pastikan ID obat valid
            'status' => 'nullable|in:menunggu,selesai', // Status pemeriksaan
        ]);

        // Ambil data pemeriksaan berdasarkan ID
        $periksa = Periksa::findOrFail($request->id);

        // Pastikan dokter yang login adalah yang menangani pemeriksaan ini
        if ($periksa->id_dokter !== Auth::user()->id) {
            return redirect()->route('dokter.memeriksa')->with('error', 'Anda tidak memiliki izin untuk mengubah data pemeriksaan ini.');
        }

        // Jika status sudah selesai, kita tidak perlu update status lagi
        if ($periksa->status == 'selesai') {
            return redirect()->route('dokter.memeriksa')->with('info', 'Pemeriksaan ini sudah selesai.');
        }

        // Hitung biaya pemeriksaan, termasuk obat yang digunakan
        $biaya_periksa = 150000;
        $total_obat = Obat::whereIn('id', $request->obats)->sum('harga');
        $total = $biaya_periksa + $total_obat;

        // Update status pemeriksaan menjadi selesai
        $periksa->update([
            'id_dokter' => Auth::user()->id,    // Dokter yang sedang memeriksa
            'tgl_periksa' => $request->tgl_periksa, // Tanggal pemeriksaan
            'catatan' => $request->catatan,       // Catatan hasil pemeriksaan
            'biaya_periksa' => $total,             // Total biaya pemeriksaan
            'status' => $request->status,                 // Update status menjadi selesai
        ]);

        // Simpan detail obat yang digunakan selama pemeriksaan
        foreach ($request->obats as $id_obat) {
            DetailPeriksa::create([
                'id_periksa' => $periksa->id,
                'id_obat' => $id_obat,  // ID obat yang digunakan
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->route('dokter.memeriksa')->with('success', 'Pemeriksaan selesai dan data berhasil disimpan.');
    }
}
