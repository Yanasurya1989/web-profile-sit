@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2>Tambah Footer</h2>
        <form action="{{ route('admin.footer.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.footer._form')
            <button class="btn btn-primary mt-3">Simpan</button>
        </form>
    </div>
@endsection
