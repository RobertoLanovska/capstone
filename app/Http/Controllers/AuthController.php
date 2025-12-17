<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('TambahAkun')->with('success', 'Registrasi berhasil, silakan login.');
    }
    public function updatePassword(Request $request)
    {
        // Validasi name dan email dulu
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ], [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
        ]);

        // Cek user
        $user = User::where('name', $request->name)
                    ->where('email', $request->email)
                    ->first();

        if (!$user) {
            return back()->withErrors(['name' => 'nama dan email tidak ditemukan']);
        }

        // Validasi password
        $request->validate([
            'password' => 'required|string|confirmed|min:6',
        ], [
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password berhasil diubah!');
    }

    public function showUbahPassword()
    {
        return view('admin.ubahpassword');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
