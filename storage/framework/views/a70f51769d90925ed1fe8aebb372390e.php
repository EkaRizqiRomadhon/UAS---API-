<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - GoJatim Travel </title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="<?php echo e(asset('css/index.css')); ?>">
    <style>
        /* ─── DROPDOWN NAVBAR ─── */
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
            background: var(--cream, #f5f3ee) !important;
            color: var(--deep-navy, #0d1b2a) !important;
        }

        .nav-active { color: var(--accent-terra, #c4714f) !important; }

        /* ─── PAGE HERO ─── */
        .page-hero {
            position: relative;
            height: 52vh;
            min-height: 360px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 56px;
            overflow: hidden;
        }

        .page-hero-bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, #1a2a1a 0%, #2a4a3a 30%, #4a6a5a 65%, #1a2a1a 100%);
        }

        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,27,42,0.92) 0%, rgba(13,27,42,0.35) 55%, transparent 100%);
        }

        .page-hero-content {
            position: relative;
            z-index: 2;
            padding: 0 48px;
        }

        .page-hero-content .hero-tagline {
            font-family: 'Cormorant Garamond', serif;
            font-style: italic;
            font-size: 18px;
            color: var(--accent-gold);
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

        /* ─── ABOUT CONTENT ─── */
        .about-section {
            background: var(--cream, #faf7f2);
            padding: 80px 48px;
        }

        .about-inner {
            max-width: 1000px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr;
            gap: 48px;
        }

        .about-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 300;
            color: var(--deep-navy);
            margin-bottom: 24px;
            line-height: 1.1;
        }

        .about-text {
            font-family: 'DM Sans', sans-serif;
            font-size: 16px;
            color: #555;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .about-features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 32px;
            margin-top: 40px;
        }

        .feature-card {
            background: #fff;
            padding: 32px;
            border: 1px solid rgba(0,0,0,0.06);
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.03);
            text-align: center;
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            background: rgba(196, 98, 45, 0.1);
            color: var(--accent-terra);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            font-size: 24px;
        }

        .feature-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 24px;
            font-weight: 500;
            color: var(--deep-navy);
            margin-bottom: 12px;
        }

        .feature-desc {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .about-section { padding-left: 24px; padding-right: 24px; }
            .page-hero-content { padding: 0 24px; }
        }

        @media (max-width: 600px) {
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
            <li><a href="<?php echo e(url('/about')); ?>" class="nav-active">Tentang Kami</a></li>
            <li><a href="<?php echo e(url('/tours')); ?>">Touring</a></li>
            <li class="nav-item-dropdown">
                <a href="<?php echo e(url('/destinations')); ?>" class="dropdown-trigger">Destinasi <span class="arrow">▾</span></a>
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
            <span class="nav-phone"><i class="fas fa-phone"></i> 081249896338</span>
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
            <p class="hero-tagline">Cerita Kami · GoJatim</p>
            <h1>Membawa kamu <br><strong>lebih dekat dengan alam</strong></h1>
        </div>
    </section>
    
    <!-- ABOUT CONTENT -->
    <section class="about-section">
        <div class="about-inner">
            <div class="reveal">
                <h2 class="about-title">Siapa Kami?</h2>
                <p class="about-text">
                    GoJatim lahir dari kecintaan yang mendalam terhadap kekayaan alam dan budaya Jawa Timur. Kami percaya bahwa setiap perjalanan bukan sekadar memindahkan raga dari satu titik ke titik lain, melainkan sebuah proses untuk menemukan kembali jati diri dan merajut harmoni dengan semesta.
                </p>
                <p class="about-text">
                    Sebagai penyedia layanan tur terkemuka, misi kami adalah menghadirkan pengalaman perjalanan yang autentik, berkesan, dan bertanggung jawab. Kami mengkurasi destinasi—mulai dari pantai yang tersembunyi, air terjun di kedalaman hutan, hingga puncak gunung yang menantang—untuk memastikan Anda mendapatkan petualangan yang tak terlupakan.
                </p>
            </div>

            <div class="about-features">
                <div class="feature-card reveal">
                    <div class="feature-icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <h3 class="feature-title">Destinasi Pilihan</h3>
                    <p class="feature-desc">Kami tidak sekadar membawa Anda ke tempat wisata, tapi ke spot "hidden gem" yang menyuguhkan keindahan alam autentik.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="feature-title">Pemandu Lokal Berpengalaman</h3>
                    <p class="feature-desc">Ditemani oleh tim yang menguasai medan, budaya, dan kearifan lokal untuk memastikan perjalanan aman dan berkesan.</p>
                </div>
                <div class="feature-card reveal">
                    <div class="feature-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="feature-title">Pariwisata Berkelanjutan</h3>
                    <p class="feature-desc">Berkomitmen menjaga kelestarian alam dan memberdayakan komunitas lokal demi masa depan bumi yang lebih baik.</p>
                </div>
            </div>
        </div>
    </section>

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
            const nav = document.querySelector('nav');
            nav.style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)' : 'none';
        });
</script>
<script src="<?php echo e(asset('js/auth.js')); ?>"></script></body>
</html>













<?php /**PATH C:\laragon\www\api-UAS-GoTravelJatim--main\resources\views/about.blade.php ENDPATH**/ ?>