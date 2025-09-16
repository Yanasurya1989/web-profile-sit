<section id="instagram" class="py-5" style="background: #fafafa;">
    <div class="container">
        <div class="text-center mb-5">
            <h4 class="fw-bold" style="font-size:2.2rem;">📸 Ikuti Kami di Instagram</h4>
            <p class="text-muted">Highlight kegiatan terbaru kami langsung dari Instagram</p>
        </div>

        @php
            $embeds = \App\Models\InstagramEmbed::where('is_active', true)->latest()->get();
        @endphp

        @if ($embeds->count() > 0)
            <div class="swiper instagram-swiper">
                <div class="swiper-wrapper">
                    @foreach ($embeds as $embed)
                        <div class="swiper-slide">
                            <div class="card shadow-sm border-0 rounded-3 p-4 text-center d-flex flex-column">
                                <!-- Embed IG -->
                                <div class="embed-wrapper mb-3">
                                    {!! $embed->embed_code !!}
                                </div>

                                <!-- Judul -->
                                {{-- @if ($embed->title)
                                    <h6 class="fw-bold mb-2">{{ $embed->title }}</h6>
                                @endif --}}

                                <!-- Deskripsi (truncate) -->
                                {{-- @if ($embed->description)
                                    <div class="text-muted text-truncate-3 mb-3">
                                        {!! strip_tags($embed->description) !!}
                                    </div>
                                @endif --}}

                                <!-- Tombol custom -->
                                {{-- <a href="{{ $embed->post_url ?? 'https://www.instagram.com/' }}" target="_blank"
                                    class="btn btn-gradient btn-sm mt-auto">
                                    📸 Lihat di Instagram
                                </a> --}}
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Navigasi -->
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        @else
            <p class="text-center text-muted">Belum ada postingan Instagram.</p>
        @endif
    </div>
</section>

<!-- CSS -->
<style>
    .embed-wrapper {
        width: 100%;
        max-width: 320px;
        min-height: 400px;
        border-radius: 8px;
        margin: 0 auto;
        background: #f8f9fa;
    }

    .embed-wrapper iframe {
        width: 100% !important;
        min-height: 400px !important;
    }

    .text-truncate-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 60px;
        max-height: 60px;
    }

    .card {
        min-height: 460px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .btn-gradient {
        background: linear-gradient(45deg, #fd5949, #d6249f, #285AEB);
        color: #fff;
        border: none;
        padding: 6px 16px;
        border-radius: 20px;
        font-size: 0.9rem;
        transition: 0.3s;
    }

    .btn-gradient:hover {
        opacity: 0.9;
    }
</style>

<!-- Swiper -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".instagram-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            992: {
                slidesPerView: 3
            },
        }
    });

    swiper.on('slideChangeTransitionEnd', function() {
        if (window.instgrm) {
            instgrm.Embeds.process();
        }
    });
</script>

<script async src="//www.instagram.com/embed.js"></script>
