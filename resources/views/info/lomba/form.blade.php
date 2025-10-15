@extends('layouts.app')
@section('title', isset($lomba) ? 'Edit Info Lomba' : 'Tambah Info Lomba')

@section('content')
<div class="container">
    <h4 class="mb-4">{{ isset($lomba) ? 'Edit Info Lomba' : 'Tambah Info Lomba' }}</h4>

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
          action="{{ isset($lomba)
              ? route('info-lomba.update', $lomba->id)
              : route('info-lomba.store') }}">
        @csrf
        @if(isset($lomba)) @method('PUT') @endif

        <div class="mb-3">
            <label for="nama_lomba" class="form-label fw-semibold">Nama Lomba</label>
            <input type="text" name="nama_lomba" id="nama_lomba"
                   value="{{ old('nama_lomba', $lomba->nama_lomba ?? '') }}"
                   class="form-control" placeholder="Masukkan nama lomba" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label fw-semibold">Tipe Lomba</label>
            <select name="tipe" id="tipe" class="form-select" required>
                <option value="">-- Pilih Tipe --</option>
                <option value="Online" {{ old('tipe', $lomba->tipe ?? '') == 'Online' ? 'selected' : '' }}>Online</option>
                <option value="Offline" {{ old('tipe', $lomba->tipe ?? '') == 'Offline' ? 'selected' : '' }}>Offline</option>
            </select>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                       value="{{ old('tanggal_mulai', $lomba->tanggal_mulai ?? '') }}"
                       class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                       value="{{ old('tanggal_selesai', $lomba->tanggal_selesai ?? '') }}"
                       class="form-control" required>
            </div>
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
