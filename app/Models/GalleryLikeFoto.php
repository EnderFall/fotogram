<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryLikeFoto extends Model
{
    protected $table = 'gallery_likefotos';
    protected $primaryKey = 'LikeID';
    public $timestamps = true;

    protected $fillable = [
        'FotoID',
        'UserID',
        'TanggalLike'
    ];

    /**
     * Get the photo this like belongs to
     */
    public function foto(): BelongsTo
    {
        return $this->belongsTo(GalleryFoto::class, 'FotoID', 'FotoID');
    }

    /**
     * Get the user who liked this photo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(GalleryUser::class, 'UserID', 'UserID');
    }
}
