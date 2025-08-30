@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Tambah Detil SD</h2>

        <form action="{{ route('admin.detil-sd.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" class="form-control" required>
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.detil-sd.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
