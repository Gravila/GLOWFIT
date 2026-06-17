<!DOCTYPE html>
<html lang="id">
<head>
    <title>Admin Dashboard - GlowFit Gym</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <nav class="admin-sidebar">
        <h2>Admin Menu</h2>
        <a href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
        <a href="{{ route('admin.members') }}">Data Member</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout Admin</button>
        </form>
    </nav>

    <main>
        @yield('content')
    </main>
</body>
</html>