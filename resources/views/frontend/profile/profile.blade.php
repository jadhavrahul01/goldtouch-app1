@extends('frontend.includes.app')
@section('title', 'Profile')

@section('content')
    <div class="content-body">
        <div class="container-fluid">
            <div class="flex-wrap mb-sm-4 d-flex align-items-center text-head">
                <h2 class="mb-3 me-auto">Profile</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Profile</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="px-3 pt-3 pb-0 profile card card-body">
                        <div class="profile-head">
                            <div class="photo-content">
                                <div class="rounded cover-photo"></div>
                            </div>
                            <div class="profile-info">
                                <form action="" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="profile-photo">
                                        <img src="/profileImg/{{ Auth::user()->profileImg }}"
                                            id="preview-image-before-upload" class="img-fluid rounded-circle"
                                            alt="profile-img">
                                        <input type="hidden" name="" value="{{ Auth::user()->id }}" id="UserId">
                                        <div class="fileMenu">
                                            <input type="file" name="fileupload" id="image">
                                        </div>

                                        <div class="fileUpload">
                                            <i class="fa fa-camera upload-img"></i>
                                        </div>
                                    </div>
                                </form>
                                <div class="profile-details">
                                    <div class="px-3 pt-2 profile-name">
                                        <h4 class="mb-0 text-primary">{{ Auth::user()->name }}</h4>
                                        <p></p>
                                    </div>
                                    <div class="px-2 pt-2 profile-email">
                                        <h4 class="mb-0 text-muted">{{ Auth::user()->email }}</h4>
                                        <p>Email</p>
                                    </div>

                                    <ul id="errstatus"></ul>

                                    <div id="sStatus"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="h-auto card">
                                <div class="card-body">
                                    <div class="profile-statistics">
                                        <div class="text-center">
                                            <div class="row">
                                                @if (Auth::user()->role == 2)
                                                    <div class="col">
                                                        <h3 class="m-b-0">{{ $aordersCount }}
                                                        </h3><span>Total Orders</span>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="m-b-0">0</h3><span>Pending</span>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="m-b-0">0</h3><span>Accepted</span>
                                                    </div>
                                                @else
                                                    <div class="col">
                                                        <h3 class="m-b-0">{{ $uordersCount }}
                                                        </h3><span>Total Orders</span>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="m-b-0">0</h3><span>Pending</span>
                                                    </div>
                                                    <div class="col">
                                                        <h3 class="m-b-0">0</h3><span>Accepted</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="h-auto card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#about-me" data-bs-toggle="tab"
                                                class="nav-link active show">Profile Information</a>
                                        </li>
                                        <li class="nav-item"><a href="#reset-password" data-bs-toggle="tab"
                                                class="nav-link">Reset Password</a>
                                        </li>
                                        <li class="nav-item"><a href="#delete-account" data-bs-toggle="tab"
                                                class="nav-link ">Delete Account</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="delete-account" class="tab-pane fade">
                                            <div class="pt-3 my-post-content">
                                                <section class="space-y-6">
                                                    {{-- <header>
                                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                            {{ __('Delete Account') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted.') }}
                                                        </p>
                                                    </header> --}}

                                                    {{-- <x-danger-button class="btn btn-danger" x-data=""
                                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Delete Account') }}</x-danger-button> --}}
                                                    <form method="post" action="{{ route('profile.destroy') }}"
                                                        class="p-6">
                                                        @csrf
                                                        @method('delete')

                                                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                                            {{ __('Are you sure you want to delete your account?') }}
                                                        </h2>

                                                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                                        </p>

                                                        <div class="mt-6">
                                                            <x-input-label for="password" value="{{ __('Password') }}"
                                                                class="sr-only" />

                                                            <x-text-input id="password" name="password" type="password"
                                                                class="block w-3/4 mt-1 form-control"
                                                                placeholder="{{ __('Password') }}" />

                                                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-danger" />
                                                        </div>

                                                        <div class="flex justify-end mt-6">
                                                            {{-- <x-secondary-button x-on:click="$dispatch('close')">
                                                                {{ __('Cancel') }}
                                                            </x-secondary-button> --}}

                                                            <x-danger-button class="mt-2 ml-3 btn btn-danger">
                                                                {{ __('Delete Account') }}
                                                            </x-danger-button>
                                                        </div>
                                                    </form>
                                                    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>


                                                    </x-modal>
                                                </section>

                                            </div>
                                        </div>
                                        <div id="about-me" class="tab-pane fade active show">
                                            <div class="profile-personal-info">
                                                <h4 class="mb-4 text-primary"></h4>
                                                <form id="send-verification" method="post"
                                                    action="{{ route('verification.send') }}">
                                                    @csrf
                                                </form>

                                                <form method="post" action="{{ route('profile.update') }}"
                                                    class="mt-6 space-y-6">
                                                    @csrf
                                                    @method('patch')

                                                    <div>
                                                        <x-input-label for="name" :value="__('Name')" />
                                                        <x-text-input id="name" name="name" type="text"
                                                            class="block w-full mt-1 form-control" :value="old('name', $user->name)"
                                                            required autofocus autocomplete="name" />
                                                        <x-input-error class="mt-2 form-control" :messages="$errors->get('name')" />
                                                    </div>

                                                    <div class="mt-3">
                                                        <x-input-label for="email" :value="__('Email')" />
                                                        <x-text-input id="email" name="email" type="email"
                                                            class="block w-full mt-1 form-control" :value="old('email', $user->email)"
                                                            required autocomplete="username" disabled />
                                                        <x-input-error class="mt-2" :messages="$errors->get('email')" />

                                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                            <div>
                                                                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                                                                    {{ __('Your email address is unverified.') }}

                                                                    <button form="send-verification"
                                                                        class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                                                                        {{ __('Click here to re-send the verification email.') }}
                                                                    </button>
                                                                </p>

                                                                @if (session('status') === 'verification-link-sent')
                                                                    <p
                                                                        class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                                                                        {{ __('A new verification link has been sent to your email address.') }}
                                                                    </p>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="flex items-center gap-4">
                                                        <x-primary-button
                                                            class="mt-5 btn btn-secondary">{{ __('Save') }}</x-primary-button>

                                                        @if (session('status') === 'profile-updated')
                                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                                x-init="setTimeout(() => show = false, 2000)"
                                                                class="text-sm text-gray-600 dark:text-gray-400">
                                                                {{ __('Saved.') }}</p>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div id="reset-password" class="tab-pane fade">
                                            <div class="pt-3">
                                                <div class="settings-form">
                                                    <h4 class="text-primary"></h4>
                                                    <form method="post" action="{{ route('password.update') }}"
                                                        class="mt-6 space-y-6">
                                                        @csrf
                                                        @method('put')

                                                        <div>
                                                            <x-input-label for="current_password" :value="__('Current Password')" />
                                                            <x-text-input id="current_password" name="current_password"
                                                                type="password" class="block w-full mt-1 form-control"
                                                                autocomplete="current-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-3">
                                                            <x-input-label for="password" :value="__('New Password')" />
                                                            <x-text-input id="password" name="password" type="password"
                                                                class="block w-full mt-1 form-control"
                                                                autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                                                        </div>

                                                        <div class="mt-3">
                                                            <x-input-label for="password_confirmation"
                                                                :value="__('Confirm Password')" />
                                                            <x-text-input id="password_confirmation"
                                                                name="password_confirmation" type="password"
                                                                class="block w-full mt-1 form-control"
                                                                autocomplete="new-password" />
                                                            <x-input-error :messages="$errors->updatePassword->get(
                                                                'password_confirmation',
                                                            )" class="mt-2" />
                                                        </div>

                                                        <div class="flex items-center gap-4 mt-5">
                                                            <x-primary-button
                                                                class="btn btn-primary">{{ __('Save') }}</x-primary-button>

                                                            @if (session('status') === 'password-updated')
                                                                <p x-data="{ show: true }" x-show="show" x-transition
                                                                    x-init="setTimeout(() => show = false, 2000)"
                                                                    class="text-sm text-gray-600 dark:text-gray-400">
                                                                    {{ __('Saved.') }}</p>
                                                            @endif
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="replyModal">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Post Reply</h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form>
                                                    <textarea class="form-control" rows="4">Message</textarea>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Reply</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJs')
    <script>
        $(document).ready(function(e) {


            $('#image').change(function() {

                let reader = new FileReader();

                reader.onload = (e) => {

                    $('#preview-image-before-upload').attr('src', e.target.result);
                    $('#preview-image-before-upload1').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]);
            });

            $('#image').on('change', function(e) {
                e.preventDefault();
                var userid = $('#UserId').val();
                var formData = new FormData();

                // Append the selected image to the FormData object
                formData.append('image', $(this)[0].files[0]);

                // Send the image using jQuery AJAX
                $.ajax({
                    type: 'POST',
                    url: 'change-profile/' + userid,
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.status == 400) {
                            $('#errstatus').html("");
                            $('#errstatus').addClass('alert alert-danger');
                            $.each(response.errors, function(key, err_values) {
                                $('#errstatus').append('<li>' + err_values +
                                    '</li>');
                            }).delay(200).fadeOut(2000);
                        } else if (response.status == 404) {
                            $('#errstatus').html("");
                            $('#sStatus').addClass('alert alert-danger');
                            $('#sStatus').text(response.message);
                        } else {
                            $('#errstatus').html("");
                            $('#sStatus').html("");
                            $('#sStatus').addClass('alert alert-success');
                            $('#sStatus').text(response.message).delay(200).fadeOut(2000);
                        }
                    },
                });
            });


            $(document).on('click', '.fileUpload', function(e) {
                e.preventDefault();

                $('#image').click();
            });

        });
    </script>
@endsection
