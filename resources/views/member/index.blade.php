<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowFit Gym</title>
        
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        
</head>

<body>

<!-- NAVBAR -->
<nav>
    <div class="logo">GlowFit Gym</div>
    <div class="logo">
    <img src="{{ asset('image/GLOWFIT GYM.png') }}">
    </div>
    <div class="menu">
        <a href="index.html">Beranda</a>
        <a href="/member">Paket Membership</a>
        <a href="#">Kelas GLOWFIT</a>
        <a href="#">Kontak</a>
    </div>
    <div class="nav-search">
        <input type="text" id="navSearch" placeholder="Cari...">
        <button id="searchToggle">
          <i class="fa fa-search"></i>
        </button>
    </div>
</nav>

<div class="user-info">
    @auth
        <span>Selamat Datang, {{ auth()->user()->name }}</span>
    @endauth
</div>

<button id="theme-toggle" class="p-2 bg-gray-200 dark:bg-gray-700 text-black dark:text-white rounded">
    Toggle Tema Gelap/Terang
</button>

<script>
// Helper Functions untuk Cookie
function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}

// Logika Klik Tombol Toggle
document.getElementById('theme-toggle').addEventListener('click', function() {
    if (document.documentElement.classList.contains('dark')) {
        document.documentElement.classList.remove('dark');
        setCookie('theme', 'light', 30); // Simpan 30 hari
    } else {
        document.documentElement.classList.add('dark');
        setCookie('theme', 'dark', 30);
    }
});
</script>

<!-- HERO -->
<section class="hero">
    <div class="overlay">
        <h1>BUILD YOUR DREAM BODY</h1>
        <p>Latihan lebih sehat bersama GlowFit Gym</p>
    </div>
</section>

<!-- MAIN LAYOUT -->
<div class="main-layout">

<!-- CONTENT -->
<section class="content">

<h2>Rekomendasi Kelas</h2>

<div class="cards">

<div class="card">
<img src="{{ asset('image/gymarea.png') }}">
<h4>Gym Area</h4>
<p>Kapasitas: 50</p>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b">
<h4>Zumba Class</h4>
<p>Kapasitas: 30</p>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1599058917212-d750089bc07e">
<h4>Yoga Class</h4>
<p>Kapasitas: 20</p>
</div>

<div class="card">
<img src="https://images.unsplash.com/photo-1579758629938-03607ccdbaba">
<h4>Cardio Room</h4>
<p>Kapasitas: 25</p>
</div>

</div>

<div class="mb-6 p-4 bg-white rounded-lg shadow">
    <h3 class="text-lg font-semibold mb-2">Informasi Cuaca Gym (Surabaya)</h3>
    <div id="loading-cuaca" class="text-gray-500">Mencari data cuaca...</div>
    <div id="konten-cuaca" class="hidden">
        <p><strong>Kota:</strong> <span id="nama-kota">-</span></p>
        <p><strong>Suhu Saat Ini:</strong> <span id="suhu-cuaca">-</span>°C</p>
        <p><strong>Kondisi:</strong> <span id="deskripsi-cuaca">-</span></p>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", async function() {
    const loadingEl = document.getElementById('loading-cuaca');
    const kontenEl = document.getElementById('konten-cuaca');

    try {
        // Ambil data menggunakan async/await
        const response = await fetch('https://wttr.in/Surabaya?format=j1');
        if (!response.ok) throw new Error('Gagal mengambil data cuaca');
        
        const data = await response.json();
        
        // Atur data ke elemen HTML
        document.getElementById('nama-kota').innerText = data.nearest_area[0].areaName[0].value;
        document.getElementById('suhu-cuaca').innerText = data.current_condition[0].temp_C;
        document.getElementById('deskripsi-cuaca').innerText = data.current_condition[0].weatherDesc[0].value;

        // Sembunyikan loading, tampilkan konten
        loadingEl.classList.add('hidden');
        kontenEl.classList.remove('hidden');
    } catch (error) {
        loadingEl.innerText = "Gagal memuat cuaca: " + error.message;
        loadingEl.classList.remove('hidden');
    }
});
</script>

<div class="mb-4">
    <input type="text" id="live-search" class="w-full p-2 border rounded" placeholder="Cari member berdasarkan nama atau kode...">
</div>

