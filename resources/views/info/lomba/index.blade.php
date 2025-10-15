@extends('layouts.app')
@section('title', 'Info Lomba')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Daftar Info Lomba</h4>
        <a href="{{ route('info-lomba.create') }}" class="btn btn-primary">+ Tambah Lomba</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>Nama Lomba</th>
                <th>Tipe</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($lombas as $lomba)
            <tr>
                <td>{{ $lomba->nama_lomba }}</td>
                <td>{{ $lomba->tipe }}</td>
                <td>{{ $lomba->tanggal_mulai }}</td>
                <td>{{ $lomba->tanggal_selesai }}</td>
                <td>
                    <a href="{{ route('info-lomba.edit', $lomba->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('info-lomba.destroy', $lomba->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5" class="text-center text-muted">Belum ada data lomba</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $lombas->links() }}
</div>
@endsection
