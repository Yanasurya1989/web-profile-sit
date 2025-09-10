@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-white text-center py-5"
        style="background: linear-gradient(135deg, #1abc9c 0%, #16a085 50%, #2ecc71 100%);">
        <div class="container py-5">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">Open Recruitment SIT Qordova</h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp">
                Bergabunglah bersama kami mwjudkan generasi rabbani.
            </p>
            <a href="#lowongan"
                class="btn btn-lg btn-light shadow-lg px-5 py-3 rounded-pill fw-bold animate__animated animate__pulse animate__infinite">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Lowongan Section -->
    <section id="lowongan" class="py-5 position-relative" style="overflow: visible;">
        <!-- Ornamen SVG -->
        <div class="lowongan-ornaments" aria-hidden="true">
            <svg class="orn-left" width="360" height="360" viewBox="0 0 360 360" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.12">
                    <circle cx="180" cy="180" r="160" fill="#1abc9c" />
                    <path d="M40 200 C80 120, 160 120, 200 200 C240 280, 320 280, 320 280 L40 280 Z" fill="#2ecc71" />
                </g>
            </svg>
            <svg class="orn-right" width="300" height="300" viewBox="0 0 300 300" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.10">
                    <rect x="20" y="20" width="260" height="260" rx="40" fill="#16a085" />
                    <path d="M60 180 C100 100, 200 100, 240 180 C280 260, 200 260, 140 220 C80 180, 60 180, 60 180 Z"
                        fill="#1abc9c" />
                </g>
            </svg>
        </div>

        <div class="container position-relative" style="z-index:2;">
            <h2 class="text-center fw-bold mb-5 text-success" data-aos="fade-up">Lowongan yang Dibuka</h2>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <!-- Guru Qur'an -->
                    <div class="swiper-slide" data-aos="fade-up">
                        <div class="card shadow border-0 h-100">
                            <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="mb-3 text-success fs-1"><i class="bi bi-book-half"></i></div>
                                    <h5 class="fw-bold">Guru Qur'an</h5>
                                    <p class="text-muted mb-3">Mengajar Al-Qur’an dengan tartil, tahsin, dan pembinaan
                                        akhlak.</p>
                                    <ul class="text-start small text-muted">
                                        <li>Hafal minimal 5 juz</li>
                                        <li>Mampu membimbing tahsin & tartil</li>
                                        <li>Berpengalaman mengajar Qur’an</li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-success rounded-pill px-4 mt-3">Daftar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Guru BK -->
                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="80">
                        <div class="card shadow border-0 h-100">
                            <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="mb-3 text-success fs-1"><i class="bi bi-person-lines-fill"></i></div>
                                    <h5 class="fw-bold">Guru BK</h5>
                                    <p class="text-muted mb-3">Membimbing siswa dalam pengembangan diri, akademik, dan
                                        konseling.</p>
                                    <ul class="text-start small text-muted">
                                        <li>Lulusan BK/Psikologi</li>
                                        <li>Mampu melakukan konseling individual & kelompok</li>
                                        <li>Komunikatif dan empatik</li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-success rounded-pill px-4 mt-3">Daftar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Guru Matematika -->
                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="160">
                        <div class="card shadow border-0 h-100">
                            <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="mb-3 text-success fs-1"><i class="bi bi-calculator"></i></div>
                                    <h5 class="fw-bold">Guru Matematika</h5>
                                    <p class="text-muted mb-3">Mengajar konsep matematika secara interaktif dan aplikatif.
                                    </p>
                                    <ul class="text-start small text-muted">
                                        <li>Lulusan S1/S2 Pendidikan Matematika</li>
                                        <li>Mahir dalam penggunaan media digital pembelajaran</li>
                                        <li>Kreatif dalam penyampaian materi</li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-success rounded-pill px-4 mt-3">Daftar</a>
                            </div>
                        </div>
                    </div>

                    <!-- Guru Kimia -->
                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="240">
                        <div class="card shadow border-0 h-100">
                            <div class="card-body text-center p-4 d-flex flex-column justify-content-between">
                                <div>
                                    <div class="mb-3 text-success fs-1"><i class="bi bi-droplet"></i></div>
                                    <h5 class="fw-bold">Guru Kimia</h5>
                                    <p class="text-muted mb-3">Mengajar materi kimia dengan eksperimen dan pendekatan
                                        ilmiah.</p>
                                    <ul class="text-start small text-muted">
                                        <li>Lulusan S1/S2 Pendidikan Kimia</li>
                                        <li>Mampu membuat percobaan laboratorium</li>
                                        <li>Berorientasi pada riset dan praktik</li>
                                    </ul>
                                </div>
                                <a href="#" class="btn btn-success rounded-pill px-4 mt-3">Daftar</a>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Navigation -->
                <div class="swiper-button-next text-success"></div>
                <div class="swiper-button-prev text-success"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Kualifikasi Section -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 animate__animated animate__fadeInLeft">
                    <img src="{{ asset('assets/kwalifikasi/1.jpg') }}" alt="Kualifikasi" class="img-fluid">
                </div>
                <div class="col-md-6 animate__animated animate__fadeInRight">
                    <h2 class="fw-bold text-success">Kualifikasi Umum</h2>
                    <ul class="list-unstyled mt-4">
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Berpenampilan Syar'i
                        </li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Mampu membaca alquran
                        </li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Tidak merokok</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Semangat belajar</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Minimal S1 sesuai
                            bidang (Qur’an, BK, Matematika, Kimia)</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Mampu mengajar dengan
                            metode interaktif</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Berakhlak mulia dan
                            komunikatif</li>
                        <li class="mb-3"><i class="bi bi-check-circle-fill text-success me-2"></i> Bersedia
                            berkolaborasi dalam tim pengajar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Rekrutmen -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5 text-success">Proses Rekrutmen</h2>
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="p-4">
                        <div class="fs-1 text-success mb-3"><i class="bi bi-upload"></i></div>
                        <h5 class="fw-bold mb-2">1. Upload Berkas</h5>
                        <p class="text-muted small mb-0">Kumpulkan berkas sesuai ketentuan</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4">
                        <div class="fs-1 text-success mb-3"><i class="bi bi-pencil-square"></i></div>
                        <h5 class="fw-bold mb-2">2. Tes Tulis & Tes Baca Qur’an</h5>
                        <p class="text-muted small mb-0">Uji kompetensi & kemampuan tilawah</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4">
                        <div class="fs-1 text-success mb-3"><i class="bi bi-chat-dots"></i></div>
                        <h5 class="fw-bold mb-2">3. Wawancara</h5>
                        <p class="text-muted small mb-0">Dengan Kepala Sekolah & Direktur</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-4">
                        <div class="fs-1 text-success mb-3"><i class="bi bi-file-earmark-check"></i></div>
                        <h5 class="fw-bold mb-2">4. Penandatanganan MOU</h5>
                        <p class="text-muted small mb-0">Kontrak resmi setelah diterima</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .lowongan-ornaments {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 1;
        }

        .lowongan-ornaments .orn-left {
            position: absolute;
            left: -80px;
            top: -40px;
            transform: rotate(-10deg);
            opacity: .25;
        }

        .lowongan-ornaments .orn-right {
            position: absolute;
            right: -60px;
            bottom: -40px;
            transform: rotate(8deg);
            opacity: .20;
        }

        .mySwiper .swiper-slide {
            display: flex;
            height: auto;
        }

        .mySwiper .card {
            flex: 1 1 auto;
            height: 100%;
            border-radius: 14px;
            overflow: hidden;
        }

        .mySwiper .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 260px;
        }

        .mySwiper .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 14px 40px rgba(16, 185, 129, 0.14);
            transition: transform .25s ease, box-shadow .25s ease;
        }

        @media (max-width: 767px) {

            .lowongan-ornaments .orn-left,
            .lowongan-ornaments .orn-right {
                display: none;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 3500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 2
                    },
                    1200: {
                        slidesPerView: 3
                    },
                },
            });
            if (window.AOS) AOS.refresh();
        });
    </script>
@endpush
