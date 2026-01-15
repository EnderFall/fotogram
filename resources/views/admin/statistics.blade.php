@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <i class="fas fa-chart-line me-2"></i>Statistics & Analytics
                </h2>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>

            <!-- Summary Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="text-primary mb-1">{{ $stats['totalUsers'] }}</h3>
                            <p class="text-muted mb-0">Total Users</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="text-success mb-1">{{ $stats['totalFotos'] }}</h3>
                            <p class="text-muted mb-0">Total Photos</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="text-info mb-1">{{ $stats['totalKomentars'] }}</h3>
                            <p class="text-muted mb-0">Total Comments</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body text-center">
                            <h3 class="text-danger mb-1">{{ $stats['totalLikes'] }}</h3>
                            <p class="text-muted mb-0">Total Likes</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Users -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-crown me-2"></i>Top Users (by photos)
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse ($stats['topUsers'] as $index => $user)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge badge-primary me-2">{{ $index + 1 }}</span>
                                            <strong>{{ $user->NamaUser }}</strong>
                                        </div>
                                        <span class="badge bg-secondary">{{ $user->fotos_count }} photos</span>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-4">
                                        No data available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Most Liked Photos -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-heart me-2"></i>Most Liked Photos
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse ($stats['topFotos'] as $index => $foto)
                                    <div class="list-group-item">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div>
                                                <span class="badge badge-danger me-2">{{ $index + 1 }}</span>
                                                <strong>{{ Str::limit($foto->JudulFoto, 25) }}</strong>
                                                <br>
                                                <small class="text-muted">by {{ $foto->user->NamaUser }}</small>
                                            </div>
                                            <span class="badge bg-danger">
                                                <i class="fas fa-heart me-1"></i>{{ $foto->likes_count }}
                                            </span>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-4">
                                        No data available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Activity Stats -->
            <div class="row">
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-comments me-2"></i>Most Commented Photos
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                @forelse ($stats['topKomentars'] as $index => $foto)
                                    <div class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <span class="badge bg-info me-2">{{ $index + 1 }}</span>
                                            <strong>{{ Str::limit($foto->JudulFoto, 25) }}</strong>
                                        </div>
                                        <span class="badge bg-secondary">{{ $foto->komentars_count }} comments</span>
                                    </div>
                                @empty
                                    <div class="text-center text-muted py-4">
                                        No data available
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Albums Stats -->
                <div class="col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-book me-2"></i>Albums Overview
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="list-group list-group-flush">
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Total Albums</span>
                                    <strong class="text-primary">{{ $stats['totalAlbums'] }}</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Avg. Photos per Album</span>
                                    <strong class="text-primary">{{ $stats['avgPhotosPerAlbum'] }}</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Total Comments</span>
                                    <strong class="text-info">{{ $stats['totalKomentars'] }}</strong>
                                </div>
                                <div class="list-group-item d-flex justify-content-between">
                                    <span>Total Likes</span>
                                    <strong class="text-danger">{{ $stats['totalLikes'] }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
