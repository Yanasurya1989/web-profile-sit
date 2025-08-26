<section id="about" class="py-5" style="background: linear-gradient(to right, #f0f9ff, #e0f7fa);">
    <style>
        .about-subtitle {
            color: #319795;
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .about-title {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .about-desc {
            color: #4a5568;
            max-height: 300px;
            overflow: hidden;
        }

        @media (max-width: 768px) {

            .video-wrapper,
            .image-wrapper {
                height: 300px;
            }
        }

        .video-wrapper,
        .image-wrapper {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            height: 100%;
            min-height: 300px;
        }

        .video-wrapper video,
        .image-wrapper img {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
            z-index: 0;
        }

        .video-overlay {
            position: relative;
            z-index: 1;
        }
    </style>

    <div class="container">
        @foreach ($abouts as $about)
            <div class="row align-items-center g-4 mb-5 {{ $loop->iteration % 2 == 0 ? 'flex-md-row-reverse' : '' }}">
                <!-- Media (video atau image) -->
                <div class="col-md-6">
                    <div class="{{ $about->media_type == 'video' ? 'video-wrapper' : 'image-wrapper' }} shadow">
                        @if ($about->media_type == 'video')
                            <video autoplay muted loop playsinline>
                                <source src="{{ asset($about->media_path) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @else
                            <img src="{{ asset($about->media_path) }}" alt="{{ $about->title }}" class="img-fluid">
                        @endif
                    </div>
                </div>

                <!-- Text content -->
                <div class="col-md-6 video-overlay">
                    <div class="about-subtitle">{{ $about->subtitle }}</div>
                    <div class="about-title">{{ $about->title }}</div>
                    <div class="about-desc">
                        <h4>{{ $about->short_desc }}</h4>
                        {!! Str::limit($about->long_desc, 250) !!}
                    </div>
                    <button class="btn btn-info text-white rounded-pill px-4 mt-3" data-bs-toggle="modal"
                        data-bs-target="#aboutModal{{ $about->id }}">
                        Selengkapnya
                    </button>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="aboutModal{{ $about->id }}" tabindex="-1"
                aria-labelledby="aboutModalLabel{{ $about->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header bg-info text-white">
                            <h5 class="modal-title" id="aboutModalLabel{{ $about->id }}">{{ $about->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body text-muted">
                            <h5>{{ $about->short_desc }}</h5>
                            <p>{!! $about->long_desc !!}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary rounded-pill"
                                data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
