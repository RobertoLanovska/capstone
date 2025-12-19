@extends('layout.master-admin')
@section('title','Tambah Siswa')

@section('content')
<div class="page-heading">
    <h3>Tambah Siswa</h3>

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
