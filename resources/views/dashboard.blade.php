@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <h3 class="mb-4">Selamat Datang, {{ Auth::user()->name }} 👋</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row g-4">
        {{-- Card Statistik --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah UKM</h5>
                    <h2 class="fw-bold">{{ $jumlahUkm ?? '-' }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">Jumlah Anggota</h5>
                    <h2 class="fw-bold">{{ $jumlahAnggota ?? '-' }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5 class="card-title">User Terdaftar</h5>
                    <h2 class="fw-bold">{{ $jumlahUser ?? '-' }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Tombol navigasi --}}
    <div class="mt-5 text-center">
        <a href="{{ route('ukm.index') }}" class="btn btn-primary me-2">Kelola UKM</a>
        <a href="{{ route('anggota.index') }}" class="btn btn-success me-2">Kelola Anggota</a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>
@endsection