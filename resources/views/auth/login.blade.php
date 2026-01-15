@extends('layouts.app')

@section('title', 'Login - Fotogram')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow">
            <div class="card-body p-5">
                <h2 class="text-center mb-4">
                    <i class="bi bi-images"></i> Fotogram
                </h2>
                <h5 class="text-center mb-4">Masuk ke Akun Anda</h5>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukkan password Anda" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        <i class="bi bi-box-arrow-in-right"></i> Masuk
                    </button>
                </form>

                <hr>

                <p class="text-center">
                    Belum punya akun? 
                    <a href="/register" class="text-decoration-none" style="color: #667eea; font-weight: 600;">
                        Daftar di sini
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
