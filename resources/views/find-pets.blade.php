<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Pets - PetAdopt</title>

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
    <section class="find-pets-section">
        <div class="container">

            <form action="{{ url('/find-pets') }}" method="GET" class="search-box-wrapper">
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                <input type="text" name="search" placeholder="Search by breed or name (e.g. Persian, Husky, Milo)..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>

            <div class="find-layout">

                <form action="{{ url('/find-pets') }}" method="GET" id="filter-form" class="filter-sidebar">
                    <h3 class="filter-title"><i class="fa-solid fa-filter"></i> Filters</h3>

                    <div class="filter-group">
                        <h4>Category</h4>
                        <label class="filter-option">
                            <input type="radio" name="category" value="" checked> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="dog"> Dogs
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="cat"> Cats
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="bird"> Birds
                        </label>
                    </div>
                    <div class="filter-group">
                        <h4>Age</h4>
                        <label class="filter-option">
                            <input type="radio" name="age" value="" checked> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="age" value="young"> Young
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="age" value="adult"> Adult
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Gender</h4>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="" checked> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="male"> Male
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="female"> Female
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Health Status</h4>
                        <label class="filter-option">
                            <input type="checkbox" name="vaccinated" value="1"> Vaccinated
                        </label>
                    </div>

                    <button type="submit" class="btn btn-ghost btn-block">Apply Filter</button>
                </form>

                <div class="pet-grid">

                    @forelse($pets ?? [] as $pet)
                        <div class="pet-card">
                            <div class="pet-img-box">
                                <img src="{{ asset('storage/' . $pet->image) }}" alt="{{ $pet->name }}">
                                @if($pet->vaccinated)
                                    <span class="badge badge-vaccinated">Vaccinated</span>
                                @endif
                            </div>
                            <div class="pet-info">
                                <div class="pet-header">
                                    <h3>{{ $pet->name }} <span>({{ $pet->breed ?? $pet->category }})</span></h3>
                                </div>
                                <p class="pet-meta"><i class="fa-solid fa-location-dot"></i> {{ $pet->location }}</p>
                                <div class="pet-tags">
                                    <span>{{ ucfirst($pet->age) }}</span>
                                    <span>{{ ucfirst($pet->gender) }}</span>
                                </div>
                                <a href="{{ url('/adopt/' . $pet->id) }}" class="btn btn-primary btn-block">Adopt Now</a>
                            </div>
                        </div>
                    @empty
                        <div class="pet-card">
                            <div class="pet-img-box">
                                <img src="https://images.unsplash.com/photo-1514888286974-6c03e2ca1dba?auto=format&fit=crop&w=900&q=80" alt="Cat">
                                <span class="badge badge-vaccinated">Vaccinated</span>
                            </div>
                            <div class="pet-info">
                                <div class="pet-header">
                                    <h3>Milo <span>(Persian Cat)</span></h3>
                                </div>
                                <p class="pet-meta"><i class="fa-solid fa-location-dot"></i> Mirpur, Dhaka</p>
                                <div class="pet-tags">
                                    <span>Young</span>
                                    <span>Male</span>
                                </div>
                                <a href="{{ url('/adopt/1') }}" class="btn btn-primary btn-block">Adopt Now</a>
                            </div>
                        </div>

                        <div class="pet-card">
                            <div class="pet-img-box">
                                <img src="https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=900&q=80" alt="Dog">
                            </div>
                            <div class="pet-info">
                                <div class="pet-header">
                                    <h3>Rocky <span>(Beagle)</span></h3>
                                </div>
                                <p class="pet-meta"><i class="fa-solid fa-location-dot"></i> Uttara, Dhaka</p>
                                <div class="pet-tags">
                                    <span>Adult</span>
                                    <span>Male</span>
                                </div>
                                <a href="{{ url('/adopt/2') }}" class="btn btn-primary btn-block">Adopt Now</a>
                            </div>
                        </div>
                    @endforelse

                </div>

            </div>

        </div>
    </section>

</body>
</html>