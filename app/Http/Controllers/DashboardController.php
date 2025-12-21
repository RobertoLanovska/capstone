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
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $tahun = $request->get('tahun', date('Y'));

        $siswaTables = [
            'siswa_1',
            'siswa_2',
            'siswa_3',
            'siswa_4',
            'siswa_5',
            'siswa_6',
        ];

        // Siapkan array 12 bulan
        $siswaPerBulan = array_fill(1, 12, 0);

        foreach ($siswaTables as $table) {
            $data = DB::table($table)
                ->select(
                    DB::raw('MONTH(tanggal_masuk) as bulan'),
                    DB::raw('COUNT(*) as total')
                )
                ->whereYear('tanggal_masuk', $tahun)
                ->groupBy('bulan')
                ->pluck('total', 'bulan');

            foreach ($data as $bulan => $total) {
                $siswaPerBulan[$bulan] += $total;
            }
        }

        // Rapikan jadi index 0–11 (Jan–Des)
        $siswaChart = [];
        for ($i = 1; $i <= 12; $i++) {
            $siswaChart[] = $siswaPerBulan[$i];
        }

        return view('admin.dashboard', [
            'tahun'      => $tahun,
            'siswaChart' => $siswaChart,
            'siswaCount' => array_sum($siswaChart),
            'guruCount'     => Guru::count(),
            'ekstraCount'   => Ekstrakulikuler::count(),
            'prestasiCount' => Prestasi::count(),
        ]);
    }
}
