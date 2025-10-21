{{-- 🔹 SIDEBAR UTAMA --}}
<div id="sidebar" 
     class="d-flex flex-column flex-shrink-0 p-3 text-white vh-100 position-fixed"
     style="
        width: 230px;
        z-index: 1030;
        top: 56px;
        background: linear-gradient(180deg, #0d47a1 0%, #1565c0 50%, #1976d2 100%);
        box-shadow: 2px 0 8px rgba(0,0,0,0.15);
     ">


    {{-- 🔸 Navigasi --}}
    <ul class="nav nav-pills flex-column mb-auto">

        <li class="nav-item">
            <a href="{{ route('dashboard') }}"
               class="nav-link text-white fw-semibold {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li>
            <a href="{{ route('ukm.index') }}"
               class="nav-link text-white fw-semibold {{ request()->routeIs('ukm.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill me-2"></i> UKM
            </a>
        </li>

        <li>
            <a href="{{ route('anggota.index') }}"
               class="nav-link text-white fw-semibold {{ request()->routeIs('anggota.*') ? 'active' : '' }}">
                <i class="bi bi-person-badge-fill me-2"></i> Anggota
            </a>
        </li>

        <li>
            <a href="{{ route('info.lomba.index') }}"
               class="nav-link text-white fw-semibold {{ request()->routeIs('info.lomba.*') ? 'active' : '' }}">
                <i class="bi bi-trophy me-2"></i> Info Lomba
            </a>
        </li>

        <li>
            <a href="{{ route('info.ukm.index') }}"
               class="nav-link text-white fw-semibold {{ request()->routeIs('info.ukm.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone me-2"></i> Info UKM
            </a>
        </li>

    </ul>

    <hr class="border-light opacity-25">

    {{-- 🔻 Tombol Logout --}}
    <form action="{{ route('logout') }}" method="POST" class="mt-auto">
        @csrf
        <button type="submit" class="btn btn-outline-light w-100 fw-semibold">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </button>
    </form>
</div>

{{-- 🔸 Responsif (Sidebar Toggle untuk HP) --}}
<style>
#sidebar .nav-link {
  color: #e3f2fd;
  border-radius: 8px;
  padding: 8px 12px;
  margin-bottom: 6px;
  transition: background 0.3s, transform 0.2s;
}

#sidebar .nav-link:hover {
  background: rgba(255, 255, 255, 0.15);
  transform: translateX(4px);
}

#sidebar .nav-link.active {
  background: linear-gradient(90deg, #2196f3, #42a5f5);
  color: #fff;
  box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}

/* Responsif Sidebar */
@media (max-width: 768px) {
  #sidebar {
    transform: translateX(-100%);
    transition: transform 0.3s ease-in-out;
  }
  #sidebar.active {
    transform: translateX(0);
  }
}
</style>
