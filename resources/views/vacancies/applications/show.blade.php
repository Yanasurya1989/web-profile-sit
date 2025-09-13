@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2 class="mb-4">Pelamar untuk Lowongan: {{ $vacancy->title }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pelamar</th>
                    <th>Jenis Kelamin</th>
                    <th>Sekolah/Universitas</th>
                    <th>Nilai/IPK</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applications as $app)
                    <tr>
                        <td>{{ $app->nama_pelamar }}</td>
                        <td>{{ $app->jenis_kelamin }}</td>
                        <td>{{ $app->sekolah_universitas }}</td>
                        <td>{{ $app->nilai_ipk }}</td>
                        <td>
                            @if ($app->status === 'accepted')
                                <span class="badge bg-success">Diterima</span>
                            @elseif ($app->status === 'rejected')
                                <span class="badge bg-danger">Ditolak</span>
                            @elseif ($app->status === 'process')
                                <span class="badge bg-secondary">Diproses</span>
                            @else
                                <span class="badge bg-warning">Belum ada status</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.applications.detil', $app->id) }}" class="btn btn-sm btn-info">
                                Lihat Detil
                            </a>

                            {{-- Tombol ubah status --}}
                            <form action="{{ route('admin.applications.updateStatus', $app->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="accepted">
                                <button type="submit" class="btn btn-sm btn-success"
                                    onclick="return confirm('Yakin ingin menerima pelamar ini?')">Terima</button>
                            </form>

                            <form action="{{ route('admin.applications.updateStatus', $app->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="rejected">
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Yakin ingin menolak pelamar ini?')">Tolak</button>
                            </form>

                            <form action="{{ route('admin.applications.updateStatus', $app->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="process">
                                <button type="submit" class="btn btn-sm btn-secondary"
                                    onclick="return confirm('Ubah status jadi diproses?')">Proses</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pelamar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection

@push('scripts')
    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.querySelectorAll('.status-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                let form = this.closest('form');
                let statusText = this.options[this.selectedIndex].text;

                Swal.fire({
                    title: 'Yakin?',
                    text: `Status akan diubah menjadi "${statusText}".`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ubah!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    } else {
                        this.selectedIndex = 0;
                    }
                });
            });
        });

        // ✅ Notifikasi sukses
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        // ❌ Notifikasi error
        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                showConfirmButton: true
            });
        @endif
    </script>
@endpush
