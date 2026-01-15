@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>
                    <i class="fas fa-image me-2"></i>Photo Management
                </h2>
                <a href="{{ route('admin.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                </a>
            </div>

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

            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Owner</th>
                                    <th>Album</th>
                                    <th>Comments</th>
                                    <th>Likes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($fotos as $foto)
                                    <tr>
                                        <td><strong>{{ $foto->FotoID }}</strong></td>
                                        <td>{{ Str::limit($foto->JudulFoto, 30) }}</td>
                                        <td>{{ $foto->user->NamaUser }}</td>
                                        <td>{{ $foto->album->NamaAlbum }}</td>
                                        <td>
                                            <span class="badge bg-info">
                                                {{ $foto->komentars()->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">
                                                {{ $foto->likes()->count() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('galeri.show', $foto->FotoID) }}" class="btn btn-sm btn-info" title="View" target="_blank">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('admin.delete-foto', $foto->FotoID) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Delete">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            No photos found
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($fotos->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $fotos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
