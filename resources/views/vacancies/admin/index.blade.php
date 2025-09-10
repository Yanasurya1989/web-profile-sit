@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mb-4 mt-5 pt-5">Manajemen Lowongan</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('admin.vacancies.create') }}" class="btn btn-primary">Tambah Vacancy</a>

        <div class="table-responsive">
            <table class="table table-bordered align-middle mt-4">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th>Posted</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vacancies as $vacancy)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $vacancy->title }}</td>
                            <td>
                                @if ($vacancy->status === 'open')
                                    <span class="badge bg-success">Open</span>
                                @else
                                    <span class="badge bg-danger">Closed</span>
                                @endif
                            </td>
                            <td>
                                @if ($vacancy->is_active)
                                    <span class="badge bg-primary">Active</span>
                                @else
                                    <span class="badge bg-secondary">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $vacancy->created_at->format('d M Y') }}</td>
                            <td class="text-center">
                                <!-- Toggle Active -->
                                <form action="{{ route('admin.vacancies.toggle', $vacancy->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-warning">
                                        {{ $vacancy->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </button>
                                </form>

                                <!-- Toggle Open/Closed -->
                                {{-- <form action="{{ route('admin.vacancies.toggle-status', $vacancy->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-info">
                                        {{ $vacancy->status === 'open' ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
                                    </button>
                                </form> --}}

                                <!-- Toggle Status Open/Closed -->
                                <form action="{{ route('admin.vacancies.toggle-status', $vacancy->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="btn btn-sm {{ $vacancy->status === 'open' ? 'btn-secondary' : 'btn-success' }}">
                                        {{ $vacancy->status === 'open' ? 'Tutup' : 'Buka' }}
                                    </button>
                                </form>

                                <!-- Edit -->
                                <a href="{{ route('admin.vacancies.edit', $vacancy->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <!-- Delete -->
                                <form action="{{ route('admin.vacancies.destroy', $vacancy->id) }}" method="POST"
                                    class="d-inline" onsubmit="return confirm('Yakin hapus lowongan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Belum ada lowongan</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
