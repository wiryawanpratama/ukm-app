@extends('layouts.app')

@section('title', 'Tambah Anggota UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Anggota UKM</h3>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anggota" required>
                </div>

                {{-- NIM --}}
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" required>
                </div>

                {{-- Program Studi --}}
                <div class="mb-3">
                    <label class="form-label">Program Studi</label>
                    <input type="text" name="prodi" class="form-control" placeholder="Masukkan program studi" required>
                </div>

                {{-- Angkatan --}}
                <div class="mb-3">
                    <label class="form-label">Angkatan</label>
                    <input type="number" name="angkatan" class="form-control" placeholder="Masukkan tahun angkatan" required>
                </div>

                {{-- Jenis Kelamin --}}
               <select name="jenis_kelamin" class="form-control" required>
    <option value="">-- Pilih Jenis Kelamin --</option>
    <option value="L">Laki-laki</option>
    <option value="P">Perempuan</option>
</select>


                {{-- Nomor HP --}}
                <div class="mb-3">
                    <label class="form-label">No. HP</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan nomor HP" required>
                </div>

                {{-- Email --}}
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email anggota" required>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control" rows="3" placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                {{-- Upload Foto --}}
                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control" accept="image/*">
                    <small class="text-muted">Opsional — unggah foto anggota (jpg/png/jpeg)</small>
                </div>

                {{-- Pilih UKM --}}
                <div class="mb-3">
                    <label class="form-label">Pilih UKM</label>
                    <select name="ukm_id" class="form-control" required>
                        <option value="">-- Pilih UKM --</option>
                        @foreach($ukm as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_ukm }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Tombol --}}
                <div class="mt-4">
                    <button class="btn btn-success">Simpan</button>
                    <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
