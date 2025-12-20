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

    <a href="{{ route('siswa_3.create') }}" class="btn btn-primary mb-3">
         Tambah Siswa
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
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($siswa_3 as $item)
                <tr>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->tanggal_lahir }}</td>
                    <td>{{ $item->wali_murid }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <a href="{{ route('siswa_3.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('siswa_3.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus data siswa?')">
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
        let nama = rows[i].getElementsByTagName("td")[0];
        let nisn = rows[i].getElementsByTagName("td")[1];
        let alamat = rows[i].getElementsByTagName("td")[2];
        let tglLahir = rows[i].getElementsByTagName("td")[3];
        let wali = rows[i].getElementsByTagName("td")[4];
        let telepon = rows[i].getElementsByTagName("td")[5];

        if (nama && nisn && alamat && tglLahir && wali && telepon) {
            let textNama = nama.textContent.toLowerCase();
            let textNisn = nisn.textContent.toLowerCase();
            let textAlamat = alamat.textContent.toLowerCase();
            let textTglLahir = tglLahir.textContent.toLowerCase();
            let textWali = wali.textContent.toLowerCase();
            let textTelepon = telepon.textContent.toLowerCase();

            if (textNama.includes(input) || textNisn.includes(input) || textAlamat.includes(input) 
                || textTglLahir.includes(input) || textWali.includes(input) || textTelepon.includes(input)
                ) {
                rows[i].style.display = "";
            } else {
                rows[i].style.display = "none";
            }
        }
    }
}
</script>
@endsection
