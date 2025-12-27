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
    $kelas = $request->get('kelas', 'siswa_1'); // default siswa_1

    // whitelist tabel (AMAN)
    $allowedTables = [
        'siswa_1',
        'siswa_2',
        'siswa_3',
        'siswa_4',
        'siswa_5',
        'siswa_6',
    ];

    if (!in_array($kelas, $allowedTables)) {
        abort(403);
    }

    // Siapkan 12 bulan
    $siswaPerBulan = array_fill(1, 12, 0);

    $data = DB::table($kelas)
        ->select(
            DB::raw('MONTH(tanggal_masuk) as bulan'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('tanggal_masuk', $tahun)
        ->groupBy('bulan')
        ->pluck('total', 'bulan');

    foreach ($data as $bulan => $total) {
        $siswaPerBulan[$bulan] = $total;
    }

    // Rapikan ke array index 0–11
    $siswaChart = [];
    for ($i = 1; $i <= 12; $i++) {
        $siswaChart[] = $siswaPerBulan[$i];
    }

    return view('admin.dashboard', [
        'tahun'        => $tahun,
        'kelas'        => $kelas,
        'siswaChart'   => $siswaChart,
        'siswaCount'   => array_sum($siswaChart),
        'guruCount'    => Guru::count(),
        'ekstraCount'  => Ekstrakulikuler::count(),
        'prestasiCount'=> Prestasi::count(),
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
