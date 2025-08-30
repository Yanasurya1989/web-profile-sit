@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-3 mt-5 pt-5">Kelola Muwashofat</h2>
        <a href="{{ route('admin.muwashofat.create') }}" class="btn btn-primary mb-3">Tambah</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($muwashofats as $m)
                    <tr>
                        <td><img src="{{ asset('storage/' . $m->image) }}" width="100"></td>
                        <td>{{ $m->title }}</td>
                        <td>{{ Str::limit($m->description, 50) }}</td>
                        <td>{{ $m->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>
                            <a href="{{ route('admin.muwashofat.edit', $m->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.muwashofat.destroy', $m->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Yakin hapus?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $muwashofats->links() }}
    </div>
@endsection
