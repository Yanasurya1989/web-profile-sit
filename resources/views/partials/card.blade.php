<section id="about-stats" class="py-5" style="background: #fdfdfd;">
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

        .feature-card {
            background: #fff;
            border-radius: 1rem;
            padding: 2rem;
            text-align: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            height: 100%;
            min-height: 350px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }

        .feature-card img {
            width: 60px;
            height: 60px;
            object-fit: contain;
            margin: 0 auto 1rem auto;
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
            flex-grow: 1;
        }

        /* responsive */
        @media (max-width: 768px) {
            .feature-card {
                min-height: 300px;
                padding: 1.5rem;
            }
        }
    </style>

    <div class="container">
        <div class="stats-title">About Us</div>
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-people-fill"></i></div>
                    <div class="stat-number" data-target="1079">0</div>
                    <div class="stat-label">Siswa</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
                    <div class="stat-number" data-target="132">0</div>
                    <div class="stat-label">Tenaga Pendidik</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-building"></i></div>
                    <div class="stat-number" data-target="40">0</div>
                    <div class="stat-label">Ruang Kelas</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-card">
                    <div class="stat-icon"><i class="bi bi-award-fill"></i></div>
                    <div class="stat-number" data-target="2500">0</div>
                    <div class="stat-label">Alumnus</div>
                </div>
            </div>
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
