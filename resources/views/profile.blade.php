<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body { background: var(--cream); padding-top: 100px; }
        .profile-container {
            max-width: 600px;
            margin: 0 auto 60px;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        .profile-header {
            text-align: center;
            margin-bottom: 32px;
            border-bottom: 1px solid #eee;
            padding-bottom: 24px;
        }
        .profile-avatar {
            width: 80px;
            height: 80px;
            background: var(--deep-navy);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin: 0 auto 16px;
        }
        .profile-name { font-family: 'Cormorant Garamond', serif; font-size: 28px; color: var(--deep-navy); margin-bottom: 4px; }
        .profile-role { font-size: 13px; color: var(--accent-terra); font-weight: 500; letter-spacing: 0.05em; text-transform: uppercase; }
        
        .info-group { margin-bottom: 20px; }
        .info-label { font-size: 11px; letter-spacing: 0.1em; color: var(--muted); text-transform: uppercase; margin-bottom: 6px; }
        .info-value { font-size: 16px; color: var(--charcoal); font-weight: 500; background: var(--cream); padding: 12px 16px; border-radius: 4px; }
        
        .api-status {
            margin-top: 32px;
            padding: 16px;
            background: rgba(13, 27, 42, 0.04);
            border-left: 4px solid var(--deep-navy);
            font-size: 13px;
            color: var(--charcoal);
            line-height: 1.6;
        }
        
        #loading { text-align: center; padding: 40px; color: var(--muted); }
        #profileContent { display: none; }
        
        .booking-history { margin-top: 40px; border-top: 1px solid #eee; padding-top: 30px; }
        .booking-history h3 { font-family: 'Cormorant Garamond', serif; font-size: 24px; color: var(--deep-navy); margin-bottom: 20px; }
        .booking-card {
            background: var(--cream);
            border: 1px solid rgba(0,0,0,0.05);
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 16px;
        }
        .booking-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; border-bottom: 1px solid rgba(0,0,0,0.05); padding-bottom: 12px; }
        .booking-code { font-weight: 600; color: var(--deep-navy); }
        .booking-status { font-size: 11px; padding: 4px 10px; border-radius: 20px; text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em; }
        .status-pending { background: #fff3cd; color: #856404; }
        .status-success { background: #d4edda; color: #155724; }
        .booking-details p { margin-bottom: 8px; font-size: 14px; color: var(--charcoal); }
        .booking-details p i { width: 20px; color: var(--accent-terra); }
        .booking-empty { text-align: center; color: var(--muted); font-size: 14px; padding: 20px; background: rgba(0,0,0,0.02); border-radius: 8px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
        <div class="nav-right">
            <a href="{{ url('/') }}" style="color: var(--deep-navy); text-decoration: none; font-size: 14px; font-weight: 500;">
                <i class="fas fa-arrow-left"></i> Kembali ke Beranda
            </a>
        </div>
    </nav>

    <div class="profile-container">
        <div id="loading">
            <i class="fas fa-spinner fa-spin fa-2x"></i>
            <p style="margin-top: 10px;">Mengambil data dari API JWT ( /api/v1/auth/me ) ...</p>
        </div>

        <div id="profileContent">
            <div class="profile-header">
                <div class="profile-avatar"><i class="far fa-user"></i></div>
                <div class="profile-name" id="display-name">-</div>
                <div class="profile-role"><i class="fas fa-check-circle"></i> Terautentikasi via JWT Token</div>
            </div>

            <div class="info-group">
                <div class="info-label">ID Pengguna</div>
                <div class="info-value" id="display-id">-</div>
            </div>
            <div class="info-group">
                <div class="info-label">Nama Lengkap</div>
                <div class="info-value" id="display-fullname">-</div>
            </div>
            <div class="info-group">
                <div class="info-label">Alamat Email</div>
                <div class="info-value" id="display-email">-</div>
            </div>
            <div class="info-group">
                <div class="info-label">Bergabung Sejak</div>
                <div class="info-value" id="display-joined">-</div>
            </div>

            <div class="api-status">
                <strong><i class="fas fa-server"></i> Berhasil Terintegrasi dengan Backend API</strong><br>
                Halaman ini berhasil menarik data privasi kamu dari backend menggunakan rute terproteksi <code>GET /api/v1/auth/me</code> dengan mengirimkan <em>Bearer Token</em> dari localStorage.
            </div>

            <!-- RIWAYAT PESANAN -->
            <div class="booking-history">
                <h3>Riwayat Pemesanan Anda</h3>
                <div id="booking-list">
                    <!-- Akan diisi via JS -->
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const token = localStorage.getItem('jwt_token');
            if (!token) {
                alert('Anda belum login. Silakan login terlebih dahulu.');
                window.location.href = '/login';
                return;
            }

            try {
                // Proses menembak endpoint privat API kita
                const response = await fetch('/api/v1/auth/me', {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer ' + token,
                        'Accept': 'application/json'
                    }
                });

                const result = await response.json();

                if (response.ok && result.success) {
                    const user = result.data;
                    document.getElementById('display-name').textContent = user.name;
                    document.getElementById('display-fullname').textContent = user.name;
                    document.getElementById('display-email').textContent = user.email;
                    document.getElementById('display-id').textContent = 'USR-' + String(user.id).padStart(4, '0');
                    
                    // Format tanggal agar rapi
                    const dateObj = new Date(user.created_at);
                    document.getElementById('display-joined').textContent = dateObj.toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });

                    // Render Bookings
                    const bookingList = document.getElementById('booking-list');
                    if (user.bookings && user.bookings.length > 0) {
                        bookingList.innerHTML = '';
                        // Urutkan dari yang terbaru (asumsi id lebih besar = terbaru)
                        const sortedBookings = user.bookings.sort((a,b) => b.id - a.id);
                        
                        sortedBookings.forEach(book => {
                            const checkInDate = new Date(book.check_in).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' });
                            const rpTotal = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(book.total_harga);
                            
                            const html = `
                                <div class="booking-card">
                                    <div class="booking-header">
                                        <span class="booking-code"><i class="fas fa-ticket-alt" style="margin-right: 6px;"></i>${book.booking_code}</span>
                                        <span class="booking-status status-${book.status.toLowerCase()}">${book.status}</span>
                                    </div>
                                    <div class="booking-details">
                                        <p><i class="fas fa-map-marked-alt"></i> <strong>${book.tour ? book.tour.name : 'Paket Tour'}</strong></p>
                                        <p><i class="far fa-calendar-alt"></i> Keberangkatan: ${checkInDate}</p>
                                        <p><i class="fas fa-users"></i> ${book.jumlah_orang} Orang</p>
                                        <p><i class="fas fa-money-bill-wave"></i> Total: <strong>${rpTotal}</strong></p>
                                    </div>
                                </div>
                            `;
                            bookingList.insertAdjacentHTML('beforeend', html);
                        });
                    } else {
                        bookingList.innerHTML = '<div class="booking-empty">Anda belum memiliki riwayat pemesanan.</div>';
                    }

                    document.getElementById('loading').style.display = 'none';
                    document.getElementById('profileContent').style.display = 'block';
                } else {
                    alert('Sesi token tidak valid atau telah kadaluarsa. Silakan login kembali.');
                    localStorage.removeItem('jwt_token');
                    localStorage.removeItem('user_name');
                    window.location.href = '/login';
                }
            } catch (error) {
                alert('Gagal terhubung ke API Server.');
                window.location.href = '/';
            }
        });
    </script>
</body>
</html>
