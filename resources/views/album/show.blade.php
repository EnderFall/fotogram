@extends('layouts.app')

@section('title', $album->NamaAlbum . ' - Fotogram')

@section('content')
<div class="mb-4">
    <a href="/albums" class="btn btn-outline-secondary btn-sm mb-3">
        <i class="bi bi-chevron-left"></i> Kembali
    </a>
    <h1>{{ $album->NamaAlbum }}</h1>
    <p class="text-muted">{{ $album->Deskripsi }}</p>
</div>

@if ($album->fotos->count() > 0)
    <div class="row">
        @foreach ($album->fotos as $foto)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card foto-card">
                    <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="card-img-top">
                    <div class="foto-overlay">
                        <a href="/fotos/{{ $foto->FotoID }}" class="btn btn-light">
                            <i class="bi bi-eye"></i> Lihat
                        </a>
                    </div>
                </div>
                <div class="mt-2">
                    <h6>{{ $foto->JudulFoto }}</h6>
                    <small class="text-muted">{{ $foto->TanggalUnggah->format('d M Y') }}</small>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="alert alert-info">
        <i class="bi bi-info-circle"></i> Album ini belum memiliki foto.
        <a href="/fotos/create" class="alert-link">Unggah foto sekarang</a>
    </div>
@endif
@endsection
