@php
    $showTables = false;
    $showFullscreen = true;
@endphp

@extends('layout.app')
@section('title', 'Obat')
@section('fullscreen')
    <div class="fullscreen-form">
        <div class="form-container">
            <div class="form-header">
                <h2><i class="fas fa-pills"></i> Edit Obat</h2>
                <p class="form-subtitle">Edit informasi detail obat</p>
            </div>

            <form action="{{ route('dokter.obat.update', $obats->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="nama_obat">Nama Obat</label>
                            <div class="input-wrapper">
                                <input type="text" id="nama_obat" name="nama_obat" placeholder="Masukkan nama obat"
                                    value="{{ $obats->nama_obat }}" required>
                                <i class="fas fa-capsules"></i>
                            </div>
                            <div class="input-help">Masukkan nama lengkap obat</div>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-group">
                            <label for="kemasan">Kemasan</label>
                            <div class="input-wrapper">
                                <input type="text" id="kemasan" name="kemasan" placeholder="Masukkan kemasan obat"
                                    value="{{ $obats->kemasan }}" required>
                                <i class="fas fa-box"></i>
                            </div>
                            <div class="input-help">Contoh: Botol 100ml, Strip 10 tablet, dll</div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="harga">Harga (Rp)</label>
                    <div class="input-wrapper fee">
                        <input type="number" id="harga" name="harga" placeholder="Masukkan harga obat"
                            value="{{ $obats->harga }}" required>
                        <i class="fas fa-tag"></i>
                    </div>
                    <div class="input-help">Masukkan harga dalam bentuk angka tanpa tanda titik atau koma</div>
                </div>

                <div class="form-action">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> Update Obat
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
