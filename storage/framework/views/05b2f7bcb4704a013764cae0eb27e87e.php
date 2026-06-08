<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi - GoJatim</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <style>
        /* ─── NAVBAR ACTIVE STATE ─── */
        .nav-links .nav-active {
            color: var(--accent-terra) !important;
        }

        /* ─── DROPDOWN FIX ─── */
        .nav-item-dropdown { position: relative; }

        .nav-item-dropdown > .dropdown-menu {
            display: none !important;
            position: absolute !important;
            top: calc(100% + 12px) !important;
            left: 0 !important;
            background: #fff !important;
            min-width: 160px !important;
            box-shadow: 0 8px 32px rgba(0,0,0,0.12) !important;
            list-style: none !important;
            padding: 8px 0 !important;
            z-index: 9999 !important;
            flex-direction: column !important;
            gap: 0 !important;
        }

        .nav-item-dropdown.open > .dropdown-menu { display: block !important; }

        .nav-item-dropdown > .dropdown-menu > li {
            display: block !important;
            padding: 0 !important;
        }

        .nav-item-dropdown > .dropdown-menu > li > a {
            display: block !important;
            padding: 10px 20px !important;
            font-size: 13px !important;
            color: var(--charcoal) !important;
            text-decoration: none !important;
            white-space: nowrap !important;
            transition: background 0.15s !important;
            gap: 0 !important;
        }

        .nav-item-dropdown > .dropdown-menu > li > a:hover {
            background: var(--cream);
            color: var(--deep-navy);
        }

        /* ─── PAGE HERO (lebih pendek dari homepage) ─── */
        .page-hero {
            position: relative;
            height: 52vh;
            min-height: 380px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 56px;
            overflow: hidden;
        }

        .page-hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg,
                #2d4a3e 0%, #3d6b55 25%, #4a7a6a 45%,
                #5e8a78 60%, #3a5a6a 80%, #0d1b2a 100%
            );
        }

        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,27,42,0.85) 0%, rgba(13,27,42,0.2) 60%, transparent 100%);
        }

        .page-hero-content {
            position: relative;
            z-index: 2;
            padding: 0 48px;
        }

        .page-hero-content .hero-tagline {
            color: var(--accent-gold);
            opacity: 1;
            animation: none;
            margin-bottom: 10px;
        }

        .page-hero-content h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(40px, 5vw, 64px);
            font-weight: 300;
            color: #fff;
            line-height: 1.05;
            letter-spacing: -1px;
        }

        .page-hero-content h1 strong { font-weight: 600; }

        /* ─── DESTINATION CARDS GRID ─── */
        .dest-page-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
        }

        .dest-page-card {
            position: relative;
            overflow: hidden;
            cursor: pointer;
            height: 380px;
        }

        .dest-page-card:nth-child(1) { grid-column: span 2; height: 460px; }
        .dest-page-card:nth-child(6) { grid-column: span 2; }

        .dest-page-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
            display: block;
        }

        /* Placeholder gradients per card */
        .dest-page-card:nth-child(1)  .card-placeholder { background: linear-gradient(160deg, #4a7a6a 0%, #2d5a4a 40%, #1a3a2e 100%); }
        .dest-page-card:nth-child(2)  .card-placeholder { background: linear-gradient(160deg, #6a5a3a 0%, #4a3a20 60%, #2a2010 100%); }
        .dest-page-card:nth-child(3)  .card-placeholder { background: linear-gradient(160deg, #3a5a7a 0%, #2a4060 50%, #0d1b2a 100%); }
        .dest-page-card:nth-child(4)  .card-placeholder { background: linear-gradient(160deg, #5a7a4a 0%, #3a5a2a 55%, #1a3010 100%); }
        .dest-page-card:nth-child(5)  .card-placeholder { background: linear-gradient(160deg, #7a4a3a 0%, #5a2a1a 55%, #2a0a00 100%); }
        .dest-page-card:nth-child(6)  .card-placeholder { background: linear-gradient(160deg, #4a6a7a 0%, #2a4a5a 55%, #0a2030 100%); }
        .dest-page-card:nth-child(7)  .card-placeholder { background: linear-gradient(160deg, #6a7a4a 0%, #4a5a2a 55%, #2a3000 100%); }
        .dest-page-card:nth-child(8)  .card-placeholder { background: linear-gradient(160deg, #7a6a4a 0%, #5a4a2a 55%, #302010 100%); }
        .dest-page-card:nth-child(9)  .card-placeholder { background: linear-gradient(160deg, #5a4a7a 0%, #3a2a5a 55%, #1a0a30 100%); }

        .card-placeholder {
            width: 100%;
            height: 100%;
            position: absolute;
            inset: 0;
        }

        .dest-page-card:hover .dest-page-card-img,
        .dest-page-card:hover .card-placeholder {
            transform: scale(1.05);
        }

        .dest-page-card-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,27,42,0.88) 0%, rgba(13,27,42,0.2) 50%, transparent 100%);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 28px;
            transition: background 0.3s;
        }

        .dest-page-card:hover .dest-page-card-overlay {
            background: linear-gradient(to top, rgba(13,27,42,0.95) 0%, rgba(13,27,42,0.4) 60%, transparent 100%);
        }

        .dest-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: var(--accent-terra);
            color: #fff;
            font-size: 9px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 5px 10px;
        }

        .dest-page-region {
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent-gold);
            margin-bottom: 6px;
        }

        .dest-page-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 26px;
            font-weight: 400;
            color: #fff;
            line-height: 1.1;
            margin-bottom: 8px;
        }

        .dest-page-card:nth-child(1) .dest-page-name { font-size: 36px; }

        .dest-page-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.65);
            line-height: 1.5;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s ease, opacity 0.4s;
            opacity: 0;
        }

        .dest-page-card:hover .dest-page-desc {
            max-height: 80px;
            opacity: 1;
        }

        .dest-page-meta {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-top: 10px;
        }

        .dest-page-meta span {
            font-size: 12px;
            color: rgba(255,255,255,0.55);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .dest-page-meta a {
            margin-left: auto;
            font-size: 12px;
            color: var(--accent-gold);
            text-decoration: none;
            border-bottom: 1px solid var(--accent-gold);
            padding-bottom: 1px;
            opacity: 0;
            transition: opacity 0.3s 0.1s;
        }

        .dest-page-card:hover .dest-page-meta a { opacity: 1; }

        /* ─── FEATURED STRIP (info singkat) ─── */
        .featured-strip {
            background: var(--deep-navy);
            padding: 48px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 1px;
        }

        .featured-item {
            padding: 0 40px;
            border-right: 1px solid rgba(255,255,255,0.08);
        }

        .featured-item:first-child { padding-left: 0; }
        .featured-item:last-child { border-right: none; }

        .featured-num {
            font-family: 'Cormorant Garamond', serif;
            font-size: 13px;
            color: var(--accent-gold);
            letter-spacing: 0.1em;
            margin-bottom: 12px;
        }

        .featured-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: #fff;
            margin-bottom: 8px;
            line-height: 1.2;
        }

        .featured-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.45);
            line-height: 1.6;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .page-hero-content { padding: 0 24px; }
            .filter-bar { padding: 16px 24px; }
            .dest-page-grid { grid-template-columns: 1fr 1fr; }
            .dest-page-card:nth-child(1) { grid-column: span 2; }
            .dest-page-card:nth-child(6) { grid-column: span 1; }
            .featured-strip { grid-template-columns: 1fr; gap: 32px; padding: 32px 24px; }
            .featured-item { border-right: none; border-bottom: 1px solid rgba(255,255,255,0.08); padding: 0 0 24px; }
            .featured-item:last-child { border-bottom: none; }
        }

        @media (max-width: 600px) {
            .dest-page-grid { grid-template-columns: 1fr; }
            .dest-page-card:nth-child(1),
            .dest-page-card:nth-child(6) { grid-column: span 1; }
            .dest-page-card { height: 280px; }
            .nav-links { display: none; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <a href="<?php echo e(url('/')); ?>" class="nav-logo">Go Jatim <span>Travel</span></a>
        <ul class="nav-links">
            <li><a href="<?php echo e(url('/')); ?>">Beranda</a></li>
            <li><a href="<?php echo e(url('/about')); ?>">Tentang Kami</a></li> 
            <li><a href="<?php echo e(url('/about')); ?>">Tentang Kami</a></li> 
            <li><a href="<?php echo e(url('/tours')); ?>">Touring</a></li>
            <li class="nav-item-dropdown active">
                <a href="<?php echo e(url('/destinations')); ?>" class="dropdown-trigger nav-active">Destinasi <span class="arrow">▾</span></a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo e(url('/trip/1')); ?>">Trip 1 Hari</a></li>
                    <li><a href="<?php echo e(url('/trip/2')); ?>">Trip 2 Hari</a></li>
                    <li><a href="<?php echo e(url('/trip/3')); ?>">Trip 3 Hari</a></li>
                    <li><a href="<?php echo e(url('/trip/4')); ?>">Trip 4 Hari</a></li>
                    <li><a href="<?php echo e(url('/trip/5')); ?>">Trip 5 Hari</a></li>
                </ul>
            </li>
            <li><a href="<?php echo e(url('/contact')); ?>">Kontak</a></li>
        </ul>
        <div class="nav-right">
            <span class="nav-phone">
                <i class="fas fa-phone"></i> 081249896338
            </span>
            <div class="nav-icons">
                <a href="<?php echo e(url('/login')); ?>"><i class="far fa-user"></i></a>
                <a href="#"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </nav>


    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <p class="hero-tagline">Hidden Gems · Jawa Timur</p>
            <h1>Tempat yang belum<br><strong>banyak orang tahu</strong></h1>
        </div>
    </section>

    <!-- TRIP PACKAGES (untuk anchor navbar) -->
    <?php
        $paketWisata = [
            1 => ['Pantai Watu Karung', 'Goa Lowo'],
            2 => ['Gunung Raung', 'Telaga Ngebel'],
            3 => ['Air Terjun Coban Baung', 'Bukit Teletubbies', 'Pantai Ngliyep'],
            4 => ['Situs Majapahit Trowulan', 'Bukit Mongkrang', 'Pantai Watu Karung', 'Gunung Raung'],
            5 => ['Goa Lowo', 'Telaga Ngebel', 'Air Terjun Coban Baung', 'Situs Majapahit Trowulan', 'Bukit Mongkrang'],
        ];

        // Map destinasi akan dibuat di bawah setelah array $destinations didefinisikan.
    ?>

    <!-- DESTINATIONS GRID -->
    <?php
    $destinations = [
        [
            'name'    => 'Pantai Watu Karung',
            'region'  => 'Kab. Pacitan',
            'badge'   => 'Hidden Gem',
            'desc'    => 'Pantai terpencil dengan ombak kelas dunia, surga para peselancar yang belum ramai turis. Batu karang raksasa dan air sebening kristal.',
            'icon'    => 'fas fa-water',
            'detail'  => 'Pantai',
            'rating'  => '4.8',
            'image'   => 'images/destinations/Watu karung beach.jpg',
        ],
        [
            'name'    => 'Gunung Raung',
            'region'  => 'Kab. Banyuwangi',
            'badge'   => 'Trekking',
            'desc'    => 'Kaldera aktif terluas di Jawa dengan medan ekstrem. Hanya untuk pendaki berpengalaman — pemandangannya tak tertandingi.',
            'icon'    => 'fas fa-mountain',
            'detail'  => 'Gunung',
            'rating'  => '4.9',
            'image'   => 'images/destinations/Gunung Raung.jpg',
        ],
        [
            'name'    => 'Telaga Ngebel',
            'region'  => 'Kab. Ponorogo',
            'badge'   => 'Hidden Gem',
            'desc'    => 'Danau alami di ketinggian 734 mdpl dikelilingi hutan pinus. Kabut pagi yang dramatis dan suasana yang tenang jauh dari keramaian.',
            'icon'    => 'fas fa-leaf',
            'detail'  => 'Danau',
            'rating'  => '4.7',
            'image'   => 'images/destinations/Telaga Ngebel.jpg',
        ],
        [
            'name'    => 'Air Terjun Coban Baung',
            'region'  => 'Kab. Pasuruan',
            'badge'   => 'Alam',
            'desc'    => 'Air terjun bertingkat yang tersembunyi di lereng Gunung Arjuno. Trek 2 jam melewati hutan tropis yang masih sangat alami.',
            'icon'    => 'fas fa-tint',
            'detail'  => 'Air Terjun',
            'rating'  => '4.6',
            'image'   => 'images/destinations/Coban Baung.jpg',
        ],
        [
            'name'    => 'Bukit Teletubbies',
            'region'  => 'Kab. Probolinggo',
            'badge'   => 'Hidden Gem',
            'desc'    => 'Padang sabana hijau berbukit-bukit di kaki Bromo yang jarang masuk itinerary wisatawan. Terbaik dikunjungi saat musim hujan.',
            'icon'    => 'fas fa-seedling',
            'detail'  => 'Sabana',
            'rating'  => '4.7',
            'image'   => 'images/destinations/bukit teletubbies.jpg',
        ],
        [
            'name'    => 'Pantai Ngliyep',
            'region'  => 'Kab. Malang',
            'badge'   => 'Pantai',
            'desc'    => 'Pantai selatan yang dramatis dengan tebing karang dan ombak ganas. Bukan untuk berenang, tapi untuk menikmati keagungan alam.',
            'icon'    => 'fas fa-umbrella-beach',
            'detail'  => 'Pantai',
            'rating'  => '4.5',
            'image'   => 'images/destinations/Pantai Ngliyep.jpg',
        ],
        [
            'name'    => 'Situs Majapahit Trowulan',
            'region'  => 'Kab. Mojokerto',
            'badge'   => 'Budaya',
            'desc'    => 'Reruntuhan ibukota kerajaan terbesar Nusantara. Candi, kolam, dan museum yang menyimpan kejayaan abad ke-13.',
            'icon'    => 'fas fa-landmark',
            'detail'  => 'Sejarah',
            'rating'  => '4.6',
            'image'   => 'images/destinations/trowulan.jpg',
        ],
        [
            'name'    => 'Goa Lowo',
            'region'  => 'Kab. Trenggalek',
            'badge'   => 'Hidden Gem',
            'desc'    => 'Salah satu gua terpanjang di Asia Tenggara dengan stalaktit dan stalagmit yang menakjubkan, belum banyak yang tahu.',
            'icon'    => 'fas fa-moon',
            'detail'  => 'Goa',
            'rating'  => '4.7',
            'image'   => 'images/destinations/Gowa Lowo.webp',
        ],
        [
            'name'    => 'Bukit Mongkrang',
            'region'  => 'Kab. Karanganyar',
            'badge'   => 'Trekking',
            'desc'    => 'Padang edelweis di lereng Gunung Lawu dengan pemandangan matahari terbit paling indah di Jawa Timur bagian barat.',
            'icon'    => 'fas fa-sun',
            'detail'  => 'Bukit',
            'rating'  => '4.8',
            'image'   => 'images/destinations/bukit mongkrang.jpg',
        ],
    ];

    // Map untuk mendapatkan detail destinasi dari array $destinations
    $destMap = [];
    foreach ($destinations as $d) {
        $destMap[strtolower($d['name'])] = $d;
    }
    ?>

    <div class="dest-page-grid">
        <?php $__currentLoopData = $destinations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $dest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="dest-page-card reveal">
            <?php if(isset($dest['image']) && $dest['image']): ?>
                <img src="<?php echo e(asset($dest['image'])); ?>" alt="<?php echo e($dest['name']); ?>" class="dest-page-card-img">
            <?php else: ?>
                <div class="card-placeholder"></div>
            <?php endif; ?>
            <span class="dest-badge"><?php echo e($dest['badge']); ?></span>
            <div class="dest-page-card-overlay">
                <p class="dest-page-region">
                    <i class="fas fa-map-marker-alt" style="margin-right:4px"></i><?php echo e($dest['region']); ?> · Jawa Timur
                </p>
                <h3 class="dest-page-name"><?php echo e($dest['name']); ?></h3>
                <p class="dest-page-desc"><?php echo e($dest['desc']); ?></p>
                <div class="dest-page-meta">
                    <span><i class="<?php echo e($dest['icon']); ?>"></i> <?php echo e($dest['detail']); ?></span>
                    <span><i class="fas fa-star" style="color: var(--accent-gold)"></i> <?php echo e($dest['rating']); ?></span>
                    <a href="<?php echo e(url('/destinations/' . ($i + 1))); ?>">Lihat detail →</a>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- FEATURED STRIP -->
    <div class="featured-strip">
        <div class="featured-item reveal">
            <p class="featured-num">01 — Kenapa Hidden Gem?</p>
            <h3 class="featured-title">Jauh dari keramaian, dekat dengan alam</h3>
            <p class="featured-desc">Kami kurasi destinasi yang belum viral — masih bersih, masih sepi, dan masih memiliki daya magis yang sesungguhnya.</p>
        </div>
        <div class="featured-item reveal">
            <p class="featured-num">02 — Panduan Lokal</p>
            <h3 class="featured-title">Dipandu warga asli, bukan aplikasi</h3>
            <p class="featured-desc">Setiap destinasi kami didampingi pemandu lokal berpengalaman yang tahu jalur, waktu terbaik, dan cerita di balik tempat itu.</p>
        </div>
        <div class="featured-item reveal">
            <p class="featured-num">03 — Perjalanan Bertanggung Jawab</p>
            <h3 class="featured-title">Jelajah tanpa merusak</h3>
            <p class="featured-desc">Kami menerapkan prinsip Leave No Trace — setiap wisatawan ikut menjaga agar tempat ini tetap indah untuk generasi berikutnya.</p>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?php echo e(url('/')); ?>" class="nav-logo">Go Jatim <span>Travel</span></a>
                <p class="footer-desc">GoJatim hadir untuk membantu kamu menjelajahi keindahan alam dan budaya Jawa Timur — dari pesisir selatan Pacitan hingga puncak Lumajang.</p>
                <div class="footer-socials">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div>
                <p class="footer-heading">Company</p>
                <ul class="footer-links">
                    <li><a href="<?php echo e(url('/about')); ?>">About Us</a></li>
                    <li><a href="<?php echo e(url('/tours')); ?>">Our Tours</a></li>
                    <li><a href="<?php echo e(url('/destinations')); ?>">Destinations</a></li>
                    <li><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                    <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
                </ul>
            </div>
            <div>
                <p class="footer-heading">Support</p>
                <ul class="footer-links">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Booking Guide</a></li>
                    <li><a href="#">Refund Policy</a></li>
                </ul>
            </div>
            <div>
                <p class="footer-heading">Contact</p>
                <ul class="footer-links">
                    <li><a href="tel:081249896338"><i class="fas fa-phone" style="width:16px"></i> 081249896338</a></li>
                    <li><a href="mailto:hello@gojatim.id"><i class="fas fa-envelope" style="width:16px"></i> hello@gojatim.id</a></li>
                    <li><a href="#"><i class="fas fa-map-marker-alt" style="width:16px"></i> Surabaya, Jawa Timur</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© <?php echo e(date('Y')); ?> GoJatim. All rights reserved.</span>
            <span>Made with ♥ in Indonesia</span>
        </div>
    </footer>

    <script>
        // Scroll reveal
        const reveals = document.querySelectorAll('.reveal');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach((entry, i) => {
                if (entry.isIntersecting) {
                    setTimeout(() => entry.target.classList.add('visible'), i * 80);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        reveals.forEach(el => observer.observe(el));

        // Navbar shadow on scroll
        // Dropdown click toggle
    document.querySelectorAll('.nav-item-dropdown > .dropdown-trigger').forEach(trigger => {
        trigger.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.closest('.nav-item-dropdown');
            const isOpen = parent.classList.contains('open');
            // tutup semua dulu
            document.querySelectorAll('.nav-item-dropdown').forEach(el => el.classList.remove('open'));
            if (!isOpen) parent.classList.add('open');
        });
    });
    // klik di luar = tutup
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-item-dropdown')) {
            document.querySelectorAll('.nav-item-dropdown').forEach(el => el.classList.remove('open'));
        }
    });

    window.addEventListener('scroll', () => {
            document.querySelector('nav').style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)' : 'none';
        });
</script>
<script src="<?php echo e(asset('js/auth.js')); ?>"></script></body>
</html>












<?php /**PATH C:\laragon\www\api-UAS-GoTravelJatim--main\resources\views/destinations.blade.php ENDPATH**/ ?>