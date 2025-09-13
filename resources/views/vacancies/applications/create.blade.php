@extends('layouts.app')

@section('content')
    <div class="container">

        <h2 class="mb-4 text-success fw-bold mt-5 pt-5">Form Lamaran</h2>

        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Ups! Ada kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Pilihan Lowongan -->
            @if ($selectedVacancyId)
                {{-- Sudah dipilih dari tombol "Daftar" --}}
                <input type="hidden" name="vacancy_id" value="{{ $selectedVacancyId }}">
                <div class="alert alert-info">
                    Anda sedang melamar untuk posisi:
                    <strong>{{ $vacancies->firstWhere('id', $selectedVacancyId)->title ?? 'Lowongan tidak ditemukan' }}</strong>
                </div>
            @else
                {{-- User masuk manual ke /apply --}}
                <div class="mb-3">
                    <label class="form-label">Pilih Lowongan</label>
                    @foreach ($vacancies as $v)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="vacancy_id" value="{{ $v->id }}">
                            <label class="form-check-label">{{ $v->title }}</label>
                        </div>
                    @endforeach
                </div>
            @endif

            <!-- Nama -->
            <div class="mb-3">
                <label class="form-label">Nama Pelamar</label>
                <input type="text" name="nama_pelamar" class="form-control">
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <div>
                    <input type="radio" name="jenis_kelamin" value="L"> Laki-laki
                    <input type="radio" name="jenis_kelamin" value="P"> Perempuan
                </div>
            </div>

            <!-- Tempat, Tanggal Lahir -->
            <div class="mb-3">
                <label class="form-label">Tempat, Tanggal Lahir</label>
                <div class="d-flex gap-2">
                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat">
                    <input type="date" name="tanggal_lahir" class="form-control">
                </div>
            </div>

            <!-- Alamat -->
            <div class="mb-3">
                <label class="form-label">Alamat Lengkap</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

            <!-- Nomor WA -->
            <div class="mb-3">
                <label class="form-label">Nomor WA</label>
                <input type="text" name="nomor_wa" class="form-control">
            </div>

            <!-- Jurusan -->
            <div class="mb-3">
                <label class="form-label">Jurusan</label>
                <input type="text" name="jurusan" class="form-control">
            </div>

            <!-- Sekolah / Universitas -->
            <div class="mb-3">
                <label class="form-label">Sekolah / Universitas</label>
                <input type="text" name="sekolah_universitas" class="form-control">
            </div>

            <!-- Nilai / IPK -->
            <div class="mb-3">
                <label class="form-label">Nilai / IPK Akhir</label>
                <input type="text" name="nilai_ipk" class="form-control">
            </div>

            <!-- Tilawah -->
            <div class="mb-3">
                <label class="form-label">Jumlah Lembar Tilawah</label>
                <input type="number" name="jumlah_lembar_tilawah" class="form-control">
            </div>

            <!-- Hafalan -->
            <div class="mb-3">
                <label class="form-label">Apakah Hafalan Sudah Bersanad?</label>
                <input type="checkbox" name="hafalan_bersanad" value="1">
            </div>

            <!-- Riwayat Penyakit -->
            <div class="mb-3">
                <label class="form-label">Riwayat Penyakit</label>
                <textarea name="riwayat_penyakit" class="form-control"></textarea>
            </div>

            <!-- Uploads -->
            <div class="mb-3">
                <label class="form-label">Surat Lamaran</label>
                <input type="file" name="surat_lamaran" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">CV</label>
                <input type="file" name="cv" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Transkrip Nilai</label>
                <input type="file" name="transkrip_nilai" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Foto</label>
                <input type="file" name="foto" class="form-control">
            </div>

            <button type="submit" class="btn btn-success px-4">Kirim Lamaran</button>
        </form>
    </div>
@endsection
