<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa_1;
use App\Models\Siswa_2;
use App\Models\Siswa_3;
use App\Models\Siswa_4;
use App\Models\Siswa_5;
use App\Models\Siswa_6;
use App\Models\Ekstrakulikuler;
use App\Models\Prestasi;
use App\Models\Berita;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $kelasList = [
            'siswa_1' => 'Siswa 1',
            'siswa_2' => 'Siswa 2',
            'siswa_3' => 'Siswa 3',
            'siswa_4' => 'Siswa 4',
            'siswa_5' => 'Siswa 5',
            'siswa_6' => 'Siswa 6',
        ];

        $siswaChart = [];
        $kategoriChart = [];

        foreach ($kelasList as $table => $label) {
            $jumlah = DB::table($table)
                ->whereYear('tanggal_masuk', $tahun)
                ->count();

            $siswaChart[] = $jumlah;
            $kategoriChart[] = $label;
        }

        return view('admin.dashboard', [
            'tahun'          => $tahun,
            'siswaChart'     => $siswaChart,
            'kategoriChart'  => $kategoriChart,
            'siswaCount'     => array_sum($siswaChart),
            'guruCount'      => Guru::count(),
            'ekstraCount'    => Ekstrakulikuler::count(),
            'prestasiCount'  => Prestasi::count(),
        ]);
    }


    
    public function home() 
    {
        return view('home', [
            'guruCount'     => Guru::count(),
            'jumlahSiswa' => Siswa_1::count() + Siswa_2::count() + Siswa_3::count() + Siswa_4::count() + Siswa_5::count() + Siswa_6::count(),
            'jumlahPrestasi' => Prestasi::count(),
            'prestasiList' => Prestasi::latest()->take(5)->get(),
            'beritaList' => Berita::latest()->take(3)->get(),
        ]);
    }

}
