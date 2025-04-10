@extends('layout.app')

@section('title', 'Buat Pemeriksaan')
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
    <div class="card">
        <div class="card-header">
            <h4>Buat Janji Pemeriksaan</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pasien.periksa.store') }}" method="POST">
                @csrf

                <div class="form-group mb-3">
                    <label for="id_dokter">Pilih Dokter</label>
                    <select name="id_dokter" class="form-control" required>
                        <option value="">-- Pilih Dokter --</option>
                        @foreach ($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="tgl_periksa">Tanggal Pemeriksaan</label>
                    <input type="date" name="tgl_periksa" class="form-control" required>
                </div>

                <div class="form-group mb-3">
                    <label for="catatan">Catatan</label>
                    <textarea name="catatan" class="form-control" rows="3" required></textarea>
                </div>

                <div class="form-group mb-3">
                    <label>Biaya Pemeriksaan</label>
                    <input type="text" class="form-control" value="Rp 150.000" readonly>
                </div>

                <button type="submit" class="btn btn-primary float-end">Ajukan Janji</button>
            </form>
        </div>
    </div>
</div>

<script>
    const selectObats = document.querySelector('select[name="obats[]"]');
    const totalBiayaField = document.getElementById('total_biaya');

    selectObats.addEventListener('change', function () {
        const selectedOptions = [...this.selectedOptions];
        const hargaObat = selectedOptions.reduce((sum, opt) => {
            return sum + parseInt(opt.dataset.harga);
        }, 0);

        const biayaPeriksa = 150000;
        const total = biayaPeriksa + hargaObat;
        totalBiayaField.value = "Rp " + total.toLocaleString('id-ID');
    });
</script>
@endsection
