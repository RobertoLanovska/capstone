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
        <form id="formTambahSarpas"
                method="POST"
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

                        let form = document.getElementById('formTambahSarpas');
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
                                text: 'Data sarpas berhasil disimpan',
                                confirmButtonColor: '#2563eb'
                            }).then(() => {
                                window.location.href = "{{ route('sarpas') }}";
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
