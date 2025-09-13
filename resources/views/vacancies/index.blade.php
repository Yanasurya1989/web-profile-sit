@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-white text-center py-5"
        style="background: linear-gradient(135deg, #1abc9c 0%, #16a085 50%, #2ecc71 100%);">
        <div class="container py-5">
            <h1 class="display-4 fw-bold animate__animated animate__fadeInDown">Open Recruitment SIT Qordova</h1>
            <p class="lead mb-4 animate__animated animate__fadeInUp">
                Bergabunglah bersama kami mewujudkan generasi rabbani.
            </p>
            <a href="#lowongan"
                class="btn btn-lg btn-light shadow-lg px-5 py-3 rounded-pill fw-bold animate__animated animate__pulse animate__infinite">
                Daftar Sekarang
            </a>
        </div>
    </section>

    <!-- Lowongan Section -->
    <section id="lowongan" class="py-5 position-relative" style="overflow: visible;">
        <div class="lowongan-ornaments" aria-hidden="true">
            <!-- Ornamennya biarkan -->
        </div>

        <div class="container position-relative" style="z-index:2;">
            <h2 class="text-center fw-bold mb-5 text-success" data-aos="fade-up">Lowongan yang Dibuka</h2>

            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @forelse($vacancies as $vacancy)
                        <div class="swiper-slide" data-aos="fade-up">
                            <div class="card shadow border-0 h-100">
                                <div class="card-body d-flex flex-column justify-content-between text-center p-4"
                                    style="min-height: 380px;">
                                    <div>
                                        <!-- Icon sesuai vacancy -->
                                        <div class="mb-3 text-success fs-1">
                                            <i class="bi {{ $vacancy->icon ?? 'bi-briefcase' }}"></i>
                                        </div>

                                        <!-- Judul -->
                                        <h5 class="fw-bold">{{ $vacancy->title }}</h5>

                                        <!-- Deskripsi -->
                                        <p class="text-muted mb-3">{{ $vacancy->description }}</p>

                                        <!-- Kualifikasi -->
                                        @if (!empty($vacancy->qualifications) && is_array($vacancy->qualifications))
                                            <ul class="text-start small text-dark list-unstyled">
                                                @foreach ($vacancy->qualifications as $q)
                                                    <li><i class="bi bi-check-circle-fill text-success me-1"></i>
                                                        {{ $q }}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <!-- Info status & tanggal -->
                                        <ul class="text-start small text-muted list-unstyled">
                                            <li>
                                                Status:
                                                @if ($vacancy->status === 'open')
                                                    <span class="badge bg-success">Open</span>
                                                @else
                                                    <span class="badge bg-danger">Closed</span>
                                                @endif
                                            </li>
                                            <li>
                                                Posted: {{ $vacancy->created_at->format('d M Y') }}
                                            </li>
                                        </ul>
                                    </div>

                                    <!-- Tombol -->
                                    <div>
                                        @if ($vacancy->status === 'open')
                                            @if (Auth::check())
                                                <a href="{{ route('applications.create', ['vacancy_id' => $vacancy->id]) }}"
                                                    class="btn btn-success rounded-pill px-4 mt-3">
                                                    Daftar
                                                </a>
                                            @else
                                                <a href="{{ route('login') }}"
                                                    class="btn btn-warning rounded-pill px-4 mt-3">
                                                    Login untuk Apply
                                                </a>
                                            @endif
                                        @else
                                            <button class="btn btn-secondary rounded-pill px-4 mt-3" disabled>
                                                Pendaftaran Ditutup
                                            </button>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-5 w-100">
                            <h5 class="text-muted">Belum ada lowongan tersedia saat ini.</h5>
                        </div>
                    @endforelse
                </div>

                <!-- Navigation -->
                <div class="swiper-button-next text-success"></div>
                <div class="swiper-button-prev text-success"></div>
                <div class="swiper-pagination"></div>
            </div>



        </div>
    </section>
@endsection

@push('styles')
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        /* Biar semua card sama tinggi */
        .swiper-slide .card {
            height: 100%;
            min-height: 420px;
            /* tambahin biar lebih konsisten */
        }

        /* Biar isi card fleksibel, tombol selalu di bawah */
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
                    disableOnInteraction: false
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
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
