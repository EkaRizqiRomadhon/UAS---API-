<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoJatim Travel - Discover Engaging Places</title>
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
    </style>
<body>

    <!-- NAVBAR -->
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>

        <ul class="nav-links">
            <li><a href="{{ url('/') }}" class="nav-active">Beranda</a></li>
            <li><a href="{{ url('/about') }}">Tentang Kami</a></li> 
            <li><a href="{{ url('/tours') }}">Touring</a></li>
            <li class="nav-item-dropdown">
                <a href="{{ url('/destinations') }}" class="dropdown-trigger">Destinasi <span class="arrow">▾</span></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/trip/1') }}">Trip 1 Hari</a></li>
                    <li><a href="{{ url('/trip/2') }}">Trip 2 Hari</a></li>
                    <li><a href="{{ url('/trip/3') }}">Trip 3 Hari</a></li>
                    <li><a href="{{ url('/trip/4') }}">Trip 4 Hari</a></li>
                    <li><a href="{{ url('/trip/5') }}">Trip 5 Hari</a></li>
                </ul>
            </li>
            <li><a href="{{ url('/contact') }}">Kontak</a></li>
        </ul>

        <div class="nav-right">
            <span class="nav-phone">
                <i class="fas fa-phone"></i> 081249896338
            </span>
            <div class="nav-icons">
                <a href="{{ url('/login') }}"><i class="far fa-user"></i></a>
                <a href="#"><i class="fas fa-bars"></i></a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <div class="hero-image"></div>
        <img class="hero-bg" src="{{ asset('images/kawah_ijen_java.jpg') }}" alt="Beautiful landscape">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <p class="hero-tagline">Jelajahi Jawa Timur</p>
            <h1 class="hero-title">
                Temukan tempat<br>
                <strong>paling menakjubkan</strong><br>
                di Jawa Timur
            </h1>
            <a href="{{ url('/tours') }}" class="btn-explore">
                Jelajahi Sekarang <span class="arrow-icon">→</span>
            </a>
        </div>
    </section>



<!-- DESTINATIONS -->
    <section class="section">
        <div class="section-header reveal">
            <div>
                <p class="section-label">Top pilihan</p>
                <h2 class="section-title">Populer <em>destinasi</em></h2>
            </div>
            <a href="{{ url('/destinations') }}" class="view-all">View all →</a>
        </div>
 
        <div class="destinations-grid">
            @foreach($destinations as $loop_index => $dest)
            <div class="dest-card {{ $loop_index === 0 ? 'large' : '' }} reveal">
                <img class="dest-card-img" src="{{ asset($dest->image) }}" alt="{{ $dest->name }}">
                <div class="dest-card-overlay">
                    <p class="dest-card-country">Kab. {{ $dest->kabupaten }} · {{ $dest->provinsi }}</p>
                    <h3 class="dest-card-name">{{ $dest->name }}</h3>
                    <p class="dest-card-tours">{{ $dest->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- POPULAR TOURS -->
    <section class="section" style="background: var(--cream); padding-top: 0;">
        <div class="section-header reveal">
            <div>
                <p class="section-label">What we offer</p>
                <h2 class="section-title">Popular <em>tours</em></h2>
            </div>
            <a href="{{ url('/destinations') }}" class="view-all">View all →</a>
        </div>

        <div class="tours-grid">
            @foreach($tours as $i => $tour)
            <div class="tour-card reveal">
                <img class="tour-img" src="{{ asset($tour->image) }}" alt="{{ $tour->title }}">
                <span class="tour-badge">{{ $tour->category->name ?? 'Wisata' }}</span>
                <div class="tour-body">
                    <h3 class="tour-title">{{ $tour->title }}</h3>
                    <div class="tour-meta">
                        <span><i class="far fa-clock"></i> {{ $tour->duration_days }} hari</span>
                        <span><i class="fas fa-users"></i> {{ $tour->max_people }} maks</span>
                        <span><i class="fas fa-star" style="color: var(--accent-gold)"></i> {{ number_format($tour->rating, 1) }}</span>
                    </div>
                    <div class="tour-footer">
                        <div class="tour-price">
                            Rp {{ number_format($tour->price, 0, ',', '.') }}
                            <small>/ orang</small>
                        </div>
                        <a href="{{ url('/trip/' . ($i + 1)) }}" class="btn-tour">Pesan →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- STATS -->
    <div class="stats-strip">
        <div class="stat-item reveal">
            <div class="stat-number"><sup>+</sup>8</div>
            <div class="stat-label">Kabupaten</div>
        </div>
        <div class="stat-item reveal">
            <div class="stat-number"><sup>+</sup>50</div>
            <div class="stat-label">Spot Wisata</div>
        </div>
        <div class="stat-item reveal">
            <div class="stat-number"><sup>+</sup>500</div>
            <div class="stat-label">Traveler Puas</div>
        </div>
        <div class="stat-item reveal">
            <div class="stat-number"><sup>+</sup>3</div>
            <div class="stat-label">Tahun Pengalaman</div>
        </div>
    </div>

    <!-- BLOG -->
    <section class="section">
        <div class="section-header reveal">
            <div>
                <p class="section-label">Stories & tips</p>
                <h2 class="section-title">Latest from <em>our blog</em></h2>
            </div>
            <a href="{{ url('/blog') }}" class="view-all">View all →</a>
        </div>

        <div class="blog-grid">
            @if($blogs->count() > 0)
            @php $mainBlog = $blogs->first(); $sideBlog = $blogs->skip(1); @endphp
            <div class="reveal">
                <img class="blog-main-img" src="{{ asset($mainBlog->image) }}" alt="{{ $mainBlog->title }}">
                <div class="blog-main-body">
                    <p class="blog-tag">{{ $mainBlog->tag }}</p>
                    <h3 class="blog-title">{{ $mainBlog->title }}</h3>
                    <p class="blog-excerpt">{{ $mainBlog->excerpt }}</p>
                    <a href="#" class="btn-tour">Baca selengkapnya →</a>
                </div>
            </div>

            <div class="blog-sidebar">
                @foreach($sideBlog as $blog)
                <div class="blog-mini reveal">
                    <img class="blog-mini-img" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    <div>
                        <h4 class="blog-mini-title">{{ $blog->title }}</h4>
                        <p class="blog-mini-date"><i class="far fa-calendar"></i> {{ $blog->published_at ? $blog->published_at->translatedFormat('d F Y') : '' }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
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
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/tours') }}">Our Tours</a></li>
                    <li><a href="{{ url('/destinations') }}">Destinations</a></li>
                    <li><a href="{{ url('/blog') }}">Blog</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
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
            <span>© {{ date('Y') }} GoJatim. All rights reserved.</span>
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
            const nav = document.querySelector('nav');
            nav.style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)'
                : 'none';
        });
</script>
<script src="{{ asset('js/auth.js') }}"></script></body>
</html>











