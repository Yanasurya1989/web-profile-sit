<section id="features" class="py-5" style="background: linear-gradient(to right, #ffffff, #f0f9ff);">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <style>
        .feature-card {
            background: #fff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: 100%;
            min-height: 380px;
            display: flex;
            flex-direction: column;
        }

        .feature-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            display: block;
        }

        .feature-card-body {
            padding: 1.5rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            text-align: center;
        }

        .feature-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #2c5282;
            margin-bottom: 0.5rem;
        }

        .feature-desc {
            font-size: 0.95rem;
            color: #4a5568;
        }

        /* responsive */
        @media (max-width: 768px) {
            .feature-card-body {
                padding: 1rem;
            }
        }
    </style>

    <div class="container">
        <h2 class="text-center mb-5">Keunggulan SIT Qordova</h2>

        <!-- Swiper Container -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <!-- Item 1 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/basket.jfif" alt="Shalat">
                        <div class="feature-card-body">
                            <div class="feature-title">Shalat dan Ibadah dengan Kesadaran</div>
                            <div class="feature-desc">
                                Kami menanamkan kesadaran akan pentingnya shalat dan ibadah dalam kehidupan sehari-hari
                                siswa.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/karate.jfif" alt="Quran">
                        <div class="feature-card-body">
                            <div class="feature-title">Hafal Al-Qur'an Minimal 2 Juz</div>
                            <div class="feature-desc">
                                Siswa ditargetkan menghafal minimal 2 juz sebagai cahaya dalam kehidupan mereka.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/robotik.jfif" alt="Membaca Quran">
                        <div class="feature-card-body">
                            <div class="feature-title">Fasih dan Lancar Membaca Al-Qur'an</div>
                            <div class="feature-desc">
                                Melalui program intensif, siswa dilatih melafalkan Al-Qur'an sesuai tajwid.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 4 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/taekwondo.jfif" alt="Orang tua">
                        <div class="feature-card-body">
                            <div class="feature-title">Hormat dan Patuh kepada Orangtua</div>
                            <div class="feature-desc">
                                Kami mendidik siswa untuk menghormati dan mematuhi orang tua mereka sebagai ajaran
                                Islam.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 5 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/menggambar.jfif" alt="Hadist">
                        <div class="feature-card-body">
                            <div class="feature-title">Hafal Hadist dan Do'a Pilihan</div>
                            <div class="feature-desc">
                                Siswa menghafal hadist dan doa pilihan sebagai bekal akhlak mulia.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Item 6 -->
                <div class="swiper-slide">
                    <div class="feature-card">
                        <img src="assets/images/muwashofat/coding.jfif" alt="Komputer">
                        <div class="feature-card-body">
                            <div class="feature-title">Mampu Mengoperasikan Komputer Dasar</div>
                            <div class="feature-desc">
                                Kami membekali siswa kemampuan dasar teknologi agar siap di era digital.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
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
