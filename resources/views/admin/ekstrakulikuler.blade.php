@extends('layout.master-admin')
@section('title','Ekstrakulikuler')

@section('content')
<div class="page-heading">
    <h3>Data Ekstrakulikuler</h3>

    <a href="{{ route('ekstrakulikuler.create') }}" class="btn btn-primary mb-3">
        Tambah Data
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kegiatan</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ekstrakulikuler as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->foto) }}"
                             width="60" class="rounded">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jadwal }}</td>
   
                    <td>
                        <a href="{{ route('ekstrakulikuler.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('ekstrakulikuler.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus data ekstrakulikuler?')">
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
@endsection
