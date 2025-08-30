<section id="features" class="py-5" style="background: linear-gradient(to right, #ffffff, #f0f9ff);">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <div class="container">
        <h2 class="text-center mb-5">Keunggulan SIT Qordova</h2>

        <!-- Swiper Container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($muwashofats as $m)
                    <div class="swiper-slide">
                        <div class="feature-card">
                            <img src="{{ asset('storage/' . $m->image) }}" alt="{{ $m->title }}">
                            <div class="feature-card-body">
                                <div class="feature-title">{{ $m->title }}</div>

                                {{-- Potong deskripsi --}}
                                <div class="feature-desc">
                                    {{ Str::limit($m->description, 100) }}
                                </div>

                                {{-- Tombol lihat selengkapnya --}}
                                <a href="{{ route('muwashofat.show', $m->id) }}"
                                    class="btn btn-info text-white rounded-pill mt-3 px-3">
                                    Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination harus di dalam swiper -->
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                0: {
                    slidesPerView: 1
                },
                768: {
                    slidesPerView: 2
                },
                992: {
                    slidesPerView: 3
                }
            }
        });
    </script>
</section>
<style>
    /* Card */
    .feature-card {
        background: #fff;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .feature-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .feature-card-body {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .feature-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #0d6efd;
    }

    .feature-desc {
        font-size: 0.95rem;
        color: #555;
    }

    /* Modal */
    .modal-content {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .modal-header {
        border-bottom: none;
        padding: 1rem 1.5rem;
    }

    .modal-body img {
        max-height: 250px;
        object-fit: cover;
        border-radius: 0.75rem;
    }

    .modal-body p {
        font-size: 1rem;
        line-height: 1.6;
        color: #444;
        margin-top: 1rem;
    }

    .modal-footer {
        border-top: none;
        padding: 1rem 1.5rem;
    }

    /* Swiper Pagination */
    .swiper-pagination-bullet {
        background: #0d6efd;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background: #0d6efd;
        opacity: 1;
    }

    /* Modal Styling */
    .modal-content {
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.2);
        animation: fadeInScale 0.3s ease;
    }

    .modal-header {
        border-bottom: none;
        padding: 1rem 1.5rem;
        background: linear-gradient(90deg, #0d6efd, #17a2b8);
        color: #fff;
    }

    .modal-title {
        font-weight: 600;
    }

    .modal-body {
        padding: 1.5rem;
        text-align: center;
    }

    .modal-body img {
        max-height: 300px;
        object-fit: cover;
        border-radius: 0.75rem;
        margin-bottom: 1rem;
    }

    .modal-body p {
        font-size: 1rem;
        line-height: 1.6;
        color: #444;
        text-align: justify;
    }

    .modal-footer {
        border-top: none;
        padding: 1rem 1.5rem;
        justify-content: center;
    }

    @keyframes fadeInScale {
        from {
            opacity: 0;
            transform: scale(0.9);
        }

        to {
            opacity: 1;
            transform: scale(1);
        }
    }
</style>
