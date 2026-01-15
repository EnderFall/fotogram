@extends('layouts.app')

@section('title', 'Album - Fotogram')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h1><i class="bi bi-folder"></i> Album Saya</h1>
        <p class="text-muted">Kelola album foto Anda</p>
    </div>
    <a href="/albums/create" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Album Baru
    </a>
</div>

@if ($albums->count() > 0)
    <div class="row">
        @foreach ($albums as $album)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->NamaAlbum }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($album->Deskripsi, 80) }}</p>
                        
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-image"></i> {{ $album->fotos->count() }} foto
                            </small>
                        </div>

                        <div class="d-grid gap-2">
                            <a href="/albums/{{ $album->AlbumID }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-eye"></i> Lihat
                            </a>
                            <a href="/albums/{{ $album->AlbumID }}/edit" class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="/albums/{{ $album->AlbumID }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm w-100" onclick="return confirm('Hapus album ini?')">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Belum ada album. 
        <a href="/albums/create" class="alert-link">Buat album sekarang</a>
    </div>
@endif
@endsection
