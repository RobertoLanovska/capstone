@extends('layout.master-admin')
@section('title','Edit Guru')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Guru</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/guru">Guru</a>
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
                  action="{{ route('guru.update', $guru->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input class="form-control mb-2" name="nama" value="{{ $guru->nama }}">
                <input class="form-control mb-2" name="jabatan" value="{{ $guru->jabatan }}">
                <textarea class="form-control mb-2" name="alamat">{{ $guru->alamat }}</textarea>
                <input class="form-control mb-2" name="telepon" value="{{ $guru->telepon }}">

                <label>Foto Profil</label><br>
                <img src="{{ asset('storage/'.$guru->profile) }}" width="80" class="mb-2">
                <input type="file" class="form-control mb-3" name="profile">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('guru') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
