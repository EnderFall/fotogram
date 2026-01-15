<?php

namespace App\Http\Controllers;

use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AlbumController extends Controller
{
    /**
     * Show all albums
     */
    public function index()
    {
        $userId = Session::get('user_id');
        $albums = GalleryAlbum::where('UserID', $userId)->get();
        return view('album.index', compact('albums'));
    }

    /**
     * Show create album form
     */
    public function create()
    {
        return view('album.create');
    }

    /**
     * Store new album
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_album' => 'required|min:3',
            'deskripsi' => 'nullable|string'
        ], [
            'nama_album.required' => 'Nama album harus diisi',
            'nama_album.min' => 'Nama album minimal 3 karakter'
        ]);

        GalleryAlbum::create([
            'NamaAlbum' => $request->nama_album,
            'Deskripsi' => $request->deskripsi,
            'UserID' => Session::get('user_id')
        ]);

        return redirect('/albums')->with('success', 'Album berhasil dibuat!');
    }

    /**
     * Show album detail
     */
    public function show($id)
    {
        $album = GalleryAlbum::with('fotos')->findOrFail($id);
        return view('album.show', compact('album'));
    }

    /**
     * Show edit album form
     */
    public function edit($id)
    {
        $album = GalleryAlbum::findOrFail($id);
        
        // Check if user owns this album
        if ($album->UserID != Session::get('user_id')) {
            return redirect('/albums')->with('error', 'Anda tidak memiliki akses ke album ini!');
        }

        return view('album.edit', compact('album'));
    }

    /**
     * Update album
     */
    public function update(Request $request, $id)
    {
        $album = GalleryAlbum::findOrFail($id);
        
        if ($album->UserID != Session::get('user_id')) {
            return redirect('/albums')->with('error', 'Anda tidak memiliki akses ke album ini!');
        }

        $request->validate([
            'nama_album' => 'required|min:3',
            'deskripsi' => 'nullable|string'
        ]);

        $album->update([
            'NamaAlbum' => $request->nama_album,
            'Deskripsi' => $request->deskripsi
        ]);

        return redirect('/albums')->with('success', 'Album berhasil diperbarui!');
    }

    /**
     * Delete album
     */
    public function destroy($id)
    {
        $album = GalleryAlbum::findOrFail($id);
        
        if ($album->UserID != Session::get('user_id')) {
            return redirect('/albums')->with('error', 'Anda tidak memiliki akses ke album ini!');
        }

        $album->delete();
        return redirect('/albums')->with('success', 'Album berhasil dihapus!');
    }
}
