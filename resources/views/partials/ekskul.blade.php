<section id="qa" class="py-5" style="background: linear-gradient(to right, #fdfbfb, #ebedee);">
    <div class="container">
        <h2 class="text-center mb-5">Q & A</h2>

        <!-- Swiper Container -->
        <div class="swiper qaSwiper">
            <div class="swiper-wrapper">
                <!-- Card 1 -->
                <div class="swiper-slide">
                    <div class="qa-card">
                        <img src="https://picsum.photos/400/200?random=1" alt="QA 1">
                        <div class="qa-card-body">
                            <div class="qa-title">Ibadah dengan kesadaran</div>
                            <div class="qa-desc">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. In ducimus consequatur placeat
                                officiis omnis non.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="swiper-slide">
                    <div class="qa-card">
                        <img src="https://picsum.photos/400/200?random=2" alt="QA 2">
                        <div class="qa-card-body">
                            <div class="qa-title">Point 2 apalagi</div>
                            <div class="qa-desc">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum maiores recusandae
                                blanditiis quis eligendi culpa!
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="swiper-slide">
                    <div class="qa-card">
                        <img src="https://picsum.photos/400/200?random=3" alt="QA 3">
                        <div class="qa-card-body">
                            <div class="qa-title">Point 3 apa deui</div>
                            <div class="qa-desc">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa libero debitis sunt
                                animi possimus officia.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="swiper-pagination mt-3"></div>
        </div>
    </div>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".qaSwiper", {
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 4000,
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
    .qa-card {
        background: #fff;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .qa-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .qa-card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .qa-card-body {
        padding: 1rem;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .qa-title {
        font-size: 1.1rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        color: #198754;
    }

    .qa-desc {
        font-size: 0.95rem;
        color: #555;
    }

    /* Swiper Pagination */
    .swiper-pagination-bullet {
        background: #198754;
        opacity: 0.6;
    }

    .swiper-pagination-bullet-active {
        background: #198754;
        opacity: 1;
    }
</style>
