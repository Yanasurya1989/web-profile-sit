@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Pelamar untuk Lowongan: {{ $vacancy->title }}</h2>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Pelamar</th>
                    <th>Jenis Kelamin</th>
                    <th>Sekolah/Universitas</th>
                    <th>Nilai/IPK</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($applications as $app)
                    <tr>
                        <td>{{ $app->nama_pelamar }}</td>
                        <td>{{ $app->jenis_kelamin }}</td>
                        <td>{{ $app->sekolah_universitas }}</td>
                        <td>{{ $app->nilai_ipk }}</td>
                        <td>
                            {{-- contoh download file --}}
                            @if ($app->cv)
                                <a href="{{ asset('storage/' . $app->cv) }}" target="_blank" class="btn btn-sm btn-primary">Lihat
                                    CV</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pelamar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
