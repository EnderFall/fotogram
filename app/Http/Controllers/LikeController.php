<?php

namespace App\Http\Controllers;

use App\Models\GalleryLikeFoto;
use App\Models\GalleryFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    /**
     * Toggle like on photo
     */
    public function toggle($fotoId)
    {
        $foto = GalleryFoto::findOrFail($fotoId);
        $userId = Session::get('user_id');

        $existingLike = GalleryLikeFoto::where('FotoID', $fotoId)
            ->where('UserID', $userId)
            ->first();

        if ($existingLike) {
            // Unlike
            $existingLike->delete();
            $message = 'Like dihapus!';
        } else {
            // Like
            GalleryLikeFoto::create([
                'FotoID' => $fotoId,
                'UserID' => $userId
            ]);
            $message = 'Foto disukai!';
        }

        return back()->with('success', $message);
    }

    /**
     * Get like count for a photo
     */
    public function getCount($fotoId)
    {
        $count = GalleryLikeFoto::where('FotoID', $fotoId)->count();
        return response()->json(['count' => $count]);
    }
}
