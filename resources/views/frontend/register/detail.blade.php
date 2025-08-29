@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Daftar Pendaftar Jenjang {{ $level }}</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($registrations->isEmpty())
            <p>Belum ada pendaftar untuk jenjang ini.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Orangtua</th>
                        <th>Nomor WA</th>
                        <th>Nama Anak</th>
                        <th>Waktu Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registrations as $reg)
                        <tr>
                            <td>{{ $reg->parent_name }}</td>
                            <td>{{ $reg->wa_number }}</td>
                            <td>{{ $reg->child_name }}</td>
                            <td>{{ $reg->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
