<nav>
    <div class="logo">
        <img src="{{ asset('image/GLOWFIT GYM.png') }}" alt="Logo">
        <span>GlowFit Gym</span>
    </div>
    <div class="menu">
        <a href="{{ url('/') }}">Beranda</a>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ url('/member') }}">Paket Membership</a>
        <a href="{{ url('/tentang') }}">Tentang</a>
        <a href="{{ url('/kontak') }}">Kontak</a>
    </div>
    <div class="nav-search">
        <input type="text" id="navSearch" placeholder="Cari...">
        <button id="searchToggle"><i class="fa fa-search"></i></button>
    </div>
</nav>