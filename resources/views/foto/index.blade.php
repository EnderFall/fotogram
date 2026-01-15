@extends('layouts.app')

@section('title', 'Galeri Foto - Fotogram')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h1><i class="bi bi-images"></i> Galeri Foto</h1>
        <p class="text-muted">Jelajahi semua foto dari pengguna</p>
    </div>
    <a href="/fotos/create" class="btn btn-primary">
        <i class="bi bi-cloud-upload"></i> Unggah Foto
    </a>
</div>

<div class="row">
    @forelse ($fotos as $foto)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card foto-card h-100">
                <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="card-img-top">
                <div class="foto-overlay">
                    <a href="/fotos/{{ $foto->FotoID }}" class="btn btn-light">
                        <i class="bi bi-eye"></i> Lihat Detail
                    </a>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ $foto->user->FotoProfile ? asset('storage/' . $foto->user->FotoProfile) : 'https://via.placeholder.com/40' }}" alt="{{ $foto->user->Username }}" class="avatar me-2">
                        <div>
                            <h6 class="mb-0">
                                <a href="/user/{{ $foto->user->UserID }}" class="text-decoration-none">
                                    {{ $foto->user->Username }}
                                </a>
                            </h6>
                            <small class="text-muted">{{ $foto->TanggalUnggah->diffForHumans() }}</small>
                        </div>
                    </div>
                    <h5 class="card-title">{{ $foto->JudulFoto }}</h5>
                    <p class="card-text text-muted">{{ Str::limit($foto->DeskripsiFoto, 60) }}</p>
                    <div class="d-flex gap-2 justify-content-between">
                        <small>
                            <i class="bi bi-heart-fill text-danger"></i>
                            {{ $foto->likes()->count() }} Suka
                        </small>
                        <small>
                            <i class="bi bi-chat-dots"></i>
                            {{ $foto->komentars()->count() }} Komentar
                        </small>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Belum ada foto. Jadilah yang pertama <a href="/fotos/create" class="alert-link">mengunggah foto</a>
            </div>
        </div>
    @endforelse
</div>

<div class="mt-4 d-flex justify-content-center">
    {{ $fotos->links() }}
</div>
@endsection
