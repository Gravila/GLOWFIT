<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>GLOWFIT GYM</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
</head>
<body>
    @include('partials.theme-script')
    {{-- Navigasi Otomatis --}}
    @include('layouts.navigation')

    @section('content')
    <div style="display: flex; align-items: center; justify-content: center; min-height: 100vh; padding-top: 100px; padding-bottom: 100px; font-family: 'Poppins', sans-serif;">
        
        <div style="background: #ffffff; padding: 50px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); text-align: center; max-width: 500px; width: 90%; border: 1px solid #f0f0f0;">
            
            <div style="font-size: 50px; margin-bottom: 20px;">☎️</div>
            
            <h1 style="color: #333; font-size: 2rem; margin-bottom: 10px;">Butuh Bantuan?</h1>
            <p style="color: #777; font-size: 1rem; margin-bottom: 30px; line-height: 1.6;">
                Tim GlowFit siap membantu kebutuhan membership kamu. Jangan ragu untuk bertanya langsung kepada admin kami!
            </p>
            
            @php
                $pesan = "Halo Admin GlowFit, saya ingin bertanya tentang membership.";
                $urlWa = "https://wa.me/6285334515211?text=" . urlencode($pesan);
            @endphp
            
            <a href="{{ $urlWa }}" target="_blank" 
               style="display: inline-block; background: #810100; color: white; padding: 15px 35px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: background 0.3s; box-shadow: 0 5px 15px rgba(129, 1, 0, 0.3);">
               Hubungi Admin via WhatsApp
            </a>
            
            <p style="margin-top: 25px; font-size: 0.85rem; color: #aaa;">Respon cepat di jam kerja (08:00 - 20:00)</p>
        </div>
        
    </div>

{{-- Footer --}}
<footer style="background-color: #1B1717 !important; color: #EDEBDD !important; padding: 40px 80px; font-family: 'Poppins', sans-serif; margin-top: 60px; display: block; clear: both;">
    <div style="display: flex; justify-content: space-between; align-items: flex-start; flex-wrap: wrap; gap: 40px; max-width: 1200px; margin: 0 auto;">
        
        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #EDEBDD !important; font-size: 18px; font-weight: 600; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">GlowFit Gym</h3>
            <p style="color: #EDEBDD !important; font-size: 14px; line-height: 1.6; opacity: 0.8; font-family: 'Poppins', sans-serif;">Fitness Membership System</p>
        </div>

        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #EDEBDD !important; font-size: 18px; font-weight: 600; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">Menu</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 10px;">
                <li><a href="{{ route('dashboard') }}" style="color: #EDEBDD !important; text-decoration: none; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">Beranda</a></li>
                <li><a href="#" style="color: #EDEBDD !important; text-decoration: none; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">Paket Membership</a></li>
                <li><a href="#" style="color: #EDEBDD !important; text-decoration: none; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">Kelas GLOWFIT</a></li>
                <li><a href="#" style="color: #EDEBDD !important; text-decoration: none; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">Kontak</a></li>
            </ul>
        </div>

        <div style="flex: 1; min-width: 200px;">
            <h3 style="color: #EDEBDD !important; font-size: 18px; font-weight: 600; margin-bottom: 15px; font-family: 'Poppins', sans-serif;">Contact</h3>
            <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                <li style="display: flex; align-items: center; gap: 10px; color: #EDEBDD !important; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">
                    📧 glowfit.gym@gmail.com
                </li>
                <li style="display: flex; align-items: center; gap: 10px; color: #EDEBDD !important; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">
                    📸 @glowfit
                </li>
                <li style="display: flex; align-items: center; gap: 10px; color: #EDEBDD !important; font-size: 14px; opacity: 0.8; font-family: 'Poppins', sans-serif;">
                    💬 0812345678
                </li>
            </ul>
        </div>
    </div>
</footer>
<script>
    // 1. Fungsi untuk mengubah tema
    function toggleTheme() {
        const html = document.documentElement; // Mengambil tag <html>
        html.classList.toggle('dark');
        
        // Simpan preferensi user ke localStorage agar tidak berubah saat pindah halaman
        if (html.classList.contains('dark')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // 2. Fungsi untuk memuat tema saat halaman dibuka
    (function() {
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.classList.add('dark');
        }
    })();
</script>