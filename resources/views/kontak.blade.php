@extends('layouts.mainkontak')

@section('content')

<div style="display: flex; align-items: center; justify-content: center; height: 80vh; font-family: 'Poppins', sans-serif; padding-top: 50px;">
    
    <div style="background: #ffffff; padding: 50px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.1); text-align: center; max-width: 500px; width: 90%; border: 1px solid #f0f0f0;">
        
        <div style="font-size: 50px; margin-bottom: 20px;">🎧</div>
        
        <h1 style="color: #333; font-size: 2rem; margin-bottom: 10px;">Butuh Bantuan?</h1>
        <p style="color: #777; font-size: 1rem; margin-bottom: 30px; line-height: 1.6;">
            Tim GlowFit siap membantu kebutuhan membership kamu. Jangan ragu untuk bertanya langsung kepada admin kami!
        </p>
        
        @php
            $pesan = "Halo Admin GlowFit, saya ingin bertanya tentang membership.";
            $urlWa = "https://wa.me/6285334515211?text=" . urlencode($pesan);
        @endphp
        
        <a href="{{ $urlWa }}" target="_blank" 
           style="display: inline-block; background: #810100; color: white; padding: 15px 35px; border-radius: 50px; text-decoration: none; font-weight: 600; transition: background 0.3s; box-shadow: 0 5px 15px rgba(129, 1, 0, 0.3);">
           Hubungi Admin via WhatsApp
        </a>
        
        <p style="margin-top: 25px; font-size: 0.85rem; color: #aaa;">Respon cepat di jam kerja (08:00 - 20:00)</p>
    </div>
    
</div>

@endsection