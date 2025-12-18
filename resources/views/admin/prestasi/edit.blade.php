@extends('layout.master-admin')
@section('title','Edit Prestasi')

@section('content')
<div class="page-heading">
    <h3>Edit Prestasi</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('prestasi.update', $prestasi->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text"
                       class="form-control mb-2"
                       name="judul"
                       value="{{ $prestasi->judul }}">

                <textarea class="form-control mb-2"
                          name="deskripsi">{{ $prestasi->deskripsi }}</textarea>

                <label>Foto</label><br>
                <img src="{{ asset('storage/'.$prestasi->foto) }}"
                     width="100" class="mb-2">

                <input type="file"
                       class="form-control mb-3"
                       name="foto">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('prestasi') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
