@extends('layout.master-admin')
@section('title','Edit Akun')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Edit Akun</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="/admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="/akun">Akun</a>
                </li>
                <li class="breadcrumb-item active">
                    Edit
                </li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-12 shadow-sm">
        <div class="card-body">

            <form id="formEditAkun">
                @csrf
                @method('PUT')

                <!-- Nama -->
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $account->name }}"
                           required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $account->email }}"
                           required>
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <label class="form-label">Password (Opsional)</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak diubah">
                    <small class="text-muted">
                        Isi hanya jika ingin mengganti password
                    </small>
                </div>

                <!-- Button -->
                <div class="d-flex justify-content-end gap-2">
                    <a href="{{ route('account') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                    <button type="button"
                            class="btn btn-primary"
                            onclick="confirmUpdate()">
                        Update Data
                    </button>
                </div>

            </form>

            <script>
                function confirmUpdate() {
                    Swal.fire({
                        title: 'Update Data?',
                        text: 'Apakah Anda yakin ingin memperbarui data akun ini?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, Update',
                        cancelButtonText: 'Batal',
                        confirmButtonColor: '#2563eb',
                        cancelButtonColor: '#6c757d'
                    }).then((result) => {
                        if (!result.isConfirmed) return;

                        fetch("{{ route('akun.update', $account->id) }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                "Accept": "application/json",
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                _method: "PUT",
                                name: document.querySelector('[name="name"]').value,
                                email: document.querySelector('[name="email"]').value,
                                password: document.querySelector('[name="password"]').value
                            })
                        })
                        .then(response => {
                            if (!response.ok) throw response;
                            return response.json();
                        })
                        .then(data => {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: 'Data akun berhasil diperbarui',
                                confirmButtonText: 'OK',
                                confirmButtonColor: '#2563eb'
                            }).then(() => {
                                window.location.href = "{{ route('account') }}";
                            });
                        })
                        .catch(async error => {
                            let res = await error.json();
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
