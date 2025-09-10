@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="mt-5 pt-5">Tambah Lowongan</h2>
        <form action="{{ route('admin.vacancies.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Kualifikasi</label>
                <div id="qualification-wrapper">
                    <input type="text" name="qualifications[]" class="form-control mb-2"
                        placeholder="Masukkan kualifikasi">
                </div>
                <button type="button" id="add-qualification" class="btn btn-sm btn-outline-success">+ Tambah</button>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                </select>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" name="is_active" value="1" class="form-check-input" checked>
                <label class="form-check-label">Active</label>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>

    <script>
        document.getElementById('add-qualification').addEventListener('click', function() {
            let wrapper = document.getElementById('qualification-wrapper');
            let input = document.createElement('input');
            input.type = "text";
            input.name = "qualifications[]";
            input.className = "form-control mb-2";
            input.placeholder = "Masukkan kualifikasi";
            wrapper.appendChild(input);
        });
    </script>
@endsection
