@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="row g-0">
                <!-- Foto -->
                <div class="col-md-4 text-center bg-light d-flex align-items-center justify-content-center p-4">
                    @if ($application->foto)
                        <img src="{{ asset('storage/' . $application->foto) }}" class="img-fluid rounded-circle shadow-sm"
                            style="max-width: 250px;" alt="Foto Pelamar">
                    @else
                        <div class="text-muted fst-italic">Tidak ada foto</div>
                    @endif
                </div>

                <!-- Biodata -->
                <div class="col-md-8 p-4">
                    <h3 class="fw-bold text-success mb-3">{{ $application->nama_pelamar }}</h3>
                    <p><strong>Jenis Kelamin:</strong> {{ $application->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                    </p>
                    <p><strong>Tempat, Tanggal Lahir:</strong> {{ $application->tempat_lahir }},
                        {{ \Carbon\Carbon::parse($application->tanggal_lahir)->format('d M Y') }}</p>
                    <p><strong>Alamat:</strong> {{ $application->alamat }}</p>
                    <p><strong>Nomor WA:</strong> {{ $application->nomor_wa }}</p>
                    <p><strong>Jurusan:</strong> {{ $application->jurusan }}</p>
                    <p><strong>Sekolah / Universitas:</strong> {{ $application->sekolah_universitas }}</p>
                    <p><strong>Nilai / IPK:</strong> {{ $application->nilai_ipk }}</p>
                    <p><strong>Jumlah Lembar Tilawah:</strong> {{ $application->jumlah_lembar_tilawah }}</p>
                    <p><strong>Hafalan Bersanad:</strong> {{ $application->hafalan_bersanad ? 'Ya' : 'Belum' }}</p>
                    <p><strong>Riwayat Penyakit:</strong> {{ $application->riwayat_penyakit ?? '-' }}</p>

                    <hr>

                    <!-- File -->
                    <h5 class="fw-bold mt-3">Lampiran</h5>
                    <ul class="list-unstyled">
                        @if ($application->surat_lamaran)
                            <li><a href="{{ asset('storage/' . $application->surat_lamaran) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary me-2 mb-2">Surat Lamaran</a></li>
                        @endif
                        @if ($application->cv)
                            <li><a href="{{ asset('storage/' . $application->cv) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary me-2 mb-2">CV</a></li>
                        @endif
                        @if ($application->transkrip_nilai)
                            <li><a href="{{ asset('storage/' . $application->transkrip_nilai) }}" target="_blank"
                                    class="btn btn-sm btn-outline-primary me-2 mb-2">Transkrip Nilai</a></li>
                        @endif
                    </ul>

                    <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
