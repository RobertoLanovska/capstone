@extends('layout.master-admin')
@section('title','Karyawan')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Karyawan</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Karyawan
                </li>
            </ol>
        </nav>
    </div>

    <a href="{{ route('karyawan.create') }}" class="btn btn-primary mb-3">
         Tambah Karyawan
    </a>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3 ">
                <div class="col-md-4">
                    <input type="text"
                    id="searchInput"
                    class="form-control"
                    placeholder="Cari"
                    onkeyup="searchTable()">

                </div>
              
            </div>
            <table class="table table-striped" id="accountTable">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Telepon</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($karyawan as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->profile) }}"
                             width="60" class="rounded">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <a href="{{ route('karyawan.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $item->id }})">
                                Hapus
                        </button>

                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('karyawan.destroy', $item->id) }}"
                                method="POST"
                                class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function searchTable() {
    let input = document.getElementById("searchInput").value.toLowerCase();
    let table = document.getElementById("accountTable");
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let nama = rows[i].getElementsByTagName("td")[1];
        let jabatan = rows[i].getElementsByTagName("td")[2];
        let telepon = rows[i].getElementsByTagName("td")[3];

        if (nama && jabatan && telepon) {
            let textNama = nama.textContent.toLowerCase();
            let textJabatan = jabatan.textContent.toLowerCase();
            let textTelepon = telepon.textContent.toLowerCase();

            if (
                textNama.includes(input) ||
                textJabatan.includes(input) ||
                textTelepon.includes(input)
            ) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }

}
</script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Hapus Karyawan?',
            text: 'Data Karyawan yang dihapus tidak dapat dikembalikan!',
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
                .then(response => response.json())
                .then(data => {
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Karyawam berhasil dihapus',
                        confirmButtonColor: '#2563eb'
                    }).then(() => {
                        location.reload(); // atau redirect
                    });
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal menghapus karyawan'
                    });
                });
            }
        });
    }
</script>
@endsection
