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

<body class="bg-light {{ request()->is('login') || request()->is('register') || request()->is('/') ? 'auth-page' : '' }}">

  {{-- 🔹 Layout untuk HOME / LOGIN / REGISTER --}}
  @if (request()->is('/') || request()->is('login') || request()->is('register'))
    <div class="min-vh-100 d-flex flex-column justify-content-center align-items-center">
      <div class="auth-card w-100" style="max-width:480px;">
        @yield('content')
      </div>

      <footer class="text-center py-3 mt-4 small text-muted">
        © {{ date('Y') }} Aplikasi UKM Polman Bandung.
      </footer>
    </div>

 {{-- 🔹 Layout setelah login (dengan sidebar dan konten utama) --}}
@else
  <div class="d-flex flex-column flex-grow-1 min-vh-100">

    {{-- 🌊 Navbar biru di luar sidebar (full width) --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm sticky-top w-100" style="z-index: 1050;">
      <div class="container-fluid px-4">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
          <i class="bi bi-people-fill me-1"></i> Aplikasi UKM
        </a>

        {{-- Tombol toggle mobile --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarMain">
          <ul class="navbar-nav align-items-center gap-2">
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-house-door"></i> Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('ukm.*') ? 'active' : '' }}" href="{{ route('ukm.index') }}">
                <i class="bi bi-people"></i> UKM
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->routeIs('anggota.*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">
                <i class="bi bi-person-badge"></i> Anggota
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-megaphone"></i> Info
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('info.lomba.index') }}"><i class="bi bi-trophy me-1"></i> Info Lomba</a></li>
                <li><a class="dropdown-item" href="{{ route('info.ukm.index') }}"><i class="bi bi-megaphone me-1"></i> Info UKM</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->name ?? 'User' }}
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button class="dropdown-item text-danger" type="submit">
                      <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                  </form>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- Wrapper untuk sidebar + konten --}}
    <div class="d-flex flex-grow-1">
      {{-- Sidebar hanya saat login --}}
      @auth
        @include('layouts.sidebar')
      @endauth

      {{-- Konten utama --}}
      <main class="flex-grow-1 d-flex flex-column min-vh-100" style="margin-left:230px;">
        <div class="container py-4 flex-grow-1">
          @yield('content')
        </div>

        <footer class="text-center py-3 mt-auto small text-muted bg-light border-top">
          © {{ date('Y') }} Aplikasi UKM Polman Bandung by Gibral and Wiryawan.
        </footer>
      </main>
    </div>
  </div>
@endif


  {{-- Script Bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Sidebar Toggle --}}
  <script>
  document.addEventListener("DOMContentLoaded", () => {
      const sidebar = document.getElementById("sidebar");
      const openBtn = document.getElementById("openSidebar");
      const closeBtn = document.getElementById("closeSidebar");

      if (openBtn && sidebar) openBtn.addEventListener("click", () => sidebar.classList.add("active"));
      if (closeBtn && sidebar) closeBtn.addEventListener("click", () => sidebar.classList.remove("active"));
  });
  </script>

  @yield('scripts')
</body>
</html>
