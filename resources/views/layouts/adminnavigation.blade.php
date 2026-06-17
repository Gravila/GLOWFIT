
<nav class="navbar">
    <div class="logo" style="display: flex; align-items: center; gap: 15px;">
        <a href="{{ route('admin.dashboard') }}" style="display: flex; align-items: center; text-decoration: none; gap: 15px;">
            <span style="color: #EDEBDD; font-size: 20px; font-weight: 600; font-family: 'Poppins', sans-serif;">GlowFit Gym</span>
            <img src="{{ asset('image/GLOWFIT GYM.png') }}" alt="Logo" style="height: 35px; width: auto; object-fit: contain;">
        </a>
    </div>
    
    <div class="menu" style="display: flex; align-items: center; gap: 25px; font-family: 'Poppins', sans-serif;">
        <a href="{{ route('admin.dashboard') }}" style="color: #EDEBDD; text-decoration: none;">Beranda</a>
        <a href="{{ route('admin.member.index') }}" style="color: #EDEBDD; text-decoration: none;">Member</a>
        <a href="{{ route('admin.kelas.index') }}" style="color: #EDEBDD; text-decoration: none;">Kelas GLOWFIT</a>
    </div>

    <div class="navbar-auth">
        @auth
            {{-- HAPUS baris <a href="{{ route('logout') }}">Logout</a> yang tadi --}}
            
            {{-- GUNAKAN HANYA FORM INI --}}
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" style="background:none; border:none; color:#EDEBDD; cursor:pointer; font-family: 'Poppins', sans-serif; font-size: 16px;">
                    Logout
                </button>
            </form>
        @else
            <a href="{{ route('login') }}" style="color: #EDEBDD; text-decoration: none; font-family: 'Poppins', sans-serif; font-size: 16px;">
                Login
            </a>
        @endauth
    </div>
</nav>