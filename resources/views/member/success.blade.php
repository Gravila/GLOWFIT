@extends('layouts.guest')

@section('content')
<div style="text-align: center; padding: 100px;">
    <div style="background: white; padding: 40px; border-radius: 20px; display: inline-block; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
        <h2 style="color: #810100;">Pendaftaran Berhasil!</h2>
        <p>Berikut kode member Anda:</p>
        
        <h1 style="font-size: 3rem; margin: 20px 0;">{{ session('kode') }}</h1>
        
        <p style="max-width: 400px; margin: 0 auto 20px;">
            Jangan lupa lakukan pembayaran lewat kontak yang tersedia dengan mengirimkan kode member tersebut.
        </p>
        
        <a href="{{ route('dashboard') }}" style="background: #810100; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">Kembali ke Beranda</a>
    </div>
</div>
@endsection