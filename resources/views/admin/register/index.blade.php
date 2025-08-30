@extends('layouts.app')

@section('content')
    <div class="container py-5 mt-5">
        <h3 class="mb-4">Daftar Pendaftar</h3>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Orangtua</th>
                    <th>Nomor WA</th>
                    <th>Nama Anak</th>
                    <th>Jenjang</th>
                    <th>Tanggal Daftar</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($registrations as $reg)
                    <tr>
                        <td>{{ $reg->id }}</td>
                        <td>{{ $reg->parent_name }}</td>
                        <td>{{ $reg->wa_number }}</td>
                        <td>{{ $reg->child_name }}</td>
                        <td>{{ $reg->level }}</td>
                        <td>{{ $reg->created_at->format('d-m-Y H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada pendaftar</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
