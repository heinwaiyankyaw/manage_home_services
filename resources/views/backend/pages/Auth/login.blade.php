@php
    use Carbon\Carbon;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Login | HomeEase </title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/assets/css/forms/switches.css') }}">
    <style>
        .right-image {
            background: url("{{ asset('backend/assets/img/logo.png') }}") no-repeat center center;
            background-size: contain;
            width: 100%;
            height: 50vh;
            max-height: 100vw;
            max-width: 100%;
            margin: 0 auto;
            background-color: #fefbef;
        }

        @media (min-width: 768px) {
            .right-image {
                height: 70vh;
            }
        }

        @media (min-width: 1024px) {
            .right-image {
                height: 100vh;
                width: 100vh;
            }
        }

        @media (max-width: 480px) {
            .right-image {
                height: 40vh;
            }
        }
    </style>
</head>

<body class="form">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Log In to <a href="{{ route('admin.login') }}"><span class="brand-name"
                                    style="color:#4DB6AC;">HomeEase</span></a>
                        </h1>
                        <form class="text-left" action="{{ route('admin.login.post') }}" method="POST">
                            @csrf
                            <div class="form">
                                @if (session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <div class="form">

                                    <div id="email-field" class="field-wrapper input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <input id="email" name="email" type="text" class="form-control"
                                            placeholder="Email">
                                        @error('email')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div id="password-field" class="field-wrapper input mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                            <rect x="3" y="11" width="18" height="11" rx="2"
                                                ry="2">
                                            </rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input id="password" name="password" type="password" class="form-control"
                                            placeholder="Password">
                                        @error('password')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="d-sm-flex justify-content-between">
                                        <div class="field-wrapper toggle-pass">
                                            <p class="d-inline-block">Show Password</p>
                                            <label class="switch s-primary">
                                                <input type="checkbox" id="toggle-password" class="d-none">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="field-wrapper">
                                            <button type="submit" class="btn btn-primary" value="">Log
                                                In</button>
                                        </div>

                                    </div>

                                </div>
                        </form>
                        <p class="terms-conditions">© {{ Carbon::now()->format('Y') }} All Rights Reserved. <a
                                href="{{ route('admin.login') }}" style="color:#4DB6AC;">HomeEase</a> is a
                            product of Designreset. <a href="javascript:void(0);" style="color:#4DB6AC;">Cookie
                                Preferences</a>, <a href="javascript:void(0);" style="color:#4DB6AC;">Privacy</a>, and
                            <a href="javascript:void(0);" style="color:#4DB6AC;">Terms</a>.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="right-image">
                {{-- <div class="inner-image">
                    <img src="{{ asset('backend/assets/img/logo.png') }}" alt="">
                </div> --}}
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('backend/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('backend/assets/js/authentication/form-1.js') }}"></script>

</body>

</html>
