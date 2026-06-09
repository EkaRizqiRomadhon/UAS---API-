# 🌍 Go Jatim Travel API - Projek UAS

RESTful API tangguh yang dibangun menggunakan Laravel untuk mengelola sistem pemesanan perjalanan (travel booking). Proyek ini dikembangkan sebagai tugas Ujian Akhir Semester (UAS), yang menyediakan berbagai endpoint lengkap untuk manajemen destinasi, paket tur, pemesanan, serta autentikasi yang aman.

## 🚀 Fitur Utama

* **🔐 Sistem Autentikasi:** Registrasi, login, dan logout pengguna yang aman menggunakan token API.
* **🔑 Manajemen API Key:** Kontrol akses endpoint menggunakan API key yang dibuat secara aman.
* **📍 Manajemen Destinasi:** Operasi CRUD penuh untuk mengelola data destinasi wisata di Jawa Timur.
* **🗺️ Paket Tur:** Endpoint untuk mengelola detail tur dan rencana perjalanan (itinerary).
* **🎫 Sistem Booking:** Memungkinkan pengguna untuk memesan destinasi wisata dan paket tur dengan mudah.

## 🛠️ Teknologi yang Digunakan

* **Framework:** Laravel (PHP)
* **Database:** MySQL
* **Arsitektur:** RESTful API

## 📋 Persyaratan Sistem

Sebelum memulai, pastikan Anda telah menginstal beberapa perangkat lunak berikut:
* PHP >= 8.2
* Composer
* MySQL Database Server
* Git

## ⚙️ Panduan Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/EkaRizqiRomadhon/UAS---API-.git
   cd "UAS API"
   ```

2. **Instal Dependensi**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment**
   Salin file environment contoh dan atur kredensial database Anda:
   ```bash
   cp .env.example .env
   ```
   *Pastikan Anda mengubah nilai `DB_DATABASE`, `DB_USERNAME`, dan `DB_PASSWORD` di dalam file `.env`.*

4. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

5. **Jalankan Migrasi**
   ```bash
   php artisan migrate
   ```

6. **Jalankan Server Development**
   ```bash
   php artisan serve
   ```
   API dapat diakses melalui `http://localhost:8000/api`

## 📚 Ringkasan Endpoint API

Berikut adalah ringkasan rute utama API yang tersedia pada proyek ini:

| Endpoint | Method | Deskripsi |
| :--- | :---: | :--- |
| `/api/v1/auth/register` | `POST` | Mendaftarkan pengguna baru |
| `/api/v1/auth/login` | `POST` | Autentikasi pengguna dan mendapatkan token |
| `/api/v1/auth/me` | `GET, PUT, DELETE` | Cek, Update, dan Hapus Akun/Profil |
| `/api/v1/auth/refresh` | `POST` | Memperbarui (Refresh) Token |
| `/api/v1/auth/logout` | `POST` | Keluar (logout) dan membatalkan token |
| `/api/v1/api-keys` | `GET, POST, DELETE` | Mengelola API Key milik pengguna |
| `/api/v1/destinations` | `GET, POST, PUT, DELETE` | Mengelola data destinasi wisata |
| `/api/v1/tours` | `GET, POST, PUT, DELETE` | Mengelola data paket tur |
| `/api/v1/bookings` | `POST` | Membuat pesanan (booking) |

*(Catatan: Sebagian besar endpoint memerlukan otorisasi Bearer Token / API Key pada header request).*

## 👨‍💻 Kontributor

* **[Eka Rizqi Romadhon](https://github.com/EkaRizqiRomadhon)**
* **[D Septian R](https://github.com/DseptianR)**
* **[Billy Bayhakhi](https://github.com/billybayhakhi)**

---
*Dibuat untuk Tugas Ujian Akhir Semester (UAS) - Web API Development*
