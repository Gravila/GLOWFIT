
@extends('layouts.admin')

@include('partials.theme-script')
@section('content')
<div style="padding: 20px;">
    <h1>Selamat Datang Admin</h1>
    <p>Total Member: {{ $data['totalMember'] }}</p>
    <p>Kelas Aktif: {{ $data['kelasAktif'] }}</p>
</div>
@endsection
