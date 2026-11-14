<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Adoption Request - Pet Finder</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="bg-blur-1"></div>
    <div class="bg-blur-2"></div>

    <!-- Adoption Form -->
    <section class="auth-section">
        <div class="auth-card">

            <div class="auth-header">
                <h2>Complete Your Adoption Request</h2>
                <p>Provide your delivery details and complete your payment.</p>
            </div>

            <form id="adoptionForm" action="{{ url('/submit-adoption') }}" method="POST" novalidate>
                @csrf
                <input type="hidden" name="pet_id" value="{{ $pet->id }}">
                <input type="hidden" name="payment_method" id="selectedPaymentMethod" value="bkash">

                <!-- Full Name -->
                <div class="form-group">
                    <label for="name">
                        <i class="fa-solid fa-user"></i> Full Name
                    </label>
                    <input type="text" id="name" name="name" class="modal-input" placeholder="Enter your full name" minlength="2" maxlength="60" autocomplete="name" required>
                    <small id="nameError" role="alert"></small>
                </div>

                <!-- Phone Number -->
                <div class="form-group">
                    <label for="phone">
                        <i class="fa-solid fa-phone"></i> Phone Number
                    </label>
                    <input type="text" id="phone" name="phone" class="modal-input" placeholder="01700000000" maxlength="20" autocomplete="tel" required>
                    <small id="phoneError" role="alert"></small>
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label for="email">
                        <i class="fa-solid fa-envelope"></i> Email Address
                    </label>
                    <input type="email" id="email" name="email" class="modal-input" placeholder="example@gmail.com" maxlength="254" autocomplete="email" required>
                    <small id="emailError" role="alert"></small>
                </div>

                <!-- Delivery Address -->
                <div class="form-group">
                    <label for="address">
                        <i class="fa-solid fa-location-dot"></i> Delivery Address
                    </label>
                    <input type="text" id="address" name="address" class="modal-input" placeholder="House no, Road no, Area, City" minlength="5" maxlength="250" autocomplete="street-address" required>
                    <small id="addressError" role="alert"></small>
                </div>

                <!-- Payment Method (Only bKash) -->
                <div class="form-group">
                    <label>
                        <i class="fa-solid fa-wallet"></i> Payment Method
                    </label>

                    <div class="payment-methods">
                        <label class="pay-card selected" id="cardBkash" style="width: 100%;">
                            <input type="radio" name="gateway" value="bkash" checked style="display: none;">
                            <img src="https://www.logo.wine/a/logo/BKash/BKash-Logo.wine.svg" alt="bKash">
                            <span>bKash Payment</span>
                        </label>
                    </div>
                </div>

                <!-- Additional Note -->
                <div class="form-group">
                    <label for="note">
                        <i class="fa-solid fa-comment-dots"></i> Additional Note / Pet Care Experience
                    </label>
                    <textarea id="note" name="note" class="modal-input" rows="3" maxlength="1000" placeholder="Tell us about your home environment..."></textarea>
                </div>

                <!-- Proceed Button -->
                <button type="button" onclick="openPaymentModal()" class="btn-proceed">
                    <i class="fa-solid fa-circle-check"></i> Confirm &amp; Proceed to Payment
                </button>

            </form>
        </div>
    </section>

    <!-- Payment Modal -->
    <div class="modal-overlay" id="paymentModal" style="display:none;">
        <div class="modal-box">

            <div class="gateway-header">
                <span id="gatewayTitle">bKash Payment Gateway</span>
                <i class="fa-solid fa-xmark close-btn" role="button" tabindex="0" onclick="closePaymentModal()"></i>
            </div>

            <!-- Payment Step 1 -->
            <div id="paymentStep1">
                <p class="amount-text">
                    Amount to Pay: <strong>৳ 2,500</strong>
                </p>
                <p>Demo payment only. Never enter your real payment PIN.</p>

                <div class="form-group">
                    <label for="payNumber">bKash Mobile Number</label>
                    <input type="text" id="payNumber" class="modal-input" placeholder="01700000000" maxlength="20" autocomplete="off">
                    <small id="payNumberError" role="alert"></small>
                </div>

                <div class="form-group">
                    <label for="payPin">Demo PIN</label>
                    <input type="password" id="payPin" class="modal-input" placeholder="Enter 5-digit demo PIN" maxlength="20" autocomplete="off">
                    <small id="payPinError" role="alert"></small>
                </div>

                <button type="button" id="payButton" class="btn-pay" onclick="processPayment()">
                    Verify &amp; Pay (Demo)
                </button>
            </div>

            <!-- Payment Step 2 -->
            <div id="paymentStep2" style="display:none;">
                <i class="fa-solid fa-circle-notch fa-spin"></i>
                <p>Processing bKash payment...</p>
            </div>

            <!-- Payment Step 3 -->
            <div id="paymentStep3" style="display:none;">
                <i class="fa-solid fa-circle-check"></i>
                <h3>Demo Payment Successful!</h3>
                <p>
                    Transaction ID: <span id="trxIdText"></span>
                </p>
                <button type="button" id="completeButton" class="btn-pay" onclick="submitFinalForm()">
                    Complete Adoption Request
                </button>
            </div>

        </div>
    </div>

    <script>
        let paymentProcessed = false;
        let paymentTimer = null;
        let paymentInProgress = false;
        let formSubmitting = false;

        const form = document.getElementById('adoptionForm');
        const nameInput = document.getElementById('name');
        const phoneInput = document.getElementById('phone');
        const emailInput = document.getElementById('email');
        const addressInput = document.getElementById('address');

        const payNumber = document.getElementById('payNumber');
        const payPin = document.getElementById('payPin');

        function showError(input, errorId, message) {
            document.getElementById(errorId).textContent = message;
        }

        function validateName() {
            const value = nameInput.value.trim();
            if (!value) return 'Username is required.';
            if (value.length < 2) return 'Username must contain at least 2 characters.';
            const pattern = /^[A-Za-z\u0980-\u09FF]+(?:[ .'-][A-Za-z\u0980-\u09FF]+)*$/;
            if (!pattern.test(value)) return 'Invalid username! Use Bengali or English letters only.';
            return '';
        }

        function validatePhone() {
            const value = phoneInput.value.trim();
            if (!value) return 'Phone number is required.';
            if (!/^01[3-9][0-9]{8}$/.test(value)) return 'Invalid phone number! Enter a valid 11-digit Bangladesh number.';
            return '';
        }

        function validateEmail() {
            const value = emailInput.value.trim();
            if (!value) return 'Email address is required.';
            if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(value)) return 'Invalid email address! Enter a valid email.';
            return '';
        }

        function validateAddress() {
            const value = addressInput.value.trim();
            if (!value) return 'Delivery address is required.';
            if (value.length < 5) return 'Address must contain at least 5 characters.';
            if (/[<>]/.test(value)) return 'Address contains invalid characters.';
            return '';
        }

        nameInput.addEventListener('input', function () {
            showError(this, 'nameError', validateName());
        });

        phoneInput.addEventListener('input', function () {
            showError(this, 'phoneError', validatePhone());
        });

        emailInput.addEventListener('input', function () {
            showError(this, 'emailError', validateEmail());
        });

        addressInput.addEventListener('input', function () {
            showError(this, 'addressError', validateAddress());
        });

        function validateAdoptionForm() {
            const fields = [
                [nameInput, 'nameError', validateName()],
                [phoneInput, 'phoneError', validatePhone()],
                [emailInput, 'emailError', validateEmail()],
                [addressInput, 'addressError', validateAddress()]
            ];

            let firstInvalid = null;

            fields.forEach(function ([input, errorId, message]) {
                showError(input, errorId, message);
                if (message && !firstInvalid) {
                    firstInvalid = input;
                }
            });

            if (firstInvalid) {
                firstInvalid.focus();
                return false;
            }

            return true;
        }

        function openPaymentModal() {
            if (formSubmitting) return;
            if (!validateAdoptionForm()) return;

            paymentProcessed = false;
            paymentInProgress = false;

            payNumber.value = '';
            payPin.value = '';

            showError(payNumber, 'payNumberError', '');
            showError(payPin, 'payPinError', '');

            document.getElementById('paymentStep1').style.display = 'block';
            document.getElementById('paymentStep2').style.display = 'none';
            document.getElementById('paymentStep3').style.display = 'none';

            document.getElementById('payButton').disabled = false;
            document.getElementById('paymentModal').style.display = 'flex';

            payNumber.focus();
        }

        function closePaymentModal() {
            if (paymentTimer !== null) {
                clearTimeout(paymentTimer);
                paymentTimer = null;
            }

            paymentProcessed = false;
            paymentInProgress = false;

            document.getElementById('paymentModal').style.display = 'none';
            document.getElementById('paymentStep1').style.display = 'block';
            document.getElementById('paymentStep2').style.display = 'none';
            document.getElementById('paymentStep3').style.display = 'none';

            document.getElementById('payButton').disabled = false;
            payPin.value = '';

            showError(payNumber, 'payNumberError', '');
            showError(payPin, 'payPinError', '');
        }

        function validatePayNumber() {
            const value = payNumber.value.trim();
            if (!value) return 'Payment mobile number is required.';
            if (!/^01[3-9][0-9]{8}$/.test(value)) return 'Invalid payment number! Enter a valid 11-digit number.';
            return '';
        }

        function validatePayPin() {
            const value = payPin.value;
            if (!value) return 'Demo PIN is required.';
            if (!/^[0-9]{5}$/.test(value)) return 'Invalid demo PIN! Enter exactly 5 digits.';
            return '';
        }

        payNumber.addEventListener('input', function () {
            showError(this, 'payNumberError', validatePayNumber());
        });

        payPin.addEventListener('input', function () {
            showError(this, 'payPinError', validatePayPin());
        });

        function processPayment() {
            if (paymentProcessed || paymentInProgress) return;

            const numberError = validatePayNumber();
            const pinError = validatePayPin();

            showError(payNumber, 'payNumberError', numberError);
            showError(payPin, 'payPinError', pinError);

            if (numberError) {
                payNumber.focus();
                return;
            }

            if (pinError) {
                payPin.focus();
                return;
            }

            paymentInProgress = true;
            document.getElementById('payButton').disabled = true;

            document.getElementById('paymentStep1').style.display = 'none';
            document.getElementById('paymentStep2').style.display = 'block';

            paymentTimer = setTimeout(function () {
                paymentTimer = null;

                document.getElementById('paymentStep2').style.display = 'none';
                document.getElementById('paymentStep3').style.display = 'block';

                document.getElementById('trxIdText').textContent = 'BKASH' + Math.floor(10000000 + Math.random() * 90000000);

                paymentProcessed = true;
                paymentInProgress = false;

                payPin.value = '';
                showError(payPin, 'payPinError', '');
            }, 2000);
        }

        function submitFinalForm() {
            if (formSubmitting) return;

            if (!paymentProcessed) {
                alert('Please complete the demo payment step first.');
                return;
            }

            if (!validateAdoptionForm()) {
                closePaymentModal();
                return;
            }

            formSubmitting = true;
            document.getElementById('completeButton').disabled = true;

            payNumber.value = '';
            payPin.value = '';

            HTMLFormElement.prototype.submit.call(form);
        }

        document.getElementById('paymentModal').addEventListener('click', function (event) {
            if (event.target === this) {
                closePaymentModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            const modal = document.getElementById('paymentModal');
            if (event.key === 'Escape' && modal.style.display === 'flex') {
                closePaymentModal();
            }
        });
    </script>

</body>
</html>