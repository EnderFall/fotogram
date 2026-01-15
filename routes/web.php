<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

// Public routes
Route::get('/', function () {
    return view('index');
});

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Protected routes
Route::middleware('check.auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Albums
    Route::get('/albums', [AlbumController::class, 'index'])->name('albums.index');
    Route::get('/albums/create', [AlbumController::class, 'create'])->name('albums.create');
    Route::post('/albums', [AlbumController::class, 'store'])->name('albums.store');
    Route::get('/albums/{id}', [AlbumController::class, 'show'])->name('albums.show');
    Route::get('/albums/{id}/edit', [AlbumController::class, 'edit'])->name('albums.edit');
    Route::put('/albums/{id}', [AlbumController::class, 'update'])->name('albums.update');
    Route::delete('/albums/{id}', [AlbumController::class, 'destroy'])->name('albums.destroy');
    
    // Fotos
    Route::get('/fotos', [FotoController::class, 'index'])->name('fotos.index');
    Route::get('/fotos/create', [FotoController::class, 'create'])->name('fotos.create');
    Route::post('/fotos', [FotoController::class, 'store'])->name('fotos.store');
    Route::get('/fotos/{id}', [FotoController::class, 'show'])->name('fotos.show');
    Route::get('/fotos/{id}/edit', [FotoController::class, 'edit'])->name('fotos.edit');
    Route::put('/fotos/{id}', [FotoController::class, 'update'])->name('fotos.update');
    Route::delete('/fotos/{id}', [FotoController::class, 'destroy'])->name('fotos.destroy');
    
    // Komentars
    Route::post('/fotos/{id}/komentar', [KomentarController::class, 'store'])->name('komentar.store');
    Route::delete('/komentar/{id}', [KomentarController::class, 'destroy'])->name('komentar.destroy');
    
    // Likes
    Route::post('/fotos/{id}/like', [LikeController::class, 'toggle'])->name('like.toggle');
    Route::get('/fotos/{id}/like-count', [LikeController::class, 'getCount'])->name('like.count');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/user/{id}', [ProfileController::class, 'show'])->name('user.profile');
});

// Admin routes
Route::middleware('check.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
    Route::get('/admin/fotos', [AdminController::class, 'fotos'])->name('admin.fotos');
    Route::delete('/admin/fotos/{id}', [AdminController::class, 'deleteFoto'])->name('admin.fotos.delete');
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
});
