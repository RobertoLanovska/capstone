@extends('layout.master-admin')
@section('title','Tambah Ekstrakulikuler')
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
        <h3 class="mb-0">Tambah Data Ekstrakulikuler</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/ekstrakulikuler">Ekstrakulikuler</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Create
                </li>
            </ol>
        </nav>
    </div>
    
    <div class="card col-md-12 shadow-sm">
 

    <div class="card-body">
        <form id="formTambahEkstrakulikuler"
                method="POST"
              action="{{ route('ekstrakulikuler.store') }}"
              enctype="multipart/form-data">
            @csrf

            <!-- Nama Ekstrakurikuler -->
            <div class="mb-3">
                <label class="form-label">Nama Ekstrakurikuler</label>
                <input type="text"
                       name="nama"
                       class="form-control @error('nama') is-invalid @enderror"
                       placeholder="Contoh: Pramuka"
                       value="{{ old('nama') }}"
                       required>
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jadwal -->
            <div class="mb-3">
                <label class="form-label">Jadwal</label>
                <input type="text"
                       name="jadwal"
                       class="form-control @error('jadwal') is-invalid @enderror"
                       value="{{ old('jadwal') }}"
                       required>
                @error('jadwal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Foto -->
            <div class="mb-4">
                <label class="form-label">Foto Ekstrakurikuler</label>
                <input type="file"
                       name="foto"
                       class="form-control @error('foto') is-invalid @enderror">
                <small class="text-muted">
                    Format: JPG, PNG (max 10MB)
                </small>
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Button -->
            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('ekstrakulikuler') }}" class="btn btn-secondary">
                    Kembali
                </a>
                <button type="button" class="btn btn-primary" onclick="confirmSave()">
                    Simpan Data
                </button>
            </div>
        </form>
        <script>
                function confirmSave() {
                    Swal.fire({
                        title: 'Simpan Data?',
                        text: 'Apakah Anda yakin ingin menyimpan data ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#2563eb',
                        cancelButtonColor: '#6c757d'
                    }).then((result) => {
                        if (!result.isConfirmed) return;

                        let form = document.getElementById('formTambahEkstrakulikuler');
                        let formData = new FormData(form);

                        fetch(form.action, {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json"
                            },
                            body: formData
                        })
                        .then(res => {
                            if (!res.ok) throw res;
                            return res.json();
                        })
                        .then(() => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data ekstrakulikuler berhasil disimpan',
                                confirmButtonColor: '#2563eb'
                            }).then(() => {
                                window.location.href = "{{ route('ekstrakulikuler') }}";
                            });
                        })
                        .catch(async err => {
                            let res = await err.json();
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal',
                                text: res.message ?? 'Terjadi kesalahan'
                            });
                        });
                    });
                }
            </script>
    </div>
</div>

</div>
@endsection
