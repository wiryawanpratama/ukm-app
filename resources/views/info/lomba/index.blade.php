@extends('layouts.app')
@section('title', 'Info Lomba')

@section('content')
<div class="container">
    {{-- 🔹 Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0 text-primary">
            <i class="bi bi-trophy-fill me-2"></i> Daftar Info Lomba
        </h4>
        <a href="{{ route('info.lomba.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Lomba
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
            <i class="bi bi-list-ul me-2"></i> Daftar Lomba Terdaftar
        </div>

        <div class="card-body p-0 table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead style="background: linear-gradient(90deg, #1565c0, #42a5f5); color:white;">
                    <tr>
                        <th>Nama Lomba</th>
                        <th>Tipe</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                        <th style="width: 18%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse($lombas as $lomba)
                    <tr class="align-middle">
                        <td class="fw-semibold">{{ $lomba->nama_lomba }}</td>
                        <td>
                            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-2">
                                {{ $lomba->tipe }}
                            </span>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($lomba->tanggal_selesai)->translatedFormat('d F Y') }}
                        </td>
                        <td>
                            <a href="{{ route('info.lomba.edit', $lomba->id) }}" 
                               class="btn btn-sm btn-outline-primary fw-semibold me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('info.lomba.destroy', $lomba->id) }}" 
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
                            <i class="bi bi-info-circle me-1"></i> Belum ada data lomba yang tersedia.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- 🔹 Pagination --}}
        @if($lombas->hasPages())
        <div class="card-footer bg-light border-0 py-3">
            <div class="d-flex justify-content-center">
                {{ $lombas->links() }}
            </div>
        </div>
        @endif
    </div>
</div>

{{-- 💅 Styling tambahan --}}
<style>
    /* Hover biru lembut pada baris */
    tbody tr:hover {
        background-color: rgba(25, 118, 210, 0.08);
        transition: background-color 0.2s ease-in-out;
    }

    /* Badge biru lembut */
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
