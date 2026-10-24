<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - PetAdopt</title>
    
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
        <div class="auth-card" style="max-width: 850px;">
            
            <div class="auth-header">
                <h2>Get in Touch</h2>
                <p>Have questions about pet adoption or need help? Reach out to us through any of the channels below.</p>
            </div>

            <div class="contact-grid">
              
                <div class="contact-card">
                    <div class="contact-icon-box">
                        <i class="fa-solid fa-phone"></i>
                    </div>
                    <h4>Phone Number</h4>
                    <p><a href="tel:+8801234567890">+880 17980-43441</a></p>
                </div>

               
                <div class="contact-card">
                    <div class="contact-icon-box whatsapp-icon">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <h4>WhatsApp</h4>
                    <p><a href="https://wa.me/8801234567890" target="_blank">+880 17980-43441</a></p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon-box">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h4>Email Address</h4>
                    <p><a href="mailto:support@petadopt.com">roypartho045@gmail.com</a></p>
                </div>

                <div class="contact-card">
                    <div class="contact-icon-box">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <h4>Head Office</h4>
                    <p>BAUST Campus, Saidpur Cantonment, Saidpur, Bangladesh</p>
                </div>

            </div>

        </div>
    </section>

</body>
</html>