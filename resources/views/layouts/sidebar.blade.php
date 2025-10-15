{{-- Sidebar navigasi kiri --}}
<nav class="d-flex flex-column flex-shrink-0 text-white">
  <hr class="border-secondary">

  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="{{ route('dashboard') }}" class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-secondary' : '' }}">
        <i class="bi bi-speedometer2 me-2"></i> Dashboard
      </a>
    </li>
    <li>
      <a href="{{ route('ukm.index') }}" class="nav-link text-white {{ request()->routeIs('ukm.*') ? 'active bg-secondary' : '' }}">
        <i class="bi bi-people-fill me-2"></i> UKM
      </a>
    </li>
    <li>
      <a href="{{ route('anggota.index') }}" class="nav-link text-white {{ request()->routeIs('anggota.*') ? 'active bg-secondary' : '' }}">
        <i class="bi bi-person-badge-fill me-2"></i> Anggota
      </a>
    </li>
    <li class="nav-item">
    <a href="{{ route('info.lomba.index') }}" class="nav-link text-white">
        <i class="bi bi-trophy me-2"></i> Info Lomba
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('info.ukm.index') }}" class="nav-link text-white">
        <i class="bi bi-megaphone me-2"></i> Info UKM
    </a>
</li>
  </ul>

  <hr class="border-secondary">

  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="btn btn-outline-light w-100">
      <i class="bi bi-box-arrow-right me-2"></i> Logout
    </button>
  </form>
</nav>