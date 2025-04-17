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
                    <td>{{ $periksa->pasien->nama }}</td>
                    <td>{{ $periksa->tgl_periksa }}</td>
                    <td>
                        @if ($periksa->status == 'selesai')
                            <span class="status completed">Selesai</span>
                        @elseif ($periksa->status == 'menunggu')
                            <span class="status pending">Menunggu</span>
                        @else
                            <span class="status unknown">-</span>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
@section('schedule')
    <div class="table-header">
        <div class="table-title">Riwayat Pemberian Obat</div>
    </div>

    @php
        $grouped = $obats->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->periksa->tgl_periksa)->format('d M Y');
        });
    @endphp

    @foreach ($grouped as $tanggal => $items)
        <h4 style="margin-top: 20px;">{{ $tanggal }}</h4>
        <table>
            <thead>
                <tr>
                    <th>Nama Obat</th>
                    <th>Kemasan</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $detail)
                    <tr>
                        <td>{{ $detail->obat->nama_obat }}</td>
                        <td>{{ $detail->obat->kemasan }}</td>
                        <td>{{ 'Rp ' . number_format($detail->obat->harga, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endforeach
@endsection
