@extends('layout.master-admin')
@section('title','Guru')

@section('content')
<div class="page-heading">
    <h3>Data Guru</h3>

    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
        + Tambah Guru
    </a>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
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
                @foreach ($guru as $item)
                <tr>
                    <td>
                        <img src="{{ asset('storage/'.$item->profile) }}"
                             width="60" class="rounded">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jabatan }}</td>
                    <td>{{ $item->telepon }}</td>
                    <td>
                        <a href="{{ route('guru.edit', $item->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('guru.destroy', $item->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Hapus data guru?')">
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
