@extends('layouts.app')
@section('title', isset($lomba) ? 'Edit Info Lomba' : 'Tambah Info Lomba')

@section('content')
<div class="container">
    {{-- 🔹 Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">
            <i class="bi bi-trophy-fill me-2"></i> 
            {{ isset($lomba) ? 'Edit Info Lomba' : 'Tambah Info Lomba' }}
        </h4>
        <a href="{{ route('info.lomba.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- 🔹 Notifikasi error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger shadow-sm border-0">
            <strong><i class="bi bi-exclamation-triangle-fill me-2"></i> Periksa kembali input kamu:</strong>
            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- 🔹 Form Tambah/Edit --}}
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header text-white fw-semibold" 
             style="background: linear-gradient(90deg, #1565c0, #42a5f5);">
            <i class="bi bi-pencil-square me-2"></i> 
            {{ isset($lomba) ? 'Form Edit Lomba' : 'Form Tambah Lomba' }}
        </div>

        <div class="card-body p-4">
            <form method="POST"
                action="{{ isset($lomba)
                    ? route('info.lomba.update', $lomba->id)
                    : route('info.lomba.store') }}">
                @csrf
                @if(isset($lomba)) @method('PUT') @endif

                {{-- Nama Lomba --}}
                <div class="mb-3">
                    <label for="nama_lomba" class="form-label fw-semibold text-primary">Nama Lomba</label>
                    <input type="text" name="nama_lomba" id="nama_lomba"
                        value="{{ old('nama_lomba', $lomba->nama_lomba ?? '') }}"
                        class="form-control form-control-lg"
                        placeholder="Masukkan nama lomba" required>
                </div>

                {{-- Tipe Lomba --}}
                <div class="mb-3">
                    <label for="tipe" class="form-label fw-semibold text-primary">Tipe Lomba</label>
                    <select name="tipe" id="tipe" class="form-select form-select-lg" required>
                        <option value="">-- Pilih Tipe --</option>
                        <option value="Online" {{ old('tipe', $lomba->tipe ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                        <option value="Offline" {{ old('tipe', $lomba->tipe ?? '') == 'Offline' ? 'selected' : '' }}>Offline</option>
                    </select>
                </div>

                {{-- Tanggal --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_mulai" class="form-label fw-semibold text-primary">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                            value="{{ old('tanggal_mulai', $lomba->tanggal_mulai ?? '') }}"
                            class="form-control form-control-lg" required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="tanggal_selesai" class="form-label fw-semibold text-primary">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                            value="{{ old('tanggal_selesai', $lomba->tanggal_selesai ?? '') }}"
                            class="form-control form-control-lg" required>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('info.lomba.index') }}" class="btn btn-outline-secondary px-4 fw-semibold">
                        <i class="bi bi-arrow-left me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 💅 Styling tambahan --}}
<style>
    /* Input dan Select berfokus biru */
    .form-control:focus,
    .form-select:focus {
        border-color: #1976d2 !important;
        box-shadow: 0 0 0 0.25rem rgba(25, 118, 210, 0.25);
    }

    /* Card tampilan lembut */
    .card {
        border-radius: 12px;
    }

    /* Tombol biru gradient */
    .btn-primary {
        background: linear-gradient(90deg, #1976d2, #42a5f5);
        border: none;
    }
    .btn-primary:hover {
        background: linear-gradient(90deg, #0d47a1, #1976d2);
    }

    /* Tombol outline */
    .btn-outline-primary {
        border-color: #1976d2;
        color: #1976d2;
    }
    .btn-outline-primary:hover {
        background-color: #1976d2;
        color: #fff;
    }
</style>
@endsection
