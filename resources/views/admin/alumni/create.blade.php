@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Tambah Alumni</h1>

        <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nama Alumni</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="graduation_year" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control" name="graduation_year" value="{{ old('graduation_year') }}"
                    placeholder="Contoh: 2020">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" class="form-control" name="photo" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="quote" class="form-label">Quote</label>
                <textarea class="form-control" name="quote" rows="4" required>{{ old('quote') }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
