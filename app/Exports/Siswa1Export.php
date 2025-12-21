<?php

namespace App\Exports;

use App\Models\Siswa_1;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Siswa1Export implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Siswa_1::select(
            'nama',
            'nisn',
            'alamat',
            'tanggal_lahir',
            'wali_murid',
            'telepon',
            'tanggal_masuk'
        )->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'NISN',
            'Alamat',
            'Tanggal Lahir',
            'Wali Murid',
            'Telepon',
            'Tanggal Masuk',
        ];
    }
}
