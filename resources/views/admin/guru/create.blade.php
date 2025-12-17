@extends('layout.master-admin')
@section('title','Tambah Guru')

@section('content')
<div class="page-heading">
    <h3>Tambah Guru</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('guru.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <input class="form-control mb-2" name="nama" placeholder="Nama">
                <input class="form-control mb-2" name="jabatan" placeholder="Jabatan">
                <textarea class="form-control mb-2" name="alamat" placeholder="Alamat"></textarea>
                <input class="form-control mb-2" name="telepon" placeholder="Telepon">

                <label>Foto Profil</label>
                <input type="file" class="form-control mb-3" name="profile">

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('guru') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
