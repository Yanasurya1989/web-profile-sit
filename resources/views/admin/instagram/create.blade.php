@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tambah Instagram Embed</h2>

        <form action="{{ route('admin.instagram.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Judul (opsional)</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label>Kode Embed Instagram</label>
                <textarea name="embed_code" class="form-control" rows="4" required></textarea>
                <small>Salin kode embed dari Instagram → paste di sini.</small>
            </div>

            <div class="mb-3">
                <label>Deskripsi (opsional)</label>
                <textarea id="summernote" name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" class="form-check-input" checked>
                <label class="form-check-label">Aktif</label>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
@endsection

@push('styles')
    {{-- Summernote CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
@endpush

@push('scripts')
    {{-- jQuery & Summernote JS --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link']],
                    ['view', ['codeview']]
                ]
            });
        });
    </script>
@endpush
