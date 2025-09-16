@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Instagram Embeds</h2>
        <a href="{{ route('admin.instagram.create') }}" class="btn btn-primary mb-3">Tambah Embed</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Preview</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($embeds as $item)
                    <tr>
                        <td>{{ $item->title }}</td>
                        <td>
                            {{ Str::limit(strip_tags($item->description), 50) }}
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal"
                                data-bs-target="#descModal{{ $item->id }}">
                                Show
                            </button>

                            <!-- Modal Deskripsi -->
                            <div class="modal fade" id="descModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Deskripsi: {{ $item->title }}</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body">
                                            {!! $item->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td style="width: 250px;">{!! $item->embed_code !!}</td>
                        <td>{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                        <td>
                            <a href="{{ route('admin.instagram.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.instagram.destroy', $item->id) }}" method="POST"
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
