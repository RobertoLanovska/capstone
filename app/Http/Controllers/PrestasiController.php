<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::latest()->get();
        return view('admin.prestasi', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:10120',
        ], [
            'judul.required' => 'Judul wajib diisi',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'foto.required' => 'Foto wajib diunggah',
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus JPG atau PNG',
            'foto.max' => 'Gambar terlalu besar (maksimal 10 MB)',
        ]);

        $foto = $request->file('foto')->store('prestasi', 'public');

        Prestasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }


    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10120',
        ], [
            'foto.image' => 'File harus berupa gambar',
            'foto.mimes' => 'Format gambar harus JPG atau PNG',
            'foto.max' => 'Gambar terlalu besar (maksimal 10 MB)',
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($prestasi->foto);
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }


    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        Storage::disk('public')->delete($prestasi->foto);
        $prestasi->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function front()
    {
        $prestasi = Prestasi::latest()->get();
        return view('prestasi', compact('prestasi'));
    }
}

