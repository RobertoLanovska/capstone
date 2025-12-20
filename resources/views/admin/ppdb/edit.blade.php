@extends('layout.master-admin')
@section('title','Edit PPDB')

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
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Ppdb</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/ppdb">Ppdb</a>
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
                  action="{{ route('ppdb.update', $ppdb->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="text"
                       class="form-control mb-2"
                       name="judul"
                       value="{{ $ppdb->judul }}">

                <textarea class="form-control mb-2"
                          name="deskripsi">{{ $ppdb->deskripsi }}</textarea>

                <label>Foto</label><br>
                <img src="{{ asset('storage/'.$ppdb->foto) }}"
                     width="100" class="mb-2">

                <input type="file"
                       class="form-control mb-3"
                       name="foto">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('ppdb') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
