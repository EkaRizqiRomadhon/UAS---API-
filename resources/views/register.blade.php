<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body {
            background: var(--warm-white);
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
        }
        .auth-container {
            background: #fff;
            padding: 48px;
            border-radius: 8px;
            box-shadow: 0 20px 48px rgba(0,0,0,0.08);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        .auth-logo {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            font-weight: 600;
            color: var(--charcoal);
            text-decoration: none;
            display: inline-block;
            margin-bottom: 8px;
        }
        .auth-logo span { color: var(--accent-terra); }
        .auth-subtitle {
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 32px;
        }
        .form-group {
            text-align: left;
            margin-bottom: 16px;
        }
        .form-group label {
            display: block;
            font-size: 11px;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 6px;
        }
        .form-group input {
            width: 100%;
            padding: 12px 16px;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            border: 1px solid rgba(0,0,0,0.12);
            background: #fff;
            color: var(--charcoal);
            outline: none;
            transition: border-color 0.2s;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-group input:focus {
            border-color: var(--accent-terra);
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--deep-navy);
            color: #fff;
            font-family: 'DM Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.2s;
            margin-top: 8px;
        }
        .btn-submit:hover { background: var(--accent-terra); }
        .auth-footer {
            margin-top: 24px;
            font-size: 13px;
            color: var(--muted);
        }
        .auth-footer a {
            color: var(--accent-terra);
            text-decoration: none;
            font-weight: 500;
        }
        .auth-footer a:hover { text-decoration: underline; }
        .error-msg {
            color: #dc3545;
            font-size: 12px;
            margin-bottom: 16px;
            display: none;
            text-align: left;
            background: #f8d7da;
            padding: 10px;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <a href="{{ url('/') }}" class="auth-logo">Go Jatim <span>Travel</span></a>
        <p class="auth-subtitle">Buat akun untuk memulai perjalananmu</p>
        
        <div class="error-msg" id="errorMsg"></div>

        <form id="registerForm">
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" id="name" required placeholder="Masukkan nama">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" required placeholder="Masukkan email">
            </div>
            <div class="form-group" style="position: relative;">
                <label>Password</label>
                <input type="password" id="password" required placeholder="Minimal 8 karakter" style="padding-right: 40px;">
                <i class="far fa-eye" id="togglePassword" style="position: absolute; right: 16px; top: 34px; cursor: pointer; color: var(--muted);"></i>
            </div>
            <div class="form-group" style="position: relative;">
                <label>Konfirmasi Password</label>
                <input type="password" id="password_confirmation" required placeholder="Ulangi password" style="padding-right: 40px;">
                <i class="far fa-eye" id="togglePasswordConfirm" style="position: absolute; right: 16px; top: 34px; cursor: pointer; color: var(--muted);"></i>
            </div>
            <button type="submit" class="btn-submit" id="btnSubmit">Daftar Sekarang</button>
        </form>

        <div class="auth-footer">
            Sudah punya akun? <a href="{{ url('/login') }}">Login di sini</a><br><br>
            <a href="{{ url('/') }}" style="color: var(--muted); font-size: 12px;">← Kembali ke Beranda</a>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        const togglePasswordConfirm = document.getElementById('togglePasswordConfirm');
        const passwordConfirm = document.getElementById('password_confirmation');

        togglePasswordConfirm.addEventListener('click', function () {
            const type = passwordConfirm.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordConfirm.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });

        document.getElementById('registerForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const password_confirmation = document.getElementById('password_confirmation').value;
            
            const btn = document.getElementById('btnSubmit');
            const errorMsg = document.getElementById('errorMsg');
            
            btn.textContent = 'Memproses...';
            btn.disabled = true;
            errorMsg.style.display = 'none';

            try {
                // Panggil Endpoint API Register JWT
                const response = await fetch('/api/v1/auth/register', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ name, email, password, password_confirmation })
                });

                const data = await response.json();

                if (response.ok && data.success) {
                    alert('Registrasi berhasil! Silakan login menggunakan akun baru Anda.');
                    window.location.href = '/login';
                } else {
                    if (data.errors) {
                        // Tampilkan error validasi Laravel pertama yang ditemukan
                        const firstError = Object.values(data.errors)[0][0];
                        errorMsg.textContent = firstError;
                    } else {
                        errorMsg.textContent = data.message || 'Registrasi gagal.';
                    }
                    errorMsg.style.display = 'block';
                }
            } catch (error) {
                errorMsg.textContent = 'Terjadi kesalahan pada server. Pastikan API berjalan.';
                errorMsg.style.display = 'block';
            } finally {
                btn.textContent = 'Daftar Sekarang';
                btn.disabled = false;
            }
        });
    </script>
</body>
</html>
