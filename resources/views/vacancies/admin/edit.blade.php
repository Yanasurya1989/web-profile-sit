@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Edit Lowongan</h2>

        <form action="{{ route('admin.vacancies.update', $vacancy->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                    value="{{ old('title', $vacancy->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label for="description" class="form-label">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $vacancy->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kualifikasi</label>
                <div id="qualification-wrapper">
                    @foreach (old('qualifications', $vacancy->qualifications ?? []) as $q)
                        <input type="text" name="qualifications[]" value="{{ $q }}" class="form-control mb-2">
                    @endforeach
                </div>
                <button type="button" id="add-qualification" class="btn btn-sm btn-outline-success">+ Tambah</button>
            </div>

            <script>
                document.getElementById('add-qualification').addEventListener('click', function() {
                    let wrapper = document.getElementById('qualification-wrapper');
                    let input = document.createElement('input');
                    input.type = "text";
                    input.name = "qualifications[]";
                    input.className = "form-control mb-2";
                    wrapper.appendChild(input);
                });
            </script>


            <!-- Status -->
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                    <option value="open" {{ old('status', $vacancy->status) === 'open' ? 'selected' : '' }}>Open</option>
                    <option value="closed" {{ old('status', $vacancy->status) === 'closed' ? 'selected' : '' }}>Closed
                    </option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Aktif / Tidak -->
            <div class="form-check mb-3">
                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1"
                    {{ old('is_active', $vacancy->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Aktifkan lowongan ini</label>
            </div>

            <!-- Tombol -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('admin.vacancies.adminIndex') }}" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection
