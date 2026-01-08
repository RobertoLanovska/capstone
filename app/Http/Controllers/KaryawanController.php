<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawan = Karyawan::latest()->get();
        return view('admin.karyawan', compact('karyawan'));
    }

    public function create()
    {
        return view('admin.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|regex:/^[0-9]+$/|digits_between:10,15',
            'profile' => 'required|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $path = $request->file('profile')->store('karyawan', 'public');

        Karyawan::create([
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
        $karyawan = Karyawan::findOrFail($id);
        return view('admin.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'telepon' => 'required|regex:/^[0-9]+$/|digits_between:10,15',
            'profile' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only('nama', 'jabatan', 'alamat', 'telepon');

        if ($request->hasFile('profile')) {
            Storage::disk('public')->delete($karyawan->profile);
            $data['profile'] = $request->file('profile')->store('karyawan', 'public');
        }

        $karyawan->update($data);
        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
        
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);

        Storage::disk('public')->delete($karyawan->profile);
        $karyawan->delete();

        return response()->json([
            'status' => true,
            'message' => 'Karyawan berhasil dihapus'
        ]);
    }
}
