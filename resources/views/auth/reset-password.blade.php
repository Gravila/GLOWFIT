<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap">
    <title>GlowFit Gym - Reset Password</title>
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
                <h3>Reset Password</h3>
                <p>Please enter your email and choose a new password.</p>
            </div>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Enter your registered e-mail" required autofocus autocomplete="off">
                    @error('email')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required autocomplete="new-password">
                    @error('password')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="••••••••" required autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="error-msg">{{ $message }}</span>
                    @enderror
                </div>

                <div style="margin-bottom: 35px;"></div>

                <button type="submit" class="btn-login-submit">Reset Password</button>

                <div class="form-footer">
                    <p>Remembered your password? <a href="{{ route('login') }}">Back to Log in</a></p>
                </div>
            </form>

        </div>
    </div>
</div>