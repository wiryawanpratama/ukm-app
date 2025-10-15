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

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-success">
                    <tr>
                        <th>No</th>
                        <th>Nama Anggota</th>
                        <th>Email</th>
                        <th>UKM</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($anggota as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->ukm->nama_ukm ?? '-' }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('anggota.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('anggota.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada anggota terdaftar</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
