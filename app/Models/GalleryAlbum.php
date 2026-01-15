<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryAlbum extends Model
{
    protected $table = 'gallery_albums';
    protected $primaryKey = 'AlbumID';
    public $timestamps = true;

    protected $fillable = [
        'NamaAlbum',
        'Deskripsi',
        'UserID',
        'TanggalDibuat'
    ];

    /**
     * Get the user that owns this album
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(GalleryUser::class, 'UserID', 'UserID');
    }

    /**
     * Get all photos in this album
     */
    public function fotos(): HasMany
    {
        return $this->hasMany(GalleryFoto::class, 'AlbumID', 'AlbumID');
    }
}
