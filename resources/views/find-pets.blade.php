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
                            <input type="radio" name="category" value="" {{ request('category') == '' ? 'checked' : '' }}> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="dog" {{ request('category') == 'dog' ? 'checked' : '' }}> Dogs
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="cat" {{ request('category') == 'cat' ? 'checked' : '' }}> Cats
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="bird" {{ request('category') == 'bird' ? 'checked' : '' }}> Birds
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="category" value="other" {{ request('category') == 'other' ? 'checked' : '' }}> Others
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Age</h4>
                        <label class="filter-option">
                            <input type="radio" name="age" value="" {{ request('age') == '' ? 'checked' : '' }}> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="age" value="young" {{ request('age') == 'young' ? 'checked' : '' }}> Young
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="age" value="adult" {{ request('age') == 'adult' ? 'checked' : '' }}> Adult
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Gender</h4>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="" {{ request('gender') == '' ? 'checked' : '' }}> All
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="male" {{ request('gender') == 'male' ? 'checked' : '' }}> Male
                        </label>
                        <label class="filter-option">
                            <input type="radio" name="gender" value="female" {{ request('gender') == 'female' ? 'checked' : '' }}> Female
                        </label>
                    </div>

                    <div class="filter-group">
                        <h4>Health Status</h4>
                        <label class="filter-option">
                            <input type="checkbox" name="vaccinated" value="1" {{ request('vaccinated') == '1' ? 'checked' : '' }}> Vaccinated
                        </label>
                    </div>

                    <button type="submit" class="btn btn-ghost btn-block">Apply Filter</button>
                </form>

                <div class="pet-grid">
                    @forelse($pets ?? [] as $pet)
                        <div class="pet-card">
                            <div class="pet-img-box">
                                <img src="{{ asset($pet->pet_image) }}" alt="{{ $pet->pet_name }}">
                                @if(isset($pet->vaccinated) && $pet->vaccinated)
                                    <span class="badge badge-vaccinated">Vaccinated</span>
                                @endif
                            </div>
                            <div class="pet-info">
                                <div class="pet-header">
                                    <h3>{{ $pet->pet_name }} <span>({{ ucfirst($pet->category) }})</span></h3>
                                </div>
                                <p class="pet-meta"><i class="fa-solid fa-location-dot"></i> {{ $pet->location }}</p>
                                <div class="pet-tags">
                                    <span>{{ $pet->age }}</span>
                                    <span>{{ ucfirst($pet->gender) }}</span>
                                </div>
                                <p class="pet-price" style="margin: 8px 0; font-weight: 600; color: #f97316;">Asking Price: ৳{{ $pet->asking_price }}</p>
                                <a href="{{ url('/adopt/' . $pet->id) }}" class="btn btn-primary btn-block">Adopt Now</a>
                            </div>
                        </div>
                    @empty
                        <div class="pet-card" style="grid-column: 1 / -1; text-align: center; padding: 40px;">
                            <p style="color: #fff; font-size: 18px;">No pets found matching your filter criteria.</p>
                        </div>
                    @endforelse
                </div>

            </div>

        </div>
    </section>

</body>
</html>