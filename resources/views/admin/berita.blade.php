@extends('layout.master-admin')
@section('title','Berita')

@section('content')
<div class="page-heading">
    <h3>Data Berita</h3>

    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">
        + Tambah Berita
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Foto</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th width="150">Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($berita as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->foto) }}"
                             width="80" class="rounded">
                    </td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                    <td>
                        <a href="{{ route('berita.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('berita.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus berita ini?')">
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
