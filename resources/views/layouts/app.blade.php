<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SIT Qordova</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="..."
        crossorigin="anonymous" />

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <!-- AOS CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    @stack('styles')
</head>

<body>
    @include('partials.navbar')
    @yield('content')

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

    <!-- TSParticles -->
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2.12.0/tsparticles.bundle.min.js"></script>

    <!-- Init AOS & Particles -->
    {{-- <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        tsParticles.load("particles-programs", {
            fullScreen: {
                enable: false
            },
            particles: {
                number: {
                    value: 30
                },
                color: {
                    value: "#ffffff"
                },
                shape: {
                    type: "circle"
                },
                opacity: {
                    value: 0.15
                },
                size: {
                    value: {
                        min: 1,
                        max: 3
                    }
                },
                move: {
                    enable: true,
                    speed: 0.6,
                    direction: "none",
                    random: true,
                    straight: false,
                    outModes: {
                        default: "out"
                    }
                }
            },
            interactivity: {
                events: {
                    onHover: {
                        enable: true,
                        mode: "repulse"
                    }
                },
                modes: {
                    repulse: {
                        distance: 50
                    }
                }
            },
            detectRetina: true
        });
    </script> --}}

    @stack('scripts')
</body>

</html>
