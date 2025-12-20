@extends('layout.master-admin')
@section('title','Edit Ekstrakulikuler')

@section('content')
<div class="page-heading">
   <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Data Ekstrakulikuler</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/ekstrakulikuler">Ekstrakulikuler</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input class="form-control mb-2" name="nama" value="{{ $ekstrakulikuler->nama }}">
                <input type="date"class="form-control mb-2" name="jadwal" value="{{ $ekstrakulikuler->jadwal }}">
                

                <label>Foto Kegiatan</label><br>
                <img src="{{ asset('storage/'.$ekstrakulikuler->foto) }}" width="80" class="mb-2">
                <input type="file" class="form-control mb-3" name="foto">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('ekstrakulikuler') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
