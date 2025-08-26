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

            {{-- Tombol Primary --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Teks Tombol Utama</label>
                    <input type="text" name="btn_primary_text" class="form-control"
                        placeholder="Contoh: Pelajari Lebih Lanjut">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Link Tombol Utama</label>
                    <input type="url" name="btn_primary_link" class="form-control"
                        placeholder="https://contoh.com/primary">
                </div>
            </div>

            {{-- Tombol Secondary --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Teks Tombol Kedua</label>
                    <input type="text" name="btn_secondary_text" class="form-control" placeholder="Contoh: Hubungi Kami">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Link Tombol Kedua</label>
                    <input type="url" name="btn_secondary_link" class="form-control"
                        placeholder="https://contoh.com/secondary">
                </div>
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
