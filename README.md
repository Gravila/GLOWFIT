<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

# GLOWFIT GYM

🏋️ GLOWFIT GYM - Sistem Membership Gym Berbasis Website
GlowFit Gym adalah sistem informasi manajemen berbasis web yang dirancang untuk mendigitalisasi operasional pusat kebugaran. Sistem ini dibangun untuk mengatasi kendala pendataan manual dan memberikan solusi yang efisien, responsif, dan terintegrasi bagi pengelola gym maupun member.

Website ini dikembangkan untuk memenuhi syarat unjuk kerja pada Ujian Akhir Semester (UAS) mata kuliah Pemrograman Berbasis Web.
Dibuat oleh: Gravila Meliana S(NIM: 242410101050)
Program Studi: Sistem Informasi
Fakultas: Fakultas Ilmu Komputer, Universitas Jember
Video Demo: https://youtu.be/wE2L8WUXH1s  

📑 Daftar Isi
Fitur Utama
Keunggulan Sistem
Panduan Instalasi & Menjalankan Website

## Fitur Utama
✨ Fitur Utama
👤 Untuk Member (Pelanggan)
Beranda: Halaman pembuka yang menyajikan ringkasan informasi mengenai Glowfit Gym, berisi rekomendasi kelas dan informasi untuk mendaftar membership.
Paket Membership: Katalog pilihan paket langganan (Basic, VIP, Platinum) di mana member dapat membandingkan fasilitas dan mendaftar sebagai member.
Kelas GlowFit: Jendela informasi seluruh sesi latihan (seperti Yoga, Zumba, jadwal Practice Trainer), di mana member dapat melihat jadwal harian dan melakukan reservasi slot secara real-time dengan bantuan AJAX tanpa reload halaman.
Kontak: Portal komunikasi yang mengintegrasikan shortcut langsung ke layanan Customer Service via WhatsApp.
Pengaturan Tampilan: Pengguna dapat mengubah visual halaman menjadi Dark Mode atau Light Mode serta mengatur ukuran font yang tersimpan melalui cookies.

👑 Untuk Administrator (Admin)
Beranda (Dasbor): Pusat kendali untuk memantau data krusial seperti total member, okupansi kelas, kelas aktif, dan total pendapatan.
Member: Modul pengelolaan data keanggotaan mencakup identitas, detail layanan, informasi finansial, serta status keanggotaan (Aktif/Tidak Aktif) yang dapat dikelola via dropdown. Dilengkapi fitur Filter Data berdasarkan layanan/durasi serta tombol Reset.
Kelas GlowFit: Pusat pengaturan jadwal sesi latihan. Admin dapat mengelola Nama Kelas, Hari, Jam, serta melakukan aksi Edit dan Hapus pada data jadwal. Terdapat fitur Filter Kelas untuk mempermudah navigasi data.  

🎯 Keunggulan Sistem
Teknologi AJAX: Implementasi komunikasi asinkronus pada fitur booking kelas dan pencarian data untuk memberikan pengalaman real-time tanpa reload halaman.
Keamanan Terpadu: Penggunaan session untuk autentikasi admin agar sistem tetap aman dari akses tidak sah.
Modularitas: Arsitektur MVC (Model-View-Controller) dengan framework Laravel untuk memisahkan logika bisnis, data, dan tampilan. 

## Panduan Instalasi
1. Kloning Repositori

git clone <URL_REPOSITORI_GITHUB_ANDA>
cd glowfit-gym

2.  **Instalasi Dependensi**
    ```bash
composer install
npm install

3. DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=

4.  **Migrasi & Key**
    ```bash
php artisan key:generate
php artisan migrate --seed
php artisan storage:link

