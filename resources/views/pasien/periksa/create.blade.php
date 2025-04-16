@php
    $showTables = false;
    $showFullscreen = true;
@endphp

@extends('layout.app')

@section('title', 'Buat Pemeriksaan')
@section('dashboard', 'Pasien')
@section('fullscreen')
    <div class="fullscreen-form">
        <div class="form-header">
            <h2><i class="fas fa-calendar-plus"></i> Buat Janji Pemeriksaan</h2>
            <p class="form-subtitle">Silakan isi formulir di bawah untuk membuat janji pemeriksaan dengan dokter</p>
        </div>

        <div class="form-container">
            <form action="{{ route('pasien.periksa.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label for="id_dokter">Pilih Dokter</label>
                            <div class="input-wrapper">
                                <select name="id_dokter" id="id_dokter" required>
                                    <option value="">-- Pilih Dokter --</option>
                                    @foreach ($dokters as $dokter)
                                        <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                    @endforeach
                                </select>
                                <i class="fas fa-user-md"></i>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tgl_periksa">Tanggal Pemeriksaan</label>
                            <div class="input-wrapper">
                                <input type="date" name="tgl_periksa" id="tgl_periksa" required>
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                        </div>
                    </div>

                    <div class="form-column">
                        <div class="form-group">
                            <label for="catatan">Catatan</label>
                            <div class="input-wrapper">
                                <textarea name="catatan" id="catatan" rows="5" required></textarea>
                                <i class="fas fa-comment-medical"></i>
                            </div>
                            <p class="input-help">Jelaskan keluhan atau alasan kunjungan Anda secara detail</p>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-column">
                        <div class="form-group">
                            <label>Biaya Pemeriksaan</label>
                            <div class="input-wrapper fee">
                                <input type="text" value="Rp 150.000" readonly>
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            <p class="input-help">Biaya konsultasi standar (tidak termasuk tindakan medis tambahan)</p>
                        </div>
                    </div>

                    <div class="form-column form-action">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-check-circle"></i>
                            Ajukan Janji
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection