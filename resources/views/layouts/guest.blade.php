<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>GLOWFIT GYM</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    {{-- Navigasi Otomatis --}}
    @include('layouts.navigation')
    
    <main>
        <div class="package-section" style="padding-top: 120px;"> <h2>Pilih Paket Membership</h2>
            <div class="package-cards">
                <div class="package-card">
                    <h3>Basic</h3>
                    <div class="price">Rp100.000</div>
                    <ul>
                        <li>Akses Gym</li>
                        <li>Jam Terbatas</li>
                        <li>Tidak termasuk kelas</li>
                        <li>Berlaki 1 Bulan</li>
                    </ul>
                </div>
        
                <div class="package-card best">
                    <span class="badge">BEST</span>
                    <h3>Premium</h3>
                    <div class="price">Rp200.000</div>
                    <ul>
                        <li>Akses Gym</li>
                        <li>Zumba/Yoga</li>
                        <li>Konsultasi Trainer</li>
                        <li>Berlaki 1 Bulan</li>
                    </ul>
                </div>

                <div class="package-card vip">
                    <h3>VIP</h3>
                    <div class="price">Rp300.000</div>
                    <ul>
                        <li>Akses Gym</li>
                        <li>Zumba & Yoga</li>
                        <li>Personal Trainer</li>
                        <li>Konsultasi Trainer</li>
                        <li>Prioritas Booking</li>
                        <li>Berlaki 1 Bulan</li>
                    </ul>
                </div>
            </div>
        
            <div class="benefits-section">
                <h2>KEUNTUNGAN MENJADI MEMBER</h2>
                
                <div class="benefits-grid">
                    <div class="benefit-card">
                        <img src="{{ asset('image/alatgym.png') }}" alt="alat gym" class="card-icon">
                        <h3>Akses Gym Sepuasnya</h3>
                        <p>Area cardio, angkat beban, dan latihan fungsional untuk setiap sesi olahraga.</p>
                    </div>
            
                    <div class="benefit-card">
                        <img src="{{ asset('image/minum.png') }}" alt="Icon Gym" class="card-icon">
                        <h3>Minuman Gratis</h3>
                        <p>Tersedia kopi, teh, dan minuman segar lainnya secara gratis.</p>
                    </div>
            
                    <div class="benefit-card">
                        <img src="{{ asset('image/mandi.png') }}" alt="Icon Gym" class="card-icon">
                        <h3>Fasilitas Pemulihan</h3>
                        <p>Tersedia shower, ruang uap, dan ruang santai untuk melepas lelah.</p>
                    </div>
            
                    <div class="benefit-card">
                        <img src="{{ asset('image/diskon.png') }}" alt="Icon Gym" class="card-icon">
                        <h3>Hak Istimewa Member</h3>
                        <p>Diskon eksklusif dan penawaran khusus dari mitra gym kami.</p>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin: 60px 0 30px 0; padding: 20px;">
                <h2 style="font-size: 2rem; color: #810100; margin-bottom: 10px;">Siap Untuk Memulai Perubahan?</h2>
                <p style="font-size: 1.1rem; color: #555; max-width: 600px; margin: 0 auto;">
                    Jangan tunda lagi kesehatanmu. Bergabunglah dengan komunitas GlowFit Gym hari ini dan dapatkan semua fasilitas eksklusif di atas. Isi formulir di bawah ini untuk memulai langkah pertama kamu!
                </p>
            </div>

            <div class="form-container" style="max-width: 600px; margin: 50px auto; background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
                <h2 style="margin-bottom: 20px;">Pendaftaran Member</h2>
                <form action="{{ route('member.store') }}" method="POST">
                    @csrf
                    <div style="display: grid; gap: 15px;">
                        <input type="text" name="nama" placeholder="Nama Member" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="email" name="email" placeholder="Email" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="text" name="no_hp" placeholder="Nomor HP" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="number" name="usia" placeholder="Usia" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        <input type="date" name="tanggal"style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">

                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                            <select name="layanan" id="layanan" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                <option value="">Pilih Layanan</option>
                                <option value="basic">Basic</option>
                                <option value="premium">Premium</option>
                                <option value="vip">VIP</option>
                            </select>
                            
                            <select name="durasi" id="durasi" style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                <option value="">Durasi</option>
                                <option value="1">1 Bulan</option>
                                <option value="3">3 Bulan</option>
                                <option value="6">6 Bulan</option>
                                <option value="12">1 Tahun</option>
                            </select>
                        </div>
        
                        <div style="display: grid; gap: 15px;">
                            <input type="number" id="harga" name="harga" placeholder="Harga" readonly style="padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                        </div>

                        <button type="submit" style="background:#810100; color:white; border:none; padding:12px; border-radius:10px; cursor:pointer; font-weight:bold;">
                            Daftar Member
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
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

        @if(session('success'))
        <div id="popup" style="position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6); backdrop-filter: blur(5px); display:flex; align-items:center; justify-content:center; z-index:9999; animation: fadeIn 0.3s ease-out;">
            <div style="background:white; padding:40px; border-radius:20px; text-align:center; max-width: 400px; width: 90%; box-shadow: 0 20px 40px rgba(0,0,0,0.2); border: 1px solid #eee;">
                
                <div style="width: 80px; height: 80px; background: #e6f4ea; color: #1e7e34; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 20px; font-size: 40px;">✓</div>
                
                <h2 style="color: #333; margin-bottom: 10px; font-family: 'Poppins', sans-serif;">Pendaftaran Berhasil!</h2>
                <p style="color: #666; margin-bottom: 25px; font-family: 'Poppins', sans-serif;">Kode membership kamu telah tersedia:</p>
                
                <div style="background: #f8f9fa; border: 2px dashed #810100; padding: 15px; border-radius: 10px; margin-bottom: 25px;">
                    <span style="font-size: 1.8rem; font-weight: 700; color: #810100; letter-spacing: 2px;">{{ session('success') }}</span>
                </div>
                
                <p style="color: #555; font-size: 0.9rem; margin-bottom: 30px; font-family: 'Poppins', sans-serif;">
                    Silakan hubungi admin kami melalui kontak di bawah ini dengan menyertakan kode di atas untuk proses aktivasi.
                </p>
                
                @php
                $pesan = "Halo Admin GlowFit, saya ingin melakukan pembayaran untuk member baru.%0A%0AKode Member: " . session('success') . "%0ANama: " . session('nama_member');
                $urlWa = "https://wa.me/6285334515211?text=" . $pesan;
                @endphp
            
            <a href="{{ $urlWa }}" 
               target="_blank"
               style="display: inline-block; background: #25D366; color: white; text-decoration: none; padding: 12px 30px; border-radius: 30px; font-weight: 600; font-family: 'Poppins', sans-serif;">
               💬 Hubungi via WhatsApp
            </a>
            <div style="margin-top: 15px;">
                <a href="javascript:void(0)" 
                   onclick="document.getElementById('popup').style.display='none'" 
                   style="color: #666; text-decoration: underline; font-size: 0.9rem; font-family: 'Poppins', sans-serif;">
                   Tutup & Kembali
                </a>
            </div>
            </div>
        </div>
    
        <style>
            @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
        </style>
    @endif
    </div>
</body>
</html>
<script src="{{ asset('js/script.js') }}"></script>