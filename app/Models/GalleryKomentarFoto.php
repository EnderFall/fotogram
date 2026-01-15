<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GalleryKomentarFoto extends Model
{
    protected $table = 'gallery_komentarfotos';
    protected $primaryKey = 'KomentarID';
    public $timestamps = true;
    const CREATED_AT = 'TanggalKomentar';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'FotoID',
        'UserID',
        'IsiKomentar',
        'TanggalKomentar'
    ];

    protected $casts = [
        'TanggalKomentar' => 'datetime',
    ];

    /**
     * Get the photo this comment belongs to
     */
    public function foto(): BelongsTo
    {
        return $this->belongsTo(GalleryFoto::class, 'FotoID', 'FotoID');
    }

    /**
     * Get the user who made this comment
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(GalleryUser::class, 'UserID', 'UserID');
    }
}
