@php
    $showTables = false;
    $showFullscreen = true;
@endphp
@extends('layout.app')
@section('title', 'Obat')
@section('header')
    <h1>Dashboard Dokter</h1>
    <div class="user-info">
        <div class="user-avatar">
            <i class="fas fa-user-md"></i>
        </div>
        <div class="user-name">{{ $dokter->nama }}</div>
    </div>
@endsection
@section('fullscreen')
    <section class="content">
        <div class="container-fluid">
            <!-- Tombol Tambah Obat -->
            <div class="header mb-4">
                <a href="{{ route('dokter.obat.create') }}" class="action-btn">
                    Tambah Obat
                </a>
            </div>

            <!-- Daftar Obat -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar Obat</h3>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Obat</th>
                                        <th>Kemasan</th>
                                        <th>Harga</th>
                                        <th>Aksi</th> <!-- Kolom untuk tombol Aksi -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $obat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->kemasan }}</td>
                                            <td>{{ $obat->harga }}</td>
                                            <td>
                                                <!-- Tombol Edit -->
                                                <a href="{{ route('dokter.obat.edit', $obat->id) }}"
                                                    class="action-btn">Edit</a>

                                                <!-- Tombol Delete dengan Konfirmasi -->
                                                <a href="#" class="action-btn btn-delete"
                                                    onclick="event.preventDefault(); 
                                                if(confirm('Yakin ingin menghapus obat ini?')) {
                                                    document.getElementById('delete-form-{{ $obat->id }}').submit();
                                                }">
                                                    Delete
                                                </a>

                                                <!-- Form Delete yang disembunyikan -->
                                                <form id="delete-form-{{ $obat->id }}"
                                                    action="{{ route('dokter.obat.destroy', $obat->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
