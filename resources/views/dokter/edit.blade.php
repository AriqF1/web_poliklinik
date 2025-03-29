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
                        <form action="{{ route('dokter.obat.edit') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_obat">Nama Obat</label>
                                    <input type="text" class="form-control" value="{{ $obat->nama_obat }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="kemasan">Kemasan</label>
                                    <input type="text" class="form-control" value="{{ $obat->kemasan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" value="{{ $obat->harga }}" required>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection