@extends('layouts.app')

@section('title', 'Data UKM')

@section('content')
<div class="container">
    {{-- 🔹 Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0 text-primary">
            <i class="bi bi-people-fill me-2"></i> Daftar UKM
        </h4>
        <a href="{{ route('ukm.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah UKM
        </a>
    </div>
{{-- 🔍 Search Bar --}}
<form action="{{ route('ukm.index') }}" method="GET" class="mb-3 d-flex gap-2">
    <input type="text" name="search" class="form-control" 
           placeholder="Cari UKM..." 
           value="{{ request('search') }}">
    <button type="submit" class="btn btn-primary">
        <i class="bi bi-search"></i> Cari
    </button>
</form>

    {{-- 🔹 Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm border-0" role="alert" 
             style="background: linear-gradient(90deg, #1976d2, #42a5f5); color: #fff;">
            <i class="bi bi-check-circle me-2"></i> {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- 🔹 Card Tabel --}}
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-list-ul me-2"></i> Daftar UKM Terdaftar
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #1565c0, #42a5f5); color:white;">
                    <tr>
                        <th style="width: 5%">No</th>
                        <th>Nama UKM</th>
                        <th>Bidang</th>
                        <th>Ketua UKM</th>
                        <th style="width: 20%">Dibuat</th>
                        <th style="width: 18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ukm as $index => $item)
                        <tr class="align-middle">
                            <td class="text-center fw-semibold text-primary">{{ $index + 1 }}</td>
                            <td class="fw-semibold">{{ $item->nama_ukm }}</td>
                            <td>{{ $item->bidang ?? '-' }}</td>
                            <td>{{ $item->ketua_ukm ?? '-' }}</td>
                            <td>
                                <span class="badge bg-primary-subtle text-primary fw-semibold">
                                    {{ $item->created_at->format('d F Y') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('ukm.edit', $item->id) }}" class="btn btn-sm btn-outline-primary fw-semibold me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('ukm.destroy', $item->id) }}" method="POST" class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama_ukm }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger fw-semibold">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-1"></i> Belum ada UKM yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- 💅 Styling tambahan --}}
<style>
    /* Efek hover biru lembut */
    tbody tr:hover {
        background-color: rgba(25, 118, 210, 0.08);
        transition: background-color 0.2s ease-in-out;
    }

    /* Badge tanggal */
    .bg-primary-subtle {
        background-color: rgba(25, 118, 210, 0.15) !important;
    }

    /* Tombol outline biru */
    .btn-outline-primary {
        border-color: #1976d2;
        color: #1976d2;
    }
    .btn-outline-primary:hover {
        background-color: #1976d2;
        color: #fff;
    }

    /* Tombol outline merah */
    .btn-outline-danger {
        border-color: #e53935;
        color: #e53935;
    }
    .btn-outline-danger:hover {
        background-color: #e53935;
        color: #fff;
    }

    /* Card & tabel */
    .card {
        border-radius: 12px;
    }
</style>
@endsection
