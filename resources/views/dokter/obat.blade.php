@extends('layout.app')
@section('title', 'Obat')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Obat</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard v1</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
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
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control" id="nama_obat" name="nama_obat"
                                        placeholder="Masukkan nama obat" required>
                                </div>
                                <div class="form-group">
                                    <label for="kemasan">Kemasan</label>
                                    <input type="text" class="form-control" id="kemasan" name="kemasan"
                                        placeholder="Masukkan kemasan obat" required>
                                </div>
                                <div class="form-group">
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obats as $obat)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $obat->nama_obat }}</td>
                                            <td>{{ $obat->kemasan }}</td>
                                            <td>{{ $obat->harga }}</td>
                                            <td><a href="{{ route('dokter.obat.edit', $obat->id) }}"
                                                    class="btn btn-primary">Edit</a>
                                                <button class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

    </section>
@endsection