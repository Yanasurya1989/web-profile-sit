@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Edit Instagram Embed</h2>

        <form action="{{ route('admin.instagram.update', $instagram->id) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Judul (opsional)</label>
                <input type="text" name="title" class="form-control" value="{{ $instagram->title }}">
            </div>

            <div class="mb-3">
                <label>Kode Embed Instagram</label>
                <textarea name="embed_code" class="form-control" rows="4" required>{{ $instagram->embed_code }}</textarea>
            </div>

            <div class="mb-3">
                <label>Deskripsi (opsional)</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" class="form-check-input"
                    {{ $instagram->is_active ? 'checked' : '' }}>
                <label class="form-check-label">Aktif</label>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
