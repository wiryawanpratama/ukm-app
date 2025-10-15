@extends('layouts.app')
@section('title', isset($infoUkm) ? 'Edit Info UKM' : 'Tambah Info UKM')

@section('content')
<div class="container">
    <h4 class="mb-4">{{ isset($infoUkm) ? 'Edit Info UKM' : 'Tambah Info UKM' }}</h4>

    {{-- Notifikasi error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali input kamu:</strong>
            <ul class="mb-0">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah/Edit --}}
    <form method="POST"
          action="{{ isset($InfoUkm)
              ? route('info-ukm.update', $InfoUkm->id)
              : route('info-ukm.store') }}">
        @csrf
        @if(isset($InfoUkm)) @method('PUT') @endif

        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Judul Informasi</label>
            <input type="text" name="judul" id="judul"
                   value="{{ old('judul', $InfoUkm->judul ?? '') }}"
                   class="form-control" placeholder="Contoh: UKM Musik Menang Lomba Nasional" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" rows="4"
                      class="form-control"
                      placeholder="Tuliskan deskripsi kegiatan atau informasi">{{ old('deskripsi', $infoUkm->deskripsi ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal Kegiatan</label>
            <input type="date" name="tanggal" id="tanggal"
                   value="{{ old('tanggal', $infoUkm->tanggal ?? '') }}"
                   class="form-control">
        </div>

        <div class="d-flex gap-2 mt-3">
            <button type="submit" class="btn btn-success px-4">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </form>
</div>
@endsection
