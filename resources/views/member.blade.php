@extends('layouts.app')

@section('content')

<div class="main-layout" style="margin-top:100px;">

<!-- ================= CONTENT ================= -->
<section class="content">

<!-- PACKAGE -->
<section class="package-section">
<h2>Pilih Paket Membership</h2>

<div class="package-cards">

<div class="package-card">
<h3>Basic</h3>
<p class="price">Rp100.000</p>
<ul>
<li>Akses Gym</li>
<li>Jam Terbatas</li>
<li>Tidak termasuk kelas</li>
<li>Berlaku 1 Bulan</li>
</ul>
<button onclick="pilihPaket('Basic')">Pilih</button>
</div>

<div class="package-card best">
<span class="badge">BEST</span>
<h3>Premium</h3>
<p class="price">Rp200.000</p>
<ul>
<li>Gym + Kelas</li>
<li>Zumba & Yoga</li>
<li>Konsultasi Trainer</li>
<li>Berlaku 1 Bulan</li>
</ul>
<button onclick="pilihPaket('Premium')">Pilih</button>
</div>

<div class="package-card">
<h3>VIP</h3>
<p class="price">Rp350.000</p>
<ul>
<li>Semua Akses</li>
<li>Personal Trainer</li>
<li>Prioritas Booking</li>
<li>Berlaku 1 Bulan</li>
</ul>
<button onclick="pilihPaket('VIP')">Pilih</button>
</div>

</div>
</section>

<!-- FORM -->
<h2>Form Member</h2>

<form id="memberForm" class="form-modern">

<input type="text" id="nama" placeholder="Nama Member">
<input type="email" id="emailmember" placeholder="Email">
<input type="text" id="noHP" placeholder="Nomor HP">
<input type="number" id="usiamember" placeholder="Usia">
<input type="text" id="tgllahir" placeholder="Tanggal Lahir(dd/mm/yyyy)">

<select id="layanan">
<option value="">Pilih Layanan</option>
<option>Basic</option>
<option>Premium</option>
<option>VIP</option>
</select>

<select id="durasi">
<option value="">Pilih Durasi</option>
<option value="1">1 Bulan</option>
<option value="3">3 Bulan</option>
<option value="6">6 Bulan</option>
<option value="12">1 Tahun</option>
</select>

<input type="date" id="tanggal">
<input type="number" id="harga" placeholder="Harga" readonly>

<button type="submit">Simpan Member</button>

</form>

<hr>

<!-- SEARCH -->
<input type="text" id="search" placeholder="Cari nama/kode...">

<!-- TABLE -->
<h3>Data Member</h3>

<table>
<thead>
<tr>
<th>Kode</th>
<th>Nama</th>
<th>Email</th>
<th>Nomor HP</th>
<th>Usia</th>
<th>Layanan</th>
<th>Tanggal</th>
<th>Harga</th>
<th>Durasi</th>
<th>Aksi</th>
</tr>
</thead>

<tbody id="tableBody"></tbody>
</table>

</section>

<!-- ================= SIDEBAR ================= -->
<aside class="sidebar">

<div class="stat-section">
<h3>Statistik</h3>

<x-stat-card judul="Total Member" nilai="0" warna="pink"/>
<x-stat-card judul="Per Layanan" nilai="0" warna="green"/>

</div>

<hr>

<div class="filter-section">
<h3>Filter Layanan</h3>

<select id="filter">
<option value="">Semua</option>
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