@extends('layouts.kelas')
@include('partials.theme-script')
@section('content')
<div style="margin-top: 100px; padding: 20px; font-family: 'Poppins', sans-serif; max-width: 800px; margin: 100px auto;">
    
    <div style="text-align: center; margin-bottom: 40px;">
        <h2 style="color: #1B1717;">Jadwal Booking Anda</h2>
        <p style="color: #666;">Halo, <strong>{{ $member->nama ?? 'Member' }}</strong>. Berikut adalah kelas yang telah Anda pesan:</p>
    </div>

    @if($riwayat && $riwayat->isNotEmpty())
        <div style="display: grid; gap: 15px;">
            @foreach($riwayat as $r)
                <div style="background: #fff; padding: 20px; border-radius: 15px; border-left: 5px solid #810100; 
                            box-shadow: 0 4px 10px rgba(0,0,0,0.05); display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <h3 style="margin: 0; color: #1B1717;">{{ $r->nama_kelas }}</h3>
                        <p style="margin: 5px 0 0 0; color: #666; font-size: 0.9rem;">
                            📅 {{ $r->jadwal_detail }}
                        </p>
                    </div>
                    <span style="background: #e8f5e9; color: #2e7d32; padding: 5px 12px; border-radius: 20px; font-size: 0.8rem; font-weight: bold;">
                        TERKONFIRMASI
                    </span>
                </div>
            @endforeach
        </div>
    @else
        <div style="text-align: center; padding: 40px; background: #f9f9f9; border-radius: 15px;">
            <p style="color: #999;">Belum ada jadwal yang ditemukan untuk kode ini.</p>
        </div>
    @endif

    <div style="text-align: center; margin-top: 30px;">
        <a href="{{ url('/kelas-glowfit') }}" style="color: #810100; text-decoration: none; font-weight: 600;">← Kembali ke Daftar Kelas</a>
    </div>
</div>
@endsection