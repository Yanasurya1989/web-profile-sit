@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <h2 class="mt-3">Edit Footer</h2>
        <form action="{{ route('admin.footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.footer._form', ['footer' => $footer])
            <button class="btn btn-success mt-3">Update</button>
        </form>
    </div>
@endsection
