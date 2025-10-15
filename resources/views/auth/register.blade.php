@extends('layouts.app')

@section('title', 'Daftar Akun Baru')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4 p-md-5">
    <h2 class="text-center fw-bold mb-2 text-dark">Daftar Akun</h2>
    <p class="text-center text-secondary mb-4">Buat akun Anda untuk memulai.</p>

    {{-- Notifikasi Error --}}
    @if($errors->any())
      <div class="alert alert-danger small">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
      @csrf

      {{-- Nama --}}
      <div class="mb-3">
        <input type="text" name="name" id="name"
               class="form-control @error('name') is-invalid @enderror"
               placeholder="Nama Lengkap"
               value="{{ old('name') }}" required autofocus>
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      {{-- Email --}}
      <div class="mb-3">
        <input type="email" name="email" id="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Alamat Email"
               value="{{ old('email') }}" required>
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      {{-- Password --}}
      <div class="mb-3">
        <input type="password" name="password" id="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Kata sandi minimal 6 karakter" required>
        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
      </div>

      {{-- Konfirmasi Password --}}
      <div class="mb-4">
        <input type="password" name="password_confirmation" id="password_confirmation"
               class="form-control"
               placeholder="Ulangi kata sandi" required>
      </div>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary btn-lg fw-bold">Daftar Sekarang</button>
      </div>
    </form>
  </div>

  <div class="card-footer text-center bg-light rounded-bottom-4 border-top">
    <small class="text-muted">Sudah punya akun?
      <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-primary">Masuk di sini</a>
    </small>
  </div>
</div>
@endsection
