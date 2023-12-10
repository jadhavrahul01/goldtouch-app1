<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <!-- Title -->
    <title>Gold Touch | Register</title>

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
                                        <a href="/"><img class="logo-light" src="images/logo-full.png"
                                                alt=""></a>
                                        <a href="/"><img class="logo-dark" src="images/logo-white-full.png"
                                                alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign up your account</h4>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf

                                        <!-- Name -->
                                        <div>
                                            <x-input-label for="name" :value="__('Name')" />
                                            <x-text-input id="name" class="form-control block mt-1 w-full"
                                                type="text" name="name" :value="old('name')" required autofocus
                                                autocomplete="name" />
                                            <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
                                        </div>

                                        <!-- Email Address -->
                                        <div class="mt-4">
                                            <x-input-label for="email" :value="__('Email')" />
                                            <x-text-input id="email" class="form-control block mt-1 w-full"
                                                type="email" name="email" :value="old('email')" required
                                                autocomplete="username" />
                                            <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password" :value="__('Password')" />

                                            <x-text-input id="password" class="form-control block mt-1 w-full"
                                                type="password" name="password" required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                                        </div>

                                        <!-- Confirm Password -->
                                        <div class="mt-4">
                                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                            <x-text-input id="password_confirmation"
                                                class="form-control block mt-1 w-full" type="password"
                                                name="password_confirmation" required autocomplete="new-password" />

                                            <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                                        </div>

                                        <div class="flex items-center justify-end mt-4">
                                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                                href="{{ route('login') }}">
                                                {{ __('Already registered?') }}
                                            </a>
                                        </div>
                                        <div class="flex items-center justify-end mt-4">
                                            <x-primary-button class="btn btn-primary ml-4 w-100">
                                                {{ __('Register') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <!--**********************************
        Scripts
    ***********************************--> --}}
    <!-- Required vendors -->
    <script src="{{ asset('user-assets/xhtml/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/custom.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/vendor/jquery-nice-select/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/deznav-init.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/demo.js') }}"></script>
    <script src="{{ asset('user-assets/xhtml/js/styleSwitcher.js') }}"></script>
</body>

</html>
