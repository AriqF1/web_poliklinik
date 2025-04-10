@extends('layout.app')

@section('title', 'Dashboard Dokter')
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
<div class="row">
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Pemeriksaan Pasien</h3>
            </div>

            <form action="{{ route('dokter.memeriksa.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <!-- Nama Pasien -->
                    <div class="form-group mb-3">
                        <label for="id_pasien">Nama Pasien</label>
                        <select name="id_pasien" id="id_pasien" class="form-control" required>
                            <option value="">Pilih Pasien</option>
                            @forelse ($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                            @empty
                                <option value="">Tidak ada pasien</option>
                            @endforelse
                        </select>
                    </div>

                    <!-- Tanggal Periksa -->
                    <div class="form-group mb-3">
                        <label for="tgl_periksa">Tanggal Periksa</label>
                        <input type="date" name="tgl_periksa" id="tgl_periksa" class="form-control" required>
                    </div>

                    <!-- Catatan Medis -->
                    <div class="form-group mb-3">
                        <label for="catatan">Catatan Medis</label>
                        <textarea name="catatan" id="catatan" class="form-control" rows="4" required></textarea>
                    </div>

                    <!-- Daftar Obat -->
                    <div class="form-group mb-3">
                        <label for="obats">Obat yang Diberikan</label>
                        <select name="obats[]" id="obats" class="form-control" multiple required>
                            @foreach ($obats as $obat)
                                <option value="{{ $obat->id }}" data-harga="{{ $obat->harga }}">
                                    {{ $obat->nama_obat }} - Rp{{ number_format($obat->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Biaya Periksa -->
                    <div class="form-group mb-3">
                        <label>Biaya Periksa</label>
                        <input type="text" class="form-control" value="Rp 150.000" readonly>
                    </div>

                    <!-- Total Biaya -->
                    <div class="form-group mb-3">
                        <label>Total Biaya (Periksa + Obat)</label>
                        <input type="text" id="total_biaya" class="form-control" value="Rp 150.000" readonly>
                    </div>
                </div>

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
                </div>
            </form>
        </div>
    </div>
</div>
        <script>
            const selectObats = document.querySelector('select[name="obats[]"]');
            const totalBiayaField = document.getElementById('total_biaya');

            selectObats.addEventListener('change', function() {
                const selectedOptions = [...this.selectedOptions];
                const hargaObat = selectedOptions.reduce((sum, opt) => {
                    return sum + parseInt(opt.dataset.harga);
                }, 0);

                const biayaPeriksa = 150000;
                const total = biayaPeriksa + hargaObat;
                totalBiayaField.value = "Rp " + total.toLocaleString('id-ID');
            });
        </script>
    </div>
    </div>
@endsection
