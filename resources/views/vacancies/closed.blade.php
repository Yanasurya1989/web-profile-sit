@extends('layouts.app')

@section('title', 'Lowongan Kerja')

@section('content')
    <div class="container py-5 text-center">
        <h1 class="mb-4">Belum Ada Hiring Saat Ini</h1>
        <p class="mb-4">Saat ini belum ada lowongan kerja yang tersedia. Silakan cek kembali di lain waktu.</p>

        <form action="{{ route('vacancies.notify') }}" method="POST" class="d-inline-block">
            @csrf
            <div class="input-group">
                <input type="email" name="email" class="form-control" placeholder="Masukkan email Anda">
                <button type="submit" class="btn btn-primary">Beritahu Saya</button>
            </div>
        </form>

        @if (session('status'))
            <div class="alert alert-success mt-3">
                {{ session('status') }}
            </div>
        @endif
    </div>
@endsection
