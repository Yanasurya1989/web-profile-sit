@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Quote Alumni</h1>

        <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary mb-3">+ Tambah Alumni</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Tahun Lulus</th>
                        <th>Quote</th>
                        <th width="180px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($alumnis as $alumni)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if ($alumni->photo)
                                    <img src="{{ asset($alumni->photo) }}" alt="{{ $alumni->name }}" class="rounded-circle"
                                        style="width:60px; height:60px; object-fit:cover;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $alumni->name }}</td>
                            <td>{{ $alumni->graduation_year ?? '-' }}</td>
                            <td>"{{ Str::limit($alumni->quote, 50) }}"</td>
                            <td>
                                <a href="{{ route('admin.alumni.edit', $alumni->id) }}"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.alumni.destroy', $alumni->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin hapus alumni ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada data alumni.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $alumnis->links() }}
        </div>
    </div>
@endsection
