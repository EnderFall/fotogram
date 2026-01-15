<?php

namespace App\Http\Controllers;

use App\Models\GalleryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Show register form
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Handle login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        $user = GalleryUser::where('Email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->Password)) {
            Session::put('user_id', $user->UserID);
            Session::put('username', $user->Username);
            Session::put('email', $user->Email);
            return redirect('/dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah!');
    }

    /**
     * Handle register
     */
    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:gallery_users,Username|min:3',
            'email' => 'required|email|unique:gallery_users,Email',
            'nama_lengkap' => 'required|min:5',
            'alamat' => 'nullable|string',
            'password' => 'required|min:6|confirmed'
        ], [
            'username.required' => 'Username harus diisi',
            'username.unique' => 'Username sudah digunakan',
            'username.min' => 'Username minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah didaftarkan',
            'nama_lengkap.required' => 'Nama lengkap harus diisi',
            'nama_lengkap.min' => 'Nama lengkap minimal 5 karakter',
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok'
        ]);

        GalleryUser::create([
            'Username' => $request->username,
            'Email' => $request->email,
            'NamaLengkap' => $request->nama_lengkap,
            'Alamat' => $request->alamat,
            'Password' => Hash::make($request->password)
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Logout berhasil!');
    }
}
