@extends('layout.app')
@section('title', 'Obat')
@section('sidebar')
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item menu-open">
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('dokter.index') }}" class="nav-link active">
                        <i class="fa-solid fa-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dokter.memeriksa') }}" class="nav-link">
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
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Form Tambah Obat</h3>
                </div>
                <form action="{{ route('dokter.obat.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <select name="id_pasien" id="id_pasien" class="form-control" required>
                                <option value="">Pilih Pasien</option>
                                @forelse ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                @empty
                                    <option value="">Tidak ada pasien</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama_obat">Nama Obat</label>
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                placeholder="Masukkan nama obat" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="kemasan">Kemasan</label>
                            <input type="text" class="form-control" id="kemasan" name="kemasan"
                                placeholder="Masukkan kemasan obat" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="harga">Harga</label>
                            <input type="number" class="form-control" id="harga" name="harga"
                                placeholder="Masukkan harga obat" required>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection