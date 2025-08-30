@extends('layouts.app')

@section('content')
    <div class="container py-5 my-5">
        <h2 class="mb-4">Manajemen Detil Jenjang</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-success mb-3">⬅ Kembali ke Dashboard</a>
        <a href="{{ route('admin.detil-jenjang.create') }}" class="btn btn-primary mb-3">+ Tambah Data</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Level</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detils as $detil)
                    <tr>
                        <td>{{ $detil->level }}</td>
                        <td>
                            @if ($detil->gambar)
                                <img src="{{ asset('storage/' . $detil->gambar) }}" width="100">
                            @endif
                        </td>

                        <td>
                            <form action="{{ route('admin.detil-jenjang.toggle', $detil) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit"
                                    class="btn btn-sm {{ $detil->status ? 'btn-success' : 'btn-secondary' }}">
                                    {{ $detil->status ? 'Active' : 'Inactive' }}
                                </button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.detil-jenjang.edit', $detil) }}"
                                class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.detil-jenjang.destroy', $detil) }}" method="POST"
                                class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
