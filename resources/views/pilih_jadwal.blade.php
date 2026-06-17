@extends('layouts.jadwal')
@include('partials.theme-script')
@section('content')
<div style="max-width: 800px; margin: 50px auto; padding: 20px;">
    <h1 style="text-align: center; margin-bottom: 30px; color: #1B1717;">Pilih Jadwal untuk {{ $kelas->nama_kelas }}</h1>
    
    <div style="display: grid; gap: 15px;">
        @foreach($jadwal as $j)
        <div style="background: #fff; padding: 20px; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); 
                    display: flex; justify-content: space-between; align-items: center; border: 1px solid #eee;">
            <div>
                <h4 style="margin: 0; font-size: 1.2rem;">{{ $j->hari }}</h4>
                <p style="margin: 5px 0 0; color: #666;">Waktu: {{ \Carbon\Carbon::parse($j->jam_mulai)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_selesai)->format('H:i') }}</p>
            </div>
            
            <button type="button" class="btn-pilih" data-id="{{ $j->id }}" 
                    style="background: #810100; color: white; border: none; padding: 12px 25px; border-radius: 10px; cursor: pointer; font-weight: 600;">
                Pilih
            </button>
        </div>
        @endforeach
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('.btn-pilih').click(function(e) {
        let jadwalId = $(this).data('id');
        let btn = $(this);

        $.ajax({
            url: "{{ route('booking.proses_final') }}",
            method: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                jadwal_id: jadwalId
            },
            success: function(response) {
    if(response.success) {
        Swal.fire({
            title: 'Berhasil!',
            text: response.message,
            icon: 'success',
            confirmButtonText: 'OK'
        }).then((result) => {
            // Setelah tombol OK diklik, pindah halaman
            if (result.isConfirmed) {
                window.location.href = "{{ url('/kelas-glowfit') }}"; // Sesuaikan URL ini dengan route halaman Kelas GLOWFIT kamu
            }
        });
    }
},
            error: function() {
                Swal.fire('Error!', 'Terjadi kesalahan saat memproses booking.', 'error');
            }
        });
    });
</script>
@endsection