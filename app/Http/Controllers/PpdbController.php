<?php

namespace App\Http\Controllers;

use App\Models\Ppdb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function index()
    {
        $ppdb = Ppdb::latest()->get();
        return view('admin.ppdb', compact('ppdb'));
    }

    public function create()
    {
        return view('admin.ppdb.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $request->file('foto')->store('ppdb', 'public');

        Ppdb::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect()->route('ppdb')
            ->with('success', 'Data PPDB berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        return view('admin.ppdb.edit', compact('ppdb'));
    }

    public function update(Request $request, $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:5048'
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($ppdb->foto);
            $data['foto'] = $request->file('foto')->store('ppdb', 'public');
        }

        $ppdb->update($data);

        return redirect()->route('ppdb')
            ->with('success', 'Data PPDB berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);

        Storage::disk('public')->delete($ppdb->foto);
        $ppdb->delete();

        return redirect()->route('ppdb')
            ->with('success', 'Data PPDB berhasil dihapus');
    }

    public function frontend()
    {
        $ppdb = Ppdb::latest()->get();
        return view('ppdb', compact('ppdb'));
    }
}

