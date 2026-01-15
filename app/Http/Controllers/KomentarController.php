<?php

namespace App\Http\Controllers;

use App\Models\GalleryKomentarFoto;
use App\Models\GalleryFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KomentarController extends Controller
{
    /**
     * Store new comment
     */
    public function store(Request $request, $fotoId)
    {
        $request->validate([
            'komentar' => 'required|min:1|max:500'
        ], [
            'komentar.required' => 'Komentar tidak boleh kosong',
            'komentar.max' => 'Komentar maksimal 500 karakter'
        ]);

        $foto = GalleryFoto::findOrFail($fotoId);

        GalleryKomentarFoto::create([
            'FotoID' => $fotoId,
            'UserID' => Session::get('user_id'),
            'IsiKomentar' => $request->komentar
        ]);

        return back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    /**
     * Delete comment
     */
    public function destroy($id)
    {
        $komentar = GalleryKomentarFoto::findOrFail($id);
        
        if ($komentar->UserID != Session::get('user_id')) {
            return back()->with('error', 'Anda tidak memiliki akses untuk menghapus komentar ini!');
        }

        $fotoId = $komentar->FotoID;
        $komentar->delete();

        return back()->with('success', 'Komentar berhasil dihapus!');
    }
}
