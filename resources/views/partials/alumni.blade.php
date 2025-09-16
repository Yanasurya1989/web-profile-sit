<section id="alumni" class="py-5" style="background: #eef2f7;">
    <div class="container">
        <h2 class="text-center mb-5">Quote Alumni</h2>

        <div class="swiper alumni-swiper">
            <div class="swiper-wrapper">
                @foreach ($alumnis as $item)
                    <div class="swiper-slide">
                        <div class="card h-100 shadow-sm border-0 rounded-3 p-4 text-center d-flex flex-column">
                            <!-- Foto -->
                            <img src="{{ asset($item->photo) }}" alt="{{ $item->name }}"
                                class="rounded-circle mb-3 mx-auto"
                                style="width:100px; height:100px; object-fit:cover;">

                            <!-- Quote -->
                            <blockquote class="blockquote flex-grow-1">
                                <p class="mb-3 fst-italic text-muted text-truncate-3">
                                    "{{ $item->quote }}"
                                </p>
                            </blockquote>

                            <!-- Footer -->
                            <footer class="blockquote-footer mt-auto">
                                <strong>{{ $item->name }}</strong>, {{ $item->graduation_year }}
                            </footer>

                            <!-- Tombol See more -->
                            @if (strlen($item->quote) > 120)
                                <button class="btn btn-sm btn-outline-primary mt-2" data-bs-toggle="modal"
                                    data-bs-target="#quoteModal{{ $item->id }}">
                                    See more
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Navigasi -->
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

<style>
    .text-truncate-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        min-height: 65px;
    }

    .card {
        min-height: 320px;
    }
</style>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".alumni-swiper", {
        slidesPerView: 1,
        spaceBetween: 20,
        loop: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
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
</script>
