@props(['judul', 'nilai', 'ikon', 'warna', 'idValue' => ''])

<div class="stat-box {{ $warna }}" style="margin-bottom: 10px; padding: 15px; border-radius: 10px; color: white; text-align: center; font-weight: bold;">
    <i class="{{ $ikon }}"></i>
    {{ $judul }}: <span id="{{ $idValue }}">{{ $nilai }}</span>
</div>