<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Aplikasi UKM')</title>

  {{-- Bootstrap & Icons --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  {{-- Custom CSS --}}
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="bg-light {{ request()->is('login') || request()->is('register') ? 'auth-page' : '' }}">

  {{-- 🔹 Layout khusus halaman LOGIN & REGISTER --}}
  @if (request()->is('login') || request()->is('register'))
    <div class="auth-wrapper d-flex flex-column justify-content-center align-items-center min-vh-100">
      <div class="auth-card w-100" style="max-width:420px;">
        @yield('content')
      </div>

      <footer class="text-center py-3 mt-4 small text-muted">
        © 2025 Aplikasi UKM. Hak Cipta Dilindungi.
      </footer>
    </div>

  {{-- 🔹 Layout untuk DASHBOARD & halaman setelah login --}}
  @else
    <div class="d-flex">
    {{-- Sidebar --}}
    <aside class="bg-dark text-white p-3 d-flex flex-column justify-content-between" style="width: 230px; min-height: 100vh;">
        <div>
            <h5 class="fw-bold mb-4">Aplikasi UKM</h5>
            <ul class="nav flex-column">
    <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link text-white"><i class="bi bi-house me-2"></i> Dashboard</a></li>
    <li class="nav-item"><a href="{{ route('ukm.index') }}" class="nav-link text-white"><i class="bi bi-people me-2"></i> UKM</a></li>
    <li class="nav-item"><a href="{{ route('anggota.index') }}" class="nav-link text-white"><i class="bi bi-person me-2"></i> Anggota</a></li>
    <li class="nav-item"><a href="{{ route('info.lomba.index') }}" class="nav-link text-white"><i class="bi bi-trophy me-2"></i> Info Lomba</a></li>
    <li class="nav-item"><a href="{{ route('info.ukm.index') }}" class="nav-link text-white"><i class="bi bi-megaphone me-2"></i> Info UKM</a></li>
</ul>

        </div>

        {{-- Logout di bawah --}}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100 mt-3">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </aside>

      {{-- Konten utama --}}
      <main class="flex-grow-1 min-vh-100 d-flex flex-column">
        {{-- Navbar kecil untuk HP --}}
        <nav class="navbar navbar-light bg-white border-bottom d-md-none">
          <div class="container-fluid">
            <button id="openSidebar" class="btn btn-outline-dark">
              <i class="bi bi-list"></i> Menu
            </button>
            <span class="fw-semibold">@yield('title', 'Dashboard')</span>
          </div>
        </nav>

        {{-- Isi halaman --}}
        <div class="container-fluid py-4 flex-grow-1">
          @yield('content')
        </div>
      </main>
    </div>

    {{-- Footer dashboard --}}
    @include('layouts.footer')
  @endif

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Sidebar Toggle --}}
  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const sidebar = document.getElementById("sidebar");
      const openBtn = document.getElementById("openSidebar");
      const closeBtn = document.getElementById("closeSidebar");

      if (openBtn) openBtn.addEventListener("click", () => sidebar.classList.add("active"));
      if (closeBtn) closeBtn.addEventListener("click", () => sidebar.classList.remove("active"));
    });
  </script>
</body>
</html>