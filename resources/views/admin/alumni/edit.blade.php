@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Alumni</h1>

        <form action="{{ route('admin.alumni.update', $alumni->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama Alumni</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $alumni->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="graduation_year" class="form-label">Tahun Lulus</label>
                <input type="number" class="form-control" name="graduation_year"
                    value="{{ old('graduation_year', $alumni->graduation_year) }}">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Foto</label>
                @if ($alumni->photo)
                    <div class="mb-2">
                        <img src="{{ asset('storage/' . $alumni->photo) }}" alt="{{ $alumni->name }}" class="rounded-circle"
                            style="width:80px; height:80px; object-fit:cover;">
                    </div>
                @endif
                <input type="file" class="form-control" name="photo" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="quote" class="form-label">Quote</label>
                <textarea class="form-control" name="quote" rows="4" required>{{ old('quote', $alumni->quote) }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
