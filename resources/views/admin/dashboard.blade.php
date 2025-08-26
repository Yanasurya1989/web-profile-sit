@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard Admin</h1>

        <div class="row">
            <!-- Kelola Berita -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Berita</h5>
                        <p class="card-text">Tambah, edit, dan hapus berita terbaru.</p>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Lihat Berita</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Hero -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Hero</h5>
                        <p class="card-text">Atur slider carousel pada halaman depan.</p>
                        <a href="{{ route('admin.hero.index') }}" class="btn btn-success">Lihat Hero</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Card -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Card</h5>
                        <p class="card-text">Atur konten card di halaman depan.</p>
                        <a href="#" class="btn btn-info">Lihat Card</a>
                    </div>
                </div>
            </div>

            <!-- Kelola About -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola About</h5>
                        <p class="card-text">Edit informasi tentang kami.</p>
                        <a href="{{ route('admin.about.index') }}" class="btn btn-warning">Lihat About</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Muwashofat -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Muwashofat</h5>
                        <p class="card-text">Atur konten muwashofat di halaman depan.</p>
                        <a href="#" class="btn btn-danger">Lihat Muwashofat</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Register -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Register</h5>
                        <p class="card-text">Atur form pendaftaran siswa baru.</p>
                        <a href="#" class="btn btn-dark">Lihat Register</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Footer -->
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Footer</h5>
                        <p class="card-text">Atur informasi footer (kontak, sosmed, dll).</p>
                        <a href="#" class="btn btn-secondary">Lihat Footer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
