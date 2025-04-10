@extends('layout.app')

@section('title', 'Data Pemeriksaan')
@section('dashboard', 'Dokter')
@section('sidebar')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dokter.index') }}" class="nav-link ">
                        <i class="fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.memeriksa') }}" class="nav-link active">
                        <i class="fa-solid fa-stethoscope"></i>
                        <p>Memeriksa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.obat') }}" class="nav-link">
                        <i class="fa-solid fa-capsules"></i>
                        <p>Obat</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./index3.html" class="nav-link">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pemeriksaan</h3>
            <a href="{{ route('dokter.memeriksa.create') }}" class="btn btn-primary float-right">Tambah Pemeriksaan</a>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pasien</th>
                        <th>Tanggal</th>
                        <th>Catatan</th>
                        <th>Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($periksas as $periksa)
                        <tr>
                            <td>{{ $periksa->pasien->nama }}</td>
                            <td>{{ $periksa->tgl_periksa }}</td>
                            <td>{{ $periksa->catatan }}</td>
                            <td>Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $periksas->links() }}
        </div>
    </div>
@endsection
