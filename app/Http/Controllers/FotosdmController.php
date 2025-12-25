<?php

namespace App\Http\Controllers;
use App\Models\Fotosdm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class FotosdmController extends Controller
{
    public function index()
    {
        $fotosdm = Fotosdm::latest()->get();
        return view('admin.fotosdm', compact('fotosdm'));
    }

    public function create()
    {
        return view('admin.fotosdm.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:10048'
        ]);

        $foto = $request->file('foto')->store('fotosdm', 'public');

        Fotosdm::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto
        ]);

        return redirect()->route('fotosdm')
            ->with('success', 'Data Foto SDM berhasil ditambahkan');
    }
    public function edit($id)
    {
        $fotosdm = Fotosdm::findOrFail($id);
        return view('admin.fotosdm.edit', compact('fotosdm'));
    }

    public function update(Request $request, $id)
    {
        $fotosdm = Fotosdm::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10048'
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($fotosdm->foto);
            $data['foto'] = $request->file('foto')->store('fotosdm', 'public');
        }

        $fotosdm->update($data);

        return redirect()->route('fotosdm')
            ->with('success', 'Data Fotosdm berhasil diperbarui');
    }
}
