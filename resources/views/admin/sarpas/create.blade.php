@extends('layout.master-admin')
@section('title','Tambah Ruangan')

@section('content')
<div class="page-heading">
    <h3>Tambah Ruangan</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('sarpas.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <label>Nama Ruangan</label>
                <input type="text"
                       class="form-control mb-2"
                       name="ruangan">

                <label>Foto</label>
                <input type="file"
                       class="form-control mb-3"
                       name="foto">

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('sarpas') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
