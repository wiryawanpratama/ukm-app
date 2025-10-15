@extends('layouts.app')

@section('title', 'Edit UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Data UKM</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('ukm.update', $ukm->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama UKM</label>
                    <input type="text" name="nama_ukm" class="form-control" value="{{ $ukm->nama_ukm }}" required>
                </div>
                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi" class="form-control" rows="3">{{ $ukm->deskripsi }}</textarea>
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('ukm.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
