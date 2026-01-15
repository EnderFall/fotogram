<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryUser extends Model
{
    protected $table = 'gallery_users';
    protected $primaryKey = 'UserID';
    public $timestamps = true;

    protected $fillable = [
        'Username',
        'Password',
        'Email',
        'NamaLengkap',
        'Alamat',
        'FotoProfile',
        'Bio',
        'role'
    ];

    protected $hidden = [
        'Password',
    ];

    /**
     * Get all albums created by this user
     */
    public function albums(): HasMany
    {
        return $this->hasMany(GalleryAlbum::class, 'UserID', 'UserID');
    }

    /**
     * Get all photos uploaded by this user
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(GalleryFoto::class, 'UserID', 'UserID');
    }

    /**
     * Get all comments made by this user
     */
    public function komentars(): HasMany
    {
        return $this->hasMany(GalleryKomentarFoto::class, 'UserID', 'UserID');
    }

    /**
     * Get all likes made by this user
     */
    public function likes(): HasMany
    {
        return $this->hasMany(GalleryLikeFoto::class, 'UserID', 'UserID');
    }

    /**
     * Check if user is admin
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if user is regular user
     */
    public function isUser(): bool
    {
        return $this->role === 'user';
    }
}
