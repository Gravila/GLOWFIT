@extends('layouts.kelas')

@include('partials.theme-script')
@section('content')
<div style="max-width: 600px; margin: 120px auto 50px; padding: 40px; background: #fff; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.08); border: 1px solid #eee;">
    <h2 style="margin-bottom: 25px; color: #1B1717; font-weight: 700;">Pengaturan Tampilan</h2>
    
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
        <div>
            <h4 style="margin: 0;">Mode Tema</h4>
            <p style="margin: 5px 0 0; color: #666; font-size: 0.9rem;">Ubah tampilan menjadi terang atau gelap</p>
        </div>
        <button onclick="toggleTheme()" style="padding: 10px 20px; background: #810100; color: white; border: none; border-radius: 8px; cursor: pointer; font-weight: 600;">
            Ganti Tema
        </button>
    </div>
</div>


<script>
    function toggleTheme() {
        const body = document.body;
        body.classList.toggle('dark-mode');
        
        // Simpan status di localStorage
        if (body.classList.contains('dark-mode')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    }

    // Jalankan saat halaman loading
    window.onload = function() {
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-mode');
        }
    };
</script>
