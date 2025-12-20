@extends('layout.master-admin')
@section('title','Tambah Siswa')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Tambah Data Siswa Kelas 2</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/siswa/kelas-2">Siswa Kelas 2</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa_2.store') }}">
                @csrf
                
                <input class="form-control mb-2" name="nama" placeholder="Nama">
                <input class="form-control mb-2" name="nisn" placeholder="NISN">
                <input class="form-control mb-2" name="alamat" placeholder="Alamat">
                <input type="date" class="form-control mb-2" name="tanggal_lahir">
                <input class="form-control mb-2" name="wali_murid" placeholder="Wali Murid">
                <input class="form-control mb-3" name="telepon" placeholder="Telepon">

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('siswa_2') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
