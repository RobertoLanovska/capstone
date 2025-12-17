<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
class SiswaController extends Controller
{
    //
    public function index()
    {
        $siswa = Siswa::all();
        return view('admin.siswa', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswas',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
        ]);

        Siswa::create($request->all());

        return redirect()->route('siswa')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswas,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
        ]);

        $siswa->update($request->all());

        return redirect()->route('siswa')
            ->with('success', 'Data siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        Siswa::findOrFail($id)->delete();

        return redirect()->route('siswa')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}
