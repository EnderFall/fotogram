<?php

namespace App\Http\Controllers;

use App\Models\GalleryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show user profile
     */
    public function show($id = null)
    {
        if ($id === null) {
            $id = Session::get('user_id');
        }
        
        $user = GalleryUser::with('fotos', 'albums')->findOrFail($id);
        $isOwner = ($id == Session::get('user_id'));
        return view('profile.show', compact('user', 'isOwner'));
    }

    /**
     * Show edit profile form
     */
    public function edit()
    {
        $userId = Session::get('user_id');
        $user = GalleryUser::findOrFail($userId);
        return view('profile.edit', compact('user'));
    }

    /**
     * Update profile
     */
    public function update(Request $request)
    {
        $userId = Session::get('user_id');
        $user = GalleryUser::findOrFail($userId);

        $request->validate([
            'nama_lengkap' => 'required|min:5',
            'alamat' => 'nullable|string',
            'bio' => 'nullable|string|max:500',
            'foto_profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120'
        ]);

        // Handle profile photo upload
        if ($request->hasFile('foto_profile')) {
            // Delete old profile photo if exists
            if ($user->FotoProfile && Storage::disk('public')->exists($user->FotoProfile)) {
                Storage::disk('public')->delete($user->FotoProfile);
            }

            $file = $request->file('foto_profile');
            $fileName = 'profile_' . $userId . '_' . time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('profiles', $fileName, 'public');
            $user->FotoProfile = $path;
        }

        $user->update([
            'NamaLengkap' => $request->nama_lengkap,
            'Alamat' => $request->alamat,
            'Bio' => $request->bio,
            'FotoProfile' => $user->FotoProfile
        ]);

        return redirect('/profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
