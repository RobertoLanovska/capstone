@extends('layout.master-admin')
@section('title','Edit Siswa')

@section('content')
<div class="page-heading">
    <h3>Edit Siswa</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa_4.update', $siswa_4->id) }}">
                @csrf
                @method('PUT')

                <input class="form-control mb-2" name="nama" value="{{ $siswa_4->nama }}">
                <input class="form-control mb-2" name="nisn" value="{{ $siswa_4->nisn }}">
                <input class="form-control mb-2" name="alamat" value="{{ $siswa_4->alamat }}">
                <input type="date" class="form-control mb-2" name="tanggal_lahir" value="{{ $siswa_4->tanggal_lahir }}">
                <input class="form-control mb-2" name="wali_murid" value="{{ $siswa_4->wali_murid }}">
                <input class="form-control mb-3" name="telepon" value="{{ $siswa_4->telepon }}">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('siswa_4') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
