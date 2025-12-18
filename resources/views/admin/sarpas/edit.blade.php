@extends('layout.master-admin')
@section('title','Edit Ruangan')

@section('content')
<div class="page-heading">
    <h3>Edit Ruangan</h3>

    <div class="card col-md-6">
        <div class="card-body">
            <form method="POST"
                  action="{{ route('sarpas.update', $sarpas->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <label>Nama Ruangan</label>
                <input type="text"
                       class="form-control mb-2"
                       name="ruangan"
                       value="{{ $sarpas->ruangan }}">

                <label>Foto</label><br>
                <img src="{{ asset('storage/'.$sarpas->foto) }}"
                     width="100" class="mb-2">

                <input type="file"
                       class="form-control mb-3"
                       name="foto">

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('sarpas') }}"
                   class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
