@extends('layout.app')

@section('title', 'Dashboard Dokter')
@section('dashboard', 'Dokter')
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
    <h1 class="m-6">Page Memeriksa</h1>
@endsection