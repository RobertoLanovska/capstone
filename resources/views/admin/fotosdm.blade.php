@extends('layout.master-admin')
@section('title','fotosdm')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Foto SDM</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Foto SDM
                </li>
            </ol>
        </nav>
    </div>
    <!-- <a href="{{ route('fotosdm.create') }}" class="btn btn-primary mb-3">
        + Tambah Foto SDM
    </a> -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="accountTable">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($fotosdm as $item)
                    <tr>
                        <td>
                            <img 
                                src="{{ asset('storage/'.$item->foto) }}"
                                width="80"
                                class="rounded"
                            >
                        </td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->deskripsi }}</td>
                        <td>
                            <a href="{{ route('fotosdm.edit', $item->id) }}"
                                class="btn btn-sm btn-warning">
                                Edit
                            </a>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">
                            Data Foto SDM belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- SweetAlert Delete --}}
<!-- <script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Hapus Foto SDM?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, Hapus',
        cancelButtonText: 'Batal',
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6c757d'
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(
                document.getElementById(`delete-form-${id}`).action,
                {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: new URLSearchParams({
                        _method: 'DELETE'
                    })
                }
            )
            .then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: 'Foto SDM berhasil dihapus',
                    confirmButtonColor: '#2563eb'
                }).then(() => {
                    location.reload();
                });
            })
            .catch(() => {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal',
                    text: 'Gagal menghapus Foto SDM'
                });
            });
        }
    });
}
</script> -->
@endsection
