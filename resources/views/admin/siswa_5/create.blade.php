@extends('layout.master-admin')
@section('title','Tambah Siswa')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Tambah Data Siswa Kelas 5</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/siswa/kelas-5">Siswa Kelas 5</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-12 shadow-sm">
    

        <div class="card-body">
            <form method="POST" action="{{ route('siswa_5.store') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama Siswa</label>
                    <input type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukkan nama siswa"
                        value="{{ old('nama') }}"
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
                        placeholder="Nomor Induk Siswa Nasional"
                        value="{{ old('nisn') }}"
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
                        placeholder="Alamat lengkap"
                        value="{{ old('alamat') }}"
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
                        value="{{ old('tanggal_lahir') }}"
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
                        placeholder="Nama orang tua / wali"
                        value="{{ old('wali_murid') }}"
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
                        placeholder="08xxxxxxxxxx"
                        value="{{ old('telepon') }}"
                        required>
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-end gap-5">
                    <a href="{{ route('siswa_5') }}" class="btn btn-secondary">
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
