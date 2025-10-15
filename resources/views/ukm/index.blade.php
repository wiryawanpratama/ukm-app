@extends('layouts.app')

@section('title', 'Data UKM')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Daftar UKM</h3>
        <a href="{{ route('ukm.create') }}" class="btn btn-primary">+ Tambah UKM</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama UKM</th>
                        <th>Deskripsi</th>
                        <th>Dibuat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($ukm as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama_ukm }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>{{ $item->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('ukm.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('ukm.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">Belum ada data UKM</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection