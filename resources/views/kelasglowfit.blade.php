@extends('layouts.kelas') {{-- Pastikan layout ini adalah file yang benar --}}

@section('content')

<div class="search-box-wrapper" style="display: flex; align-items: center; gap: 10px;">
    <input type="text" placeholder="   Cari..." style="width: 150px; padding: 6px 15px; border-radius: 20px; border: none; outline: none; font-family: 'Poppins', sans-serif; font-size: 14px; background-color: #ffffff; color: #000000;">
    <button type="button" style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #810100; border: none; border-radius: 50%; cursor: pointer;">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#EDEBDD" viewBox="0 0 24 24">
            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
        </svg>
    </button>
</div>
<div style="margin-top: 80px; padding: 20px; font-family: 'Poppins', sans-serif;">
    <h1 style="text-align: center; color: #1B1717;">Jadwal Kelas GlowFit</h1>
    <div style="max-width: 500px; margin: 20px auto; text-align: center;">
        <form action="{{ route('cek.booking') }}" method="GET" style="display: flex; gap: 5px;">
            <input type="text" name="kode_member" placeholder="Masukkan Kode Member untuk cek jadwal..." 
                   style="flex: 1; padding: 12px; border: 2px solid #eee; border-radius: 10px;">
            
            <button type="submit" style="padding: 10px 20px; background: #810100; color: white; border: none; border-radius: 10px; cursor: pointer;">
                🔍 Cari
            </button>
        </form>
    </div>
    <div style="text-align: center; margin-bottom: 50px;">
        <p style="color: #666; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">
            Pilih kelas favoritmu dan mulai perjalanan kebugaranmu hari ini! 
            Kami menawarkan berbagai kelas intensitas tinggi hingga santai yang dipandu oleh instruktur profesional.
        </p>
    </div>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 20px;">
        @foreach($kelas as $k)
<div style="background: #fff; padding: 25px; border-radius: 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
            display: flex; align-items: center; justify-content: space-between; border: 1px solid #eee; margin-bottom: 20px;">
    
    <div style="flex: 2;">
        @php
            $sisa = $k->kapasitas - $k->total_booking;
            $isFull = $sisa <= 0;
        @endphp

        <span style="background: {{ $isFull ? '#ffebee' : '#e8f5e9' }}; 
                     color: {{ $isFull ? '#c62828' : '#2e7d32' }}; 
                     padding: 4px 12px; border-radius: 15px; font-size: 0.75rem; font-weight: 600; text-transform: uppercase;">
            {{ $isFull ? 'Penuh' : 'Tersisa ' . $sisa . ' Slot' }}
        </span>

        <h3 style="margin: 10px 0 5px 0; font-size: 1.4rem;">{{ $k->nama_kelas }}</h3>
        <p style="color: #666; margin-bottom: 15px; font-size: 0.95rem;">
            Total Terpesan: <strong>{{ $k->total_booking }}</strong> / Kapasitas: <strong>{{ $k->kapasitas }}</strong>
        </p>

        <button onclick="openBookingModal({{ $k->id }}, '{{ $k->nama_kelas }}')" 
            style="background: #810100; color: white; border: none; padding: 10px 20px; border-radius: 20px; cursor: pointer;">
        Booking Sekarang
    </button>
    </div>

    <div style="flex: 0 0 120px; text-align: right;">
        <img src="{{ asset('image/'.$k->image) }}" 
             style="width: 120px; height: 120px; object-fit: cover; border-radius: 15px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    </div>
</div>
        @endforeach
    </div>
</div>

<div id="bookingModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:1000; align-items:center; justify-content:center;">
    <div style="background:white; padding:30px; border-radius:20px; width:90%; max-width:400px; box-shadow:0 10px 25px rgba(0,0,0,0.2); text-align:center;">
        
        <h3 id="modalTitle" style="margin-bottom:20px; color:#1B1717;">Booking Kelas</h3>
        <p style="color:#666; font-size:0.9rem; margin-bottom:20px;">Masukkan kode member Anda untuk mengonfirmasi booking.</p>
        
        <form action="{{ route('booking.verify') }}" method="POST">
            @csrf
            <input type="hidden" name="kelas_id" id="input_kelas_id">
            
            <input type="text" name="kode_member" placeholder="Masukkan Kode Member" required 
                   style="width:100%; padding:12px; margin-bottom:20px; border:2px solid #eee; border-radius:10px;">
            
            <button type="submit" style="width:100%; padding:12px; background:#810100; color:white; border:none; border-radius:10px;">
                Verifikasi Kode
            </button>
        </form>
        
        <button onclick="document.getElementById('bookingModal').style.display='none'" 
                style="background:none; border:none; color:#999; cursor:pointer; font-size:0.9rem;">
            Batalkan
        </button>
    </div>
</div>

<script>
    function openBookingModal(id, nama) {
        document.getElementById('bookingModal').style.display = 'flex'; // Menggunakan flex agar center
        document.getElementById('modalTitle').innerText = 'Booking ' + nama;
        document.getElementById('input_kelas_id').value = id;
    }
</script>
@endsection