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
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $request->file('foto')->store('prestasi', 'public');

        Prestasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect()->route('prestasi')
            ->with('success', 'Prestasi berhasil ditambahkan');
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($prestasi->foto);
            $data['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update($data);

        return redirect()->route('prestasi')
            ->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        Storage::disk('public')->delete($prestasi->foto);
        $prestasi->delete();

        return redirect()->route('prestasi')
            ->with('success', 'Prestasi berhasil dihapus');
    }
}

