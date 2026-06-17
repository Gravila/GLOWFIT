<head>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
</head>
<div class="login-container">
    <div class="login-branding">
        <div class="branding-overlay"></div>
        <div class="branding-content">
            <img src="{{ asset('image/GLOWFIT GYM.png') }}" alt="GlowFit Logo" class="login-logo">
            <h2>BUILD YOUR<br>DREAM BODY</h2>
            <p>Latihan lebih sehat dan terukur bersama instruktur profesional kami.</p>
        </div>
    </div>

    <div class="login-form-section">
        <div class="login-form-wrapper">
            
            <div class="form-header">
                <h3>Welcome back</h3>
                <p>Please enter your details.</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your e-mail" required autofocus>
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    @if (Route::has('password.reset'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot your password?</a>
                    @else
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot your password?</a>
                    @endif
                </div>

                <button type="submit" class="btn-login-submit">Log in</button>
                
                </form>

        </div>
    </div>
</div>