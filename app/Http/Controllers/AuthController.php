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

    public function account()
    {
        $account = User::all();
        return view('admin.account', compact('account'));
    }

    // create account
    public function create()
    {
        return view('admin.akun.create');
    }
     public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Data berhasil disimpan'
        ]);
    }

    public function edit($id)
    {
        $account = User::findOrFail($id);
        return view('admin.akun.edit', compact('account'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8'
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return response()->json([
            'status' => true,
            'message' => 'Data berhasil diperbarui'
        ]);
    }


    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return response()->json([
            'status' => true,
            'message' => 'Akun berhasil dihapus'
        ]);
    }

}
