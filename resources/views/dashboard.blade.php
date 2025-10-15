@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h3 class="mb-4">Selamat Datang, {{ Auth::user()->name }} 👋</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- === Statistik === --}}
    <div class="row g-4 justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah UKM</h5>
                    <h2 class="fw-bold">{{ $jumlahUkm ?? '-' }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Anggota</h5>
                    <h2 class="fw-bold">{{ $jumlahAnggota ?? '-' }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- === Tombol aksi === --}}
    <div class="d-flex flex-wrap justify-content-center gap-3 mt-4">
        <a href="{{ route('ukm.index') }}" class="btn btn-primary px-4 py-2 fw-semibold shadow-sm">Kelola UKM</a>
        <a href="{{ route('anggota.index') }}" class="btn btn-success px-4 py-2 fw-semibold shadow-sm">Kelola Anggota</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger px-4 py-2 fw-semibold shadow-sm">Logout</button>
        </form>
    </div>

    {{-- === Info Section === --}}
    <div class="row g-4 mt-5">
        {{-- Info Lomba --}}
        <div class="col-md-6 d-flex">
            <div class="card shadow-sm border-0 flex-fill">
                <div class="card-header bg-primary text-white fw-semibold">Info Lomba</div>
                <div class="card-body overflow-auto" style="max-height: 300px;">
                    @forelse ($infoLomba as $lomba)
                        <div class="mb-3 border-bottom pb-2">
                            <div class="fw-semibold text-dark">{{ $lomba->nama_lomba }}</div>
                            <div class="small text-muted">Mode: {{ $lomba->tipe }}</div>
                            <span class="badge bg-primary mt-2">
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
                <div class="card-header bg-danger text-white fw-semibold">Info UKM</div>
                <div class="card-body overflow-auto" style="max-height: 300px;">
                    @forelse ($infoUkm as $info)
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="mb-1 fw-semibold text-dark">{{ $info->judul }}</h6>
                            @if(!empty($info->deskripsi))
                                <p class="text-muted mb-1 small">{{ $info->deskripsi }}</p>
                            @endif
                            @if(!empty($info->tanggal))
                                <span class="badge bg-light text-dark">
                                    {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
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
@endsection