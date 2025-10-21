@extends('layouts.app')

@section('title', 'Data Anggota UKM')

@section('content')
<div class="container">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary mb-0">Daftar Anggota UKM</h3>
        <a href="{{ route('anggota.create') }}" class="btn btn-primary shadow-sm">
            <i class="bi bi-plus-circle me-1"></i> Tambah Anggota
        </a>
    </div>
<div class="d-flex justify-content-between align-items-center mb-3">
   

    {{-- 🔍 Form Search --}}
    <form action="{{ route('anggota.index') }}" method="GET" class="d-flex">
        <input type="text" name="search" value="{{ $search ?? '' }}" 
               class="form-control me-2" placeholder="Cari nama, NIM, prodi, atau UKM...">
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-search"></i> Cari
        </button>
        @if(request('search'))
            <a href="{{ route('anggota.index') }}" class="btn btn-outline-secondary ms-2">
                <i class="bi bi-arrow-clockwise"></i> Reset
            </a>
        @endif
    </form>
</div>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabel Daftar Anggota --}}
    <div class="card shadow-sm border-0 mb-4 rounded-4 overflow-hidden">
        <div class="card-header bg-primary text-white fw-semibold">
            <i class="bi bi-people-fill me-1"></i> Data Anggota
        </div>
        <div class="card-body table-responsive p-0">
            <table class="table table-hover align-middle text-center mb-0">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                        <th>Angkatan</th>
                        <th>Jenis Kelamin</th>
                        <th>No. HP</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th>UKM</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggota as $index => $item)
                        <tr class="hover-row">
                            <td>{{ $index + 1 }}</td>

                            {{-- Nama + Foto hover --}}
                            <td class="position-relative">
                                <span class="fw-semibold text-dark hover-nama">
                                    {{ $item->nama }}
                                </span>
                                @if($item->foto)
                                    <div class="foto-popup">
                                        <img src="{{ asset('storage/' . $item->foto) }}" 
                                             alt="Foto {{ $item->nama }}">
                                    </div>
                                @endif
                            </td>

                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->angkatan }}</td>
                            <td>
                                <span class="badge bg-{{ $item->jenis_kelamin == 'L' ? 'primary' : 'info' }}">
                                    {{ $item->jenis_kelamin }}
                                </span>
                            </td>
                            <td>{{ $item->no_hp }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>
                                <span class="text-primary fw-semibold">
                                    {{ $item->ukm->nama_ukm ?? '-' }}
                                </span>
                            </td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('anggota.edit', $item->id) }}" 
                                   class="btn btn-sm btn-outline-primary">
                                   <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('anggota.destroy', $item->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="12" class="text-center text-muted py-4">
                                <i class="bi bi-exclamation-circle"></i> Belum ada anggota terdaftar
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- 💅 CSS Khusus untuk Tema Biru --}}
<style>
    /* 🌈 Warna tabel dan hover */
    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.05);
        transition: background 0.3s ease-in-out;
    }

    /* Foto popup saat hover */
    .foto-popup {
        display: none;
        position: absolute;
        top: -10px;
        left: 110%;
        background: #fff;
        padding: 6px;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        z-index: 999;
    }

    .foto-popup img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 10px;
        border: 2px solid #0d6efd;
    }

    .hover-nama:hover + .foto-popup {
        display: block;
    }

    /* Tambahan spacing antar elemen */
    .card {
        border-radius: 12px;
        overflow: hidden;
    }
</style>
@endsection
