@extends('layouts.app')

@section('title', 'Unggah Foto - Fotogram')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-cloud-upload"></i> Unggah Foto Baru
                </h5>
            </div>
            <div class="card-body">
                <form action="/fotos" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="album_id" class="form-label">Album <span class="text-danger">*</span></label>
                        <select class="form-control @error('album_id') is-invalid @enderror" id="album_id" name="album_id" required>
                            <option value="">Pilih Album</option>
                            @foreach ($albums as $album)
                                <option value="{{ $album->AlbumID }}" {{ old('album_id') == $album->AlbumID ? 'selected' : '' }}>
                                    {{ $album->NamaAlbum }}
                                </option>
                            @endforeach
                        </select>
                        @error('album_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if ($albums->count() == 0)
                            <small class="text-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                Belum ada album. <a href="/albums/create">Buat album terlebih dahulu</a>
                            </small>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="judul_foto" class="form-label">Judul Foto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('judul_foto') is-invalid @enderror" id="judul_foto" name="judul_foto" value="{{ old('judul_foto') }}" placeholder="Masukkan judul foto" required>
                        @error('judul_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi_foto" class="form-label">Deskripsi Foto</label>
                        <textarea class="form-control @error('deskripsi_foto') is-invalid @enderror" id="deskripsi_foto" name="deskripsi_foto" rows="4" placeholder="Deskripsikan foto Anda (opsional)">{{ old('deskripsi_foto') }}</textarea>
                        @error('deskripsi_foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="foto" class="form-label">File Foto <span class="text-danger">*</span></label>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*" required onchange="previewImage(this)">
                        @error('foto')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF, SVG | Ukuran maksimal: 10MB</small>
                    </div>

                    <div class="mb-3" id="preview-container" style="display: none;">
                        <label class="form-label">Preview Foto</label>
                        <img id="preview-image" src="" alt="Preview" style="max-width: 100%; max-height: 400px; border-radius: 8px;">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Unggah Foto
                        </button>
                        <a href="/fotos" class="btn btn-secondary">
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
