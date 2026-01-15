@extends('layouts.app')

@section('title', $user->Username . ' - Profile')

@section('content')
<div class="mb-4">
    @if ($isOwner)
        <div class="float-end">
            <a href="/profile/edit" class="btn btn-primary">
                <i class="bi bi-pencil"></i> Edit Profile
            </a>
        </div>
    @endif
</div>

<div class="card mb-4">
    <div class="card-body text-center py-5">
        <img src="{{ $user->FotoProfile ? asset('storage/' . $user->FotoProfile) : 'https://via.placeholder.com/150' }}" alt="{{ $user->Username }}" class="avatar-lg mb-3">
        <h2>{{ $user->Username }}</h2>
        <p class="text-muted">{{ $user->NamaLengkap }}</p>
        @if ($user->Bio)
            <p>{{ $user->Bio }}</p>
        @endif
        @if ($user->Alamat)
            <p class="text-muted">
                <i class="bi bi-geo-alt"></i> {{ $user->Alamat }}
            </p>
        @endif
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary">{{ $user->albums->count() }}</h3>
                <p class="text-muted mb-0">Album</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary">{{ $user->fotos->count() }}</h3>
                <p class="text-muted mb-0">Foto</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary">{{ $user->komentars->count() }}</h3>
                <p class="text-muted mb-0">Komentar</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-center">
            <div class="card-body">
                <h3 class="text-primary">{{ $user->likes->count() }}</h3>
                <p class="text-muted mb-0">Like</p>
            </div>
        </div>
    </div>
</div>

<h3 class="mb-3"><i class="bi bi-images"></i> Foto Terbaru</h3>
@if ($user->fotos->count() > 0)
    <div class="row">
        @foreach ($user->fotos()->orderBy('TanggalUnggah', 'desc')->get() as $foto)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card foto-card h-100">
                    <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="card-img-top">
                    <div class="foto-overlay">
                        <a href="/fotos/{{ $foto->FotoID }}" class="btn btn-light">
                            <i class="bi bi-eye"></i> Lihat
                        </a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $foto->JudulFoto }}</h5>
                        <div class="d-flex justify-content-between">
                            <small>
                                <i class="bi bi-heart-fill text-danger"></i> {{ $foto->likes()->count() }}
                            </small>
                            <small>
                                <i class="bi bi-chat-dots"></i> {{ $foto->komentars()->count() }}
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Pengguna ini belum mengunggah foto.
    </div>
@endif
@endsection
