@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg rounded-4">
                    <img src="{{ asset('storage/' . $m->image) }}" alt="{{ $m->title }}" class="card-img-top rounded-top">
                    <div class="card-body p-4">
                        <h2 class="fw-bold text-info mb-3">{{ $m->title }}</h2>
                        <p class="text-muted">{!! $m->description !!}</p>
                        <a href="{{ url()->previous() }}" class="btn btn-secondary rounded-pill mt-3">← Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
