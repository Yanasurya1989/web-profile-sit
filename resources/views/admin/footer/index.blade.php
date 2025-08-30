@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <h2>Manajemen Footer</h2>

        @if (session('success'))
            <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif

        @if ($footer)
            <div class="card mt-4">
                <div class="card-body">
                    @if ($footer->logo)
                        <img src="{{ asset('storage/' . $footer->logo) }}" alt="Logo" width="80" class="mb-3">
                    @endif

                    <h4>{{ $footer->school_name }}</h4>
                    <p>{{ $footer->address }}</p>
                    <p><b>Telp:</b> {{ $footer->phone }}</p>
                    <p><b>Email:</b> {{ $footer->email }}</p>

                    @php
                        $nav = is_array($footer->navigation)
                            ? $footer->navigation
                            : json_decode($footer->navigation, true);
                    @endphp
                    <p><b>Menu Navigasi:</b> {{ implode(', ', $nav ?? []) }}</p>

                    <div>{!! $footer->map_embed !!}</div>
                </div>
                <div class="card-footer">
                    {{-- Tombol Edit --}}
                    <a href="{{ route('admin.footer.edit', $footer->id) }}" class="btn btn-warning">Edit</a>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('admin.footer.destroy', $footer->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Yakin mau hapus footer ini?')">
                            Hapus
                        </button>
                    </form>

                    {{-- Tombol Set Aktif --}}
                    @if (!$footer->is_active)
                        <form action="{{ route('admin.footer.setActive', $footer->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Set Aktif</button>
                        </form>
                    @else
                        <span class="badge bg-success">Aktif</span>
                    @endif
                </div>
            </div>
        @else
            <a href="{{ route('admin.footer.create') }}" class="btn btn-primary mt-3">Tambah Footer</a>
        @endif
    </div>
@endsection
