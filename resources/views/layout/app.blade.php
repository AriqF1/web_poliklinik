<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-create.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="container">
        <!-- Sidebar -->
        <div class="sidebar">
            @if(auth()->check())
                @if(auth()->user()->role === 'pasien')
                    <div class="sidebar-header">
                        <div class="sidebar-brand">
                            <i class="fas fa-heartbeat"></i>
                            <span>SISMENKES</span>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <a href="{{ Route('pasien.index') }}" class="menu-item active">
                            <i class="fas fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ Route('pasien.periksa') }}" class="menu-item">
                            <i class="fas fa-stethoscope"></i>
                            <span>Periksa</span>
                        </a>
                        <a href="#" class="menu-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-arrow-right-from-bracket"></i>
                            <p>Logout</p>
                        </a>

                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('pasien.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @elseif(auth()->user()->role === 'dokter')
                    <div class="sidebar-header">
                        <div class="sidebar-brand">
                            <i class="fas fa-heartbeat"></i>
                            <span>SISMENKES</span>
                        </div>
                    </div>
                    <div class="sidebar-menu">
                        <a href="{{ Route('dokter.index') }}" class="menu-item active">
                            <i class="fas fa-chart-line"></i>
                            <span>Dashboard</span>
                        </a>
                        <a href="{{ Route('dokter.memeriksa') }}" class="menu-item">
                            <i class="fas fa-stethoscope"></i>
                            <span>Memeriksa</span>
                        </a>
                        <a href="{{ Route('dokter.obat') }}" class="menu-item">
                            <i class="fas fa-pills"></i>
                            <span>Obat</span>
                        </a>
                        <a href="#" class="menu-item"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-arrow-right-from-bracket"></i>
                            <p>Logout</p>
                        </a>

                        <!-- Hidden Logout Form -->
                        <form id="logout-form" action="{{ route('dokter.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endif
            @endif
        </div>


        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header">
                @yield('header')
            </div>
            <!-- Dashboard Cards -->
            @php
                $showTables = $showTables ?? true;
                $showFullscreen = $showFullscreen ?? false;
            @endphp

            <div class="dashboard-cards">
                @yield('content')
            </div>

            @if($showTables)
                <div class="dashboard-tables">
                    <div class="table-container">
                        @yield('table')
                    </div>
                    <div class="table-container">
                        @yield('schedule')
                    </div>
                </div>
            @endif

            @if($showFullscreen)
                <div class="fullscreen-content">
                    @yield('fullscreen')
                </div>
            @endif

            <!-- Dashboard Tables -->
        </div>
    </div>

    <script>
        // Simple navigation functionality
        document.addEventListener('DOMContentLoaded', function () {
            const menuItems = document.querySelectorAll('.menu-item');

            menuItems.forEach(item => {
                item.addEventListener('click', function () {
                    // Remove active class from all menu items
                    menuItems.forEach(i => i.classList.remove('active'));

                    // Add active class to clicked item
                    this.classList.add('active');

                    // Here you would typically handle navigation or view changes
                    // For demonstration purposes, we're just updating the active state
                });
            });
        });
    </script>
</body>

</html>