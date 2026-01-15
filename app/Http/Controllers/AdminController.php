<?php

namespace App\Http\Controllers;

use App\Models\GalleryUser;
use App\Models\GalleryAlbum;
use App\Models\GalleryFoto;
use App\Models\GalleryKomentarFoto;
use App\Models\GalleryLikeFoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Show admin dashboard
     */
    public function index()
    {
        $totalUsers = GalleryUser::count();
        $totalFotos = GalleryFoto::count();
        $totalKomentars = GalleryKomentarFoto::count();
        $totalLikes = GalleryLikeFoto::count();

        return view('admin.index', compact(
            'totalUsers',
            'totalFotos',
            'totalKomentars',
            'totalLikes'
        ));
    }

    /**
     * Show all users
     */
    public function users()
    {
        $users = GalleryUser::paginate(10);
        return view('admin.users', compact('users'));
    }

    /**
     * Edit user
     */
    public function editUser($id)
    {
        $user = GalleryUser::findOrFail($id);
        return view('admin.edit-user', compact('user'));
    }

    /**
     * Update user
     */
    public function updateUser(Request $request, $id)
    {
        $user = GalleryUser::findOrFail($id);

        $request->validate([
            'NamaUser' => 'required',
            'EmailUser' => 'required|email|unique:gallery_users,EmailUser,' . $id . ',UserID',
            'role' => 'required|in:user,admin',
            'password' => 'nullable|min:6|confirmed'
        ]);

        $updateData = [
            'NamaUser' => $request->NamaUser,
            'EmailUser' => $request->EmailUser,
            'role' => $request->role
        ];

        if ($request->filled('password')) {
            $updateData['PasswordUser'] = bcrypt($request->password);
        }

        $user->update($updateData);

        return redirect()->route('admin.users')->with('success', 'User berhasil diupdate!');
    }

    /**
     * Delete user
     */
    public function deleteUser($id)
    {
        if ($id == Session::get('user_id')) {
            return redirect()->route('admin.users')->with('error', 'Anda tidak bisa menghapus akun sendiri!');
        }

        $user = GalleryUser::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User berhasil dihapus!');
    }

    /**
     * Show all photos
     */
    public function fotos()
    {
        $fotos = GalleryFoto::with('user', 'album')->paginate(15);
        return view('admin.fotos', compact('fotos'));
    }

    /**
     * Delete photo
     */
    public function deleteFoto($id)
    {
        $foto = GalleryFoto::findOrFail($id);
        
        // Delete file
        if ($foto->LokasiFile && Storage::disk('public')->exists($foto->LokasiFile)) {
            Storage::disk('public')->delete($foto->LokasiFile);
        }

        $foto->delete();
        return redirect()->route('admin.fotos')->with('success', 'Foto berhasil dihapus!');
    }

    /**
     * Show statistics
     */
    public function statistics()
    {
        $stats = [
            'totalUsers' => GalleryUser::count(),
            'totalFotos' => GalleryFoto::count(),
            'totalKomentars' => GalleryKomentarFoto::count(),
            'totalLikes' => GalleryLikeFoto::count(),
            'totalAlbums' => GalleryAlbum::count(),
            'avgPhotosPerAlbum' => GalleryAlbum::count() > 0 
                ? round(GalleryFoto::count() / GalleryAlbum::count(), 2)
                : 0,
            'topUsers' => GalleryUser::withCount('fotos')
                ->orderByDesc('fotos_count')
                ->limit(5)
                ->get(),
            'topFotos' => GalleryFoto::withCount('likes')
                ->orderByDesc('likes_count')
                ->limit(5)
                ->get(),
            'topKomentars' => GalleryFoto::withCount('komentars')
                ->orderByDesc('komentars_count')
                ->limit(5)
                ->get(),
        ];

        return view('admin.statistics', compact('stats'));
    }
}
