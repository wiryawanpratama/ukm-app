@extends('layouts.app')

@section('title', 'Tambah UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Data UKM</h3>

    {{-- Notifikasi jika ada error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('ukm.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nama_ukm" class="form-label">Nama UKM</label>
                    <input type="text" name="nama_ukm" id="nama_ukm"
                           class="form-control"
                           placeholder="Masukkan nama UKM"
                           value="{{ old('nama_ukm') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="4"
                              class="form-control"
                              placeholder="Tuliskan deskripsi singkat">{{ old('deskripsi') }}</textarea>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
