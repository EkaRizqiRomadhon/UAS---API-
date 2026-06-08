<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Touring - GoJatim Travel </title>
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
            background: linear-gradient(135deg, #1a2a3a 0%, #2d4a5e 40%, #3a6a7a 70%, #0d1b2a 100%);
        }
        .page-hero-bg::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(13,27,42,0.88) 0%, rgba(13,27,42,0.2) 60%, transparent 100%);
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

        /* ─── PLANNER SECTION ─── */
        .planner-section {
            background: var(--cream);
            padding: 56px 48px;
        }
        .planner-header {
            margin-bottom: 36px;
        }
        .section-label {
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: var(--accent-terra);
            margin-bottom: 8px;
        }
        .planner-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 36px;
            font-weight: 300;
            color: var(--deep-navy);
        }
        .planner-title em { font-style: italic; font-weight: 400; }

        /* ─── FORM ─── */
        .planner-form {
            display: grid;
            grid-template-columns: 1fr 1fr auto;
            gap: 16px;
            align-items: end;
            margin-bottom: 48px;
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
        .form-group select,
        .form-group input {
            padding: 14px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            border: 1px solid rgba(0,0,0,0.12);
            background: #fff;
            color: var(--charcoal);
            outline: none;
            transition: border-color 0.2s;
        }
        .form-group select:focus,
        .form-group input:focus {
            border-color: var(--accent-terra);
        }
        .btn-plan {
            padding: 14px 32px;
            background: var(--deep-navy);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            border: none;
            cursor: pointer;
            transition: background 0.2s;
            white-space: nowrap;
        }
        .btn-plan:hover { background: var(--accent-terra); }

        /* ─── RESULT CARDS ─── */
        .result-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 48px;
        }

        .result-card {
            background: #fff;
            padding: 32px;
            border: 1px solid rgba(0,0,0,0.06);
            display: none;
        }
        .result-card.show { display: block; }

        .result-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0,0,0,0.06);
        }
        .result-icon {
            width: 44px;
            height: 44px;
            background: var(--deep-navy);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
        }
        .result-card-header h3 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 400;
            color: var(--deep-navy);
        }
        .result-card-header p {
            font-size: 12px;
            color: var(--muted);
        }

        .result-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            font-size: 14px;
        }
        .result-row:last-child { border-bottom: none; }
        .result-row span:first-child { color: var(--muted); }
        .result-row span:last-child { font-weight: 500; color: var(--charcoal); }
        .result-highlight {
            font-family: 'Cormorant Garamond', serif;
            font-size: 42px;
            font-weight: 300;
            color: var(--accent-terra);
            line-height: 1;
            margin: 16px 0 4px;
        }
        .result-highlight small {
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            color: var(--muted);
            font-weight: 300;
        }

        /* ─── WEATHER GRID ─── */
        .weather-section {
            padding: 56px 48px;
            background: var(--warm-white);
        }
        .weather-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            margin-top: 36px;
        }
        .weather-card {
            background: var(--deep-navy);
            padding: 32px 28px;
            position: relative;
            overflow: hidden;
            display: none;
        }
        .weather-card.show { display: block; }
        .weather-card::before {
            content: '';
            position: absolute;
            top: -30px;
            right: -30px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: rgba(255,255,255,0.04);
        }
        .weather-card-location {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--accent-gold);
            margin-bottom: 6px;
        }
        .weather-card-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            color: #fff;
            margin-bottom: 20px;
        }
        .weather-temp {
            font-family: 'Cormorant Garamond', serif;
            font-size: 56px;
            font-weight: 300;
            color: #fff;
            line-height: 1;
        }
        .weather-temp sup { font-size: 24px; vertical-align: super; color: var(--accent-gold); }
        .weather-desc {
            font-size: 13px;
            color: rgba(255,255,255,0.55);
            margin: 8px 0 20px;
            text-transform: capitalize;
        }
        .weather-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }
        .weather-detail-item {
            display: flex;
            flex-direction: column;
            gap: 3px;
        }
        .weather-detail-item span:first-child {
            font-size: 10px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.35);
        }
        .weather-detail-item span:last-child {
            font-size: 14px;
            color: rgba(255,255,255,0.8);
            font-weight: 500;
        }
        .weather-icon-big {
            font-size: 40px;
            margin-bottom: 8px;
            display: block;
        }

        /* ─── DESTINATION LIST ─── */
        .dest-list-section {
            background: var(--cream);
            padding: 56px 48px;
        }
        .dest-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 32px;
        }
        .dest-table th {
            font-size: 10px;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid rgba(0,0,0,0.08);
        }
        .dest-table td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid rgba(0,0,0,0.04);
            vertical-align: middle;
        }
        .dest-table tr:hover td { background: rgba(0,0,0,0.02); }
        .dest-table .dest-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 18px;
            color: var(--deep-navy);
        }
        .dest-table .dest-region { font-size: 12px; color: var(--muted); }
        .time-badge {
            display: inline-block;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 500;
        }
        .time-badge.motor { background: rgba(196,98,45,0.1); color: var(--accent-terra); }
        .time-badge.mobil { background: rgba(13,27,42,0.08); color: var(--deep-navy); }
        .btn-select-dest {
            font-size: 12px;
            color: var(--deep-navy);
            background: none;
            border: none;
            border-bottom: 1px solid var(--deep-navy);
            cursor: pointer;
            padding-bottom: 1px;
            font-family: 'DM Sans', sans-serif;
            transition: color 0.2s, border-color 0.2s;
        }
        .btn-select-dest:hover { color: var(--accent-terra); border-color: var(--accent-terra); }

        /* placeholder state */
        .result-placeholder {
            text-align: center;
            padding: 48px 0;
            color: var(--muted);
            font-size: 14px;
            display: block;
        }
        .result-placeholder i { font-size: 36px; display: block; margin-bottom: 12px; opacity: 0.3; }

        /* ─── RESPONSIVE ─── */
        @media (max-width: 900px) {
            .page-hero-content, .planner-section, .weather-section, .dest-list-section { padding-left: 24px; padding-right: 24px; }
            .planner-form { grid-template-columns: 1fr; }
            .result-grid { grid-template-columns: 1fr; }
            .weather-grid { grid-template-columns: 1fr; }
        }
        @media (max-width: 600px) {
            .nav-links { display: none; }
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
            <li><a href="{{ url('/tours') }}" class="nav-active">Touring</a></li>
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
            <p class="hero-tagline">Rencanakan Perjalananmu</p>
            <h1>Estimasi waktu &<br><strong>cuaca destinasi</strong></h1>
        </div>
    </section>

    <!-- PLANNER -->
    <section class="planner-section">
        <div class="planner-header reveal">
            <p class="section-label">Trip Planner</p>
            <h2 class="planner-title">Pilih <em>titik berangkat</em> dan destinasi</h2>
        </div>

        <div class="planner-form reveal">
            <div class="form-group">
                <label>Kota Asal</label>
                <input type="text" id="kota-asal" placeholder="Contoh: Surabaya, Malang, Kediri...">
            </div>
            <div class="form-group">
                <label>Destinasi Tujuan</label>
                <select id="dest-select">
                    <option value="">-- Pilih Destinasi --</option>
                    <option value="pacitan">Pacitan (Pantai Klayar / Goa Gong)</option>
                    <option value="banyuwangi">Banyuwangi (Kawah Ijen)</option>
                    <option value="lumajang">Lumajang (Tumpak Sewu / B29)</option>
                    <option value="malang">Malang (Coban Rondo / Bromo)</option>
                    <option value="ponorogo">Ponorogo (Telaga Ngebel)</option>
                    <option value="trenggalek">Trenggalek (Goa Lowo)</option>
                    <option value="probolinggo">Probolinggo (Gunung Bromo)</option>
                    <option value="mojokerto">Mojokerto (Trowulan)</option>
                </select>
            </div>
            <button class="btn-plan" onclick="hitungPerjalanan()">
                <i class="fas fa-route"></i> Hitung Perjalanan
            </button>
        </div>

        <!-- RESULT -->
        <div class="result-grid">
            <div class="result-card" id="card-motor">
                <div class="result-card-header">
                    <div class="result-icon"><i class="fas fa-motorcycle"></i></div>
                    <div>
                        <h3>Naik Motor</h3>
                        <p>Estimasi perjalanan</p>
                    </div>
                </div>
                <div class="result-highlight" id="motor-jam">– <small>jam</small></div>
                <div style="font-size:12px; color:var(--muted); margin-bottom:20px" id="motor-menit"></div>
                <div class="result-row">
                    <span>Jarak</span>
                    <span id="motor-jarak">–</span>
                </div>
                <div class="result-row">
                    <span>Kecepatan rata-rata</span>
                    <span>55 km/jam</span>
                </div>
                <div class="result-row">
                    <span>Estimasi BBM</span>
                    <span id="motor-bbm">–</span>
                </div>
                <div class="result-row">
                    <span>Saran berangkat</span>
                    <span id="motor-saran">–</span>
                </div>
            </div>

            <div class="result-card" id="card-mobil">
                <div class="result-card-header">
                    <div class="result-icon" style="background: var(--accent-terra)"><i class="fas fa-car"></i></div>
                    <div>
                        <h3>Naik Mobil</h3>
                        <p>Estimasi perjalanan</p>
                    </div>
                </div>
                <div class="result-highlight" id="mobil-jam">– <small>jam</small></div>
                <div style="font-size:12px; color:var(--muted); margin-bottom:20px" id="mobil-menit"></div>
                <div class="result-row">
                    <span>Jarak</span>
                    <span id="mobil-jarak">–</span>
                </div>
                <div class="result-row">
                    <span>Kecepatan rata-rata</span>
                    <span>70 km/jam</span>
                </div>
                <div class="result-row">
                    <span>Estimasi BBM</span>
                    <span id="mobil-bbm">–</span>
                </div>
                <div class="result-row">
                    <span>Saran berangkat</span>
                    <span id="mobil-saran">–</span>
                </div>
            </div>
        </div>

        <div class="result-placeholder" id="placeholder">
            <i class="fas fa-map-marked-alt"></i>
            Pilih kota asal dan destinasi untuk melihat estimasi perjalanan
        </div>
    </section>

    <!-- CUACA -->
    <section class="weather-section">
        <div class="reveal">
            <p class="section-label">Kondisi Cuaca</p>
            <h2 class="planner-title">Cuaca <em>destinasi populer</em></h2>
            <p style="font-size:14px; color:var(--muted); margin-top:8px">
                Data cuaca diperbarui otomatis · Sambungkan OpenWeatherMap API untuk data realtime
            </p>
        </div>

        <div class="weather-grid">
            @php
            $weathers = [
                [
                    'location' => 'Kab. Pacitan',
                    'name'     => 'Pacitan',
                    'temp'     => 28,
                    'desc'     => 'Cerah berawan',
                    'icon'     => '⛅',
                    'humidity' => '72%',
                    'wind'     => '14 km/h',
                    'feels'    => '31°C',
                    'uv'       => 'Tinggi',
                    'status'   => 'Aman untuk wisata',
                    'color'    => '#2d6a4f',
                ],
                [
                    'location' => 'Kab. Banyuwangi',
                    'name'     => 'Banyuwangi',
                    'temp'     => 26,
                    'desc'     => 'Berawan tebal',
                    'icon'     => '☁️',
                    'humidity' => '85%',
                    'wind'     => '18 km/h',
                    'feels'    => '28°C',
                    'uv'       => 'Rendah',
                    'status'   => 'Blue fire tetap terlihat',
                    'color'    => '#1a3a5a',
                ],
                [
                    'location' => 'Kab. Lumajang',
                    'name'     => 'Lumajang',
                    'temp'     => 22,
                    'desc'     => 'Hujan ringan',
                    'icon'     => '🌧️',
                    'humidity' => '91%',
                    'wind'     => '22 km/h',
                    'feels'    => '20°C',
                    'uv'       => 'Sangat rendah',
                    'status'   => 'Persiapkan jas hujan',
                    'color'    => '#2a4a6a',
                ],
                [
                    'location' => 'Kab. Malang',
                    'name'     => 'Malang',
                    'temp'     => 21,
                    'desc'     => 'Cerah',
                    'icon'     => '☀️',
                    'humidity' => '65%',
                    'wind'     => '10 km/h',
                    'feels'    => '22°C',
                    'uv'       => 'Sedang',
                    'status'   => 'Sangat ideal untuk wisata',
                    'color'    => '#3a5a2a',
                ],
                [
                    'location' => 'Kab. Probolinggo',
                    'name'     => 'Bromo',
                    'temp'     => 12,
                    'desc'     => 'Berkabut',
                    'icon'     => '🌫️',
                    'humidity' => '95%',
                    'wind'     => '30 km/h',
                    'feels'    => '9°C',
                    'uv'       => 'Rendah',
                    'status'   => 'Bawa jaket tebal!',
                    'color'    => '#2a2a4a',
                ],
                [
                    'location' => 'Kab. Ponorogo',
                    'name'     => 'Ponorogo',
                    'temp'     => 27,
                    'desc'     => 'Cerah',
                    'icon'     => '☀️',
                    'humidity' => '68%',
                    'wind'     => '12 km/h',
                    'feels'    => '29°C',
                    'uv'       => 'Tinggi',
                    'status'   => 'Aman untuk wisata',
                    'color'    => '#4a3a1a',
                ],
            ];
            @endphp

            @foreach($weathers as $w)
            <div class="weather-card show reveal" style="border-top: 3px solid {{ $w['color'] }}">
                <p class="weather-card-location">
                    <i class="fas fa-map-marker-alt" style="margin-right:4px"></i>{{ $w['location'] }}
                </p>
                <p class="weather-card-name">{{ $w['name'] }}</p>
                <span class="weather-icon-big">{{ $w['icon'] }}</span>
                <div class="weather-temp">{{ $w['temp'] }}<sup>°C</sup></div>
                <p class="weather-desc">{{ $w['desc'] }}</p>
                <div class="weather-details">
                    <div class="weather-detail-item">
                        <span>Kelembaban</span>
                        <span>{{ $w['humidity'] }}</span>
                    </div>
                    <div class="weather-detail-item">
                        <span>Angin</span>
                        <span>{{ $w['wind'] }}</span>
                    </div>
                    <div class="weather-detail-item">
                        <span>Terasa</span>
                        <span>{{ $w['feels'] }}</span>
                    </div>
                    <div class="weather-detail-item">
                        <span>UV Index</span>
                        <span>{{ $w['uv'] }}</span>
                    </div>
                </div>
                <div style="margin-top:16px; padding-top:16px; border-top:1px solid rgba(255,255,255,0.08); font-size:12px; color:var(--accent-gold)">
                    <i class="fas fa-info-circle" style="margin-right:4px"></i>{{ $w['status'] }}
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- TABEL DESTINASI -->
    <section class="dest-list-section">
        <div class="reveal">
            <p class="section-label">Referensi Jarak</p>
            <h2 class="planner-title">Estimasi dari <em>Surabaya</em></h2>
        </div>

        <table class="dest-table reveal">
            <thead>
                <tr>
                    <th>Destinasi</th>
                    <th>Jarak</th>
                    <th><i class="fas fa-motorcycle"></i> Motor</th>
                    <th><i class="fas fa-car"></i> Mobil</th>
                    <th>Terbaik Dikunjungi</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php
                $destList = [
                    ['name' => 'Pacitan', 'spot' => 'Pantai Klayar, Goa Gong', 'km' => 260, 'motor' => '5–6 jam', 'mobil' => '4–5 jam', 'best' => 'Apr – Sep'],
                    ['name' => 'Banyuwangi', 'spot' => 'Kawah Ijen, Teluk Hijau', 'km' => 310, 'motor' => '6–7 jam', 'mobil' => '5–6 jam', 'best' => 'Mei – Agu'],
                    ['name' => 'Lumajang', 'spot' => 'Tumpak Sewu, Puncak B29', 'km' => 160, 'motor' => '3–4 jam', 'mobil' => '2–3 jam', 'best' => 'Jun – Sep'],
                    ['name' => 'Malang', 'spot' => 'Coban Rondo, Bromo', 'km' => 90, 'motor' => '2 jam', 'mobil' => '1.5 jam', 'best' => 'Sepanjang tahun'],
                    ['name' => 'Ponorogo', 'spot' => 'Telaga Ngebel', 'km' => 200, 'motor' => '4 jam', 'mobil' => '3 jam', 'best' => 'Mar – Okt'],
                    ['name' => 'Trenggalek', 'spot' => 'Goa Lowo, Pantai Prigi', 'km' => 180, 'motor' => '3.5 jam', 'mobil' => '2.5 jam', 'best' => 'Apr – Sep'],
                    ['name' => 'Probolinggo', 'spot' => 'Gunung Bromo', 'km' => 130, 'motor' => '2.5 jam', 'mobil' => '2 jam', 'best' => 'Apr – Okt'],
                    ['name' => 'Mojokerto', 'spot' => 'Trowulan, Candi Bajang', 'km' => 55, 'motor' => '1 jam', 'mobil' => '45 menit', 'best' => 'Sepanjang tahun'],
                ];
                @endphp

                @foreach($destList as $d)
                <tr>
                    <td>
                        <div class="dest-name">{{ $d['name'] }}</div>
                        <div class="dest-region">{{ $d['spot'] }}</div>
                    </td>
                    <td>{{ $d['km'] }} km</td>
                    <td><span class="time-badge motor">{{ $d['motor'] }}</span></td>
                    <td><span class="time-badge mobil">{{ $d['mobil'] }}</span></td>
                    <td style="font-size:13px; color:var(--muted)">{{ $d['best'] }}</td>
                    <td>
                        <button class="btn-select-dest"
                            onclick="pilihDest('{{ strtolower($d['name']) }}')">
                            Pilih →
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
        // Data jarak dari berbagai kota (km)
        const jarakData = {
            surabaya: { pacitan: 260, banyuwangi: 310, lumajang: 160, malang: 90, ponorogo: 200, trenggalek: 180, probolinggo: 130, mojokerto: 55 },
            malang:   { pacitan: 210, banyuwangi: 250, lumajang: 80,  malang: 0,   ponorogo: 190, trenggalek: 130, probolinggo: 70,  mojokerto: 80 },
            kediri:   { pacitan: 160, banyuwangi: 290, lumajang: 130, malang: 110, ponorogo: 100, trenggalek: 80,  probolinggo: 130, mojokerto: 100 },
            madiun:   { pacitan: 100, banyuwangi: 380, lumajang: 230, malang: 200, ponorogo: 60,  trenggalek: 130, probolinggo: 220, mojokerto: 160 },
            jember:   { pacitan: 330, banyuwangi: 110, lumajang: 70,  malang: 130, ponorogo: 300, trenggalek: 260, probolinggo: 100, mojokerto: 200 },
        };

        const saranBerangkat = {
            pacitan:     'Pagi hari (05.00–06.00)',
            banyuwangi:  'Subuh (04.00–05.00)',
            lumajang:    'Pagi (06.00–07.00)',
            malang:      'Pagi (07.00–08.00)',
            ponorogo:    'Pagi (06.00–07.00)',
            trenggalek:  'Pagi (06.00–07.00)',
            probolinggo: 'Dini hari (03.00) untuk sunrise',
            mojokerto:   'Kapan saja',
        };

        function getJarak(asal, tujuan) {
            const asalKey = asal.toLowerCase().trim();
            const data = jarakData[asalKey];
            if (data && data[tujuan] !== undefined) return data[tujuan];
            // fallback: estimasi dari Surabaya
            return jarakData['surabaya'][tujuan] || 200;
        }

        function formatJam(totalMenit) {
            const jam = Math.floor(totalMenit / 60);
            const menit = Math.round(totalMenit % 60);
            return { jam, menit, label: jam + (menit > 0 ? ` jam ${menit} menit` : ' jam') };
        }

        function hitungPerjalanan() {
            const asal  = document.getElementById('kota-asal').value;
            const tujuan = document.getElementById('dest-select').value;

            if (!asal || !tujuan) {
                alert('Isi kota asal dan pilih destinasi dulu ya!');
                return;
            }

            const km = getJarak(asal, tujuan);

            // Motor: 55 km/jam, 30L/100km → 1L/33km, Rp12.000/L
            const menitMotor = (km / 55) * 60;
            const motorResult = formatJam(menitMotor);
            const bbmMotor   = (km / 33).toFixed(1);

            // Mobil: 70 km/jam, 1L/12km, Rp13.000/L
            const menitMobil = (km / 70) * 60;
            const mobilResult = formatJam(menitMobil);
            const bbmMobil   = (km / 12).toFixed(1);

            // Tampilkan
            document.getElementById('placeholder').style.display = 'none';
            document.getElementById('card-motor').classList.add('show');
            document.getElementById('card-mobil').classList.add('show');

            document.getElementById('motor-jam').innerHTML   = motorResult.jam + ' <small>jam</small>';
            document.getElementById('motor-menit').textContent = motorResult.menit > 0 ? `+ ${motorResult.menit} menit` : 'tepat';
            document.getElementById('motor-jarak').textContent = km + ' km';
            document.getElementById('motor-bbm').textContent   = `~${bbmMotor} L (Rp ${(bbmMotor * 12000).toLocaleString('id')})`;
            document.getElementById('motor-saran').textContent = saranBerangkat[tujuan] || 'Pagi hari';

            document.getElementById('mobil-jam').innerHTML   = mobilResult.jam + ' <small>jam</small>';
            document.getElementById('mobil-menit').textContent = mobilResult.menit > 0 ? `+ ${mobilResult.menit} menit` : 'tepat';
            document.getElementById('mobil-jarak').textContent = km + ' km';
            document.getElementById('mobil-bbm').textContent   = `~${bbmMobil} L (Rp ${(bbmMobil * 13000).toLocaleString('id')})`;
            document.getElementById('mobil-saran').textContent = saranBerangkat[tujuan] || 'Pagi hari';

            // Scroll ke hasil
            document.getElementById('card-motor').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }

        function pilihDest(dest) {
            document.getElementById('dest-select').value = dest;
            document.getElementById('kota-asal').focus();
            document.querySelector('.planner-section').scrollIntoView({ behavior: 'smooth' });
        }

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
            document.querySelector('nav').style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)' : 'none';
        });

        // Enter key pada input
        document.addEventListener('DOMContentLoaded', () => {
            document.getElementById('kota-asal').addEventListener('keypress', (e) => {
                if (e.key === 'Enter') hitungPerjalanan();
            });
        });
</script>
<script src="{{ asset('js/auth.js') }}"></script></body>
</html>












