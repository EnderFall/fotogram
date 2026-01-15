@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">
                <i class="fas fa-chart-line me-2"></i>Admin Dashboard
            </h2>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Statistics Cards -->
            <div class="row mb-4">
                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Users</h6>
                                    <h3 class="mb-0">{{ $totalUsers }}</h3>
                                </div>
                                <div class="text-primary" style="font-size: 2rem;">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Photos</h6>
                                    <h3 class="mb-0">{{ $totalFotos }}</h3>
                                </div>
                                <div class="text-success" style="font-size: 2rem;">
                                    <i class="fas fa-image"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Comments</h6>
                                    <h3 class="mb-0">{{ $totalKomentars }}</h3>
                                </div>
                                <div class="text-info" style="font-size: 2rem;">
                                    <i class="fas fa-comments"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="text-muted mb-1">Total Likes</h6>
                                    <h3 class="mb-0">{{ $totalLikes }}</h3>
                                </div>
                                <div class="text-danger" style="font-size: 2rem;">
                                    <i class="fas fa-heart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Management Links -->
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-users me-2"></i>User Management
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Manage user accounts, roles, and permissions</p>
                            <a href="{{ route('admin.users') }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-list me-2"></i>View All Users
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-image me-2"></i>Photo Management
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Manage all uploaded photos and their details</p>
                            <a href="{{ route('admin.fotos') }}" class="btn btn-success btn-sm">
                                <i class="fas fa-list me-2"></i>View All Photos
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">
                                <i class="fas fa-chart-bar me-2"></i>Statistics
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">View detailed analytics and statistics</p>
                            <a href="{{ route('admin.statistics') }}" class="btn btn-info btn-sm">
                                <i class="fas fa-chart-line me-2"></i>View Statistics
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">
                                <i class="fas fa-cog me-2"></i>Settings
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Configure application settings</p>
                            <button class="btn btn-warning btn-sm" disabled>
                                <i class="fas fa-sliders-h me-2"></i>Coming Soon
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
