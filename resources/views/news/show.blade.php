@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-3">
                    <img src="{{ asset($news->image) }}" class="card-img-top" alt="{{ $news->title }}"
                        style="max-height:400px; object-fit:cover;">
                    <div class="card-body">
                        <small class="text-muted mb-3 d-block">
                            📅 {{ \Carbon\Carbon::parse($news->published_at)->translatedFormat('d F Y') }}
                        </small>
                        <h2 class="card-title mb-3">{{ $news->title }}</h2>
                        <p class="card-text text-muted" style="white-space: pre-line;">
                            {{ $news->content }}
                        </p>
                        <div class="mt-4">
                            <a href="{{ route('news.index') }}" class="btn btn-outline-primary">← Kembali ke Semua
                                Berita</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
