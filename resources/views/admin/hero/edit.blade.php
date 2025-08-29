@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Edit Hero</h2>

        <form action="{{ route('admin.hero.update', $hero) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="title" class="form-control" value="{{ $hero->title }}" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" required>{{ $hero->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Gambar</label><br>
                <img src="{{ asset($hero->image) }}" width="150" class="mb-2">
                <input type="file" name="image" class="form-control">
            </div>

            {{-- Tombol Primary --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Teks Tombol Utama</label>
                    <input type="text" name="btn_primary_text" class="form-control" value="{{ $hero->btn_primary_text }}"
                        placeholder="Contoh: Pelajari Lebih Lanjut">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Link Tombol Utama</label>
                    <input type="text" name="btn_primary_link" class="form-control" value="{{ $hero->btn_primary_link }}"
                        placeholder="https://contoh.com/primary">
                </div>
            </div>

            {{-- Tombol Secondary --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Teks Tombol Kedua</label>
                    <input type="text" name="btn_secondary_text" class="form-control"
                        value="{{ $hero->btn_secondary_text }}" placeholder="Contoh: Hubungi Kami">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Link Tombol Kedua</label>
                    <input type="text" name="btn_secondary_link" class="form-control"
                        value="{{ $hero->btn_secondary_link }}" placeholder="https://contoh.com/secondary">
                </div>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control" required>
                    <option value="1" {{ $hero->status ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ !$hero->status ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <button class="btn btn-warning">Update</button>
            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
