@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-5">Semua Berita</h2>

        <div class="row">
            @foreach ($news as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        <img src="{{ asset($item->image) }}" class="card-img-top" alt="{{ $item->title }}"
                            style="height:200px; object-fit:cover;">
                        <div class="card-body d-flex flex-column">
                            <small class="text-muted mb-2">📅
                                {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d F Y') }}
                            </small>
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text text-muted">{{ Str::limit($item->content, 100) }}</p>
                            <a href="{{ route('news.show', $item->id) }}" class="btn btn-primary mt-auto">Baca
                                Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            {{ $news->links() }}
        </div>
    </div>
@endsection
