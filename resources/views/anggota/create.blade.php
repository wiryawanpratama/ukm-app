@extends('layouts.app')

@section('title', 'Tambah Anggota UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Tambah Anggota UKM</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('anggota.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama anggota" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Masukkan email anggota" required>
                </div>
                <div class="mb-3">
                    <label>Pilih UKM</label>
                    <select name="ukm_id" class="form-control" required>
                        <option value="">-- Pilih UKM --</option>
                        @foreach($ukm as $u)
                            <option value="{{ $u->id }}">{{ $u->nama_ukm }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection