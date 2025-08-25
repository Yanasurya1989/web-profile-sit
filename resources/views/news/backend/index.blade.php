@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row align-items-center mb-4">
            <div class="col-auto">
                {{-- Logo otomatis sudah ada di layout --}}
            </div>
            <div class="mt-5">
                <h2 class="mb-4">Manajemen Berita</h2>
            </div>

        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.news.create') }}" class="btn btn-primary mb-3">+ Tambah Berita</a>

        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Gambar</th>
                    <th>Status</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($item->title, 30) }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}</td>
                        <td>
                            @if ($item->image)
                                <img src="{{ asset($item->image) }}" alt="img" width="80">
                            @else
                                -
                            @endif
                        </td>
                        <td>
                            @if ($item->status)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                <form action="{{ route('admin.news.toggle-status', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm {{ $item->status ? 'btn-secondary' : 'btn-success' }}">
                                        {{ $item->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>

                                <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin mau hapus berita ini?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $news->links() }}
        </div>
    </div>
@endsection
