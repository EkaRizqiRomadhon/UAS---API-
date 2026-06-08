<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan {{ $tour->title }} - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body { background: var(--cream); padding-top: 100px; }
        .checkout-container {
            max-width: 800px;
            margin: 0 auto 60px;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
        }
        .tour-info {
            background: var(--cream);
            padding: 24px;
            border-radius: 8px;
            height: fit-content;
        }
        .tour-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 28px;
            color: var(--deep-navy);
            margin-bottom: 8px;
        }
        .tour-meta {
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 20px;
        }
        .tour-price {
            font-size: 24px;
            font-weight: 500;
            color: var(--accent-terra);
            border-top: 1px solid rgba(0,0,0,0.05);
            padding-top: 16px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: var(--muted);
            margin-bottom: 8px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
        }
        .btn-submit {
            background: var(--deep-navy);
            color: #fff;
            border: none;
            padding: 14px 24px;
            width: 100%;
            border-radius: 6px;
            font-family: 'DM Sans', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: 0.3s;
        }
        .btn-submit:hover { background: var(--accent-terra); }
        .total-preview {
            margin-top: 16px;
            padding: 16px;
            background: rgba(196, 113, 79, 0.1);
            border-radius: 6px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 500;
        }
        
        @media (max-width: 768px) {
            .checkout-container { grid-template-columns: 1fr; padding: 24px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR (Sama dengan halaman lain) -->
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/about') }}">Tentang Kami</a></li> 
            <li><a href="{{ url('/tours') }}">Touring</a></li>
            <li><a href="{{ url('/destinations') }}">Destinasi</a></li>
            <li><a href="{{ url('/contact') }}">Kontak</a></li>
        </ul>
        <div class="nav-right">
            <div class="nav-icons">
                <a href="{{ url('/profile') }}"><i class="far fa-user"></i></a>
            </div>
        </div>
    </nav>

    <div class="checkout-container">
        <!-- DETAIL PAKET -->
        <div class="tour-info">
            <h2 class="tour-title">{{ $tour->title }}</h2>
            <div class="tour-meta">
                <p><i class="fas fa-clock" style="width: 20px"></i> {{ $tour->duration_days }} Hari</p>
                <p><i class="fas fa-users" style="width: 20px"></i> Maks {{ $tour->max_people }} Orang</p>
            </div>
            <p>{{ Str::limit($tour->description, 100) }}</p>
            
            <div class="tour-price">
                Rp {{ number_format($tour->price, 0, ',', '.') }} <span style="font-size: 14px; color: var(--muted); font-weight: normal">/ orang</span>
            </div>
        </div>

        <!-- FORM BOOKING -->
        <div>
            <h3 style="font-family: 'Cormorant Garamond', serif; font-size: 24px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Lengkapi Pemesanan</h3>
            
            <form id="bookingForm">
                <input type="hidden" id="tour_id" value="{{ $tour->id }}">
                <input type="hidden" id="tour_price" value="{{ $tour->price }}">

                <div class="form-group">
                    <label>Tanggal Keberangkatan</label>
                    <input type="date" id="check_in" required min="{{ date('Y-m-d') }}">
                </div>

                <div class="form-group">
                    <label>Jumlah Orang</label>
                    <input type="number" id="jumlah_orang" min="1" max="{{ $tour->max_people }}" value="1" required>
                </div>

                <div class="form-group">
                    <label>Catatan Khusus (Opsional)</label>
                    <textarea id="catatan" rows="3" placeholder="Contoh: Ada balita, minta jemput di stasiun Gubeng"></textarea>
                </div>

                <div class="total-preview">
                    <span>Total Tagihan:</span>
                    <span id="totalDisplay">Rp {{ number_format($tour->price, 0, ',', '.') }}</span>
                </div>

                <button type="submit" class="btn-submit" style="margin-top: 20px;">
                    Selesaikan Pesanan <i class="fas fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Cek login
            const token = localStorage.getItem('jwt_token');
            if (!token) {
                alert('Anda harus login terlebih dahulu untuk melakukan pemesanan.');
                window.location.href = '/login';
            }

            // Hitung total harga otomatis dan batasi jumlah orang
            const price = parseInt(document.getElementById('tour_price').value);
            const inputJumlah = document.getElementById('jumlah_orang');
            const totalDisplay = document.getElementById('totalDisplay');
            const maxCap = parseInt("{{ $tour->max_people }}");

            inputJumlah.addEventListener('input', () => {
                let jumlah = parseInt(inputJumlah.value) || 1;
                
                // Batasi jumlah maksimal sesuai paket
                if (jumlah > maxCap) {
                    alert('Maksimal pemesanan untuk paket ini adalah ' + maxCap + ' orang.');
                    jumlah = maxCap;
                    inputJumlah.value = maxCap;
                }

                const total = price * jumlah;
                totalDisplay.textContent = 'Rp ' + total.toLocaleString('id-ID');
            });

            // Submit form
            document.getElementById('bookingForm').addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const btn = e.target.querySelector('button');
                btn.textContent = 'Memproses...';
                btn.disabled = true;

                try {
                    const response = await fetch('/api/v1/bookings', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'Authorization': 'Bearer ' + token
                        },
                        body: JSON.stringify({
                            tour_id: document.getElementById('tour_id').value,
                            check_in: document.getElementById('check_in').value,
                            jumlah_orang: document.getElementById('jumlah_orang').value,
                            catatan: document.getElementById('catatan').value
                        })
                    });

                    const data = await response.json();

                    if (response.status === 401) {
                        alert('Sesi login Anda tidak valid atau telah kedaluwarsa. Silakan login kembali.');
                        localStorage.removeItem('jwt_token');
                        window.location.href = '/login';
                        return;
                    }

                    if (response.ok && data.success) {
                        alert('Pemesanan berhasil! Kode Booking Anda: ' + data.data.booking_code);
                        window.location.href = '/profile'; // Arahkan ke profil
                    } else {
                        alert('Gagal: ' + (data.message || 'Terjadi kesalahan validasi'));
                        btn.textContent = 'Selesaikan Pesanan';
                        btn.disabled = false;
                    }
                } catch (error) {
                    alert('Terjadi kesalahan jaringan.');
                    btn.textContent = 'Selesaikan Pesanan';
                    btn.disabled = false;
                }
            });
        });
    </script>
</body>
</html>
