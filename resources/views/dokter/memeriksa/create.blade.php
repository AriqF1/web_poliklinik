@php
    $showTables = false;
    $showFullscreen = true;
@endphp

@extends('layout.app')
@section('title', 'Dashboard Dokter')
@section('dashboard', 'Dokter')
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
    <div class="fullscreen-form">
        <div class="form-header">
            <h2><i class="fas fa-calendar-plus"></i>Mulai Pemeriksaan</h2>
            <p class="form-subtitle">Silakan isi formulir di bawah ini pada saat memeriksa pasien</p>
        </div>

        <div class="form-container">
            <form action="{{ route('dokter.memeriksa.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label>Nama Pasien</label>
                            <div class="input-wrapper patient">
                                @if(isset($periksas))
                                    <input type="hidden" name="id_pasien" value="{{ $periksas->id_pasien }}">
                                    <input type="text" class="form-control" value="{{ $periksas->pasien->nama }}" readonly>
                                @else
                                    <select name="id_pasien" id="id_pasien" class="form-control" required>
                                        <option value="">Pilih Pasien</option>
                                        @foreach ($pasiens as $pasien)
                                            <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                        @endforeach
                                    </select>
                                @endif
                                <i class="fas fa-user"></i>
                            </div>
                            <p class="input-help">Silakan pilih pasien yang akan diperiksa</p>
                        </div>

                        <div class="form-group">
                            <label for="tgl_periksa">Tanggal Pemeriksaan</label>
                            <div class="input-wrapper date">
                                <input type="date" name="tgl_periksa" id="tgl_periksa" value="{{ date('Y-m-d') }}"
                                    class="form-control" required>
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <p class="input-help">Tanggal pemeriksaan akan tercatat sesuai input</p>
                        </div>
                        <div class="form-column">
                            <div class="form-group">
                                <label>Biaya Pemeriksaan</label>
                                <div class="input-wrapper fee">
                                    <input type="text" id="biaya_periksa" value="Rp 150.000" readonly>
                                    <i class="fas fa-money-bill-wave"></i>
                                </div>
                                <p class="input-help">Biaya konsultasi standar (tidak termasuk tindakan medis tambahan)</p>
                            </div>
                        </div>

                        <div class="form-column">
                            <div class="form-group">
                                <label>Obat yang Diberikan</label>
                                <div class="input-wrapper fee">
                                    <select name="obats[]" id="obats" class="form-control" multiple required>
                                        @foreach ($obats as $obat)
                                            <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                                {{ $obat->nama_obat }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="input-help mt-2">Pilih obat yang ingin diberikan pada pasien.</p>
                            </div>
                        </div>

                        <!-- Display Total Biaya -->
                        <div class="form-column">
                            <div class="form-group">
                                <label>Total Biaya</label>
                                <div class="input-wrapper fee">
                                    <input type="text" id="total_biaya" value="Rp 150.000" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-column">
                        <!-- Catatan Pemeriksaan -->
                        <div class="form-group">
                            <label for="catatan">Catatan Hasil Pemeriksaan</label>
                            <div class="input-wrapper">
                                <textarea name="catatan" id="catatan" rows="5" class="form-control" required></textarea>
                                <i class="fas fa-comment-medical"></i>
                            </div>
                            <p class="input-help">Jelaskan keluhan atau hasil pemeriksaan pasien secara detail</p>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-column form-action">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-check-circle"></i>
                            Selesaikan Pemeriksaan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const selectObats = document.querySelector("#obats");
            const totalBiayaField = document.querySelector("#total_biaya");

            // Biaya pemeriksaan tetap
            const biayaPeriksa = 150000;

            // Fungsi untuk menghitung total biaya
            selectObats.addEventListener("change", function () {
                let totalObat = 0;

                // Mendapatkan semua opsi yang dipilih
                const selectedOptions = [...this.selectedOptions];

                // Menghitung total harga obat
                selectedOptions.forEach(function (option) {
                    totalObat += parseInt(option.dataset.harga);
                });

                // Menghitung total biaya (biaya pemeriksaan + total obat)
                const totalBiaya = biayaPeriksa + totalObat;

                // Menampilkan total biaya pada field
                totalBiayaField.value = "Rp " + totalBiaya.toLocaleString('id-ID');
            });
        });

    </script>
@endsection