<script>
document.getElementById('live-search').addEventListener('input', function() {
    let query = this.value;

    // Lakukan fetch data tanpa reload halaman
    fetch(`/member/search?query=${query}`, {
        method: 'GET',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'Content-Type': 'application/json'
        }
    })
    // Bagian ini adalah Implementasi Poin 3.f
    fetch('{{ route("settings.save") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        '   X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            theme: temaDipilih,
            font_size: fontDipilih
        })
    })

    .then(response => response.json())
    .then(data => {
        let html = '';
        if(data.length > 0) {
            data.forEach(member => {
                html += `
                <tr>
                    <td class="p-2 border">${member.kode_member}</td>
                    <td class="p-2 border">${member.nama}</td>
                    <td class="p-2 border">${member.email}</td>
                    <td class="p-2 border">${member.layanan}</td>
                </tr>`;
            });
        } else {
            html = `<tr><td colspan="4" class="p-4 border text-center text-gray-500">Member tidak ditemukan</td></tr>`;
        }
        document.getElementById('tbody-members').innerHTML = html;
    });
});
</script>

<!-- TABLE -->
<section class="table-section">
<h2>Data Member</h2>

<div class="table-box">

    <table>
        <thead>
        <tr>
        <th>Kode</th>
        <th>Nama</th>
        <th>Layanan</th>
        <th>Tanggal</th>
        <th>Harga</th>
        <th>Aksi</th>
        </tr>
        </thead>
        
        <tbody id="tableBody">
            @forelse($members as $m)
                <tr>
                    <td>{{ $m->kode_member }}</td>
                    <td>{{ $m->nama }}</td>
                    <td>{{ $m->layanan }}</td>
                    <td>{{ $m->created_at->format('d-m-Y') }}</td>
                    <td>Rp {{ number_format($m->biaya_bulanan, 0, ',', '.') }}</td>
                    <td>
                        {{-- Tombol Edit & Hapus untuk CRUD --}}
                        <a href="{{ route('member.edit', $m->id) }}" class="btn-edit">Edit</a>
                        
                        <form action="{{ route('member.destroy', $m->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus member ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Data member masih kosong.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <div class="pagination-wrapper">
        {{ $members->links() }}
    </div>

</div>
</section>

</section>

<!-- SIDEBAR -->
<aside class="sidebar">

<div class="sidebar">

    <!-- STATISTIK -->
    <div class="stat-section">
        <h3>Statistik</h3>
      
        <div class="stat-box pink">
        Total Member: <span id="total"></span>
        </div>
      
        <div class="stat-box green">
        Per Layanan: <span id="stok"></span>
        </div>
    </div>
    <hr>
      
    <!-- FILTER -->
    <div class="filter-section">
        <h3>Filter Layanan</h3>
      
        <select id="filter">
        <option value="">Semua</option>
        <option>Basic</option>
        <option>Premium</option>
        <option>VIP</option>
        </select>
    </div>
</aside> 
</div>

<form id="form-pengaturan">
    @csrf
    <select id="select-theme" name="theme">
        <option value="light">Terang (Light)</option>
        <option value="dark">Gelap (Dark)</option>
        <option value="system">Ikuti Sistem</option>
    </select>

    <select id="select-font" name="font_size">
        <option value="small">Kecil</option>
        <option value="base">Normal</option>
        <option value="large">Besar</option>
    </select>
</form>

<div class="mt-8 p-4 bg-gray-100 dark:bg-gray-800 rounded-lg shadow">
    <h4 class="font-bold text-md text-gray-800 dark:text-white">Statistik Kunjungan Anda:</h4>
    <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4">
        <li>Jumlah Kunjungan Halaman: <strong>{{ session('total_kunjungan', 1) }}</strong> kali</li>
        <li>Kunjungan Pertama: <span>{{ session('kunjungan_pertama', '-') }}</span></li>
        <li>Kunjungan Terakhir: <span>{{ session('kunjungan_terakhir', '-') }}</span></li>
    </ul>
    
    <form action="{{ route('session.reset') }}" method="POST">
        @csrf
        <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded transition">
            Reset Hitungan Kunjungan
        </button>
    </form>
</div>
<!-- FOOTER -->
<div>
<footer>

<div class="footer-col">
<h3>GlowFit Gym</h3>
<p>Fitness Membership System</p>
</div>

<div class="footer-col">
<h3>Menu</h3>
<p>Beranda</p>
<p>Paket Membership</p>
<p>Kelas GLOWFIT</p>
</div>

<div class="footer-col">
<h3>Contact</h3>
<p>📧 glowfit@gmail.com</p>
<p>📷 @glowfit</p>
<p>📱 0812xxxx</p>
</div>

@if(session('success'))
    <div style="padding: 15px; background-color: #d4edda; color: #155724; margin-bottom: 20px;">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div style="padding: 15px; background-color: #f8d7da; color: #721c24; margin-bottom: 20px;">
        {{ session('error') }}
    </div>
@endif
</footer>
</div>
<hr>    
</body>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

