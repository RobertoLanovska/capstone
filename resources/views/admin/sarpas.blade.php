@extends('layout.master-admin')
@section('title','Sarana & Prasarana')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Sarana & Prasana</h3>
        <br>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Sarpas
                </li>
            </ol>
        </nav>
    </div>

    <a href="{{ route('sarpas.create') }}" class="btn btn-primary mb-3">
         Tambah Ruangan
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
                    <th>Nama Ruangan</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($sarpas as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->foto) }}"
                             width="80" class="rounded">
                    </td>
                    <td>{{ $item->ruangan }}</td>
                    <td>
                        <a href="{{ route('sarpas.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $item->id }})">
                                Hapus
                        </button>

                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('sarpas.destroy', $item->id) }}"
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
      

        if (nama) {
            let textNama = nama.textContent.toLowerCase();
            

            if ((textNama.includes(input))) {
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
            title: 'Hapus Sarpas?',
            text: 'Data Sarpas yang dihapus tidak dapat dikembalikan!',
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
                        text: 'Sarpas berhasil dihapus',
                        confirmButtonColor: '#2563eb'
                    }).then(() => {
                        location.reload(); // atau redirect
                    });
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal menghapus sarpas'
                    });
                });
            }
        });
    }
</script>
@endsection
