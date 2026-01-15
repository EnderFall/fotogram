<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use App\Models\GalleryFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    /**
     * Show dashboard
     */
    public function index()
    {
        $userId = Session::get('user_id');
        $albums = GalleryAlbum::where('UserID', $userId)->get();
        $fotos = GalleryFoto::where('UserID', $userId)->get();
        $recentFotos = GalleryFoto::orderBy('TanggalUnggah', 'desc')->limit(10)->get();

        return view('dashboard.index', compact('albums', 'fotos', 'recentFotos'));
    }
}
