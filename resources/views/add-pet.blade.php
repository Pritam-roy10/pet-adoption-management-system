<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your Pet - PetAdopt</title>

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
        <div class="auth-card" style="max-width: 550px;">

            <div class="auth-header">
                <h2>List a Pet for Adoption</h2>
                <p>Fill in the basic details to find a new home</p>
            </div>

            <form id="petForm" class="auth-form"
                  method="POST"
                  action="{{ url('/add-pet') }}"
                  enctype="multipart/form-data"
                  novalidate>

                @csrf

                <div class="form-group">
                    <label><i class="fa-solid fa-tag"></i> Pet Name</label>
                    <input type="text" name="pet_name" id="pet_name"
                           placeholder="e.g. Milo" required>
                    <small class="validation-error" id="petNameError"></small>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">

                    <div class="form-group">
                        <label><i class="fa-solid fa-list"></i> Category</label>
                        <select name="category" id="category"
                                class="custom-select" required>
                            <option value="">Select</option>
                            <option value="dog">Dog</option>
                            <option value="cat">Cat</option>
                            <option value="bird">Bird</option>
                            <option value="other">Other</option>
                        </select>
                        <small class="validation-error" id="categoryError"></small>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-venus-mars"></i> Gender</label>
                        <select name="gender" id="gender"
                                class="custom-select" required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <small class="validation-error" id="genderError"></small>
                    </div>

                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">

                    <div class="form-group">
                        <label><i class="fa-solid fa-calendar"></i> Age</label>
                        <input type="text" name="age" id="age"
                               placeholder="e.g. 6 Months" required>
                        <small class="validation-error" id="ageError"></small>
                    </div>

                    <div class="form-group">
                        <label><i class="fa-solid fa-phone"></i> Contact No</label>
                        <input type="tel" name="phone" id="phone"
                               placeholder="01700000000" required>
                        <small class="validation-error" id="phoneError"></small>
                    </div>

                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-coins"></i> Expected Price (৳)</label>

                    <select name="asking_price" id="asking_price"
                            class="custom-select" required>
                        <option value="">Select Expected Price</option>
                        <option value="2000">2,000</option>
                        <option value="2500">2,500</option>
                        <option value="3000">3,000</option>
                        <option value="3500">3,500</option>
                        <option value="4000">4,000</option>
                        <option value="4500">4,500</option>
                        <option value="5000">5,000</option>
                        <option value="5500">5,500</option>
                        <option value="6000">6,000</option>
                        <option value="6500">6,500</option>
                        <option value="7000">7,000</option>
                    </select>

                    <small class="validation-error" id="priceError"></small>

                    <span class="price-notice">
                        <i class="fa-solid fa-circle-info"></i>
                        Select your expected price. Based on platform verification
                        and services, the admin will confirm your final payout.
                    </span>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-location-dot"></i> Location</label>
                    <input type="text" name="location" id="location"
                           placeholder="e.g. Mirpur, Dhaka" required>
                    <small class="validation-error" id="locationError"></small>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-image"></i> Upload Pet Image</label>
                    <input type="file" name="pet_image" id="pet_image"
                           accept="image/*" class="file-input" required>
                    <small class="validation-error" id="imageError"></small>
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-pen"></i> Short Description</label>
                    <textarea name="description" id="description"
                              rows="3" class="custom-textarea"
                              placeholder="Friendly, vaccinated, loves to play..."></textarea>
                    <small class="validation-error" id="descriptionError"></small>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fa-solid fa-plus"></i> Post Pet for Adoption
                </button>

            </form>
        </div>
    </section>

    <script>
        const form = document.getElementById('petForm');

        function showError(input, errorId, message) {
            const error = document.getElementById(errorId);

            error.textContent = message;

            if (message) {
                input.classList.add('input-invalid');
            } else {
                input.classList.remove('input-invalid');
            }

            return message === '';
        }

        function validatePetName() {
            const input = document.getElementById('pet_name');
            const value = input.value.trim();

            if (value === '') {
                return showError(input, 'petNameError', 'Pet name is required.');
            }

            if (!/^[A-Za-z\u0980-\u09FF]+(?:[ .'-][A-Za-z\u0980-\u09FF]+)*$/.test(value)) {
                return showError(input, 'petNameError', 'Invalid pet name. Use letters only.');
            }

            if (value.length > 50) {
                return showError(input, 'petNameError', 'Pet name must be within 50 characters.');
            }

            return showError(input, 'petNameError', '');
        }

        function validateCategory() {
            const input = document.getElementById('category');
            const valid = ['dog', 'cat', 'bird', 'other'].includes(input.value);

            return showError(
                input,
                'categoryError',
                valid ? '' : 'Please select a valid category.'
            );
        }

        function validateGender() {
            const input = document.getElementById('gender');
            const valid = ['male', 'female'].includes(input.value);

            return showError(
                input,
                'genderError',
                valid ? '' : 'Please select a gender.'
            );
        }

        function validateAge() {
            const input = document.getElementById('age');
            const value = input.value.trim();

            if (!value) {
                return showError(input, 'ageError', 'Pet age is required.');
            }

            if (!/^\d+\s*(day|days|week|weeks|month|months|year|years)$/i.test(value)) {
                return showError(
                    input,
                    'ageError',
                    'Invalid age. Example: 6 Months or 2 Years.'
                );
            }

            const number = parseInt(value, 10);

            if (number <= 0 || number > 100) {
                return showError(input, 'ageError', 'Please enter a valid age.');
            }

            return showError(input, 'ageError', '');
        }

        function validatePhone() {
            const input = document.getElementById('phone');
            const value = input.value.trim();

            if (!value) {
                return showError(input, 'phoneError', 'Contact number is required.');
            }

            if (!/^01[3-9]\d{8}$/.test(value)) {
                return showError(
                    input,
                    'phoneError',
                    'Invalid phone number. Enter an 11-digit BD mobile number.'
                );
            }

            return showError(input, 'phoneError', '');
        }

        function validatePrice() {
            const input = document.getElementById('asking_price');
            const validPrices = ['2000', '2500', '3000', '3500', '4000',
                                 '4500', '5000', '5500', '6000', '6500', '7000'];

            return showError(
                input,
                'priceError',
                validPrices.includes(input.value) ? '' : 'Please select an expected price.'
            );
        }

        function validateLocation() {
            const input = document.getElementById('location');
            const value = input.value.trim();

            if (!value) {
                return showError(input, 'locationError', 'Location is required.');
            }

            if (value.length < 3 || /[<>]/.test(value)) {
                return showError(input, 'locationError', 'Please enter a valid location.');
            }

            return showError(input, 'locationError', '');
        }

        function validateImage() {
            const input = document.getElementById('pet_image');
            const file = input.files[0];

            if (!file) {
                return showError(input, 'imageError', 'Please upload a pet image.');
            }

            if (!file.type.startsWith('image/')) {
                return showError(input, 'imageError', 'Only image files are allowed.');
            }

            const maxSize = 5 * 1024 * 1024;

            if (file.size > maxSize) {
                return showError(input, 'imageError', 'Image size must be 5 MB or less.');
            }

            return showError(input, 'imageError', '');
        }

        function validateDescription() {
            const input = document.getElementById('description');
            const value = input.value.trim();

            if (value.length > 500) {
                return showError(
                    input,
                    'descriptionError',
                    'Description must be within 500 characters.'
                );
            }

            return showError(input, 'descriptionError', '');
        }

        document.getElementById('pet_name').addEventListener('input', validatePetName);
        document.getElementById('category').addEventListener('change', validateCategory);
        document.getElementById('gender').addEventListener('change', validateGender);
        document.getElementById('age').addEventListener('input', validateAge);
        document.getElementById('phone').addEventListener('input', validatePhone);
        document.getElementById('asking_price').addEventListener('change', validatePrice);
        document.getElementById('location').addEventListener('input', validateLocation);
        document.getElementById('pet_image').addEventListener('change', validateImage);
        document.getElementById('description').addEventListener('input', validateDescription);

        form.addEventListener('submit', function(event) {
            const results = [
                validatePetName(),
                validateCategory(),
                validateGender(),
                validateAge(),
                validatePhone(),
                validatePrice(),
                validateLocation(),
                validateImage(),
                validateDescription()
            ];

            if (results.includes(false)) {
                event.preventDefault();

                const firstInvalid = form.querySelector('.input-invalid');

                if (firstInvalid) {
                    firstInvalid.focus();
                }
            }
        });
    </script>

</body>
</html>