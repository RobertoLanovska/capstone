@extends('layout.master-admin')
@section('title','Edit Siswa')

@section('content')
<div class="page-heading">
    <h3>Edit Siswa</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa_2.update', $siswa_2->id) }}">
                @csrf
                @method('PUT')

                <input class="form-control mb-2" name="nama" value="{{ $siswa_2->nama }}">
                <input class="form-control mb-2" name="nisn" value="{{ $siswa_2->nisn }}">
                <input class="form-control mb-2" name="alamat" value="{{ $siswa_2->alamat }}">
                <input type="date" class="form-control mb-2" name="tanggal_lahir" value="{{ $siswa_2->tanggal_lahir }}">
                <input class="form-control mb-2" name="wali_murid" value="{{ $siswa_2->wali_murid }}">
                <input class="form-control mb-3" name="telepon" value="{{ $siswa_2->telepon }}">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('siswa_2') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
