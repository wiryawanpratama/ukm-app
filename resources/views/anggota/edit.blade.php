@extends('layouts.app')

@section('title', 'Edit Anggota UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Anggota UKM</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('anggota.update', $anggota->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
                </div>

                {{-- NIM --}}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ $anggota->nim }}" required>
                </div>

                {{-- Program Studi --}}
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" value="{{ $anggota->prodi }}" required>
                </div>

                {{-- Angkatan --}}
                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" value="{{ $anggota->angkatan }}" required>
                </div>

                {{-- Jenis Kelamin --}}
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ $anggota->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $anggota->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                {{-- Nomor HP --}}
                <div class="mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $anggota->no_hp }}" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $anggota->email }}" required>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" required>{{ $anggota->alamat }}</textarea>
                </div>

                {{-- Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto Anggota</label>
                    <div class="d-flex align-items-center gap-3">
                        @if($anggota->foto)
                            <img src="{{ asset('storage/' . $anggota->foto) }}" 
                                 alt="Foto {{ $anggota->nama }}" 
                                 width="80" height="80" class="rounded-circle object-fit-cover border">
                        @else
                            <span class="text-muted">Belum ada foto</span>
                        @endif
                        <input type="file" name="foto" class="form-control w-auto" accept="image/*">
                    </div>
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                </div>

                {{-- Pilih UKM --}}
                <div class="mb-3">
                    <label class="form-label">Pilih UKM</label>
                    <select name="ukm_id" class="form-control" required>
                        @foreach($ukm as $u)
                            <option value="{{ $u->id }}" {{ $anggota->ukm_id == $u->id ? 'selected' : '' }}>
                                {{ $u->nama_ukm }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol Aksi --}}
                <div class="mt-4">
                    <button class="btn btn-warning">Update</button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
