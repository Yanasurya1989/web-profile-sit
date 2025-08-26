@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="py-5 my-3">Manajemen About</h2>

        <div class="d-flex gap-2 mb-3">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">⬅ Kembali ke Dashboard</a>
            <a href="{{ route('admin.about.create') }}" class="btn btn-success">+ Tambah Data</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Subtitle</th>
                    <th>Title</th>
                    <th>Short Desc</th>
                    <th>Media</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($abouts as $about)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $about->subtitle }}</td>
                        <td>{{ $about->title }}</td>
                        <td>{{ Str::limit($about->short_desc, 50) }}</td>
                        <td>{{ $about->media_type }} - {{ $about->media_path }}</td>
                        <td>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input toggle-status" data-id="{{ $about->id }}"
                                    {{ $about->status ? 'checked' : '' }}>
                                <label class="form-check-label">
                                    {{ $about->status ? 'Aktif' : 'Nonaktif' }}
                                </label>
                            </div>
                        </td>
                        <td>
                            <a href="{{ route('admin.about.edit', $about->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.about.destroy', $about->id) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">Belum ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $abouts->links() }}
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('.toggle-status').forEach(function(el) {
            el.addEventListener('change', function() {
                let id = this.dataset.id;
                let status = this.checked ? 1 : 0;

                fetch(`/admin/about/${id}/toggle-status`, {
                        method: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            status: status
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            this.nextElementSibling.innerText = status ? "Aktif" : "Nonaktif";
                        } else {
                            alert("Gagal update status");
                        }
                    })
                    .catch(() => alert("Terjadi kesalahan"));
            });
        });
    </script>
@endpush
