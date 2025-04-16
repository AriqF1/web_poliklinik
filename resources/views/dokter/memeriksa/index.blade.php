@php
    $showTables = false;
    $showFullscreen = true;
@endphp

@extends('layout.app')

@section('title', 'Data Pemeriksaan')
@section('dashboard', 'Dokter')
@section('fullscreen')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title">Daftar Pemeriksaan</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Pasien</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                        <th>Total Biaya</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($periksas as $periksa)
                        <tr>
                            <td>{{ $periksa->pasien->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($periksa->tgl_periksa)->format('d M Y') }}</td>
                            <td>{{ $periksa->catatan ?? '-' }}</td>
                            <td>Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('dokter.memeriksa.create', ['id' => $periksa->id]) }}"
                                    class="btn btn-sm btn-success">
                                    <i class="fas fa-notes-medical"></i> Mulai Periksa
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Belum ada data pemeriksaan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection