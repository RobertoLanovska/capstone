@extends('layout.master-admin')
@section('title','Edit Siswa')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Data Siswa Kelas 6</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/siswa/kelas-6">Siswa Kelas 6</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-12 shadow-sm">
       

        <div class="card-body">
            <form method="POST" action="{{ route('siswa_6.update', $siswa_6->id) }}">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $siswa_6->nama) }}"
                        required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- NISN -->
                <div class="mb-3">
                    <label class="form-label">NISN</label>
                    <input type="text"
                        name="nisn"
                        class="form-control @error('nisn') is-invalid @enderror"
                        value="{{ old('nisn', $siswa_6->nisn) }}"
                        required>
                    @error('nisn')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text"
                        name="alamat"
                        class="form-control @error('alamat') is-invalid @enderror"
                        value="{{ old('alamat', $siswa_6->alamat) }}"
                        required>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date"
                        name="tanggal_lahir"
                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                        value="{{ old('tanggal_lahir', $siswa_6->tanggal_lahir) }}"
                        required>
                    @error('tanggal_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Wali Murid -->
                <div class="mb-3">
                    <label class="form-label">Nama Wali Murid</label>
                    <input type="text"
                        name="wali_murid"
                        class="form-control @error('wali_murid') is-invalid @enderror"
                        value="{{ old('wali_murid', $siswa_6->wali_murid) }}"
                        required>
                    @error('wali_murid')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Telepon -->
                <div class="mb-4">
                    <label class="form-label">Telepon</label>
                    <input type="text"
                        name="telepon"
                        class="form-control @error('telepon') is-invalid @enderror"
                        value="{{ old('telepon', $siswa_6->telepon) }}"
                        required>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('siswa_6') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
