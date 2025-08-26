@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Daftar Hero</h2>

        <div class="d-flex gap-2 mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">⬅ Kembali ke Dashboard</a>
            <a href="{{ route('admin.hero.create') }}" class="btn btn-success">Tambah Hero</a>
        </div>

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
                        <td><img src="{{ asset($hero->image) }}" width="100"></td>
                        <td>
                            @if ($hero->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <form action="{{ route('admin.hero.toggle', $hero->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm {{ $hero->status ? 'btn-secondary' : 'btn-success' }}">
                                        {{ $hero->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>

                                <a href="{{ route('admin.hero.edit', $hero->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                <form action="{{ route('admin.hero.destroy', $hero->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus?')">Hapus</button>
                                </form>
                            </div>
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
