@extends('layouts.app')

@section('title', 'Edit Anggota UKM')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Anggota UKM</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('anggota.update', $anggota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama Anggota</label>
                    <input type="text" name="nama" class="form-control" value="{{ $anggota->nama }}" required>
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $anggota->email }}" required>
                </div>
                <div class="mb-3">
                    <label>Pilih UKM</label>
                    <select name="ukm_id" class="form-control" required>
                        @foreach($ukm as $u)
                            <option value="{{ $u->id }}" {{ $anggota->ukm_id == $u->id ? 'selected' : '' }}>
                                {{ $u->nama_ukm }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-warning">Update</button>
                <a href="{{ route('anggota.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
