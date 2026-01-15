@extends('layouts.app')

@section('title', 'Fotogram - Bagikan Momen Berhargamu')

@section('styles')
<style>
    .hero-section {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 100px 0;
        text-align: center;
        min-height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-section h1 {
        font-size: 3.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .hero-section p {
        font-size: 1.3rem;
        margin-bottom: 30px;
        opacity: 0.9;
    }

    .btn-hero {
        display: inline-block;
        padding: 15px 40px;
        margin: 0 10px;
        border-radius: 8px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
        font-size: 1.1rem;
    }

    .btn-hero-primary {
        background: white;
        color: #667eea;
    }

    .btn-hero-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .btn-hero-secondary {
        border: 2px solid white;
        color: white;
        background: transparent;
    }

    .btn-hero-secondary:hover {
        background: white;
        color: #667eea;
    }

    .features {
        padding: 60px 0;
    }

    .feature-card {
        text-align: center;
        padding: 30px;
    }

    .feature-icon {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #667eea;
    }

    .stats-section {
        background-color: #f8f9fa;
        padding: 60px 0;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: #667eea;
    }

    .stat-label {
        color: #666;
        font-size: 1.1rem;
    }
</style>
@endsection

@section('content')
<!-- Hero Section -->
<div class="hero-section">
    <div>
        <h1>Fotogram</h1>
        <p>Platform Berbagi Foto Online yang Memukau</p>
        <p style="font-size: 1rem; opacity: 0.8;">Bagikan momen berhargamu dengan teman dan keluarga</p>
        <div>
            @if (session('user_id'))
                <a href="/dashboard" class="btn-hero btn-hero-primary">
                    <i class="bi bi-house"></i> Ke Dashboard
                </a>
            @else
                <a href="/login" class="btn-hero btn-hero-primary">
                    <i class="bi bi-box-arrow-in-right"></i> Masuk
                </a>
                <a href="/register" class="btn-hero btn-hero-secondary">
                    <i class="bi bi-person-plus"></i> Daftar Gratis
                </a>
            @endif
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="features">
    <div class="container">
        <h2 class="text-center mb-5">Fitur Unggulan</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-folder-plus"></i>
                    </div>
                    <h5>Kelola Album</h5>
                    <p class="text-muted">Organisir foto Anda ke dalam album untuk manajemen yang lebih baik</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-cloud-upload"></i>
                    </div>
                    <h5>Unggah Foto</h5>
                    <p class="text-muted">Bagikan foto berkualitas tinggi dengan deskripsi yang menarik</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-heart"></i>
                    </div>
                    <h5>Berikan Like</h5>
                    <p class="text-muted">Tunjukkan apresiasi dengan memberikan like pada foto favorit Anda</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-chat-dots"></i>
                    </div>
                    <h5>Beri Komentar</h5>
                    <p class="text-muted">Berinteraksi dengan pengguna lain melalui komentar yang bermakna</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    <h5>Profil Lengkap</h5>
                    <p class="text-muted">Buat profil yang menarik dengan foto dan bio yang personal</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="bi bi-images"></i>
                    </div>
                    <h5>Galeri Terbuka</h5>
                    <p class="text-muted">Jelajahi galeri foto dari pengguna lain dan dapatkan inspirasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Pengguna Aktif</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Foto Diunggah</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Album Dibuat</div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="stat-item">
                    <div class="stat-number">∞</div>
                    <div class="stat-label">Interaksi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 60px 0; text-align: center;">
    <div class="container">
        <h2 class="mb-3">Siap Berbagi Momen Berhargamu?</h2>
        <p class="mb-4" style="font-size: 1.1rem;">Bergabunglah dengan komunitas Fotogram hari ini dan mulai berbagi foto Anda</p>
        @if (!session('user_id'))
            <a href="/register" class="btn btn-light btn-lg">
                <i class="bi bi-person-plus"></i> Daftar Sekarang
            </a>
        @else
            <a href="/fotos/create" class="btn btn-light btn-lg">
                <i class="bi bi-cloud-upload"></i> Unggah Foto
            </a>
        @endif
    </div>
</section>
@endsection
