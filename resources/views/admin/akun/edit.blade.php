@extends('layout.master-admin')
@section('title','Edit Akun')

@section('content')
<div class="page-heading">
    <h3>Edit Akun</h3>

    <div class="card">
        <div class="card-body col-md-6">
            <form method="POST" action="{{ route('akun.update', $account->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control" value="{{ $account->name }}" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $account->email }}" required>
                </div>

                <div class="mb-3">
                    <label>Password (Opsional)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('account') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
