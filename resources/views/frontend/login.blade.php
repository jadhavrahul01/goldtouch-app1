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
                                        {{-- <a href="/"><img class="logo-light"
                                                src="{{ asset('user-assets/xhtml/images/logo-full.png') }}"
                                                alt=""></a>
                                        <a href="/"><img class="logo-dark"
                                                src="{{ asset('user-assets/xhtml/images/logo-white-full.png') }}"
                                                alt=""></a> --}}
                                        <h2>Gold <span class="text-blue">Touch</span></h2>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div>
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control block mt-1 w-full"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4 position-relative">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="dz-password" class="form-control block mt-1 w-full"
                                                type="password" name="password" required
                                                autocomplete="current-password" />
                                            <span class="show-pass eye">

                                                <i class="fa fa-eye-slash"></i>
                                                <i class="fa fa-eye"></i>

                                            </span>

                                            <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />

                                        </div>

                                        <!-- Remember Me -->
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox"
                                                    class="form-check-input dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                                                    name="remember">
                                                <span
                                                    class="text-remember ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>

                                        <div class="mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif

                                        </div>
                                        <x-primary-button class="btn btn-primary mt-3 w-100">
                                            {{ __('Log in') }}
                                        </x-primary-button>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Want to place order <a class="text-primary" href="{{ route('order') }}">click
                                                here</a></p>
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
