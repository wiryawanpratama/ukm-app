@extends('layouts.app')
@section('title', 'Info UKM')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Info UKM</h4>
        <a href="{{ route('info-ukm.create') }}" class="btn btn-success">+ Tambah Info</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($infoUkm as $info)
            <tr>
                <td>{{ $info->judul }}</td>
                <td>{{ Str::limit($info->deskripsi, 50) }}</td>
                <td>{{ $info->tanggal }}</td>
                <td>
                    <a href="{{ route('info-ukm.edit', $info->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('info-ukm.destroy', $info->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="4" class="text-center text-muted">Belum ada info UKM</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $infoUkm->links() }}
</div>
@endsection
