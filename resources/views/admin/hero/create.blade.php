@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Tambah Hero</h2>

        <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label>
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1">Aktif</option>
                    <option value="0">Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
