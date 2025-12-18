<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->get();
        return view('admin.berita', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $path = $request->file('foto')->store('berita', 'public');

        Berita::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $path
        ]);

        return redirect()->route('berita')
            ->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($berita->foto);
            $data['foto'] = $request->file('foto')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('berita')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        Storage::disk('public')->delete($berita->foto);
        $berita->delete();

        return redirect()->route('berita')
            ->with('success', 'Berita berhasil dihapus');
    }
}

