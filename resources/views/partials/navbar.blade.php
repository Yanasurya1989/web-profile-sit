<nav id="main-navbar" class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#hero-carousel">
            <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" width="70" height="50"
                class="d-inline-block align-text-top">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav align-items-center">
                <li class="nav-item">
                    <a class="nav-link active" href="#hero-carousel">Beranda</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#about">Tentang Kami</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Keunggulan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#news">Berita</a>
                </li>

                <li class="nav-item ms-3">
                    <a class="btn btn-success btn-sm" href="#register">
                        Daftar Sekarang
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    /* Navbar Default (Transparent) */
    #main-navbar {
        padding: 0.8rem 0;
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
        background-color: transparent;
        z-index: 1000;
    }

    /* Navbar Saat Di-scroll */
    #main-navbar.scrolled {
        background: linear-gradient(90deg, #319795, #3182ce, #63b3ed);
        background-size: 200% 200%;
        animation: navbarGradient 15s ease infinite;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
    }

    @keyframes navbarGradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .navbar-brand {
        color: white !important;
        font-size: 1.2rem;
    }

    .navbar-nav .nav-link {
        color: white !important;
        font-weight: 500;
        transition: color 0.2s;
    }

    .navbar-nav .nav-link:hover,
    .navbar-nav .nav-link.active {
        color: #00bfff !important;
    }

    .btn-success {
        background-color: #00bfff;
        border: none;
        font-weight: 500;
    }

    .btn-success:hover {
        background-color: #009fd1;
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const navbar = document.getElementById("main-navbar");

        // Tambahkan / hapus class 'scrolled' saat scroll
        window.addEventListener("scroll", function() {
            if (window.scrollY > 50) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        });

        // Scrollspy aktif
        const sections = document.querySelectorAll("section[id]");
        const navLinks = document.querySelectorAll(".navbar-nav .nav-link");

        window.addEventListener("scroll", () => {
            let current = "";
            sections.forEach(section => {
                const sectionTop = section.offsetTop - 100;
                if (scrollY >= sectionTop) {
                    current = section.getAttribute("id");
                }
            });

            navLinks.forEach(link => {
                link.classList.remove("active");
                if (link.getAttribute("href").includes(current)) {
                    link.classList.add("active");
                }
            });
        });
    });
</script>
