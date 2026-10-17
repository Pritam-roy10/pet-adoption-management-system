<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PetAdopt - Find Your Perfect Companion</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="bg-blur-1"></div>
    <div class="bg-blur-2"></div>

    <header class="navbar">
        <div class="container nav-container">

            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon"><i class="fa-solid fa-paw"></i></div>
                Pet<span>Finder</span>
            </a>

           <div class="nav-menu">
    <a href="{{ url('/') }}" class="nav-link">Home</a>
    <a href="{{ url('/find-pets') }}" class="nav-link">Find Pets</a>
    <a href="{{ url('/add-pet') }}" class="nav-link">Add Your Pet</a>
    <a href="{{ url('/about') }}" class="nav-link">About Us</a>
    <a href="{{ url('/contact') }}" class="nav-link">Contact</a>
</div>

            <div class="nav-actions">
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline">Dashboard</a>
                @else
                    <a href="{{ url('/login') }}" class="btn btn-ghost">Login</a>
                    <a href="{{ url('/signup') }}" class="btn btn-primary">Sign Up</a>
                @endauth
            </div>

        </div>
    </header>

    <section class="hero-section">
        <div class="container hero-container">
            <div class="hero-content">
                <div class="badge">
                    <i class="fa-solid fa-sparkles"></i> #1 Trusted Pet Adoption Platform
                </div>
                <h1>Find Your New <span>Best Friend</span> & Bring Joy Home</h1>
                <p>Connect with verified pet owners and shelters. Discover thousands of adorable pets waiting for a loving home today.</p>

                <div class="hero-buttons">
                    <a href="{{ url('/find-pets') }}" class="btn btn-primary btn-lg">
                        <i class="fa-solid fa-magnifying-glass"></i> Explore Pets
                    </a>
                    <a href="{{ url('/add-pet') }}" class="btn btn-glass btn-lg">
                        <i class="fa-solid fa-circle-plus"></i> Rehome a Pet
                    </a>
                </div>

                <div class="hero-stats">
                    <div class="stat-item">
                        <h4>500+</h4>
                        <p>Pets Adopted</p>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <h4>100%</h4>
                        <p>Verified Listings</p>
                    </div>
                    <div class="stat-divider"></div>
                    <div class="stat-item">
                        <h4>10%</h4>
                        <p>Adoption Fee for Owners</p>
                    </div>
                </div>
            </div>

            <div class="hero-image-wrapper">
                <div class="image-glow"></div>
                <img src="https://images.unsplash.com/photo-1533738363-b7f9aef128ce?auto=format&fit=crop&w=900&q=80" alt="Cute Cat" class="hero-img">
            </div>
        </div>
    </section>

    <section class="categories-section">
        <div class="container">
            <div class="section-header">
                <h2>Browse by Category</h2>
                <p>Explore pets available for adoption near you</p>
            </div>

            <div class="category-grid">
                <a href="{{ url('/find-pets?category=dogs') }}" class="category-card">
                    <div class="icon-box"><i class="fa-solid fa-dog"></i></div>
                    <h3>Dogs</h3>
                    <span>120+ Available</span>
                </a>

                <a href="{{ url('/find-pets?category=cats') }}" class="category-card">
                    <div class="icon-box"><i class="fa-solid fa-cat"></i></div>
                    <h3>Cats</h3>
                    <span>85+ Available</span>
                </a>

                <a href="{{ url('/find-pets?category=birds') }}" class="category-card">
                    <div class="icon-box"><i class="fa-solid fa-dove"></i></div>
                    <h3>Birds</h3>
                    <span>40+ Available</span>
                </a>

                <a href="{{ url('/find-pets?category=others') }}" class="category-card">
                    <div class="icon-box"><i class="fa-solid fa-shield-cat"></i></div>
                    <h3>Others</h3>
                    <span>15+ Available</span>
                </a>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="container footer-content">
            <p>&copy; {{ date('Y') }} <strong>Pet Finder</strong>. Built with Passion for Pets.</p>
        </div>
    </footer>

</body>
</html>