@extends('layout.master-admin')
@section('title','Edit Prestasi')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Prestasi</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/prestasi">Prestasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-12 shadow-sm">
        

        <div class="card-body">
            <form id="formEditPrestasi"
                method="POST"
                action="{{ route('prestasi.update', $prestasi->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul -->
                <div class="mb-3">
                    <label class="form-label">Judul Prestasi</label>
                    <input type="text"
                        name="judul"
                        class="form-control @error('judul') is-invalid @enderror"
                        value="{{ old('judul', $prestasi->judul) }}"
                        required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi"
                            class="form-control @error('deskripsi') is-invalid @enderror"
                            rows="3"
                            required>{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="mb-4">
                    <label class="form-label">Foto Prestasi</label>

                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $prestasi->foto) }}"
                            alt="Foto Prestasi"
                            width="100"
                            class="rounded border">
                    </div>

                    <input type="file"
                        name="foto"
                        class="form-control @error('foto') is-invalid @enderror">
                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('prestasi') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="button" class="btn btn-primary" onclick="confirmSave()">
                        Update Data
                    </button>
                </div>
            </form>
            <script>
                function confirmSave() {
                    Swal.fire({
                        title: 'Simpan Data?',
                        text: 'Apakah Anda yakin ingin memperbarui data ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Simpan',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#2563eb',
                        cancelButtonColor: '#6c757d'
                    }).then((result) => {
                        if (!result.isConfirmed) return;

                        let form = document.getElementById('formEditPrestasi');
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
                                text: 'Data prestasi berhasil diperbarui',
                                confirmButtonColor: '#2563eb'
                            }).then(() => {
                                window.location.href = "{{ route('prestasi') }}";
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
