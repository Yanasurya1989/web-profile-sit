@extends('layouts.app')

@section('content')
    @foreach ($sections as $section)
        @includeIf('partials.' . $section->key)
    @endforeach
@endsection
