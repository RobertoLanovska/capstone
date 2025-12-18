@extends('layout.master-admin')
@section('title','Edit Ekstrakulikuler')

@section('content')
<div class="page-heading">
    <h3>Edit Ekstrakulikuler</h3>

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
