@extends('layouts.app')

@section('title', 'Edit Profile - Fotogram')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-person-gear"></i> Edit Profile
                </h5>
            </div>
            <div class="card-body">
                <form action="/profile" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3 text-center">
                        <label class="form-label">Foto Profile Saat Ini</label>
                        <div>
                            <img src="{{ $user->FotoProfile ? asset('storage/' . $user->FotoProfile) : 'https://via.placeholder.com/120' }}" alt="{{ $user->Username }}" class="avatar-lg mb-3">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="foto_profile" class="form-label">Ganti Foto Profile (Opsional)</label>
                        <input type="file" class="form-control @error('foto_profile') is-invalid @enderror" id="foto_profile" name="foto_profile" accept="image/*" onchange="previewProfileImage(this)">
                        @error('foto_profile')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Format: JPEG, PNG, JPG, GIF | Ukuran maksimal: 5MB</small>
                    </div>

                    <div class="mb-3" id="preview-profile-container" style="display: none; text-align: center;">
                        <label class="form-label">Preview Foto Baru</label>
                        <img id="preview-profile-image" src="" alt="Preview" style="max-width: 100%; max-height: 200px; border-radius: 50%;">
                    </div>

                    <div class="mb-3">
                        <label for="nama_lengkap" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap', $user->NamaLengkap) }}" required>
                        @error('nama_lengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3" placeholder="Deskripsikan diri Anda">{{ old('bio', $user->Bio) }}</textarea>
                        @error('bio')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">Maksimal 500 karakter</small>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2" placeholder="Masukkan alamat Anda">{{ old('alamat', $user->Alamat) }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-lg"></i> Simpan Perubahan
                        </button>
                        <a href="/profile" class="btn btn-secondary">
                            <i class="bi bi-x-lg"></i> Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function previewProfileImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('preview-profile-image');
            const container = document.getElementById('preview-profile-container');
            preview.src = e.target.result;
            container.style.display = 'block';
        };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection
