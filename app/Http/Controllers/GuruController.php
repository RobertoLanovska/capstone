<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
{
    //
    public function index()
    {
        $guru = Guru::all();
        return view('admin.guru', compact('guru'));
    }

    public function create()
    {
        return view('admin.guru.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'profile' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $path = $request->file('profile')->store('guru', 'public');

        Guru::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'profile' => $path,
        ]);

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('nama', 'jabatan', 'alamat', 'telepon');

        if ($request->hasFile('profile')) {
            Storage::disk('public')->delete($guru->profile);
            $data['profile'] = $request->file('profile')->store('guru', 'public');
        }

        $guru->update($data);
        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
        
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        Storage::disk('public')->delete($guru->profile);
        $guru->delete();

        return response()->json([
            'status' => true,
            'message' => 'Guru berhasil dihapus'
        ]);
    }
}
