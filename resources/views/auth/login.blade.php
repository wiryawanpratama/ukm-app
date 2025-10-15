@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card shadow">
            <div class="card-body">
                <h4 class="text-center mb-4">Login</h4>
                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button class="btn btn-primary w-100">Masuk</button>
                    <p class="mt-3 text-center">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
