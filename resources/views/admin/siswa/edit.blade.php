@extends('layout.master-admin')
@section('title','Edit Siswa')

@section('content')
<div class="page-heading">
    <h3>Edit Siswa</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST" action="{{ route('siswa.update', $siswa->id) }}">
                @csrf
                @method('PUT')

                <input class="form-control mb-2" name="nama" value="{{ $siswa->nama }}">
                <input class="form-control mb-2" name="nisn" value="{{ $siswa->nisn }}">
                <input class="form-control mb-2" name="alamat" value="{{ $siswa->alamat }}">
                <input type="date" class="form-control mb-2" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}">
                <input class="form-control mb-2" name="wali_murid" value="{{ $siswa->wali_murid }}">
                <input class="form-control mb-3" name="telepon" value="{{ $siswa->telepon }}">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('siswa') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
