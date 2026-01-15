@extends('layouts.app')

@section('title', $foto->JudulFoto . ' - Fotogram')

@section('content')
<a href="/fotos" class="btn btn-outline-secondary btn-sm mb-3">
    <i class="bi bi-chevron-left"></i> Kembali ke Galeri
</a>

<div class="row">
    <div class="col-lg-8 mb-4">
        <div class="card">
            <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" class="card-img-top" style="max-height: 600px; object-fit: cover;">
            <div class="card-body">
                <h3>{{ $foto->JudulFoto }}</h3>
                <p class="text-muted">{{ $foto->DeskripsiFoto }}</p>
                
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <img src="{{ $foto->user->FotoProfile ? asset('storage/' . $foto->user->FotoProfile) : 'https://via.placeholder.com/50' }}" alt="{{ $foto->user->Username }}" class="avatar me-3">
                    <div>
                        <h6 class="mb-0">
                            <a href="/user/{{ $foto->user->UserID }}" class="text-decoration-none">
                                {{ $foto->user->Username }}
                            </a>
                        </h6>
                        <small class="text-muted">{{ $foto->user->NamaLengkap }}</small>
                    </div>
                </div>

                <div class="row mb-3 pb-3 border-bottom">
                    <div class="col-4 text-center">
                        <small class="text-muted">Tanggal Unggah</small>
                        <h6>{{ $foto->TanggalUnggah->format('d M Y') }}</h6>
                    </div>
                    <div class="col-4 text-center">
                        <small class="text-muted">Album</small>
                        <h6><a href="/albums/{{ $foto->album->AlbumID }}" class="text-decoration-none">{{ $foto->album->NamaAlbum }}</a></h6>
                    </div>
                    <div class="col-4 text-center">
                        <small class="text-muted">Dilihat</small>
                        <h6>{{ $foto->likes()->count() + $foto->komentars()->count() }}</h6>
                    </div>
                </div>

                {{-- Action buttons --}}
                <div class="d-flex gap-2 mb-3">
                    <form action="/fotos/{{ $foto->FotoID }}/like" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn @if($userLiked) btn-danger @else btn-outline-danger @endif">
                            <i class="bi bi-heart-fill"></i>
                            @if($userLiked) Dibatalkan Suka @else Suka @endif
                            ({{ $foto->likes()->count() }})
                        </button>
                    </form>

                    @if ($foto->UserID == session('user_id'))
                        <a href="/fotos/{{ $foto->FotoID }}/edit" class="btn btn-outline-primary">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="/fotos/{{ $foto->FotoID }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Hapus foto ini?')">
                                <i class="bi bi-trash"></i> Hapus
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Comments section --}}
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-light">
                <h6 class="mb-0">
                    <i class="bi bi-chat-dots"></i> Komentar ({{ $foto->komentars()->count() }})
                </h6>
            </div>
            <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                @if ($foto->komentars()->count() > 0)
                    @foreach ($foto->komentars()->orderBy('TanggalKomentar', 'desc')->get() as $komentar)
                        <div class="mb-3 pb-3 border-bottom">
                            <div class="d-flex align-items-start">
                                <img src="{{ $komentar->user->FotoProfile ? asset('storage/' . $komentar->user->FotoProfile) : 'https://via.placeholder.com/35' }}" alt="{{ $komentar->user->Username }}" class="rounded-circle me-2" style="width: 35px; height: 35px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">{{ $komentar->user->Username }}</h6>
                                    <p class="mb-2">{{ $komentar->IsiKomentar }}</p>
                                    <small class="text-muted">{{ $komentar->TanggalKomentar->diffForHumans() }}</small>
                                    @if ($komentar->UserID == session('user_id'))
                                        <form action="/komentar/{{ $komentar->KomentarID }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link btn-sm text-danger p-0" onclick="return confirm('Hapus komentar ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-muted text-center py-3">Belum ada komentar</p>
                @endif
            </div>
            <div class="card-footer bg-light">
                <form action="/fotos/{{ $foto->FotoID }}/komentar" method="POST">
                    @csrf
                    <div class="input-group">
                        <input type="text" class="form-control" name="komentar" placeholder="Tulis komentar..." required>
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-send"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
