@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="overlay">
        <h1>BUILD YOUR DREAM BODY</h1>
        <p>Latihan lebih sehat bersama GlowFit Gym</p>
    </div>
</section>

<div class="main-layout">
    <section class="content">
        <h2>Rekomendasi Kelas</h2>
        <div class="cards">
            @php
                // Data dummy sesuai instruksi poin 6
                $dataKelas = [
                    ['nama' => 'Gym Area', 'kapasitas' => 50, 'img' => 'gymarea.png'],
                    ['nama' => 'Zumba Class', 'kapasitas' => 30, 'img' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b'],
                    ['nama' => 'Yoga Class', 'kapasitas' => 20, 'img' => 'https://images.unsplash.com/photo-1599058917212-d750089bc07e'],
                ];
            @endphp

            {{-- Poin 6: Gunakan @forelse --}}
            @forelse($dataKelas as $kelas)
                <div class="card">
                    <img src="{{ str_contains($kelas['img'], 'http') ? $kelas['img'] : asset('image/'.$kelas['img']) }}">
                    <h4>{{ $kelas['nama'] }}</h4>
                    <p>Kapasitas: {{ $kelas['kapasitas'] }}</p>
                </div>
            @empty
                <p>Tidak ada kelas tersedia saat ini.</p>
            @endforelse
        </div>

        <section class="table-section">
            <h2>Data Member (Live dari LocalStorage)</h2>
            <div class="table-box">
                <table>
                    <thead>
                        <tr>
                            <th>Kode</th><th>Nama</th><th>Layanan</th><th>Tanggal</th><th>Harga</th><th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody"></tbody>
                </table>
            </div>
        </section>
    </section>

    <aside class="sidebar">
        <h3>Statistik Quick View</h3>
        {{-- Poin 5: Menggunakan Komponen --}}
        <x-stat-card judul="Total Member" nilai="0" ikon="fa fa-users" warna="pink" />
        <x-stat-card judul="Status Layanan" nilai="0" ikon="fa fa-dumbbell" warna="green" />
        
        <div class="filter-section">
            <h3>Cari Member</h3>
            <input type="text" id="search" placeholder="Ketik nama...">
            <select id="filter" style="margin-top:10px">
                <option value="">Semua Layanan</option>
                <option>Basic</option>
                <option>Premium</option>
                <option>VIP</option>
            </select>
        </div>
    </aside>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/script.js') }}"></script>
@endpush