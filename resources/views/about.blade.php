<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - PetAdopt</title>
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="bg-blur-1"></div>
    <div class="bg-blur-2"></div>

    <nav class="navbar">
        <div class="container nav-container">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-paw"></i></div>
                Pet <span>Adopt</span>
            </a>
           <div class="nav-menu">
    <a href="{{ url('/') }}" class="nav-link">Home</a>
    <a href="{{ url('/find-pets') }}" class="nav-link">Find Pets</a>
    <a href="{{ url('/add-pet') }}" class="nav-link">Add Your Pet</a>
    <a href="{{ url('/about') }}" class="nav-link">About Us</a>
    <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
</div>
            <div class="nav-actions">
                <a href="{{ url('/login') }}" class="btn btn-ghost">Login</a>
                <a href="{{ url('/signup') }}" class="btn btn-primary">Sign Up</a>
            </div>
        </div>
    </nav>

    <section class="auth-section">
        <div class="auth-card" style="max-width: 900px;">
            
            <div class="auth-header">
                <h2>About PetAdopt</h2>
                <p>Learn more about our platform and the development team behind it</p>
            </div>

            <!-- Project Overview -->
            <div class="form-group" style="text-align: left; margin-bottom: 28px;">
                <label><i class="fa-solid fa-circle-info"></i> Our Mission</label>
                <p style="font-size: 0.92rem; color: rgba(255,255,255,0.8); line-height: 1.6; margin-top: 8px;">
                    PetAdopt is a trusted and verified platform that acts as a secure bridge between sellers and animal lovers. We are committed to verifying the health and condition of every pet and placing them with the right adopter.
                </p>
            </div>

            <!-- Developer Team Section -->
            <div class="form-group" style="text-align: left;">
                <label><i class="fa-solid fa-code"></i> Developer Team</label>
                
                <div class="dev-team-grid">
                    
                    <!-- Developer 1: Pritam Roy -->
                    <div class="dev-card">
                        <div class="dev-img-box">
                            <img src="{{ asset('images/pritam.jpg') }}" alt="Pritam Roy" onerror="this.src='https://ui-avatars.com/api/?name=Pritam+Roy&background=0D8ABC&color=fff&size=200'">
                        </div>
                        <h4>Pritam Roy</h4>
                        <span class="dev-role">Lead Developer</span>
                        <p class="dev-desc">Worked on full-stack architecture, Laravel routing, database modeling, and overall system integration.</p>
                    </div>

                    <!-- Developer 2: Myshha Maliha Medha -->
                    <div class="dev-card">
                        <div class="dev-img-box">
                            <img src="{{ asset('images/myshha.jpg') }}" alt="Myshaa Maliha Madha" onerror="this.src='https://ui-avatars.com/api/?name=Myshha+Medha&background=0D8ABC&color=fff&size=200'">
                        </div>
                        <h4>Myshaa Maliha Madha</h4>
                        <span class="dev-role">UI/UX & Frontend Developer</span>
                        <p class="dev-desc">Designed user interface layouts, Blade templates, styling, and dark glassmorphism theme components.</p>
                    </div>

                    <!-- Developer 3: Dabasish Roy -->
                    <div class="dev-card">
                        <div class="dev-img-box">
                            <img src="{{ asset('images/dabasish.jpg') }}" alt="Dabasish Roy" onerror="this.src='https://ui-avatars.com/api/?name=Dabasish+Roy&background=0D8ABC&color=fff&size=200'">
                        </div>
                        <h4>Dabasish Roy</h4>
                        <span class="dev-role">Backend & Database Engineer</span>
                        <p class="dev-desc">Focused on database relations, authentication logic, adoption requests, and backend controllers.</p>
                    </div>

                </div>
            </div>

        </div>
    </section>

</body>
</html>