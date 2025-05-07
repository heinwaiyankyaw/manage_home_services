@extends('user.layouts.master')
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .register-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .register-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .register-header img {
            width: 80px;
            margin-bottom: 15px;
        }

        .register-header h2 {
            color: #2c3e50;
            font-weight: 600;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
        }

        .btn-register {
            background-color: #3498db;
            color: white;
            height: 45px;
            border-radius: 5px;
            font-weight: 500;
            width: 100%;
        }

        .btn-register:hover {
            background-color: #2980b9;
        }

        .register-footer {
            text-align: center;
            margin-top: 20px;
        }

        .register-footer a {
            color: #3498db;
            text-decoration: none;
        }

        .input-group-text {
            background-color: white;
        }

        .password-requirements {
            font-size: 0.85rem;
            color: #6c757d;
            margin-top: 5px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="register-container">
            <div class="register-header">
                <img src="{{ asset('backend/assets/img/logo.png') }}" alt="HomeEase Logo">
                <h2>Create Your Account</h2>
                <p>Join HomeEase to access our home maintenance services</p>
            </div>

            <form action="{{ route('user.register.post') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Your full name" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="your@email.com" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="phone" class="form-label">Phone Number</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="tel" class="form-control" id="phone" name="phone"
                                placeholder="+1 (123) 456-7890" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="address" class="form-label">Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Your street address" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Create password" required>
                            <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        <div class="password-requirements">
                            At least 8 characters, with 1 uppercase and 1 number
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation" placeholder="Confirm password" required>
                            <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                    <label class="form-check-label" for="terms">I agree to the <a href="#">Terms of Service</a> and
                        <a href="#">Privacy Policy</a></label>
                </div>

                <button type="submit" class="btn btn-register mb-3">Create Account</button>

                <div class="register-footer">
                    <p>Already have an account? <a href="{{ route('user.login') }}">Sign in</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            togglePasswordVisibility(passwordInput, icon);
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const icon = this.querySelector('i');
            togglePasswordVisibility(confirmPasswordInput, icon);
        });

        function togglePasswordVisibility(inputElement, iconElement) {
            if (inputElement.type === 'password') {
                inputElement.type = 'text';
                iconElement.classList.remove('fa-eye');
                iconElement.classList.add('fa-eye-slash');
            } else {
                inputElement.type = 'password';
                iconElement.classList.remove('fa-eye-slash');
                iconElement.classList.add('fa-eye');
            }
        }
    </script>
@endsection
