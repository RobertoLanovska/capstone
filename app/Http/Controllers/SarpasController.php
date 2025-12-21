<?php

namespace App\Http\Controllers;

use App\Models\Sarpas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SarpasController extends Controller
{
    public function index()
    {
        $sarpas = Sarpas::latest()->get();
        return view('admin.sarpas', compact('sarpas'));
    }

    public function create()
    {
        return view('admin.sarpas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ruangan' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = $request->file('foto')->store('sarpas', 'public');

        Sarpas::create([
            'ruangan' => $request->ruangan,
            'foto' => $foto
        ]);

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit($id)
    {
        $sarpas = Sarpas::findOrFail($id);
        return view('admin.sarpas.edit', compact('sarpas'));
    }

    public function update(Request $request, $id)
    {
        $sarpas = Sarpas::findOrFail($id);

        $request->validate([
            'ruangan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only('ruangan');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($sarpas->foto);
            $data['foto'] = $request->file('foto')->store('sarpas', 'public');
        }

        $sarpas->update($data);

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy($id)
    {
        $sarpas = Sarpas::findOrFail($id);

        Storage::disk('public')->delete($sarpas->foto);
        $sarpas->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function frontend()
    {
        $sarpas = Sarpas::latest()->get();
        return view('sarpras', compact('sarpas'));
    }

}

