@extends('layout.master-admin')
@section('title','Tambah Akun')

@section('content')
<div class="page-heading">
    <h3>Tambah Akun</h3>

    <div class="card">
        <div class="card-body col-md-6">
            <form method="POST" action="{{ route('akun.store') }}">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('account') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
