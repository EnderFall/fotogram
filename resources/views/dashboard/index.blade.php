@extends('layouts.app')

@section('title', 'Dashboard - Fotogram')

@section('content')
<div class="mb-4">
    <h1 class="mb-2">
        <i class="bi bi-house"></i> Dashboard
    </h1>
    <p class="text-muted">Selamat datang di Fotogram, {{ session('username') }}!</p>
</div>

<div class="row mb-4">
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="text-primary mb-2">{{ $albums->count() }}</h3>
                <p class="text-muted mb-0">
                    <i class="bi bi-folder"></i> Album
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="text-primary mb-2">{{ $fotos->count() }}</h3>
                <p class="text-muted mb-0">
                    <i class="bi bi-image"></i> Foto
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <h3 class="text-primary mb-2">{{ $recentFotos->count() }}</h3>
                <p class="text-muted mb-0">
                    <i class="bi bi-star"></i> Terbaru
                </p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card">
            <div class="card-body text-center">
                <a href="/fotos/create" class="btn btn-primary w-100">
                    <i class="bi bi-plus-lg"></i> Unggah Foto
                </a>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-folder"></i> Album Saya
                </h5>
            </div>
            <div class="card-body">
                @if ($albums->count() > 0)
                    <div class="list-group">
                        @foreach ($albums as $album)
                            <a href="/albums/{{ $album->AlbumID }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $album->NamaAlbum }}</h6>
                                    <small>{{ $album->fotos->count() }} foto</small>
                                </div>
                                <p class="mb-0 text-muted">{{ Str::limit($album->Deskripsi, 50) }}</p>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <a href="/albums" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                    </div>
                @else
                    <p class="text-muted mb-0">
                        Belum ada album. <a href="/albums/create">Buat album</a>
                    </p>
                @endif
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-star"></i> Foto Terbaru
                </h5>
            </div>
            <div class="card-body">
                @if ($recentFotos->count() > 0)
                    <div class="list-group">
                        @foreach ($recentFotos->take(5) as $foto)
                            <a href="/fotos/{{ $foto->FotoID }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h6 class="mb-1">{{ $foto->JudulFoto }}</h6>
                                    <small>oleh {{ $foto->user->Username }}</small>
                                </div>
                                <small class="text-muted">{{ $foto->TanggalUnggah->diffForHumans() }}</small>
                            </a>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <a href="/fotos" class="btn btn-outline-primary btn-sm">Lihat Semua</a>
                    </div>
                @else
                    <p class="text-muted mb-0">
                        Belum ada foto. <a href="/fotos/create">Unggah foto</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-activity"></i> Panduan Cepat
                </h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h6><i class="bi bi-folder-plus"></i> Buat Album</h6>
                        <p class="text-muted small">Organisir foto Anda ke dalam album untuk manajemen yang lebih baik.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h6><i class="bi bi-cloud-upload"></i> Unggah Foto</h6>
                        <p class="text-muted small">Bagikan momen berhargamu dengan mengunggah foto berkualitas tinggi.</p>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h6><i class="bi bi-chat-dots"></i> Berinteraksi</h6>
                        <p class="text-muted small">Berikan komentar, like foto, dan berinteraksi dengan pengguna lain.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
