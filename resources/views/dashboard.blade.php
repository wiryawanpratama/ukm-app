@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h3 class="mb-4 text-primary">Selamat Datang, {{ Auth::user()->name }} 👋</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- === Statistik === --}}
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">Jumlah UKM</h5>
                    <h2 class="fw-bold text-primary">{{ $jumlahUkm ?? '-' }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-success">Jumlah Anggota</h5>
                    <h2 class="fw-bold text-success">{{ $jumlahAnggota ?? '-' }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- === Chart Section === --}}
    <div class="container mt-5">
        <div class="row justify-content-center g-5">

            {{-- Chart 1: Kategori UKM --}}
            <div class="col-md-6 text-center">
                <h5 class="mb-3 fw-semibold text-primary">Distribusi UKM Berdasarkan Kategori</h5>
                <div style="width: 350px; height: 350px; margin: 0 auto;">
                    <canvas id="kategoriChart"></canvas>
                </div>
            </div>

            {{-- Chart 2: Jumlah Anggota per UKM --}}
            <div class="col-md-6 text-center">
                <h5 class="mb-3 fw-semibold text-primary">Jumlah Anggota per UKM</h5>
                <div style="width: 350px; height: 350px; margin: 0 auto;">
                    <canvas id="anggotaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    {{-- === Info Section === --}}
    <div class="row g-4 mt-5">
        {{-- Info Lomba --}}
        <div class="col-md-6 d-flex">
            <div class="card shadow-sm border-0 flex-fill">
                <div class="card-header bg-primary text-white fw-semibold">
                    <i class="bi bi-trophy me-2"></i> Info Lomba
                </div>
                <div class="card-body overflow-auto" style="max-height: 300px;">
                    @forelse ($infoLomba as $lomba)
                        <div class="mb-3 border-bottom pb-2">
                            <div class="fw-semibold text-dark">{{ $lomba->nama_lomba }}</div>
                            <div class="small text-muted">Mode: {{ $lomba->tipe }}</div>
                            <span class="badge bg-primary text-white mt-2 fw-semibold">
                                <i class="bi bi-calendar-event me-1"></i>
                                {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->translatedFormat('l, d F Y') }}
                                –
                                {{ \Carbon\Carbon::parse($lomba->tanggal_selesai)->translatedFormat('l, d F Y') }}
                            </span>
                        </div>
                    @empty
                        <p class="text-muted fst-italic">Belum ada info lomba.</p>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Info UKM --}}
        <div class="col-md-6 d-flex">
            <div class="card shadow-sm border-0 flex-fill">
                <div class="card-header bg-primary text-white fw-semibold">
                    <i class="bi bi-megaphone-fill me-2"></i> Info UKM
                </div>

                <div class="card-body overflow-auto" style="max-height: 300px;">
                    @forelse ($infoUkm as $info)
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="mb-1 fw-semibold text-dark">{{ $info->judul }}</h6>

                            @if(!empty($info->deskripsi))
                                <p class="text-muted mb-1 small">{{ $info->deskripsi }}</p>
                            @endif

                            @if(!empty($info->tanggal))
                                <span class="badge bg-primary text-white fw-semibold">
                                    <i class="bi bi-calendar-event me-1"></i>
                                    {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('l, d F Y') }}
                                </span>
                            @endif
                        </div>
                    @empty
                        <p class="text-muted fst-italic">Belum ada info UKM.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

{{-- ================== Chart.js Script ================== --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const softColors = [
        '#E15759', '#4E79A7', '#B07AA1', '#FF9DA7',
        '#F28E2B', '#76B7B2', '#59A14F', '#EDC948'
    ];

    const smoothAnimation = {
        duration: 1500,
        easing: 'easeInOutQuart',
        animateRotate: true,
        animateScale: true
    };

    // Chart 1: Pie Chart Kategori UKM
    const ctx1 = document.getElementById('kategoriChart');
    new Chart(ctx1, {
        type: 'pie',
        data: {
            labels: {!! json_encode($dataKategori->keys()) !!},
            datasets: [{
                data: {!! json_encode($dataKategori->values()) !!},
                backgroundColor: softColors,
                borderColor: '#fff',
                borderWidth: 2,
                hoverOffset: 20,
                hoverBorderColor: '#fff',
                hoverBorderWidth: 5
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } }, animation: smoothAnimation }
    });

    // Chart 2: Pie Chart Jumlah Anggota per UKM
    const ctx2 = document.getElementById('anggotaChart');
    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: {!! json_encode($namaUkm->values()) !!},
            datasets: [{
                data: {!! json_encode($dataAnggotaPerUkm->values()) !!},
                backgroundColor: softColors,
                borderColor: '#fff',
                borderWidth: 2,
                hoverOffset: 20,
                hoverBorderColor: '#fff',
                hoverBorderWidth: 5
            }]
        },
        options: { responsive: true, plugins: { legend: { position: 'bottom' } }, animation: smoothAnimation }
    });
</script>

{{-- 💅 Styling tambahan --}}
<style>
    .badge.bg-primary {
        background: linear-gradient(90deg, #1976d2, #42a5f5);
        font-size: 0.85rem;
        padding: 6px 10px;
        border-radius: 6px;
    }

    .card {
        border-radius: 12px;
    }

    .card-header {
        font-size: 1.05rem;
        letter-spacing: 0.3px;
    }
</style>
@endsection
