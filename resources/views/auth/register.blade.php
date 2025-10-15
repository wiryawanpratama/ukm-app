@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="text-center mb-4">Pendaftaran Akun</h4>

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('register.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Masukkan email aktif" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                    </div>
                    <div class="mb-3">
                        <label>Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
                    </div>

                    <button class="btn btn-success w-100">Daftar</button>

                    <p class="mt-3 text-center">
                        Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
