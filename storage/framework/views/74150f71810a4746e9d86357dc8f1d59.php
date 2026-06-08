<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - GoJatim</title>
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
            background: linear-gradient(135deg, #0d1b2a 0%, #1a2a3a 30%, #3a6a7a 65%, #0d1b2a 100%);
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

        /* ─── CONTACT CONTENT ─── */
        .contact-section {
            background: var(--cream);
            padding: 56px 48px;
        }

        .contact-container {
            max-width: 1100px;
            margin: 0 auto;
            width: 100%;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1.2fr 0.8fr;
            gap: 28px;
            align-items: start;
        }

        .contact-card {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            padding: 32px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.03);
        }

        .contact-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 300;
            color: var(--deep-navy);
            margin-bottom: 10px;
        }

        .contact-subtitle {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 14px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .form-group label {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .form-group input,
        .form-group textarea {
            padding: 14px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            border: 1px solid rgba(0,0,0,0.12);
            background: #fff;
            color: var(--charcoal);
            outline: none;
            transition: border-color 0.2s;
            border-radius: 8px;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--accent-terra);
        }

        .form-group textarea { min-height: 140px; resize: vertical; }

        .btn-contact {
            padding: 14px 26px;
            background: var(--deep-navy);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            width: 100%;
            border-radius: 10px;
        }

        .btn-contact:hover { background: var(--accent-terra); }

        /* ─── INFO SIDEBAR ─── */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .info-item {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.06);
            padding: 18px;
            border-radius: 10px;
        }

        .info-item .info-label {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-item p,
        .info-item a {
            color: var(--charcoal);
            text-decoration: none;
            font-size: 14px;
            line-height: 1.6;
        }

        .info-item a:hover { color: var(--accent-terra); }

        .map-placeholder {
            height: 220px;
            border-radius: 10px;
            background: linear-gradient(135deg, rgba(13,27,42,0.95) 0%, rgba(58,106,122,0.9) 60%, rgba(196,98,45,0.85) 100%);
            border: 1px solid rgba(0,0,0,0.08);
            position: relative;
            overflow: hidden;
        }

        .map-placeholder::before {
            content: '';
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 20% 30%, rgba(212,168,83,0.35) 0%, transparent 45%),
                radial-gradient(circle at 70% 60%, rgba(196,98,45,0.35) 0%, transparent 50%),
                linear-gradient(to bottom, rgba(255,255,255,0.06), transparent 45%);
        }

        .map-pin {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -70%);
            width: 60px;
            height: 60px;
            background: rgba(212,168,83,0.18);
            border: 1px solid rgba(212,168,83,0.35);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 22px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
        }

        .map-caption {
            position: absolute;
            left: 18px;
            bottom: 18px;
            right: 18px;
            color: rgba(255,255,255,0.85);
            font-size: 13px;
            line-height: 1.6;
            background: rgba(13,27,42,0.25);
            border: 1px solid rgba(255,255,255,0.12);
            padding: 12px 14px;
            border-radius: 10px;
            backdrop-filter: blur(8px);
        }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .contact-section { padding-left: 24px; padding-right: 24px; }
            .page-hero-content { padding: 0 24px; }
            .contact-grid { grid-template-columns: 1fr; }
            .form-row { grid-template-columns: 1fr; }
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
            <li><a href="<?php echo e(url('/about')); ?>">Tentang Kami</a></li> 
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
            <li><a href="<?php echo e(url('/contact')); ?>" class="nav-active">Kontak</a></li>
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
            <p class="hero-tagline">Say Hello · GoJatim</p>
            <h1>Kontak <br><strong>kita siap membantu</strong></h1>
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-container">
            <div class="contact-grid">
                <!-- FORM -->
                <div>
                    <h2 class="contact-title">Kirim pesan</h2>
                <p class="contact-subtitle">
                    Tulis kebutuhanmu—baik seputar touring, custom itinerary, maupun pertanyaan destinasi.
                    Balasan kami biasanya dalam waktu 1x24 jam.
                </p>

                
                <form onsubmit="event.preventDefault(); alert('Pesan terkirim (demo).');">
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" placeholder="Nama lengkap" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" placeholder="nama@email.com" required>
                        </div>
                    </div>

                    <div class="form-group" style="margin-bottom:14px">
                        <label>Subjek</label>
                        <input type="text" placeholder="Contoh: Request itinerary" required>
                    </div>

                    <div class="form-group" style="margin-bottom:18px">
                        <label>Pesan</label>
                        <textarea placeholder="Tulis pesan kamu di sini..." required></textarea>
                    </div>

                    <button class="btn-contact" type="submit">
                        <i class="fas fa-paper-plane" style="margin-right:10px"></i> Kirim
                    </button>
                </form>
            </div>

            <!-- INFO -->
            <div>
                <div class="info-list">
                    <div class="info-item reveal">
                        <div class="info-label"><i class="fas fa-phone" style="color: var(--accent-terra)"></i> Telepon</div>
                        <p><a href="tel:081249896338">081249896338</a></p>
                    </div>

                    <div class="info-item reveal">
                        <div class="info-label"><i class="fas fa-envelope" style="color: var(--accent-terra)"></i> Email</div>
                        <p><a href="mailto:hello@gojatim.id">hello@gojatim.id</a></p>
                    </div>

                    <div class="info-item reveal">
                        <div class="info-label"><i class="fas fa-map-marker-alt" style="color: var(--accent-terra)"></i> Alamat</div>
                        <p>Surabaya, Jawa Timur</p>
                    </div>


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

        // Navbar shadow
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












<?php /**PATH C:\laragon\www\api-UAS-GoTravelJatim--main\resources\views/contact.blade.php ENDPATH**/ ?>