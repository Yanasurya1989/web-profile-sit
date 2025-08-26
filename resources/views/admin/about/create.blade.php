@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Tambah About</h2>

        <form action="{{ route('admin.about.store') }}" method="POST">
            @csrf
            @include('admin.about._form')
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('admin.about.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
