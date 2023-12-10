<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Gold Touch | Login</title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="DexignZone">
    <meta name="robots" content="">

    <!-- Mobile Specific -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon icon -->
    <link rel="icon" type="{{ asset('user-assets/xhtml/image/png') }}" href="images/favicon.png">

    <link href="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('user-assets/xhtml/css/style.css') }}" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="/"><img class="logo-light"
                                                src="{{ asset('user-assets/xhtml/images/logo-full.png') }}"
                                                alt=""></a>
                                        <a href="/"><img class="logo-dark"
                                                src="{{ asset('user-assets/xhtml/images/logo-white-full.png') }}"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="email" name="email"
                                                class="form-control  @error('email') is-invalid @enderror" autofocus
                                                autocomplete="Username">
                                            <x-input-error :messages="$errors->get('email')" class="mt-2 is-invalid" />
                                        </div>
                                        <div class="mb-3 position-relative">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" name="password" id="dz-password"
                                                class="form-control @error('password') is-invalid @enderror" required
                                                autocomplete="current-password">
                                            <span class="show-pass eye">

                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>

                                            </span>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 is-invalid" />
                                        </div>
                                        <div class="row d-flex justify-content-between mt-4 mb-2">
                                            <div class="mb-3">
                                                <div class="form-check custom-checkbox ms-1">
                                                    <input type="checkbox" class="form-check-input"
                                                        id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember my
                                                        preference</label>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary"
                                                href="{{ route('register') }}">Sign
                                                up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
</body>

</html>
