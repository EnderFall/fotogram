@extends('layouts.app')

@section('title', 'Edit Foto - Fotogram')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-pencil-circle"></i> Edit Foto
                </h5>
            </div>
            <div class="card-body">
                <form action="/fotos/{{ $foto->FotoID }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="album_id" class="form-label">Album <span class="text-danger">*</span></label>
                        <select class="form-control @error('album_id') is-invalid @enderror" id="album_id" name="album_id" required>
                            @foreach ($albums as $album)
                                <option value="{{ $album->AlbumID }}" {{ old('album_id', $foto->AlbumID) == $album->AlbumID ? 'selected' : '' }}>
                                    {{ $album->NamaAlbum }}
                                </option>
                            @endforeach
                        </select>
                        @error('album_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="judul_foto" class="form-label">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul_foto') is-invalid @enderror" id="judul_foto" name="judul_foto" value="{{ old('judul_foto', $foto->JudulFoto) }}" placeholder="Masukkan judul foto" required>
                        @error('judul_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                        <textarea class="form-control @error('deskripsi_foto') is-invalid @enderror" id="deskripsi_foto" name="deskripsi_foto" rows="4" placeholder="Deskripsikan foto Anda (opsional)">{{ old('deskripsi_foto', $foto->DeskripsiFoto) }}</textarea>
                        @error('deskripsi_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label>
                        <div>
                            <img src="{{ asset('storage/' . $foto->LokasiFile) }}" alt="{{ $foto->JudulFoto }}" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" onchange="previewImage(this)">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF, SVG | Ukuran maksimal: 10MB</small>
                    </div>

                    <div class="mb-3" id="preview-container" style="display: none;">
                        <label class="form-label">Preview Foto Baru</label>
                        <img id="preview-image" src="" alt="Preview" style="max-width: 100%; max-height: 300px; border-radius: 8px;">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Simpan Perubahan
                        </button>
                        <a href="/fotos/{{ $foto->FotoID }}" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-image');
            const container = document.getElementById('preview-container');
            preview.src = e.target.result;
            container.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
