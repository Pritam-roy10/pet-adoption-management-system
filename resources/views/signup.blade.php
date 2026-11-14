<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - PetAdopt</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="bg-blur-1"></div>
    <div class="bg-blur-2"></div>

    <section class="auth-section">
        <div class="auth-card">
            
            <div class="auth-header">
                <a href="{{ url('/') }}" class="logo">
                    <div class="logo-icon"><i class="fa-solid fa-paw"></i></div>
                    Pet <span>Adopt</span>
                </a>
                <h2>Create Account</h2>
                <p>Fill in your details to get started</p>
            </div>

            <form class="auth-form" method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label><i class="fa-regular fa-user"></i> Username</label>
                    <input type="text" name="username" placeholder="johndoe" required>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-phone"></i> Phone</label>
                    <input type="tel" name="phone" placeholder="+880 1700-000000" required>
                </div>

                <div class="form-group">
                    <label><i class="fa-regular fa-envelope"></i> Email</label>
                    <input type="email" name="email" placeholder="name@example.com" required>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-location-dot"></i> Address</label>
                    <input type="text" name="address" placeholder="Dhaka, Bangladesh" required>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-lock"></i> Create Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-shield-halved"></i> Confirm Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Sign Up
                </button>
            </form>

            <p class="auth-redirect">
                Already have an account? <a href="{{ url('/login') }}">Login</a>
            </p>

        </div>
    </section>

</body>
</html>