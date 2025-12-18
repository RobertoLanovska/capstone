@extends('layout.master-admin')
@section('title','Akun')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="mb-0">Manajemen Akun</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="admin">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Akun
                </li>
            </ol>
        </nav>
    </div>

    <br>
    <a href="{{ route('akun.create') }}" class="btn btn-primary mb-3">
         Tambah Akun
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
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($account as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <a href="{{ route('akun.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                Edit
                            </a>
                            <form action="{{ route('akun.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin hapus akun ini?')">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
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
        let nama = rows[i].getElementsByTagName("td")[0];
        let email = rows[i].getElementsByTagName("td")[1];

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
