{{-- resources/views/careers/closed.blade.php --}}
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Karier — Belum Ada Hiring</title>

    <!-- (Opsional) Bootstrap 5 untuk grid & utilitas cepat -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bg: #0f172a;
            /* slate-900 */
            --card: #0b1227cc;
            /* translucent */
            --text: #e2e8f0;
            /* slate-200 */
            --muted: #94a3b8;
            /* slate-400 */
            --accent: #60a5fa;
            /* blue-400 */
            --accent-2: #a78bfa;
            /* violet-400 */
            --success: #34d399;
            /* emerald-400 */
        }

        * {
            box-sizing: border-box
        }

        body {
            margin: 0;
            min-height: 100dvh;
            color: var(--text);
            background: radial-gradient(1200px 800px at 10% -10%, #1e293b 0, #0f172a 40%), var(--bg);
            font-family: ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            letter-spacing: .2px;
        }

        .wrap {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100dvh;
            padding: 32px;
            overflow: hidden;
        }

        /* Glass card */
        .cardx {
            width: min(980px, 100%);
            background: linear-gradient(180deg, rgba(255, 255, 255, .06), rgba(255, 255, 255, .02));
            border: 1px solid rgba(255, 255, 255, .1);
            border-radius: 28px;
            padding: clamp(20px, 4vw, 40px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, .35), inset 0 1px rgba(255, 255, 255, .04);
            backdrop-filter: blur(10px);
            position: relative;
            z-index: 2;
        }

        .badge-soft {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 14px;
            border-radius: 999px;
            font-size: 14px;
            background: linear-gradient(90deg, rgba(96, 165, 250, .15), rgba(167, 139, 250, .15));
            border: 1px solid rgba(148, 163, 184, .25);
            color: var(--text);
        }

        .title {
            font-weight: 800;
            line-height: 1.05;
            margin: 18px 0 14px;
            font-size: clamp(28px, 4.4vw, 52px);
            letter-spacing: .3px;
            background: linear-gradient(90deg, #fff, #c7d2fe 40%, #93c5fd 80%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .subtitle {
            color: var(--muted);
            font-size: clamp(15px, 1.8vw, 18px)
        }

        .cta-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px
        }

        .btnx {
            appearance: none;
            border: none;
            cursor: pointer;
            border-radius: 14px;
            padding: 14px 18px;
            font-weight: 700;
            transition: transform .08s ease, box-shadow .2s ease, background .3s ease;
            box-shadow: 0 8px 24px rgba(0, 0, 0, .25);
            color: #0b1227;
        }

        .btn-primaryx {
            background: linear-gradient(90deg, var(--accent), var(--accent-2));
        }

        .btn-ghostx {
            background: rgba(148, 163, 184, .12);
            color: var(--text);
            border: 1px solid rgba(148, 163, 184, .25);
        }

        .btnx:active {
            transform: translateY(1px)
        }

        /* Divider */
        .divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(148, 163, 184, .25), transparent);
            margin: 28px 0;
        }

        /* Perks list */
        .perks {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 14px
        }

        .perk {
            grid-column: span 12;
            background: rgba(15, 23, 42, .55);
            border: 1px solid rgba(255, 255, 255, .06);
            padding: 16px;
            border-radius: 16px;
        }

        @media (min-width:768px) {
            .perk {
                grid-column: span 4;
            }
        }

        .perk h4 {
            margin: 0 0 6px;
            font-size: 16px
        }

        .perk p {
            margin: 0;
            color: var(--muted);
            font-size: 14px
        }

        /* Notify form */
        .notify {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-top: 10px
        }

        .notify input {
            flex: 1 1 260px;
            padding: 14px 16px;
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, .28);
            background: rgba(2, 6, 23, .6);
            color: var(--text);
            outline: none;
        }

        .notify button {
            padding: 14px 18px;
            border-radius: 12px;
            border: 1px solid rgba(148, 163, 184, .28);
            background: linear-gradient(90deg, #34d399, #22d3ee);
            color: #0b1227;
            font-weight: 800
        }

        /* Floating shapes */
        .blob,
        .orb {
            position: absolute;
            filter: blur(40px);
            opacity: .35;
            z-index: 1;
            pointer-events: none;
            animation: float 12s ease-in-out infinite;
        }

        .blob {
            width: 420px;
            height: 420px;
            background: radial-gradient(circle at 30% 30%, #60a5fa, transparent 60%);
            top: -120px;
            left: -80px
        }

        .orb {
            width: 520px;
            height: 520px;
            background: radial-gradient(circle at 70% 70%, #a78bfa, transparent 60%);
            bottom: -140px;
            right: -60px
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0)
            }

            50% {
                transform: translateY(-18px)
            }
        }

        /* Tiny confetti dots */
        .spark {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            opacity: .5;
            z-index: 0;
            background: conic-gradient(from 0deg, #93c5fd, #a78bfa, #34d399, #93c5fd);
            animation: drift 18s linear infinite;
        }

        @keyframes drift {
            to {
                transform: translateY(-120vh) rotate(360deg)
            }
        }
    </style>
</head>

<body>
    <!-- background décor -->
    <div class="blob"></div>
    <div class="orb"></div>
    <!-- a few drifting sparks -->
    <div class="spark" style="left:8%; bottom:-10%"></div>
    <div class="spark" style="left:22%; bottom:-12%; width:8px; height:8px"></div>
    <div class="spark" style="left:68%; bottom:-14%"></div>
    <div class="spark" style="left:84%; bottom:-8%; width:8px; height:8px"></div>

    <main class="wrap">
        <section class="cardx">
            <span class="badge-soft">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M5 12h14M12 5v14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                </svg>
                Karier di Perusahaan Kami
            </span>

            <h1 class="title">Belum Ada Hiring Saat Ini</h1>
            <p class="subtitle">
                Terima kasih atas ketertarikanmu! Saat ini kami belum membuka lowongan.
                Namun, tim terus berkembang—tinggalkan email agar kami kabari saat ada posisi baru,
                atau jelajahi profil kami untuk mengenal budaya kerja.
            </p>

            <div class="cta-row">
                <a href="{{ url('/') }}" class="btnx btn-ghostx">← Kembali ke Beranda</a>
                <a href="{{ url('/about') }}" class="btnx btn-primaryx">Lihat Budaya & Nilai</a>
            </div>

            <div class="divider"></div>

            <div class="row g-3 align-items-stretch">
                <div class="col-12 col-lg-7">
                    <div class="perk">
                        <h4>Dapat Notifikasi Saat Buka Lowongan</h4>
                        <p>Masukkan emailmu—kami kirim kabar saat rekrutmen dibuka lagi.</p>
                        <form class="notify" method="post" action="{{ route('hiring.notify') }}">
                            @csrf
                            <input type="email" name="email" placeholder="emailkamu@contoh.com" required />
                            <button type="submit">Beritahu Saya</button>
                        </form>
                        @if (session('status'))
                            <p class="mt-2" style="color:var(--success); font-weight:700">{{ session('status') }}</p>
                        @endif
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="perks">
                        <div class="perk">
                            <h4>Tim Berpengaruh</h4>
                            <p>Proyek nyata, dampak nyata. Saat dibuka, kamu bisa langsung berkontribusi.</p>
                        </div>
                        <div class="perk">
                            <h4>Work–Life Balance</h4>
                            <p>Fleksibel & manusiawi—ritme kerja yang sehat.</p>
                        </div>
                        <div class="perk">
                            <h4>Growth Mindset</h4>
                            <p>Budget learning, mentoring, dan kesempatan upskill.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="divider"></div>

            <div class="d-flex flex-wrap gap-2 align-items-center">
                <span class="badge-soft">Ikuti kami:</span>
                <a href="https://www.instagram.com/" class="btnx btn-ghostx">Instagram</a>
                <a href="https://www.linkedin.com/" class="btnx btn-ghostx">LinkedIn</a>
                <a href="https://www.twitter.com/" class="btnx btn-ghostx">X / Twitter</a>
            </div>
        </section>
    </main>

    <script>
        // jalankan confetti sederhana secara halus
        document.querySelectorAll('.spark').forEach((s, i) => {
            const delay = (i * 3) + 's';
            s.style.animationDelay = delay;
        });
    </script>
</body>

</html>
