<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa_1;
use App\Models\Ekstrakulikuler;
use App\Models\Prestasi;

class DashboardController extends Controller
{
    //
    public function index()
{
    return view('admin.dashboard', [
        'guruCount'     => Guru::count(),
        'siswaCount'    => Siswa_1::count(),
        'ekstraCount'   => Ekstrakulikuler::count(),
        'prestasiCount' => Prestasi::count(),
    ]);
}
}
