<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PetAdopt</title>
    
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
                <h2>Welcome Back</h2>
                <p>Please enter your details to sign in</p>
            </div>

            <form class="auth-form" method="POST" action="">
                @csrf

        
                <div class="form-group">
                    <label><i class="fa-regular fa-user"></i> Username</label>
                    <input type="text" name="username" placeholder="johndoe" required>
                </div>

              
                <div class="form-group">
                    <label><i class="fa-solid fa-lock"></i> Password</label>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    Login
                </button>
            </form>

            <p class="auth-redirect">
                Don't have an account? <a href="{{ url('/signup') }}">Sign up</a>
            </p>

        </div>
    </section>

</body>
</html>