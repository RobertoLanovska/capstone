<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakulikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakulikulerController extends Controller
{
    //
    public function index()
    {
        $ekstrakulikuler = Ekstrakulikuler::all();
        return view('admin.ekstrakulikuler', compact('ekstrakulikuler'));
    }

    public function create()
    {
        return view('admin.ekstrakulikuler.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jadwal' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $path = $request->file('foto')->store('esktrakulikuler', 'public');

        Ekstrakulikuler::create([
            'nama' => $request->nama,
            'jadwal' => $request->jadwal,
            'foto' => $path,
        ]);

        return redirect()->route('ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil ditambahkan');
    }

    public function edit($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);
        return view('admin.ekstrakulikuler.edit', compact('ekstrakulikuler'));
    }

    public function update(Request $request, $id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'jadwal' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        ]);

        $data = $request->only('nama', 'jadwal', 'foto');

        if ($request->hasFile('foto')) {
            Storage::disk('public')->delete($ekstrakulikuler->foto);
            $data['foto'] = $request->file('foto')->store('ekstrakulikuler', 'public');
        }

        $ekstrakulikuler->update($data);

        return redirect()->route('ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil diperbarui');
    }

    public function destroy($id)
    {
        $ekstrakulikuler = Ekstrakulikuler::findOrFail($id);

        Storage::disk('public')->delete($ekstrakulikuler->foto);
        $ekstrakulikuler->delete();

        return redirect()->route('ekstrakulikuler')
            ->with('success', 'Data ekstrakulikuler berhasil dihapus');
    }

    public function frontend()
    {
        $ekstrakulikuler = Ekstrakulikuler::latest()->get();

        return view('ekstra', compact('ekstrakulikuler'));
    }

}
