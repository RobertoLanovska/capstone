@extends('layout.master-admin')
@section('title', 'Tambah Fotosdm')

@section('content')
        <div class="page-heading">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Tambah Foto SDM</h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item">
                        <a href="/admin">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a href="/fotosdm">Fotosdm</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Create
                    </li>
                </ol>
            </nav>
        </div>

        <div class="card col-md-6">
            <div class="card-body">
                <form method="POST" action="{{ route('fotosdm.store') }}" enctype="multipart/form-data">
                    @csrf

                    <input type="text" class="form-control mb-2" name="judul" placeholder="Judul">

                    <textarea class="form-control mb-2"
                          name="deskripsi"
                          placeholder="Deskripsi"></textarea>


                    <label>Foto</label>
                    <input type="file" class="form-control mb-3" name="foto">

                    <button class="btn btn-primary">Simpan</button>
                    <a href="{{ route('fotosdm') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection