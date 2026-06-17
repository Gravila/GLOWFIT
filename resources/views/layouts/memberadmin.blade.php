<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="utf-8">
        <title>GLOWFIT GYM</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ time() }}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        
    </head>
<body>

@include('layouts.adminnavigation')

<<div class="page-wrapper">
    <aside class="sidebar">
        <h3>Filter Data</h3>
<form method="GET" action="{{ route('admin.member.index') }}">
    
    <div class="filter-group" style="margin-bottom: 15px;">
        <label>Layanan:</label>
        <select name="layanan">
            <option value="">Semua</option>
            <option value="VIP" {{ request('layanan') == 'VIP' ? 'selected' : '' }}>VIP</option>
            <option value="Basic" {{ request('layanan') == 'Basic' ? 'selected' : '' }}>Basic</option>
            <option value="Premium" {{ request('layanan') == 'Premium' ? 'selected' : '' }}>Premium</option>
        </select>
    </div>

    <div class="filter-group" style="margin-bottom: 15px;">
        <label>Durasi:</label>
        <select name="durasi">
            <option value="">Semua</option>
            <option value="1" {{ request('durasi') == '1' ? 'selected' : '' }}>1 Bulan</option>
            <option value="3" {{ request('durasi') == '3' ? 'selected' : '' }}>3 Bulan</option>
            <option value="6" {{ request('durasi') == '6' ? 'selected' : '' }}>6 Bulan</option>
            <option value="12" {{ request('durasi') == '12' ? 'selected' : '' }}>12 Bulan</option>
        </select>
    </div>

    <button type="submit" style="width: 100%; padding: 8px;">Terapkan Filter</button>
    <a href="{{ route('admin.member.index') }}" style="display:block; text-align:center; margin-top:10px; font-size:12px;">Reset</a>
</form>
    </aside>

    <main class="main-content">
        <h2>Daftar Member</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No Telp</th>
                    <th>Layanan</th>
                    <th>Durasi (bulan)</th>
                    <th>Biaya</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $m)
            <tr>
                <td>{{ $m->nama }}</td>
                <td>{{ $m->no_hp }}</td> <td>{{ $m->layanan }}</td>
                <td>{{ str_replace(' Bulan', '', $m->durasi_kontrak) }}</td>
                <td>Rp {{ number_format($m->biaya_bulanan, 0, ',', '.') }}</td> <td>
                    <form action="{{ route('admin.member.updateStatus', $m->id) }}" method="POST">
                        @csrf 
                        @method('PUT')
                        <select name="status_aktif" onchange="this.form.submit()">
                            <option value="1" {{ $m->status_aktif == 1 ? 'selected' : '' }}>Aktif</option>
                            <option value="0" {{ $m->status_aktif == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>

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

@foreach($members as $m)
    <tr>
        <td>{{ $m->nama }}</td>
        <td>{{ $m->layanan }}</td>
        </tr>
@endforeach
</body>
</html>