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
    @include('layouts.adminnavigation')

    @section('content')
    <div class="page-container" style="padding: 50px;">
        <h2>Jadwal Khusus: {{ $nama_kelas }}</h2>
        <a href="{{ route('admin.kelas.index') }}">Kembali ke menu utama</a>
    
        <table class="jadwal-table" style="width: 100%; margin-top: 20px;">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Instruktur</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jadwal as $j)
                <tr>
                    <td>{{ $j->hari }}</td>
                    <td>{{ $j->jam }}</td>
                    <td>{{ $j->instruktur }}</td>
                    <td>
                        <form action="{{ route('admin.kelas.destroy', $j->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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