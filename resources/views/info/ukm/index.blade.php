@extends('layouts.app')
@section('title', 'Info UKM')

@section('content')
<div class="container">
    {{-- 🔹 Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0 text-primary">
            <i class="bi bi-megaphone-fill me-2"></i> Daftar Informasi UKM
        </h4>
        <a href="{{ route('info.ukm.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Info
        </a>
    </div>

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
            <i class="bi bi-list-ul me-2"></i> Informasi UKM Terbaru
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #1565c0, #42a5f5); color:white;">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 15%">Tanggal</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($infoUkm as $index => $info)
                    <tr class="align-middle">
                        <td class="text-center fw-semibold text-primary">{{ $infoUkm->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $info->judul }}</td>
                        <td>{{ Str::limit($info->deskripsi, 70) ?? '-' }}</td>
                        <td>
                            @if($info->tanggal)
                                <span class="badge bg-primary-subtle text-primary fw-semibold">
                                    {{ \Carbon\Carbon::parse($info->tanggal)->translatedFormat('d F Y') }}
                                </span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('info.ukm.edit', $info->id) }}" 
                               class="btn btn-sm btn-outline-primary fw-semibold me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('info.ukm.destroy', $info->id) }}" 
                                  method="POST" 
                                  class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus data ini?')">
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
                        <td colspan="5" class="text-center text-muted py-4">
                            <i class="bi bi-info-circle me-1"></i> Belum ada informasi UKM yang tersedia.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- 🔹 Pagination --}}
        @if($infoUkm->hasPages())
        <div class="card-footer bg-light border-0 py-3">
            <div class="d-flex justify-content-center">
                {{ $infoUkm->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

{{-- 💅 Styling tambahan --}}
<style>
    /* Hover biru lembut */
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

    /* Card */
    .card {
        border-radius: 12px;
    }
</style>
@endsection
