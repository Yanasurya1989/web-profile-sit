<section id="vacancy" class="py-5 text-white d-flex align-items-center position-relative"
    style="background: url('{{ asset('assets/images/hero/sd.jpg') }}') center center / cover no-repeat fixed; min-height: 70vh;">

    <!-- Overlay gelap transparan -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>

    <div class="container text-center position-relative" style="z-index:2;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <h2 class="display-5 fw-bold mb-3" style="text-shadow: 2px 2px 10px rgba(0,0,0,0.6);" data-aos="fade-up">
                    Bergabunglah Bersama Kami
                </h2>
                <p class="lead mb-4" style="text-shadow: 1px 1px 8px rgba(0,0,0,0.6);" data-aos="fade-up"
                    data-aos-delay="200">
                    Temukan berbagai kesempatan karier menarik dan jadilah bagian dari tim terbaik.
                </p>
                <a href="{{ route('vacancies.index') }}" class="btn btn-lg btn-primary shadow-lg px-4 py-2 rounded-pill"
                    data-aos="zoom-in" data-aos-delay="400">
                    Lihat Lowongan Kerja
                </a>
            </div>
        </div>
    </div>
</section>
