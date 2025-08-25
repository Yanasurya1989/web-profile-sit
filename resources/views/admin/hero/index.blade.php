@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Hero</h2>
        <a href="{{ route('admin.hero.create') }}" class="btn btn-success mb-3">Tambah Hero</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($heroes as $hero)
                    <tr>
                        <td>{{ $hero->title }}</td>
                        <td>{{ Str::limit($hero->description, 50) }}</td>
                        <td><img src="{{ asset('storage/' . $hero->image) }}" width="100"></td>
                        <td>{{ $hero->status ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>
                            <a href="{{ route('admin.hero.edit', $hero) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.hero.destroy', $hero) }}" method="POST"
                                style="display:inline-block">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
