<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowFit Gym</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    {{-- Poin 2: Sisipkan Navbar dengan @include --}}
    @include('partials.navbar')

    {{-- Poin 4: Tampilkan flash session message --}}
    @if(session('success'))
        <div style="background: #4CAF50; color: white; text-align: center; padding: 10px; margin-top: 80px;">
            {{ session('success') }}
        </div>
    @endif

    {{-- Poin 1: Main Content Area --}}
    <main>
        @yield('content')
    </main>

    <footer>
        <div class="footer-col">
            <h3>GlowFit Gym</h3>
            <p>Fitness Membership System</p>
        </div>
        <div class="footer-col">
            <h3>Contact</h3>
            <p>📧 glowfit@gmail.com</p>
        </div>
    </footer>

    {{-- Poin 8: Gunakan @stack untuk JavaScript spesifik --}}
    @stack('scripts')
</body>
</html>