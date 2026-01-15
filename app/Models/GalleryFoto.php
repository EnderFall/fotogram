<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GalleryFoto extends Model
{
    protected $table = 'gallery_fotos';
    protected $primaryKey = 'FotoID';
    public $timestamps = true;
    const CREATED_AT = 'TanggalUnggah';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'JudulFoto',
        'DeskripsiFoto',
        'LokasiFile',
        'AlbumID',
        'UserID',
        'TanggalUnggah'
    ];

    protected $casts = [
        'TanggalUnggah' => 'datetime',
    ];

    /**
     * Get the album this photo belongs to
     */
    public function album(): BelongsTo
    {
        return $this->belongsTo(GalleryAlbum::class, 'AlbumID', 'AlbumID');
    }

    /**
     * Get the user who uploaded this photo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(GalleryUser::class, 'UserID', 'UserID');
    }

    /**
     * Get all comments on this photo
     */
    public function komentars(): HasMany
    {
        return $this->hasMany(GalleryKomentarFoto::class, 'FotoID', 'FotoID');
    }

    /**
     * Get all likes on this photo
     */
    public function likes(): HasMany
    {
        return $this->hasMany(GalleryLikeFoto::class, 'FotoID', 'FotoID');
    }

    /**
     * Get count of likes
     */
    public function getLikeCountAttribute()
    {
        return $this->likes()->count();
    }

    /**
     * Get count of comments
     */
    public function getCommentCountAttribute()
    {
        return $this->komentars()->count();
    }
}
