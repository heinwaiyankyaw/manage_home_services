@extends('user.layouts.master')
@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            max-width: 500px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-header img {
            width: 80px;
            margin-bottom: 15px;
        }

        .login-header h2 {
            color: #2c3e50;
            font-weight: 600;
        }

        .form-control {
            height: 45px;
            border-radius: 5px;
        }

        .btn-login {
            background-color: #3498db;
            color: white;
            height: 45px;
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-login:hover {
            background-color: #2980b9;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
        }

        .login-footer a {
            color: #3498db;
            text-decoration: none;
        }

        .input-group-text {
            background-color: white;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="login-container">
            <div class="login-header">
                <img src="{{ asset('backend/assets/img/logo.png') }}" alt="HomeEase Logo">
                <h2>Welcome Back</h2>
                <p>Sign in to manage your home maintenance services</p>
            </div>

            <form action="{{ route('user.login.post') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Enter your email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Enter your password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label class="form-check-label" for="remember">Remember me</label>

                </div>

                <button type="submit" class="btn btn-login w-100 mb-3">Login</button>

                <div class="login-footer">
                    <p>Don't have an account? <a href="{{ route('user.register') }}">Sign up</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Toggle password visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>
@endsection
