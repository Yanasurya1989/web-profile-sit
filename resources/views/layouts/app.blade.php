<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIT Qordova</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('assets/images/logo/logo.png') }}" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Bootstrap Select CSS -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/css/bootstrap-select.min.css">

    <!-- (Opsional) Font Awesome kalau memang dipakai di tempat lain -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
        crossorigin="anonymous" />

    <!-- Swiper & AOS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    {{-- AOS (Animate on Scroll) --}}
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --flyer-primary: #6c63ff;
            /* ungu lembut */
            --flyer-secondary: #00c2ff;
            /* biru cerah */
            --flyer-accent: #ff6b6b;
            /* merah coral */
        }

        /* ====== HERO ====== */
        .hero {
            min-height: 100vh;
            display: grid;
            place-items: center;
            color: #fff;
            position: relative;
            overflow: hidden;
            /* gradient + subtle pattern */
            background:
                radial-gradient(1200px 600px at 10% 10%, rgba(255, 255, 255, .08), transparent 60%),
                radial-gradient(900px 400px at 90% 20%, rgba(255, 255, 255, .06), transparent 60%),
                linear-gradient(135deg, var(--flyer-primary), var(--flyer-secondary));
        }

        .hero .blob {
            position: absolute;
            width: 420px;
            height: 420px;
            filter: blur(60px);
            opacity: .35;
            border-radius: 50%;
            background: radial-gradient(circle at 30% 30%, #fff, transparent 60%);
            animation: floaty 8s ease-in-out infinite;
        }

        .blob-1 {
            top: -80px;
            left: -60px;
        }

        .blob-2 {
            bottom: -120px;
            right: -80px;
            animation-delay: 1.2s;
        }

        @keyframes floaty {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-14px)
            }
        }

        .btn-cta {
            --shadow: 0 12px 24px rgba(0, 0, 0, .18);
            background: linear-gradient(135deg, #ffd166, #ff8c42);
            color: #1d1d1f;
            border: 0;
            padding: 12px 28px;
            border-radius: 999px;
            font-weight: 700;
            letter-spacing: .3px;
            box-shadow: var(--shadow);
            transition: transform .2s ease, box-shadow .2s ease, filter .2s ease;
        }

        .btn-cta:hover {
            transform: translateY(-2px) scale(1.02);
            filter: brightness(1.05);
        }

        .btn-cta:active {
            transform: translateY(0) scale(.98);
        }

        .section-title {
            font-weight: 800;
            letter-spacing: .3px;
            background: linear-gradient(135deg, var(--flyer-primary), var(--flyer-secondary));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* ====== JOB CARDS ====== */
        .job-card {
            border: 0;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
            transition: transform .2s ease, box-shadow .2s ease;
            height: 100%;
            background: #fff;
        }

        .job-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0, 0, 0, .12);
        }

        .job-icon {
            width: 60px;
            height: 60px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            font-size: 1.6rem;
            color: #fff;
        }

        /* ====== TIMELINE ====== */
        .step {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .step .circle {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            color: #fff;
            font-weight: 800;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, var(--flyer-primary), var(--flyer-secondary));
            box-shadow: 0 8px 20px rgba(108, 99, 255, .35);
        }

        .step .label {
            font-weight: 700;
        }

        .step-line {
            height: 4px;
            flex: 1;
            background: linear-gradient(90deg, var(--flyer-primary), var(--flyer-secondary));
            opacity: .5;
            border-radius: 999px;
        }

        /* Utility */
        .text-muted-2 {
            color: #6b7280;
        }
    </style>

    @stack('styles')
</head>

<body>

    @if (!isset($hideNavbar) || !$hideNavbar)
        @include('partials.navbar')
    @endif

    @yield('content')

    <a href="https://wa.me/6282122114194" target="_blank" class="whatsapp-float">
        <i class="fab fa-whatsapp"></i>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 20px;
            right: 20px;
            background: #25D366;
            color: #fff;
            border-radius: 50%;
            text-align: center;
            font-size: 32px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, .3);
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: .2s
        }

        .whatsapp-float:hover {
            transform: scale(1.1);
            color: #fff;
        }
    </style>

    <!-- JS: urutan penting! jQuery -> Bootstrap -> Bootstrap Select -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta3/dist/js/bootstrap-select.min.js"></script>

    <!-- Swiper, AOS, dll -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>

    <script>
        AOS.init({
            duration: 800,
            once: true
        });
    </script>

    @stack('scripts')
</body>

</html>
