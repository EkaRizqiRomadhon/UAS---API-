document.addEventListener('DOMContentLoaded', function() {
    const token = localStorage.getItem('jwt_token');
    const userName = localStorage.getItem('user_name');
    const navIcons = document.querySelector('.nav-icons');
    
    if (token && navIcons) {
        // Cari link icon user asli
        const loginLink = Array.from(navIcons.querySelectorAll('a')).find(a => a.innerHTML.includes('fa-user'));
        if (loginLink) {
            // Inject Styles
            const style = document.createElement('style');
            style.innerHTML = `
                .profile-dropdown { position: relative; display: inline-block; }
                .profile-menu {
                    display: none; position: absolute; right: 0; top: 100%;
                    background-color: white; min-width: 180px;
                    box-shadow: 0px 8px 24px 0px rgba(0,0,0,0.12);
                    border-radius: 6px; z-index: 1000; padding: 8px 0; margin-top: 14px;
                }
                .profile-menu.show { display: block; }
                .profile-menu a {
                    color: var(--charcoal); padding: 12px 20px; text-decoration: none;
                    display: flex !important; align-items: center; gap: 12px !important;
                    font-size: 13px !important; transition: background 0.15s;
                }
                .profile-menu a:hover {
                    background-color: var(--cream); color: var(--accent-terra) !important;
                }
                .nav-user-greeting {
                    font-size: 14px; font-weight: 500; color: var(--deep-navy);
                    display: flex; align-items: center; gap: 8px; cursor: pointer;
                    transition: color 0.2s;
                }
                .nav-user-greeting:hover { color: var(--accent-terra); }
            `;
            document.head.appendChild(style);

            // Bungkus dalam dropdown
            const dropdownContainer = document.createElement('div');
            dropdownContainer.className = 'profile-dropdown';
            
            // Nama user dan ikon orang
            const greeting = document.createElement('div');
            greeting.className = 'nav-user-greeting';
            const firstName = userName ? userName.split(' ')[0] : 'User';
            greeting.innerHTML = `Halo, ${firstName} <i class="far fa-user"></i>`;
            
            // Isi dropdown menu
            const menu = document.createElement('div');
            menu.className = 'profile-menu';
            menu.innerHTML = `
                <div style="padding: 12px 20px; border-bottom: 1px solid #eee; margin-bottom: 4px;">
                    <strong style="display:block; font-size:14px; color:var(--deep-navy); margin-bottom:2px;">${userName}</strong>
                    <span style="font-size:11px; color:var(--muted);"><i class="fas fa-check-circle" style="color: green;"></i> Terautentikasi (JWT)</span>
                </div>
                <a href="/profile"><i class="far fa-id-badge"></i> Profil Saya</a>
                <a href="/destinations"><i class="far fa-heart"></i> Wisata Favorit</a>
                <a href="#" id="logoutBtn" style="color:var(--accent-terra) !important; border-top: 1px solid #eee; margin-top: 4px;"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            `;
            
            // Fungsi klik untuk buka-tutup menu
            greeting.addEventListener('click', function(e) {
                e.preventDefault();
                menu.classList.toggle('show');
            });
            
            // Klik di luar untuk menutup
            document.addEventListener('click', function(e) {
                if (!dropdownContainer.contains(e.target)) {
                    menu.classList.remove('show');
                }
            });
            
            dropdownContainer.appendChild(greeting);
            dropdownContainer.appendChild(menu);
            loginLink.replaceWith(dropdownContainer);

            // Fungsi Logout
            document.getElementById('logoutBtn').addEventListener('click', async function(e) {
                e.preventDefault();
                this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Proses...';
                try {
                    await fetch('/api/v1/auth/logout', {
                        method: 'POST',
                        headers: {
                            'Authorization': 'Bearer ' + token,
                            'Accept': 'application/json'
                        }
                    });
                } catch(err) { console.error(err); }
                localStorage.removeItem('jwt_token');
                localStorage.removeItem('user_name');
                window.location.reload(); // reload halaman
            });
        }
    } else {
        // JIKA BELUM LOGIN
        // 1. Buat banner peringatan melayang di bawah
        const banner = document.createElement('div');
        banner.style.position = 'fixed';
        banner.style.bottom = '0';
        banner.style.left = '0';
        banner.style.width = '100%';
        banner.style.backgroundColor = 'var(--deep-navy)';
        banner.style.color = '#fff';
        banner.style.textAlign = 'center';
        banner.style.padding = '14px 20px';
        banner.style.fontSize = '14px';
        banner.style.zIndex = '9999';
        banner.style.boxShadow = '0 -4px 12px rgba(0,0,0,0.1)';
        banner.innerHTML = `
            <i class="fas fa-info-circle" style="color: var(--accent-terra); margin-right: 6px;"></i> 
            Silakan <a href="/login" style="color: var(--accent-terra); font-weight: 600; text-decoration: underline;">Login terlebih dahulu</a> untuk bisa melakukan pemesanan (booking) paket wisata.
            <button onclick="this.parentElement.style.display='none'" style="float: right; background: none; border: none; color: white; cursor: pointer; font-size: 16px; margin-left: 10px;"><i class="fas fa-times"></i></button>
        `;
        document.body.appendChild(banner);

        // 2. Intercept (cegat) setiap tombol yang berhubungan dengan booking
        document.querySelectorAll('a, button').forEach(el => {
            const text = el.innerText.toLowerCase();
            if (text.includes('pesan') || text.includes('booking') || text.includes('beli')) {
                el.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    alert('Mohon maaf, Anda harus Login terlebih dahulu untuk bisa melakukan pemesanan.');
                    window.location.href = '/login';
                });
            }
        });
    }
});
