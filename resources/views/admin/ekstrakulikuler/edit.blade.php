@extends('layout.master-admin')
@section('title','Edit Ekstrakulikuler')

@section('content')
<div class="page-heading">
   <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Data Ekstrakulikuler</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item" aria-current="page">
                    <a href="/ekstrakulikuler">Ekstrakulikuler</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-12 shadow-sm">
        

        <div class="card-body">
            <form id="formEditEkstrakulikuler"
                method="POST"
                action="{{ route('ekstrakulikuler.update', $ekstrakulikuler->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Nama Ekstrakurikuler -->
                <div class="mb-3">
                    <label class="form-label">Nama Ekstrakurikuler</label>
                    <input type="text"
                        name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $ekstrakulikuler->nama) }}"
                        required>
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Jadwal -->
                <div class="mb-3">
                    <label class="form-label">Jadwal</label>
                    <input type="date"
                        name="jadwal"
                        class="form-control @error('jadwal') is-invalid @enderror"
                        value="{{ old('jadwal', $ekstrakulikuler->jadwal) }}"
                        required>
                    @error('jadwal')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Foto -->
                <div class="mb-4">
                    <label class="form-label">Foto Kegiatan</label>

                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $ekstrakulikuler->foto) }}"
                            alt="Foto Kegiatan"
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
                    <a href="{{ route('ekstrakulikuler') }}" class="btn btn-secondary">
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

                        let form = document.getElementById('formEditEkstrakulikuler');
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
                                text: 'Data ekstrakulikuler berhasil diperbarui',
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
