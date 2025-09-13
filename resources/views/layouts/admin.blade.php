<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand m-0" href="{{ route('admin.dashboard') }}">Admin Panel - Web SIT Qordova</a>

            {{-- Tombol kembali hanya tampil kalau bukan halaman dashboard --}}
            @if (!Route::is('admin.dashboard'))
                <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">
                    ⬅ Kembali ke Dashboard
                </a>
            @endif
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</body>

</html>
