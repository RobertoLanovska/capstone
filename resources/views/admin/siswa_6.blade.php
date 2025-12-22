@extends('layout.master-admin')
@section('title','Siswa')

@section('content')
<div class="page-heading">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Data Siswa</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Siswa</li>
            </ol>
        </nav>
    </div>

    <a href="{{ route('siswa_6.create') }}" class="btn btn-primary mb-3">
         Tambah Siswa
    </a>
    <a href="{{ route('siswa_6.export.excel') }}"
        class="btn btn-success mb-3">
        <i class="bi bi-file-earmark-excel"></i> Download Excel
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
                    <th>NISN</th>
                    <th>Alamat</th>
                    <th>Tgl Lahir</th>
                    <th>Wali</th>
                    <th>Telepon</th>
                    <th>Tgl Masuk</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($siswa_6 as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->wali_murid }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>{{ $item->tanggal_masuk }}</td>
                    <td>
                        <a href="{{ route('siswa_6.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <button class="btn btn-sm btn-danger"
                                    onclick="confirmDelete({{ $item->id }})">
                                Hapus
                        </button>

                            <form id="delete-form-{{ $item->id }}"
                                action="{{ route('siswa_6.destroy', $item->id) }}"
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
        let nama = rows[i].getElementsByTagName("td")[0];
        let nisn = rows[i].getElementsByTagName("td")[1];
        let alamat = rows[i].getElementsByTagName("td")[2];
        let tglLahir = rows[i].getElementsByTagName("td")[3];
        let wali = rows[i].getElementsByTagName("td")[4];
        let telepon = rows[i].getElementsByTagName("td")[5];
        let tglMasuk = rows[i].getElementsByTagName("td")[6];

        if (nama && nisn && alamat && tglLahir && wali && telepon && tglMasuk) {
            let textNama = nama.textContent.toLowerCase();
            let textNisn = nisn.textContent.toLowerCase();
            let textAlamat = alamat.textContent.toLowerCase();
            let textTglLahir = tglLahir.textContent.toLowerCase();
            let textWali = wali.textContent.toLowerCase();
            let textTelepon = telepon.textContent.toLowerCase();
            let textTglMasuk = tglMasuk.textContent.toLowerCase();

            if (textNama.includes(input) || textNisn.includes(input) || textAlamat.includes(input) 
                || textTglLahir.includes(input) || textWali.includes(input) || textTelepon.includes(input)
                || textTglMasuk.includes((input))) {
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
            title: 'Hapus siswa?',
            text: 'Data siswa yang dihapus tidak dapat dikembalikan!',
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
                        text: 'data siswa berhasil dihapus',
                        confirmButtonColor: '#2563eb'
                    }).then(() => {
                        location.reload(); // atau redirect
                    });
                })
                .catch(() => {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Gagal menghapus siswa'
                    });
                });
            }
        });
    }
</script>
@endsection
