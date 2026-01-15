<?php

namespace App\Http\Controllers;

use App\Models\GalleryFoto;
use App\Models\GalleryAlbum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FotoController extends Controller
{
    /**
     * Show all photos
     */
    public function index()
    {
        $fotos = GalleryFoto::with('user', 'album', 'likes', 'komentars')->orderBy('TanggalUnggah', 'desc')->paginate(12);
        return view('foto.index', compact('fotos'));
    }

    /**
     * Show create photo form
     */
    public function create()
    {
        $userId = Session::get('user_id');
        $albums = GalleryAlbum::where('UserID', $userId)->get();
        return view('foto.create', compact('albums'));
    }

    /**
     * Store new photo
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_foto' => 'required|min:3',
            'deskripsi_foto' => 'nullable|string',
            'album_id' => 'required|exists:gallery_albums,AlbumID',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ], [
            'judul_foto.required' => 'Judul foto harus diisi',
            'judul_foto.min' => 'Judul foto minimal 3 karakter',
            'album_id.required' => 'Album harus dipilih',
            'album_id.exists' => 'Album tidak ditemukan',
            'foto.required' => 'Foto harus diunggah',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus jpeg, png, jpg, gif, atau svg',
            'foto.max' => 'Ukuran gambar maksimal 10MB'
        ]);

        // Upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('fotos', $fileName, 'public');

            GalleryFoto::create([
                'JudulFoto' => $request->judul_foto,
                'DeskripsiFoto' => $request->deskripsi_foto,
                'LokasiFile' => $path,
                'AlbumID' => $request->album_id,
                'UserID' => Session::get('user_id')
            ]);

            return redirect('/fotos')->with('success', 'Foto berhasil diunggah!');
        }

        return back()->with('error', 'Gagal mengunggah foto!');
    }

    /**
     * Show photo detail
     */
    public function show($id)
    {
        $foto = GalleryFoto::with('user', 'album', 'komentars.user', 'likes.user')->findOrFail($id);
        $userLiked = false;
        
        if (Session::has('user_id')) {
            $userLiked = $foto->likes()->where('UserID', Session::get('user_id'))->exists();
        }

        return view('foto.show', compact('foto', 'userLiked'));
    }

    /**
     * Show edit photo form
     */
    public function edit($id)
    {
        $foto = GalleryFoto::findOrFail($id);
        
        if ($foto->UserID != Session::get('user_id')) {
            return redirect('/fotos')->with('error', 'Anda tidak memiliki akses ke foto ini!');
        }

        $userId = Session::get('user_id');
        $albums = GalleryAlbum::where('UserID', $userId)->get();

        return view('foto.edit', compact('foto', 'albums'));
    }

    /**
     * Update photo
     */
    public function update(Request $request, $id)
    {
        $foto = GalleryFoto::findOrFail($id);
        
        if ($foto->UserID != Session::get('user_id')) {
            return redirect('/fotos')->with('error', 'Anda tidak memiliki akses ke foto ini!');
        }

        $request->validate([
            'judul_foto' => 'required|min:3',
            'deskripsi_foto' => 'nullable|string',
            'album_id' => 'required|exists:gallery_albums,AlbumID',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240'
        ]);

        // If new file is uploaded
        if ($request->hasFile('foto')) {
            // Delete old file
            if ($foto->LokasiFile && Storage::disk('public')->exists($foto->LokasiFile)) {
                Storage::disk('public')->delete($foto->LokasiFile);
            }

            $file = $request->file('foto');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('fotos', $fileName, 'public');

            $foto->LokasiFile = $path;
        }

        $foto->update([
            'JudulFoto' => $request->judul_foto,
            'DeskripsiFoto' => $request->deskripsi_foto,
            'AlbumID' => $request->album_id,
            'LokasiFile' => $foto->LokasiFile
        ]);

        return redirect('/fotos')->with('success', 'Foto berhasil diperbarui!');
    }

    /**
     * Delete photo
     */
    public function destroy($id)
    {
        $foto = GalleryFoto::findOrFail($id);
        
        if ($foto->UserID != Session::get('user_id')) {
            return redirect('/fotos')->with('error', 'Anda tidak memiliki akses ke foto ini!');
        }

        // Delete file
        if ($foto->LokasiFile && Storage::disk('public')->exists($foto->LokasiFile)) {
            Storage::disk('public')->delete($foto->LokasiFile);
        }

        $foto->delete();
        return redirect('/fotos')->with('success', 'Foto berhasil dihapus!');
    }
}
