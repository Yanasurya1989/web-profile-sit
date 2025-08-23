<section id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <style>
        #hero-carousel {
            height: 100vh;
            overflow: hidden;
        }

        .carousel-item {
            height: 100vh;
            position: relative;
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: -2;
            animation: zoomImage 15s ease-in-out infinite;
        }

        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(3px);
            z-index: -1;
        }

        @keyframes zoomImage {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .carousel-caption {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            text-align: center;
            color: white;
            width: 100%;
            padding: 0 1rem;
            animation: fadeInUp 1.5s ease-out forwards;
            opacity: 0;
        }

        .carousel-item.active .carousel-caption {
            animation-delay: 0.4s;
            opacity: 1;
        }

        @keyframes fadeInUp {
            0% {
                transform: translate(-50%, -40%);
                opacity: 0;
            }

            100% {
                transform: translate(-50%, -50%);
                opacity: 1;
            }
        }

        .carousel-caption h1 {
            font-size: 2.6rem;
            font-weight: bold;
        }

        .typed-container {
            display: inline-block;
            min-width: 250px;
            text-align: center;
        }

        .carousel-caption p {
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
        }

        .carousel-caption .btn-custom {
            background-color: #00d2f3;
            color: white;
            border-radius: 30px;
            padding: 0.5rem 1.5rem;
            font-weight: 600;
            margin: 0 0.25rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .carousel-caption .btn-custom.white {
            background-color: #fff;
            color: #000;
        }

        .carousel-caption .btn-custom:hover {
            opacity: 0.9;
        }

        .scroll-down {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            font-size: 2rem;
            color: #fff;
            animation: bounce 2s infinite;
            cursor: pointer;
        }

        @keyframes bounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(10px);
            }
        }

        @media (min-width: 768px) {
            .carousel-caption h1 {
                font-size: 3rem;
            }

            .carousel-caption p {
                font-size: 1.3rem;
            }
        }
    </style>

    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <img src="{{ asset('assets/images/hero/sd.jpg') }}" alt="Slide 1">
            <div class="carousel-caption">
                <h1><span class="typed-container"><span class="typed-text"
                            data-typed="Sekolah Tahfidz Al-Qur'an"></span></span></h1>
                <p>Menjadi generasi penghafal Al-Qur’an yang berakhlak mulia.</p>
                <a href="#programs" class="btn btn-custom">Lihat Program</a>
                <a href="https://wa.me/6289601353957" class="btn btn-custom white">Daftar Sekarang</a>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-item">
            <img src="{{ asset('assets/images/hero/inggris.jpg') }}" alt="Slide 2">
            <div class="carousel-caption">
                <h1><span class="typed-container"><span class="typed-text"
                            data-typed="Pendidikan Karakter"></span></span></h1>
                <p>Membentuk pribadi berakhlak, disiplin, dan bertanggung jawab melalui pembiasaan positif.</p>
                <a href="#about" class="btn btn-custom">Tentang Kami</a>
                <a href="https://wa.me/6289601353957" class="btn btn-custom white">Daftar Sekarang</a>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-item">
            <img src="{{ asset('assets/images/hero/p.karakter.jpg') }}" alt="Slide 3">
            <div class="carousel-caption">
                <h1><span class="typed-container"><span class="typed-text" data-typed="Sekolah Bilingual"></span></span>
                </h1>
                <p>Menguasai dua bahasa (Indonesia & Inggris) untuk menghadapi dunia global dengan percaya diri.</p>
                <a href="#contact" class="btn btn-custom">Hubungi Kami</a>
                <a href="https://wa.me/6289601353957" class="btn btn-custom white">Daftar Sekarang</a>
            </div>
        </div>
    </div>


    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>

    <!-- Scroll-down icon -->
    <a href="#programs" class="scroll-down">
        <i class="bi bi-chevron-down"></i>
    </a>
</section>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Typed.js -->
<script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
<script>
    let typedInstance = null;

    function runTyped(target, text) {
        if (typedInstance) {
            typedInstance.destroy();
        }
        typedInstance = new Typed(target, {
            strings: [text],
            typeSpeed: 50,
            showCursor: false
        });
    }

    function initTypedOnActiveSlide() {
        const activeSlide = document.querySelector('.carousel-item.active .typed-text');
        if (activeSlide) {
            const text = activeSlide.dataset.typed;
            runTyped(activeSlide, text);
        }
    }

    // Initialize first slide
    document.addEventListener('DOMContentLoaded', function() {
        initTypedOnActiveSlide();

        // Listen for slide changes
        const carousel = document.querySelector('#hero-carousel');
        carousel.addEventListener('slid.bs.carousel', function() {
            initTypedOnActiveSlide();
        });
    });
</script>
