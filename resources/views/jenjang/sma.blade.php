@extends('layouts.app', ['hideNavbar' => true])

@section('content')
    <div class="container-fluid p-0">
        @forelse ($detils as $item)
            <img src="{{ asset('storage/' . $item->gambar) }}" class="img-fluid w-100 d-block" style="margin:0; padding:0;"
                alt="{{ $item->judul }}">
        @empty
            <div class="p-3 text-center">
                <p>Belum ada data untuk jenjang ini.</p>
            </div>
        @endforelse
    </div>

    <a href="https://ppdb-smaitqordova.s.mumtaz.app/register" class="btn-daftar">
        <i class="fas fa-edit me-2"></i> Daftar Sekarang
    </a>

    <style>
        .btn-daftar {
            position: fixed;
            bottom: 100px;
            left: 20px;
            background: #007bff;
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            font-weight: bold;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
            text-decoration: none;
            transition: 0.2s;
        }

        .btn-daftar:hover {
            background: #0056b3;
            transform: scale(1.05);
        }
    </style>
@endsection
