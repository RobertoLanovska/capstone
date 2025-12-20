@extends('layout.master-admin')
@section('title','Prestasi')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Data Prestasi</h3>
        <br>
        <br>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Prestasi
                </li>
            </ol>
        </nav>
    </div>

    <a href="{{ route('prestasi.create') }}" class="btn btn-primary mb-3">
         Tambah Prestasi
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
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($prestasi as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->foto) }}"
                             width="80" class="rounded">
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td>
                        <a href="{{ route('prestasi.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('prestasi.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus prestasi ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
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
        let email = rows[i].getElementsByTagName("td")[2];

        if (nama && email) {
            let textNama = nama.textContent.toLowerCase();
            let textEmail = email.textContent.toLowerCase();

            if (textNama.includes(input) || textEmail.includes(input)) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}
</script>
@endsection
