@extends('layout.master-admin')
@section('title','Tambah Ekstrakulikuler')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="page-heading">
    <h3>Tambah Data Ekstrakulikuler</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('ekstrakulikuler.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <input class="form-control mb-2" name="nama" placeholder="Nama">
                <input type="string"class="form-control mb-2" name="jadwal" placeholder="Jadwal">
              

                <label>Foto Profil</label>
                <input type="file" class="form-control mb-3" name="foto">

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('ekstrakulikuler') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
