@extends('layout.app')

@section('title', 'Riwayat Pemeriksaan')
@section('dashboard', 'Pasien')
@section('sidebar')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="./index.html" class="nav-link ">
                        <i class="fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{Route('pasien.periksa')}}" class="nav-link active">
                        <i class="fa-solid fa-hospital"></i>
                        <p>Periksa</p>
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
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Riwayat Pemeriksaan Anda</h4>
        <a href="{{ route('pasien.periksa.create') }}" class="btn btn-primary">Buat Janji Periksa</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Catatan</th>
                <th>Total Biaya</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periksas as $periksa)
                <tr>
                    <td>{{ $periksa->tgl_periksa }}</td>
                    <td>{{ $periksa->catatan }}</td>
                    <td>Rp {{ number_format($periksa->biaya_periksa, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $periksas->links() }}
</div>
@endsection
