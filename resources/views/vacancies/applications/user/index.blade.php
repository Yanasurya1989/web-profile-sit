@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <h2 class="mb-4">Lamaran Saya</h2>

        {{-- Modal sukses --}}
        @if (session('success'))
            <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content rounded-3 shadow">
                        <div class="modal-header bg-success text-white">
                            <h5 class="modal-title" id="successModalLabel">Berhasil</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{ session('success') }}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if ($applications->isEmpty())
            <div class="alert alert-info">
                Belum ada lamaran yang kamu ajukan.
                <a href="{{ route('vacancies.index') }}" class="btn btn-sm btn-success ms-2">
                    Lihat Lowongan
                </a>
            </div>
        @else
            <table class="table table-bordered shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>Lowongan</th>
                        <th>Tanggal Lamar</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($applications as $app)
                        <tr>
                            <td>{{ $app->vacancy->title ?? '-' }}</td>
                            <td>{{ $app->created_at->format('d M Y') }}</td>
                            <td>
                                @if ($app->status == 'accepted')
                                    <span class="badge bg-success">Diterima</span>
                                @elseif ($app->status == 'rejected')
                                    <span class="badge bg-danger">Ditolak</span>
                                @else
                                    <span class="badge bg-secondary">Diproses</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.applications.detil', $app->id) }}"
                                    class="btn btn-sm btn-primary">Lihat Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection

@push('scripts')
    @if (session('success'))
        <script>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        </script>
    @endif
@endpush
