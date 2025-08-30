@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Edit Detil SD</h2>

        <form action="{{ route('admin.detil-sd.update', $detil_sd->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="gambar">Upload Gambar Baru (opsional)</label>
                <input type="file" name="gambar" class="form-control">
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            @if ($detil_sd->gambar)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $detil_sd->gambar) }}" alt="" width="200">
                </div>
            @endif
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.detil-sd.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
