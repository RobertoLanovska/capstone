<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa_1;
use App\Models\Siswa_2;
use App\Models\Siswa_3;
use App\Models\Siswa_4;
use App\Models\Siswa_5;
use App\Models\Siswa_6;
use App\Exports\Siswa1Export;
use App\Exports\Siswa2Export;
use App\Exports\Siswa3Export;
use App\Exports\Siswa4Export;
use App\Exports\Siswa5Export;
use App\Exports\Siswa6Export;
use Maatwebsite\Excel\Facades\Excel;
class SiswaController extends Controller
{
    // Siswa 1
    public function siswa_1()
    {
        $siswa_1 = Siswa_1::all();
        return view('admin.siswa_1', compact('siswa_1'));
    }

    public function create_1()
    {
        return view('admin.siswa_1.create');
    }

    public function store_1(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_1',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Siswa_1::create($request->all());

         return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_1($id)
    {
        $siswa_1 = Siswa_1::findOrFail($id);
        return view('admin.siswa_1.edit', compact('siswa_1'));
    }

    public function update_1(Request $request, $id)
    {
        $siswa_1 = Siswa_1::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_1,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_1->update($request->all());

         return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_1($id)
    {
        Siswa_1::findOrFail($id)->delete();

         return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //Siswa 2


    public function siswa_2()
    {
        $siswa_2 = Siswa_2::all();
        return view('admin.siswa_2', compact('siswa_2'));
    }

    public function create_2()
    {
        return view('admin.siswa_2.create');
    }

    public function store_2(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_2',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Siswa_2::create($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_2($id)
    {
        $siswa_2 = Siswa_2::findOrFail($id);
        return view('admin.siswa_2.edit', compact('siswa_2'));
    }

    public function update_2(Request $request, $id)
    {
        $siswa_2 = Siswa_2::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_2,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_2->update($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_2($id)
    {
        Siswa_2::findOrFail($id)->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //Siswa 3

    public function siswa_3()
    {
        $siswa_3 = Siswa_3::all();
        return view('admin.siswa_3', compact('siswa_3'));
    }

    public function create_3()
    {
        return view('admin.siswa_3.create');
    }

    public function store_3(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_3',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Siswa_3::create($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_3($id)
    {
        $siswa_3 = Siswa_3::findOrFail($id);
        return view('admin.siswa_3.edit', compact('siswa_3'));
    }

    public function update_3(Request $request, $id)
    {
        $siswa_3 = Siswa_3::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_3,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_3->update($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_3($id)
    {
        Siswa_3::findOrFail($id)->delete();

       return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //Siswa 4

    public function siswa_4()
    {
        $siswa_4 = Siswa_4::all();
        return view('admin.siswa_4', compact('siswa_4'));
    }

    public function create_4()
    {
        return view('admin.siswa_4.create');
    }

    public function store_4(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_4',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
            
        ]);

        Siswa_4::create($request->all());

       return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_4($id)
    {
        $siswa_4 = Siswa_4::findOrFail($id);
        return view('admin.siswa_4.edit', compact('siswa_4'));
    }

    public function update_4(Request $request, $id)
    {
        $siswa_4 = Siswa_4::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_4,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_4->update($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_4($id)
    {
        Siswa_4::findOrFail($id)->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //Siswa 5

    public function siswa_5()
    {
        $siswa_5 = Siswa_5::all();
        return view('admin.siswa_5', compact('siswa_5'));
    }

    public function create_5()
    {
        return view('admin.siswa_5.create');
    }

    public function store_5(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_5',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Siswa_5::create($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_5($id)
    {
        $siswa_5 = Siswa_5::findOrFail($id);
        return view('admin.siswa_5.edit', compact('siswa_5'));
    }

    public function update_5(Request $request, $id)
    {
        $siswa_5 = Siswa_5::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_5,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_5->update($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_5($id)
    {
        Siswa_5::findOrFail($id)->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //Siswa 6

    public function siswa_6()
    {
        $siswa_6 = Siswa_6::all();
        return view('admin.siswa_6', compact('siswa_6'));
    }

    public function create_6()
    {
        return view('admin.siswa_6.create');
    }

    public function store_6(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_6',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        Siswa_6::create($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function edit_6($id)
    {
        $siswa_6 = Siswa_6::findOrFail($id);
        return view('admin.siswa_6.edit', compact('siswa_6'));
    }

    public function update_6(Request $request, $id)
    {
        $siswa_6 = Siswa_6::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'nisn' => 'required|unique:siswa_6,nisn,' . $id,
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'wali_murid' => 'required',
            'telepon' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);

        $siswa_6->update($request->all());

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    public function destroy_6($id)
    {
        Siswa_6::findOrFail($id)->delete();

        return response()->json([
        'status'  => true,
        'message' => 'Data berhasil disimpan'
    ]);
    }

    //export siswa 1
    public function exportExcel1()
    {
        return Excel::download(
            new Siswa1Export,
            'data_siswa_kelas_1.xlsx'
        );
    }
    //export siswa 2
    public function exportExcel2()
    {
        return Excel::download(
            new Siswa2Export,
            'data_siswa_kelas_2.xlsx'
        );
    }
    //export siswa 3
    public function exportExcel3()
    {
        return Excel::download(
            new Siswa3Export,
            'data_siswa_kelas_3.xlsx'
        );
    }
    //export siswa 4
    public function exportExcel4()
    {
        return Excel::download(
            new Siswa4Export,
            'data_siswa_kelas_4.xlsx'
        );
    }
    //export siswa 5
    public function exportExcel5()
    {
        return Excel::download(
            new Siswa5Export,
            'data_siswa_kelas_5.xlsx'
        );
    }
    //export siswa 6
    public function exportExcel6()
    {
        return Excel::download(
            new Siswa6Export,
            'data_siswa_kelas_6.xlsx'
        );
    }
}
