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
        <!-- ROW 1: Video kiri - Text kanan -->
        <div class="row align-items-center g-4 mb-5">
            <!-- Background video -->
            <div class="col-md-6">
                <div class="video-wrapper shadow">
                    <video autoplay muted loop playsinline>
                        <source src="assets/videos/video-sit.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>

            <!-- Text content -->
            <div class="col-md-6 video-overlay">
                <div class="about-subtitle">Profil</div>
                <div class="about-title">SIT Qordova</div>
                <div class="about-desc">
                    <h4>Pendirian SMPIT Qordova (2006)</h4>
                    Langkah pertama yang diambil Yayasan Amal Insan Rabbani dalam dunia pendidikan adalah mendirikan
                    Sekolah Menengah Pertama Islam Terpadu (SMPIT) Qordova pada tahun 2006. Sekolah ini didirikan dengan
                    tujuan untuk menyediakan pendidikan berbasis nilai-nilai Islami yang berkualitas, sehingga dapat
                    membentuk siswa yang cerdas, berakhlak, dan berdaya saing.
                </div>
                <button class="btn btn-info text-white rounded-pill px-4 mt-3" data-bs-toggle="modal"
                    data-bs-target="#aboutModal">
                    Selengkapnya
                </button>
            </div>
        </div>


        <div class="row align-items-center g-4 flex-md-row-reverse">
            <!-- Image -->
            <div class="col-md-6">
                <div class="image-wrapper shadow">
                    <img src="assets/images/pengurus/about_us.png" alt="Tentang SIT Qordova" class="img-fluid">
                </div>
            </div>

            <!-- Text content -->
            <div class="col-md-6 video-overlay">
                <div class="about-subtitle">Yayasan</div>
                <div class="about-title">Amal Insan Rabbany</div>
                <div class="about-desc">
                    <h4>Perkembangan SIT Qordova</h4>
                    Setelah berdirinya SMPIT Qordova, Yayasan terus melanjutkan kiprahnya dalam pendidikan dengan
                    mendirikan SDIT pada tahun 2007 dan SMAIT pada tahun 2018. Kehadiran sekolah-sekolah ini semakin
                    memperkokoh peran SIT Qordova dalam memberikan pendidikan berkualitas yang Islami, modern, dan
                    membekali siswa dengan kecakapan hidup yang bermanfaat.
                </div>
                <button class="btn btn-info text-white rounded-pill px-4 mt-3" data-bs-toggle="modal"
                    data-bs-target="#historyModal">
                    Selengkapnya
                </button>
            </div>
        </div>
    </div>

    <!-- Modal Profil -->
    <div class="modal fade" id="aboutModal" tabindex="-1" aria-labelledby="aboutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="aboutModalLabel">Tentang SIT Qordova</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-muted">
                    <h5>Pendirian SMPIT Qordova (2006)</h5>
                    <p>
                        Langkah pertama yang diambil Yayasan Amal Insan Rabbani dalam dunia pendidikan adalah mendirikan
                        Sekolah Menengah Pertama Islam Terpadu (SMPIT) Qordova pada tahun 2006...
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Sejarah -->
    <div class="modal fade" id="historyModal" tabindex="-1" aria-labelledby="historyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="historyModalLabel">Sejarah SIT Qordova</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body text-muted">
                    <h5>Perjalanan Pendidikan</h5>
                    <p>
                        Setelah berdirinya SMPIT Qordova pada tahun 2006, Yayasan terus mengembangkan jenjang pendidikan
                        dengan mendirikan SDIT pada tahun 2007 dan SMAIT pada tahun 2018. Dengan adanya jenjang yang
                        lengkap, SIT Qordova berkomitmen untuk membimbing siswa dari dasar hingga menengah atas dengan
                        kualitas pendidikan Islami yang unggul.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>
