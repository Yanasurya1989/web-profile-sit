@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <h3>Edit Navbar</h3>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.navbar.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Logo</label>
                <input type="file" name="logo" class="form-control">
                @if ($navbar && $navbar->logo)
                    <img src="{{ asset('storage/' . $navbar->logo) }}" alt="Logo" width="120" class="mt-2">
                @endif
            </div>

            <h5>Menu</h5>
            <div id="menus-wrapper">
                @if ($navbar && $navbar->menus)
                    @foreach ($navbar->menus as $i => $menu)
                        <div class="menu-item mb-2">
                            <input type="text" name="menus[{{ $i }}][title]" placeholder="Judul"
                                value="{{ $menu['title'] }}" class="form-control mb-1">
                            <input type="text" name="menus[{{ $i }}][link]" placeholder="Link"
                                value="{{ $menu['link'] }}" class="form-control mb-1">
                        </div>
                    @endforeach
                @endif
            </div>

            <button type="button" id="add-menu" class="btn btn-secondary mb-3">Tambah Menu</button>

            <div class="mb-3">
                <label>Tombol Daftar (Label)</label>
                <input type="text" name="button_label" class="form-control"
                    value="{{ $navbar->button_label ?? 'Daftar Sekarang' }}">
            </div>

            <div class="mb-3">
                <label>Tombol Daftar (Link)</label>
                <input type="text" name="button_link" class="form-control"
                    value="{{ $navbar->button_link ?? '#register' }}">
            </div>

            <button type="submit" class="btn btn-success">Simpan Navbar</button>
        </form>
    </div>

    <script>
        document.getElementById('add-menu').addEventListener('click', function() {
            const wrapper = document.getElementById('menus-wrapper');
            const index = wrapper.children.length;
            const html = `
            <div class="menu-item mb-2">
                <input type="text" name="menus[${index}][title]" placeholder="Judul" class="form-control mb-1">
                <input type="text" name="menus[${index}][link]" placeholder="Link" class="form-control mb-1">
            </div>
        `;
            wrapper.insertAdjacentHTML('beforeend', html);
        });
    </script>
@endsection
