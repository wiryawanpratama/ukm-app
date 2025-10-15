@extends('layouts.app')

@section('title', 'Tambah UKM')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">

            {{-- Judul Halaman yang Rapi --}}
            <h3 class="fw-bold mb-4 text-dark border-bottom pb-2">Tambah Unit Kegiatan Mahasiswa (UKM)</h3>

            {{-- Notifikasi Sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Card Modern dan Rapi (Border 1, Rounded 4) --}}
            <div class="card border-1 rounded-4 shadow-sm">
                <div class="card-body p-4 p-md-5">

                    <form action="{{ route('ukm.store') }}" method="POST">
                        @csrf

                        {{-- Nama UKM --}}
                        <div class="mb-3">
                            <label for="nama_ukm" class="form-label fw-medium">Nama UKM</label>
                            <input type="text" name="nama_ukm" id="nama_ukm"
                                   class="form-control @error('nama_ukm') is-invalid @enderror"
                                   placeholder="Contoh: UKM Kesenian, UKM Olahraga"
                                   value="{{ old('nama_ukm') }}" required>
                            @error('nama_ukm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Bidang / Fokus --}}
                        <div class="mb-3">
                            <label for="bidang" class="form-label fw-medium">Bidang / Fokus</label>
                            <input type="text" name="bidang" id="bidang"
                                   class="form-control @error('bidang') is-invalid @enderror"
                                   placeholder="Contoh: Seni Tari, Coding, Basket"
                                   value="{{ old('bidang') }}" required>
                            @error('bidang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        {{-- Ketua UKM (FIELD BARU YANG DIMINTA) --}}
                        <div class="mb-3">
                            <label for="ketua_ukm" class="form-label fw-medium">Nama Ketua UKM</label>
                            <input type="text" name="ketua_ukm" id="ketua_ukm"
                                   class="form-control @error('ketua_ukm') is-invalid @enderror"
                                   placeholder="Masukkan nama lengkap Ketua UKM"
                                   value="{{ old('ketua_ukm') }}" required>
                            @error('ketua_ukm')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label for="deskripsi" class="form-label fw-medium">Deskripsi Singkat</label>
                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                      class="form-control @error('deskripsi') is-invalid @enderror"
                                      placeholder="Tuliskan deskripsi singkat mengenai visi, misi, atau kegiatan utama UKM">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-end gap-2 border-top pt-3">
                            <a href="{{ route('ukm.index') }}" class="btn btn-outline-secondary px-4">Batal / Kembali</a>
                            <button type="submit" class="btn btn-primary px-4 fw-medium">Simpan Data UKM</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection