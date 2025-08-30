@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-3 pt-5 mt-5">Daftar Stats</h4>
        <a href="{{ route('stats.create') }}" class="btn btn-success mb-3">Tambah Stat</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Icon</th>
                    <th>Number</th>
                    <th>Label</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($stats as $stat)
                    <tr>
                        <td><i class="{{ $stat->icon }}"></i> ({{ $stat->icon }})</td>
                        <td>{{ $stat->number }}</td>
                        <td>{{ $stat->label }}</td>
                        <td>
                            <a href="{{ route('stats.edit', $stat->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('stats.destroy', $stat->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
