@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Edit Detil Jenjang</h2>

        <form action="{{ route('admin.detil-jenjang.update', $detilJenjang->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Pilih Level --}}
            <div class="mb-3">
                <label class="form-label">Level</label>
                <select name="level" class="form-control" required>
                    <option value="SD" {{ $detilJenjang->level == 'SD' ? 'selected' : '' }}>SD</option>
                    <option value="SMP" {{ $detilJenjang->level == 'SMP' ? 'selected' : '' }}>SMP</option>
                    <option value="SMA" {{ $detilJenjang->level == 'SMA' ? 'selected' : '' }}>SMA</option>
                </select>
                @error('level')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Upload Gambar --}}
            <div class="mb-3">
                <label class="form-label">Gambar</label>
                <input type="file" name="gambar" class="form-control">
                @if ($detilJenjang->gambar)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $detilJenjang->gambar) }}" width="150">
                    </div>
                @endif
                @error('gambar')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- Link pendaftaran (opsional) --}}
            <div class="mb-3">
                <label class="form-label">Link Pendaftaran (opsional)</label>
                <input type="url" name="link_pendaftaran" class="form-control"
                    value="{{ old('link_pendaftaran', $detilJenjang->link_pendaftaran ?? '') }}"
                    placeholder="https://example.com/pendaftaran">
                @error('link_pendaftaran')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.detil-jenjang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
