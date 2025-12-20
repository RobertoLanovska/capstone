@extends('layout.master-admin')
@section('title','Tambah Guru')

@section('content')
<div class="page-heading">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Tambah Guru</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/guru">Guru</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create
                </li>
            </ol>
        </nav>
    </div>
  

    <div class="card col-md-12 shadow-sm">
       

        <div class="card-body">
            <form method="POST"
                action="{{ route('guru.store') }}"
                enctype="multipart/form-data">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('nama') }}"
                        required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jabatan -->
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <input type="text"
                        name="jabatan"
                        class="form-control @error('jabatan') is-invalid @enderror"
                        placeholder="Contoh: Guru Matematika"
                        value="{{ old('jabatan') }}"
                        required>
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                            class="form-control @error('alamat') is-invalid @enderror"
                            rows="3"
                            placeholder="Masukkan alamat lengkap"
                            required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Telepon -->
                <div class="mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text"
                        name="telepon"
                        class="form-control @error('telepon') is-invalid @enderror"
                        placeholder="08xxxxxxxxxx"
                        value="{{ old('telepon') }}"
                        required>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto Profil -->
                <div class="mb-4">
                    <label class="form-label">Foto Profil</label>
                    <input type="file"
                        name="profile"
                        class="form-control @error('profile') is-invalid @enderror">
                    <small class="text-muted">Format: JPG, PNG (max 2MB)</small>
                    @error('profile')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('guru') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
