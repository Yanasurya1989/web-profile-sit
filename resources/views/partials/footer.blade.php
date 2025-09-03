<footer class="py-5 text-white custom-footer">
    <div class="container">
        <div class="row">

            <!-- Kiri: Logo & Info -->
            <div class="col-md-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    {{-- <img src="{{ asset('storage/' . $footer->logo) }}" alt="Logo {{ $footer->school_name ?? 'Qordova' }}"
                        style="width:50px; height:50px; object-fit:contain; margin-right:10px;"> --}}
                    <img src="{{ asset('footer/' . $footer->logo) }}" alt="Logo" width="80" class="mb-3">
                    <h4 class="m-0 fw-bold">{{ $footer->school_name ?? 'SIT Qordova' }}</h4>
                </div>
                <p class="footer-text">
                    {!! nl2br(e($footer->address)) !!}
                </p>

                <!-- Kontak -->
                <p class="d-flex align-items-center mb-2 footer-text">
                    <i class="fas fa-phone-alt me-2"></i>
                    <span>{{ $footer->phone }}</span>
                </p>
                <p class="d-flex align-items-center footer-text">
                    <i class="fas fa-envelope me-2"></i>
                    <span>{{ $footer->email }}</span>
                </p>
            </div>

            <!-- Tengah: Navigasi -->
            <div class="col-md-4 mb-4 text-center">
                <h5 class="fw-bold mb-3">Navigasi</h5>
                @php
                    $nav = is_array($footer->navigation) ? $footer->navigation : json_decode($footer->navigation, true);
                @endphp

                <ul class="list-unstyled">
                    @foreach ($nav ?? [] as $item)
                        <li>
                            <a href="{{ $item['url'] ?? '#' }}" class="footer-link d-block mb-2">
                                {{ $item['label'] ?? $item }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Kanan: Map -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold mb-3">Lokasi Kami</h5>
                <div class="rounded overflow-hidden shadow-sm" style="height:200px;">
                    {!! $footer->map_embed !!}
                </div>
            </div>
        </div>

        <!-- Garis Pemisah -->
        <hr class="border-light my-4">

        <!-- Copyright -->
        <div class="text-center">
            <p class="mb-0" style="font-size: 0.9rem;">
                &copy; {{ now()->year }} {{ $footer->school_name ?? 'SIT Qordova' }}. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<!-- Custom CSS -->
<style>
    .custom-footer {
        background: linear-gradient(to bottom, #63b3ed, #3182ce, #2c5282);
        color: #f8f9fa;
    }

    .custom-footer h4,
    .custom-footer h5 {
        color: #ffffff;
    }

    .custom-footer .footer-text {
        color: #e2e8f0;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    .custom-footer .footer-link {
        color: #e2e8f0;
        text-decoration: none;
        transition: color 0.3s;
    }

    .custom-footer .footer-link:hover {
        color: #ffd700;
    }
</style>
