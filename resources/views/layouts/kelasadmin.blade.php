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
    <div style="max-width: 1100px; margin: 50px auto; padding: 20px; font-family: 'Poppins', sans-serif;">
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="margin: 0;">Daftar Jadwal Kelas</h2>
        </div>
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #ddd;">
            <form action="{{ route('admin.kelas.index') }}" method="GET" style="display: flex; gap: 15px; align-items: center;">
                <label style="font-weight: 600;">Filter Kelas:</label>
                <select name="kelas_filter" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc; flex-grow: 1;">
                    <option value="">Semua Kelas</option>
                    <option value="Yoga" {{ request('kelas_filter') == 'Yoga' ? 'selected' : '' }}>Yoga</option>
                    <option value="Zumba" {{ request('kelas_filter') == 'Zumba' ? 'selected' : '' }}>Zumba</option>
                    <option value="Personal trainer" {{ request('kelas_filter') == 'Personal trainer' ? 'selected' : '' }}>Personal trainer</option>
                </select>
                <button type="submit" style="padding: 8px 20px; background: #333; color: white; border: none; border-radius: 5px; cursor: pointer;">Filter</button>
                <a href="{{ route('admin.kelas.index') }}" style="padding: 8px 15px; color: #333; text-decoration: none;">Reset</a>
            </form>
            
        </div>
    
        <table style="width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            <thead>
                <tr style="background-color: #333; color: white;">
                    <th style="padding: 15px; border: 1px solid #ddd;">Nama Kelas</th>
                    <th style="padding: 15px; border: 1px solid #ddd;">Hari</th>
                    <th style="padding: 15px; border: 1px solid #ddd;">Jam Mulai</th>
                    <th style="padding: 15px; border: 1px solid #ddd;">Jam Selesai</th>
                    <th style="padding: 15px; border: 1px solid #ddd;">Aksi</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($jadwal as $item)
                <tr>
                    <td>{{ $item->kelasGym ? $item->kelasGym->nama_kelas : 'Data Tidak Ada' }}</td>
                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->hari }}</td>
                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->jam_mulai }}</td>
                    <td style="padding: 15px; border: 1px solid #ddd;">{{ $item->jam_selesai }}</td>
                    <td style="padding: 15px; border: 1px solid #ddd;">
                        <a href="{{ route('admin.kelas.edit', $item->id) }}" class="btn btn-sm btn-warning" style="color: orange; text-decoration: none; font-weight: bold;">Edit</a>
                        
                        <form action="{{ route('admin.kelas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" 
                                    style="color: red; border:none; background:none; cursor:pointer; text-decoration: underline; margin-left: 10px;" 
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus jadwal ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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