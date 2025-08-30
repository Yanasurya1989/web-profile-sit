<section id="about-stats" class="py-5 mt-5" style="background: #fdfdfd;">
    <style>
        .stats-title {
            font-size: 2rem;
            font-weight: 700;
            color: #2c7a7b;
            margin-bottom: 2rem;
            text-align: center;
        }

        .stat-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            padding: 2rem 1rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-icon {
            font-size: 2rem;
            color: #319795;
            margin-bottom: 0.5rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2c7a7b;
            margin-bottom: 0.25rem;
        }

        .stat-label {
            font-size: 1rem;
            color: #4a5568;
        }
    </style>

    <div class="container">
        <div class="stats-title">About Us</div>
        <div class="row g-4">
            @foreach ($stats as $stat)
                <div class="col-md-3 col-6">
                    <div class="stat-card">
                        <div class="stat-icon"><i class="{{ $stat->icon }}"></i></div>
                        <div class="stat-number" data-target="{{ $stat->number }}">0</div>
                        <div class="stat-label">{{ $stat->label }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Animasi angka naik
        const counters = document.querySelectorAll('.stat-number');
        const speed = 100;

        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;

                    const inc = Math.ceil(target / speed);

                    if (count < target) {
                        counter.innerText = count + inc;
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target.toLocaleString();
                    }
                };

                updateCount();
            });
        };

        // Jalankan animasi saat elemen muncul di viewport
        let started = false;
        window.addEventListener("scroll", () => {
            const section = document.querySelector("#about-stats");
            const sectionTop = section.getBoundingClientRect().top;
            if (sectionTop < window.innerHeight && !started) {
                animateCounters();
                started = true;
            }
        });
    </script>
</section>
