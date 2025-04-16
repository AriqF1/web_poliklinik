@extends('layout.app')

@section('title', 'Riwayat Pemeriksaan')
@section('dashboard', 'Pasien')
@section('header')
    <h1>Dashboard Pasien</h1>
    <div class="user-info">
        <div class="user-avatar">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="user-name">{{ $pasien->nama }}</div>
    </div>
@endsection
@section('table')
    <div class="table-header">
        <div class="table-title">Riwayat Periksamu</div>
        <a href="{{ Route('pasien.periksa.create') }}" class="view-all">Buat Janji Periksa</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periksas as $periksa)
                <tr>
                    <td>{{ $periksa->pasien->nama}}</td>
                    <td>{{ $periksa->tgl_periksa }}</td>
                    <td><span class="status pending">Menunggu</span></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
@section('schedule')
    <div class="table-header">
        <div class="table-title">Riwayat Pemberian Obat</div>
    </div>
    <table>
        <thead>
            <tr>
                <th>Nama Obat</th>
                <th>Kemasan</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($obats as $obat)
                <tr>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->kemasan  }}</td>
                    <td>{{ 'Rp ' . number_format($obat->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection