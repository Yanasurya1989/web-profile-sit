@extends('layouts.app')

@section('content')
    <div class="container">
        <h4 class="mb-3 pt-5 mt-5">Edit Stat</h4>
        <form action="{{ route('stats.update', $stat->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="mb-3">
                <label class="form-label">Icon</label>
                <select name="icon" id="icon" class="form-select" required>
                    @foreach ($icons as $icon)
                        <option value="{{ $icon }}"
                            data-content='<i class="{{ $icon }}"></i> {{ $icon }}'
                            {{ $stat->icon == $icon ? 'selected' : '' }}>
                            {{ $icon }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Number</label>
                <input type="number" name="number" class="form-control" value="{{ $stat->number }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Label</label>
                <input type="text" name="label" class="form-control" value="{{ $stat->label }}" required>
            </div>
            <button class="btn btn-primary">Update</button>
            <a href="{{ route('stats.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    {{-- Load jQuery dan plugin Bootstrap Select --}}
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <script>
        $(function() {
            $('#icon').selectpicker({
                liveSearch: true,
                showIcon: true
            });
        });
    </script>
@endsection
