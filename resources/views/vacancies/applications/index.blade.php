@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Daftar Lowongan & Pelamar</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Lowongan</th>
                    <th>Jumlah Pelamar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancies as $v)
                    <tr>
                        <td>{{ $v->title }}</td>
                        <td>{{ $v->applications_count }}</td>
                        <td>
                            <a href="{{ route('admin.applications.show', $v->id) }}" class="btn btn-sm btn-success">Lihat
                                Pelamar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
