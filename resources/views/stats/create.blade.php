@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-3 pt-5 mt-5">Tambah Stat</h4>

        <form action="{{ route('stats.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="icon" class="form-label">Icon</label>
                <select name="icon" id="icon" class="selectpicker" data-live-search="true"
                    data-style="btn-outline-secondary" data-width="100%" title="-- Pilih Icon --" required>
                    @foreach ($icons as $icon)
                        <option value="{{ $icon }}"
                            data-content='<i class="{{ $icon }}"></i>&nbsp; {{ $icon }}'>
                            {{ $icon }}
                        </option>
                    @endforeach
                </select>
                <div id="icon-preview" class="mt-3 text-center" style="font-size: 3rem; color: #319795;"></div>
            </div>

            <div class="mb-3">
                <label class="form-label">Number</label>
                <input type="number" name="number" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('stats.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const $icon = $('#icon');

            // Jika plugin tersedia, pakai bootstrap-select
            if (typeof $icon.selectpicker === 'function') {
                $icon.selectpicker();

                $icon.on('changed.bs.select', function() {
                    const v = $(this).val();
                    document.getElementById('icon-preview').innerHTML = v ? `<i class="${v}"></i>` : '';
                });
            } else {
                // Fallback kalau plugin gagal load: tampilkan select biasa
                $icon.removeClass('selectpicker');
                $icon.on('change', function() {
                    const v = this.value;
                    document.getElementById('icon-preview').innerHTML = v ? `<i class="${v}"></i>` : '';
                });
            }
        });
    </script>
@endpush
