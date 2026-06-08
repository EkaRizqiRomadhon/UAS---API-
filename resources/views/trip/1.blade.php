<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip 1 Hari - GoJatim</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
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
        .nav-item-dropdown > .dropdown-menu > li { display: block !important; padding: 0 !important; }
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
        .nav-item-dropdown > .dropdown-menu > li > a:hover,
        .nav-item-dropdown > .dropdown-menu > li > a.trip-active {
            background: var(--cream, #f5f3ee) !important;
            color: var(--accent-terra, #c4714f) !important;
        }
        .nav-active { color: var(--accent-terra, #c4714f) !important; }

        /* ─── PAGE HERO ─── */
        .page-hero {
            position: relative;
            height: 60vh;
            min-height: 420px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 56px;
            overflow: hidden;
        }
        .page-hero-bg {
            position: absolute;
            inset: 0;
            background: url('{{ asset('images/destinations/Watu karung beach.jpg') }}') center 40% / cover no-repeat;
        }
        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(13,27,42,0.92) 0%, rgba(13,27,42,0.4) 100%), 
                        linear-gradient(to top, rgba(13,27,42,0.9) 0%, transparent 60%);
        }
        .page-hero-content {
            position: relative;
            z-index: 2;
            padding: 0 48px;
        }
        .hero-breadcrumb {
            font-size: 12px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
            margin-bottom: 12px;
        }
        .hero-breadcrumb a { color: var(--accent-gold, #d4a853); text-decoration: none; }
        .hero-breadcrumb a:hover { color: #fff; }
        .page-hero-content h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(36px, 5vw, 60px);
            font-weight: 300;
            color: #fff;
            line-height: 1.05;
            letter-spacing: -1px;
        }
        .page-hero-content h1 strong { font-weight: 600; }
        .hero-meta {
            display: flex;
            align-items: center;
            gap: 24px;
            margin-top: 16px;
        }
        .hero-meta span {
            font-size: 13px;
            color: rgba(255,255,255,0.65);
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .hero-meta .badge {
            background: var(--accent-terra, #c4622d);
            color: #fff;
            font-size: 10px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 5px 12px;
        }

        /* ─── TRIP CONTENT ─── */
        .trip-section {
            padding: 64px 48px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .trip-intro {
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 64px;
            margin-bottom: 64px;
            align-items: start;
        }

        .trip-desc-label {
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent-terra, #c4622d);
            margin-bottom: 12px;
        }

        .trip-desc-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 300;
            color: var(--deep-navy, #0d1b2a);
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .trip-desc-title em { font-style: italic; }

        .trip-desc-body {
            font-size: 15px;
            color: #555;
            line-height: 1.75;
        }

        /* Info Box */
        .trip-info-box {
            background: var(--cream, #faf7f2);
            border: 1px solid rgba(0,0,0,0.07);
            padding: 28px;
        }

        .trip-info-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            font-weight: 500;
            color: var(--deep-navy, #0d1b2a);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(0,0,0,0.08);
        }

        .trip-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-size: 13px;
        }

        .trip-info-row:last-child { border-bottom: none; }
        .trip-info-row .label { color: var(--muted, #8a8a8a); }
        .trip-info-row .value { font-weight: 500; color: var(--deep-navy, #0d1b2a); }

        .btn-book {
            display: block;
            margin-top: 20px;
            background: var(--deep-navy, #0d1b2a);
            color: #fff;
            text-align: center;
            padding: 14px;
            font-size: 13px;
            font-weight: 500;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            text-decoration: none;
            transition: background 0.2s;
        }

        .btn-book:hover { background: var(--accent-terra, #c4622d); }

        /* ─── DESTINASI CARDS ─── */
        .section-label-sm {
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent-terra, #c4622d);
            margin-bottom: 8px;
        }

        .section-title-md {
            font-family: 'Cormorant Garamond', serif;
            font-size: clamp(28px, 3vw, 40px);
            font-weight: 300;
            color: var(--deep-navy, #0d1b2a);
            margin-bottom: 36px;
            line-height: 1.1;
        }

        .dest-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        .dest-card-item {
            background: #fff;
            border: 1px solid rgba(0,0,0,0.07);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .dest-card-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 48px rgba(0,0,0,0.1);
        }

        .dest-card-visual {
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .dest-card-visual .placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            color: rgba(255,255,255,0.4);
            transition: transform 0.5s ease;
        }

        .dest-card-item:hover .dest-card-visual .placeholder { transform: scale(1.05); }

        .dest-card-badge {
            position: absolute;
            top: 14px;
            left: 14px;
            background: var(--accent-terra, #c4622d);
            color: #fff;
            font-size: 9px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 4px 10px;
        }

        .dest-card-body { padding: 20px; }

        .dest-card-region {
            font-size: 11px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: var(--muted, #8a8a8a);
            margin-bottom: 6px;
        }

        .dest-card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--deep-navy, #0d1b2a);
            margin-bottom: 8px;
        }

        .dest-card-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 14px;
        }

        .dest-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding-top: 12px;
            border-top: 1px solid rgba(0,0,0,0.06);
            font-size: 12px;
            color: var(--muted, #8a8a8a);
        }

        .dest-card-footer .rating { color: var(--accent-gold, #d4a853); font-weight: 500; }

        /* ─── ITINERARY TIMELINE ─── */
        .itinerary-section {
            background: var(--cream, #faf7f2);
            padding: 64px 48px;
        }

        .itinerary-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline {
            position: relative;
            padding-left: 32px;
            margin-top: 36px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            bottom: 0;
            width: 1px;
            background: rgba(0,0,0,0.12);
        }

        .timeline-item {
            position: relative;
            padding-bottom: 36px;
        }

        .timeline-item:last-child { padding-bottom: 0; }

        .timeline-dot {
            position: absolute;
            left: -36px;
            top: 6px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--accent-terra, #c4622d);
            border: 2px solid var(--cream, #faf7f2);
            outline: 1px solid var(--accent-terra, #c4622d);
        }

        .timeline-time {
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--accent-terra, #c4622d);
            margin-bottom: 4px;
        }

        .timeline-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 20px;
            font-weight: 500;
            color: var(--deep-navy, #0d1b2a);
            margin-bottom: 6px;
        }

        .timeline-desc {
            font-size: 13px;
            color: #666;
            line-height: 1.6;
        }

        /* ─── OTHER TRIPS NAV ─── */
        .other-trips {
            padding: 48px;
            background: var(--deep-navy, #0d1b2a);
        }

        .other-trips-inner {
            max-width: 1200px;
            margin: 0 auto;
        }

        .other-trips-label {
            font-size: 11px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.4);
            margin-bottom: 20px;
        }

        .other-trips-list {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .other-trip-btn {
            padding: 10px 22px;
            border: 1px solid rgba(255,255,255,0.15);
            color: rgba(255,255,255,0.65);
            font-size: 13px;
            text-decoration: none;
            transition: all 0.2s;
        }

        .other-trip-btn:hover,
        .other-trip-btn.current {
            background: var(--accent-terra, #c4622d);
            border-color: var(--accent-terra, #c4622d);
            color: #fff;
        }

        /* ─── FOOTER ─── */
        footer {
            background: var(--deep-navy, #0d1b2a);
            color: rgba(255,255,255,0.7);
            padding: 64px 48px 32px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1fr;
            gap: 48px;
            margin-bottom: 48px;
        }
        .footer-brand .nav-logo { color: white; display: block; margin-bottom: 16px; }
        .footer-desc { font-size: 14px; line-height: 1.7; max-width: 280px; color: rgba(255,255,255,0.5); }
        .footer-socials { display: flex; gap: 12px; margin-top: 20px; }
        .footer-socials a {
            width: 36px; height: 36px;
            border: 1px solid rgba(255,255,255,0.15);
            display: flex; align-items: center; justify-content: center;
            color: rgba(255,255,255,0.6); text-decoration: none; font-size: 14px; transition: all 0.2s;
        }
        .footer-socials a:hover { background: var(--accent-terra, #c4622d); border-color: var(--accent-terra, #c4622d); color: white; }
        .footer-heading { font-size: 11px; letter-spacing: 0.14em; text-transform: uppercase; color: white; margin-bottom: 20px; }
        .footer-links { list-style: none; display: flex; flex-direction: column; gap: 10px; }
        .footer-links a { font-size: 14px; color: rgba(255,255,255,0.5); text-decoration: none; transition: color 0.2s; }
        .footer-links a:hover { color: var(--accent-terra, #c4622d); }
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.08);
            padding-top: 24px;
            display: flex;
            justify-content: space-between;
            font-size: 13px;
            color: rgba(255,255,255,0.3);
        }

        /* ─── REVEAL ─── */
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .reveal.visible { opacity: 1; transform: translateY(0); }

        @media (max-width: 900px) {
            .trip-intro { grid-template-columns: 1fr; }
            .trip-section { padding: 48px 24px; }
            .itinerary-section { padding: 48px 24px; }
            .other-trips { padding: 32px 24px; }
            .page-hero-content { padding: 0 24px; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
        }
        @media (max-width: 600px) {
            .nav-links { display: none; }
            .dest-cards { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/about') }}">Tentang Kami</a></li> 
            <li><a href="{{ url('/tours') }}">Touring</a></li>
            <li class="nav-item-dropdown">
                <a href="{{ url('/destinations') }}" class="dropdown-trigger nav-active">Destinasi <span class="arrow">▾</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/trip/1') }}" class="trip-active">Trip 1 Hari</a></li>
                    <li><a href="{{ url('/trip/2') }}">Trip 2 Hari</a></li>
                    <li><a href="{{ url('/trip/3') }}">Trip 3 Hari</a></li>
                    <li><a href="{{ url('/trip/4') }}">Trip 4 Hari</a></li>
                    <li><a href="{{ url('/trip/5') }}">Trip 5 Hari</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/contact') }}">Kontak</a></li>
        </ul>
        <div class="nav-right">
            <span class="nav-phone"><i class="fas fa-phone"></i> 081249896338</span>
            <div class="nav-icons">
                <a href="{{ url('/login') }}"><i class="far fa-user"></i></a>
                <a href="#"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </nav>

    <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-bg"></div>
        <div class="page-hero-content">
            <p class="hero-breadcrumb">
                <a href="{{ url('/destinations') }}">Destinasi</a> &nbsp;/&nbsp; Trip 1 Hari
            </p>
            <h1>Trip <strong>1 Hari</strong></h1>
            <div class="hero-meta">
                <span class="badge">Day Trip</span>
                <span><i class="fas fa-map-marker-alt"></i> Jawa Timur</span>
                <span><i class="fas fa-sun"></i> 2 Destinasi</span>
                <span><i class="fas fa-star" style="color: var(--accent-gold)"></i> 4.8</span>
            </div>
        </div>
    </section>

    <!-- TRIP CONTENT -->
    <div class="trip-section">
        <div class="trip-intro reveal">
            <div>
                <p class="trip-desc-label">Tentang Paket</p>
                <h2 class="trip-desc-title">Satu hari penuh,<br><em>dua hidden gem</em></h2>
                <p class="trip-desc-body">
                    Paket trip 1 hari ini cocok untuk kamu yang punya waktu terbatas tapi tetap ingin merasakan keajaiban alam Jawa Timur. Dengan rute yang efisien, kamu akan mengunjungi dua destinasi tersembunyi yang jarang masuk itinerary wisatawan biasa.
                </p>
                <p class="trip-desc-body" style="margin-top: 14px;">
                    Berangkat pagi buta, kembali malam hari — perjalanan padat tapi penuh kenangan. Pemandu lokal berpengalaman akan mendampingi sepanjang perjalanan.
                </p>
            </div>
            <div class="trip-info-box reveal">
                <p class="trip-info-title">Info Paket</p>
                <div class="trip-info-row">
                    <span class="label">Durasi</span>
                    <span class="value">1 Hari</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Destinasi</span>
                    <span class="value">2 Tempat</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Keberangkatan</span>
                    <span class="value">04.30 WIB</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Kembali</span>
                    <span class="value">±21.00 WIB</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Kapasitas</span>
                    <span class="value">Maks. 12 orang</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Tingkat</span>
                    <span class="value">Mudah – Sedang</span>
                </div>
                <div class="trip-info-row">
                    <span class="label">Harga mulai</span>
                    <span class="value" style="color: var(--accent-terra)">Rp 350.000</span>
                </div>
                <a href="/booking/1" class="btn-book">Pesan Sekarang →</a>
            </div>
        </div>

        <!-- DESTINASI -->
        <div class="reveal">
            <p class="section-label-sm">Destinasi yang Dikunjungi</p>
            <h2 class="section-title-md">2 Tempat <em>terpilih</em></h2>
        </div>

        <div class="dest-cards">
            <div class="dest-card-item reveal">
                <div class="dest-card-visual">
                    <img src="{{ asset('images/destinations/Watu karung beach.jpg') }}" alt="Pantai Watu Karung" style="width: 100%; height: 100%; object-fit: cover;">
                    <span class="dest-card-badge">Hidden Gem</span>
                </div>
                <div class="dest-card-body">
                    <p class="dest-card-region"><i class="fas fa-map-marker-alt" style="margin-right:4px"></i>Kab. Pacitan · Jawa Timur</p>
                    <h3 class="dest-card-name">Pantai Watu Karung</h3>
                    <p class="dest-card-desc">Pantai terpencil dengan ombak kelas dunia, surga para peselancar yang belum ramai turis. Batu karang raksasa dan air sebening kristal.</p>
                    <div class="dest-card-footer">
                        <span><i class="fas fa-water" style="margin-right:4px"></i>Pantai</span>
                        <span class="rating"><i class="fas fa-star" style="margin-right:4px"></i>4.8</span>
                    </div>
                </div>
            </div>

            <div class="dest-card-item reveal">
                <div class="dest-card-visual">
                    <img src="{{ asset('images/destinations/Gowa Lowo.webp') }}" alt="Goa Lowo" style="width: 100%; height: 100%; object-fit: cover;">
                    <span class="dest-card-badge">Hidden Gem</span>
                </div>
                <div class="dest-card-body">
                    <p class="dest-card-region"><i class="fas fa-map-marker-alt" style="margin-right:4px"></i>Kab. Trenggalek · Jawa Timur</p>
                    <h3 class="dest-card-name">Goa Lowo</h3>
                    <p class="dest-card-desc">Salah satu gua terpanjang di Asia Tenggara dengan stalaktit dan stalagmit yang menakjubkan, belum banyak yang tahu.</p>
                    <div class="dest-card-footer">
                        <span><i class="fas fa-moon" style="margin-right:4px"></i>Goa</span>
                        <span class="rating"><i class="fas fa-star" style="margin-right:4px"></i>4.7</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ITINERARY -->
    <section class="itinerary-section">
        <div class="itinerary-inner">
            <p class="section-label-sm reveal">Jadwal Perjalanan</p>
            <h2 class="section-title-md reveal">Itinerary <em>Harian</em></h2>
            <div class="timeline">
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">04.30 WIB</p>
                    <h4 class="timeline-title">Kumpul & Berangkat</h4>
                    <p class="timeline-desc">Titik kumpul di Surabaya. Briefing singkat dari pemandu lokal sebelum berangkat dengan kendaraan nyaman.</p>
                </div>
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">08.00 WIB</p>
                    <h4 class="timeline-title">Tiba di Goa Lowo, Trenggalek</h4>
                    <p class="timeline-desc">Eksplorasi gua terpanjang di Asia Tenggara. Tur dipandu 1–1.5 jam di dalam gua dengan formasi stalaktit yang spektakuler.</p>
                </div>
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">10.30 WIB</p>
                    <h4 class="timeline-title">Perjalanan ke Pacitan</h4>
                    <p class="timeline-desc">Menikmati pemandangan alam pegunungan selatan sambil makan siang di warung lokal pilihan pemandu.</p>
                </div>
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">13.30 WIB</p>
                    <h4 class="timeline-title">Pantai Watu Karung</h4>
                    <p class="timeline-desc">Waktu bebas di pantai. Berenang, foto-foto, atau sekadar duduk menikmati deburan ombak Samudra Hindia. Bagi yang berminat, bisa coba surfing dengan instruktur lokal.</p>
                </div>
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">17.00 WIB</p>
                    <h4 class="timeline-title">Sunset & Persiapan Pulang</h4>
                    <p class="timeline-desc">Nikmati matahari terbenam dari tebing karang, momen terbaik sebelum perjalanan pulang.</p>
                </div>
                <div class="timeline-item reveal">
                    <div class="timeline-dot"></div>
                    <p class="timeline-time">±21.00 WIB</p>
                    <h4 class="timeline-title">Tiba Kembali di Surabaya</h4>
                    <p class="timeline-desc">Perjalanan selesai. Kenangan tak terbatas dibawa pulang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- OTHER TRIPS -->
    <section class="other-trips">
        <div class="other-trips-inner">
            <p class="other-trips-label">Paket Lainnya</p>
            <div class="other-trips-list">
                <a href="{{ url('/trip/1') }}" class="other-trip-btn current">Trip 1 Hari</a>
                <a href="{{ url('/trip/2') }}" class="other-trip-btn">Trip 2 Hari</a>
                <a href="{{ url('/trip/3') }}" class="other-trip-btn">Trip 3 Hari</a>
                <a href="{{ url('/trip/4') }}" class="other-trip-btn">Trip 4 Hari</a>
                <a href="{{ url('/trip/5') }}" class="other-trip-btn">Trip 5 Hari</a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
                <p class="footer-desc">GoJatim hadir untuk membantu kamu menjelajahi keindahan alam dan budaya Jawa Timur.</p>
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
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/tours') }}">Our Tours</a></li>
                    <li><a href="{{ url('/destinations') }}">Destinations</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>
            <div>
                <p class="footer-heading">Support</p>
                <ul class="footer-links">
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
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
            <span>© {{ date('Y') }} GoJatim. All rights reserved.</span>
            <span>Made with ♥ in Indonesia</span>
        </div>
    </footer>

    <script>
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
            document.querySelector('nav').style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)' : 'none';
        });
</script>
<script src="{{ asset('js/auth.js') }}"></script></body>
</html>












