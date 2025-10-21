@extends('layouts.app')
@section('title', isset($infoUkm) ? 'Edit Info UKM' : 'Tambah Info UKM')

@section('content')
<div class="container">
    {{-- 🔹 Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">
            <i class="bi bi-megaphone-fill me-2"></i>
            {{ isset($infoUkm) ? 'Edit Info UKM' : 'Tambah Info UKM' }}
        </h4>
        <a href="{{ route('info.ukm.index') }}" class="btn btn-outline-primary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

    {{-- 🔹 Notifikasi Error Validasi --}}
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
            {{ isset($infoUkm) ? 'Form Edit Info UKM' : 'Form Tambah Info UKM' }}
        </div>

        <div class="card-body p-4">
            <form method="POST"
                action="{{ isset($infoUkm)
                    ? route('info.ukm.update', $infoUkm->id)
                    : route('info.ukm.store') }}">
                @csrf
                @if(isset($infoUkm)) @method('PUT') @endif

                {{-- Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label fw-semibold text-primary">Judul Informasi</label>
                    <input type="text" name="judul" id="judul"
                        value="{{ old('judul', $infoUkm->judul ?? '') }}"
                        class="form-control form-control-lg"
                        placeholder="Contoh: UKM Musik Menang Lomba Nasional" required>
                </div>

                {{-- Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label fw-semibold text-primary">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                        class="form-control form-control-lg"
                        placeholder="Tuliskan deskripsi kegiatan atau informasi">{{ old('deskripsi', $infoUkm->deskripsi ?? '') }}</textarea>
                </div>

                {{-- Tanggal --}}
                <div class="mb-3">
                    <label for="tanggal" class="form-label fw-semibold text-primary">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal" id="tanggal"
                        value="{{ old('tanggal', $infoUkm->tanggal ?? '') }}"
                        class="form-control form-control-lg">
                </div>

                {{-- Tombol Aksi --}}
                <div class="d-flex gap-3 mt-4">
                    <button type="submit" class="btn btn-primary px-4 fw-semibold shadow-sm">
                        <i class="bi bi-save me-1"></i> Simpan
                    </button>
                    <a href="{{ route('info.ukm.index') }}" class="btn btn-outline-secondary px-4 fw-semibold">
                        <i class="bi bi-arrow-left me-1"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- 💅 Styling tambahan --}}
<style>
    /* Fokus input biru lembut */
    .form-control:focus,
    .form-select:focus {
        border-color: #1976d2 !important;
        box-shadow: 0 0 0 0.25rem rgba(25, 118, 210, 0.25);
    }

    /* Card styling */
    .card {
        border-radius: 12px;
    }

    /* Tombol utama gradient biru */
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
