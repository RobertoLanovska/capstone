@extends('layout.master-admin')
@section('title','Tambah Prestasi')

@section('content')
<div class="page-heading">
    <h3>Tambah Prestasi</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('prestasi.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <input type="text"
                       class="form-control mb-2"
                       name="judul"
                       placeholder="Judul">

                <textarea class="form-control mb-2"
                          name="deskripsi"
                          placeholder="Deskripsi"></textarea>

                <label>Foto</label>
                <input type="file"
                       class="form-control mb-3"
                       name="foto">

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('prestasi') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
