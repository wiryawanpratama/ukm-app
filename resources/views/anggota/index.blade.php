    @extends('layouts.app')

    @section('title', 'Data Anggota UKM')

    @section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Daftar Anggota UKM</h3>
            <a href="{{ route('anggota.create') }}" class="btn btn-primary">+ Tambah Anggota</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
<div class="card shadow-sm mb-4"> {{-- ✅ kasih margin bawah biar antar-card lebih renggang --}}
    <div class="card-body table-responsive pb-4"> {{-- ✅ kasih padding bawah biar isi tabel agak turun --}}
        <table class="table table-bordered align-middle text-center mb-0"> {{-- ✅ hilangkan margin bawaan tabel --}}
            <thead class="table-success">
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
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        {{-- Nama + foto muncul saat hover --}}
                        <td class="position-relative">
                            <span class="fw-semibold hover-nama">
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
                        <td>{{ $item->jenis_kelamin }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->ukm->nama_ukm ?? '-' }}</td>
                        <td>{{ $item->created_at->format('d M Y') }}</td>

                        <td>
                            <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="12" class="text-center text-muted py-3">Belum ada anggota terdaftar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{-- Tambahkan CSS jika mau jarak lebih spesifik --}}
<style>
    .card-body {
        padding-bottom: 4rem !important; /* tambahkan jarak bawah isi card */
    }
</style>

       
       
    </div>

    {{-- 💅 Tambahkan CSS khusus --}}
    <style>
        /* Sembunyikan foto awalnya */
        .foto-popup {
            display: none;
            position: absolute;
            top: -10px;
            left: 110%;
            background: #fff;
            padding: 6px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            z-index: 999;
        }

        /* Gaya gambar */
        .foto-popup img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        /* Tampilkan saat hover pada nama */
        .hover-nama:hover + .foto-popup {
            display: block;
        }
    </style>
    @endsection
