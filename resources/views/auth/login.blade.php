@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="card shadow-sm border-0 rounded-4">
  <div class="card-body p-4 p-md-5">
    <h2 class="text-center fw-bold mb-2 text-dark">Selamat Datang</h2>
    <p class="text-center text-secondary mb-4">Silakan masuk ke akun Anda.</p>

    {{-- Notifikasi Error --}}
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show small" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <form action="{{ route('login.post') }}" method="POST">
      @csrf
      <div class="mb-3">
        <input type="email" name="email" id="email"
               class="form-control @error('email') is-invalid @enderror"
               placeholder="Alamat Email"
               value="{{ old('email') }}"
               required autofocus>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <input type="password" name="password" id="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Kata Sandi" required>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="d-grid mt-4">
        <button type="submit" class="btn btn-primary btn-lg fw-bold">Masuk</button>
      </div>
    </form>
  </div>

  <div class="card-footer text-center bg-light rounded-bottom-4 border-top">
    <small class="text-muted">Belum punya akun?
      <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-primary">Daftar di sini</a>
    </small>
  </div>
</div>
@endsection