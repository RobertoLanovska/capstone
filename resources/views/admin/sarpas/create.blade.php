@extends('layout.master-admin')
@section('title','Tambah Ruangan')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Tambah Data Sarpas</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/sarpas">Sarpas</a>
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
              action="{{ route('sarpas.store') }}"
              enctype="multipart/form-data">
            @csrf

            <!-- Nama Ruangan -->
            <div class="mb-3">
                <label class="form-label">Nama Ruangan</label>
                <input type="text"
                       name="ruangan"
                       class="form-control @error('ruangan') is-invalid @enderror"
                       placeholder="Contoh: Laboratorium Komputer"
                       value="{{ old('ruangan') }}"
                       required>
                @error('ruangan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label class="form-label">Foto Ruangan</label>
                <input type="file"
                       name="foto"
                       class="form-control @error('foto') is-invalid @enderror">
                <small class="text-muted">
                    Format: JPG, PNG (max 2MB)
                </small>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('sarpas') }}" class="btn btn-secondary">
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
