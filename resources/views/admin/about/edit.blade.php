@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Edit About</h2>

        <form action="{{ route('admin.about.update', $about->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('admin.about._form', ['about' => $about])
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
