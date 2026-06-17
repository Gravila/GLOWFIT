<nav class="navbar">
    <div class="logo" style="display: flex; align-items: center; gap: 15px;">
        <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; text-decoration: none; gap: 15px;">
            <span style="color: #EDEBDD; font-size: 20px; font-weight: 600; font-family: 'Poppins', sans-serif;">GlowFit Gym</span>
            <img src="{{ asset('image/GLOWFIT GYM.png') }}" alt="Logo" style="height: 35px; width: auto; object-fit: contain;">
        </a>
    </div>
    
    <div class="menu" style="display: flex; align-items: center; gap: 25px; font-family: 'Poppins', sans-serif;">
        <a href="{{ route('dashboard') }}" style="color: #EDEBDD; text-decoration: none;">Beranda</a>
        <a href="{{ route('member.index') }}" style="color: #EDEBDD; text-decoration: none;">Paket Membership</a>
        <a href="#" style="color: #EDEBDD; text-decoration: none;">Kelas GLOWFIT</a>
        <a href="#" style="color: #EDEBDD; text-decoration: none;">Kontak</a>
        
        <div class="search-box-wrapper" style="display: flex; align-items: center; gap: 10px;">
            <input type="text" placeholder="   Cari..." style="width: 150px; padding: 6px 15px; border-radius: 20px; border: none; outline: none; font-family: 'Poppins', sans-serif; font-size: 14px; background-color: #ffffff; color: #000000;">
            <button type="button" style="display: flex; align-items: center; justify-content: center; width: 35px; height: 35px; background: #810100; border: none; border-radius: 50%; cursor: pointer;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#EDEBDD" viewBox="0 0 24 24">
                    <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                </svg>
            </button>
        </div>
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