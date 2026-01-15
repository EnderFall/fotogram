@extends('layouts.app')

@section('title', 'Buat Album - Fotogram')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-plus-circle"></i> Buat Album Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="/albums" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_album" class="form-label">Nama Album <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_album') is-invalid @enderror" id="nama_album" name="nama_album" value="{{ old('nama_album') }}" placeholder="Masukkan nama album" required>
                        @error('nama_album')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" placeholder="Deskripsikan album Anda (opsional)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Buat Album
                        </button>
                        <a href="/albums" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
