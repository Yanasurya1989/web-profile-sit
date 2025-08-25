@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Dashboard Admin</h1>

        <div class="row">
            <!-- Kelola Berita -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Berita</h5>
                        <p class="card-text">Tambah, edit, dan hapus berita terbaru.</p>
                        <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Lihat Berita</a>
                    </div>
                </div>
            </div>

            <!-- Kelola Hero -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kelola Hero</h5>
                        <p class="card-text">Atur slider carousel pada halaman depan.</p>
                        <a href="{{ route('admin.hero.index') }}" class="btn btn-success">Lihat Hero</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
