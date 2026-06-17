@extends('layouts.app')

@section('content')
<section class="hero">
    <div>
        <h1>BUILD YOUR DREAM BODY</h1>
        <p>Latihan lebih sehat bersama GlowFit Gym</p>
    </div>
</section>

<div class="main-layout">
    
    <div class="content">
        <div class="promo-section">
            <div class="promo-text">
                <h2>TEMUKAN POTENSI TERBAIK DIRIMU</h2>
                <p>Mulai perjalanan kebugaranmu hari ini. Dapatkan akses ke fasilitas modern, pelatih berpengalaman, dan komunitas yang mendukung penuh transformasimu.</p>
                <a href="{{ route('member.index') }}" class="btn-promo">Lihat Paket Membership</a>
            </div>
            
            <div class="promo-image-wrapper">
                <div class="promo-image-card">
                    <img src="{{ asset('image/gymarea2.png') }}" alt="Elevate Your Fitness">
                    <div class="promo-image-overlay">
                        <h3>TINGKATKAN KEBUGARANMU</h3>
                        <p>Latihan intensif dengan peralatan kelas dunia.</p>
                    </div>
                </div>
            </div>
        </div>
        <h2 style="color: #630000; font-weight: 600; margin-bottom: 20px;">Rekomendasi Kelas</h2>
        
        <div class="cards">
            <div class="card">
                <img src="{{ asset('image/gymarea.png') }}" alt="Gym Area">
                <h4 style="color: #630000; font-weight: 600;">Gym Area</h4>
                <p>Kapasitas: 50</p>
            </div>
            <div class="card">
                <img src="{{ asset('image/zumba.png') }}" alt="Zumba Class">
                <h4 style="color: #630000; font-weight: 600;">Zumba Class</h4>
                <p>Kapasitas: 30</p>
            </div>
            <div class="card">
                <img src="{{ asset('image/yoga.png') }}" alt="Yoga Class">
                <h4 style="color: #630000; font-weight: 600;">Yoga Class</h4>
                <p>Kapasitas: 20</p>
            </div>
            <div class="card">
                <img src="{{ asset('image/cardio.png') }}" alt="Cardio Room">
                <h4 style="color: #630000; font-weight: 600;">Cardio Room</h4>
                <p>Kapasitas: 25</p>
            </div>
        </div>
        <div class="progres-section">
            <div class="progres-intro">
                <h2>AYO, SEGERA<br>DAFTARKAN DIRIMU!</h2>
                <p>Kuota kelas terbatas setiap harinya. Amankan slot latihanmu bersama instruktur terbaik kami sebelum kehabisan!</p>
                
                <div class="progres-cta-wrap">
                    <a href="{{ route('member.index') }}" class="btn-progres-cta">Daftar Kelas Sekarang</a>
                </div>
            </div>
            
            <div class="progres-skew-container">
                
                <div class="skew-box">
                    <div class="skew-bg-img" style="background-image: url('{{ asset('image/gym2.png') }}');"></div>
                    <div class="skew-content">
                        <span class="skew-number">01</span>
                        <h4>PROGRAM<br>TERSTRUKTUR</h4>
                        <p>Latihan jadi lebih terarah dan konsisten.</p>
                    </div>
                </div>

                <div class="skew-box box-maroon-height">
                    <div class="skew-bg-img" style="background-image: url('{{ asset('image/gym1.png') }}');"></div>
                    <div class="skew-content">
                        <span class="skew-number">02</span>
                        <h4>TRAINER<br>PROFESIONAL</h4>
                        <p>Bimbingan postur tepat dan anti-cedera.</p>
                    </div>
                </div>

                <div class="skew-box">
                    <div class="skew-bg-img" style="background-image: url('{{ asset('image/gym3.png') }}');"></div>
                    <div class="skew-content">
                        <span class="skew-number">03</span>
                        <h4>FASILITAS<br>MODERN</h4>
                        <p>Akses ke peralatan gym kelas dunia.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-layout">
        <div class="content">
            <div class="promo-section">
                </div>
            
            <h2 style="color: #630000; font-weight: 600; margin-bottom: 20px;">Rekomendasi Kelas</h2>
            <div class="cards">
                </div>
            
            <div class="progres-section">
                </div>
        </div>
    </div>
@endsection
