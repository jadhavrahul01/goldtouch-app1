@extends('frontend.includes.app')
@section('title', 'Users Information')

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="flex-wrap mb-sm-4 d-flex align-items-center text-head position-relative">
                <h2 class="mb-3 me-auto">Users Information</h2>
                <div>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Users Information</a></li>
                    </ol>
                </div>
                <div class="col-md-4 warningBox2">
                    @include('frontend.message')
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="text-white fas fa-user bg-primary"></i>
                                </div>
                                <div class="ms-4 customer">
                                    <h2 class="mb-0 font-w600">
                                        {{ $users1 }}
                                    </h2>
                                    <p class="mb-0 font-w500">Total Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="order-user">
                                    <i class="text-white fas fa-user bg-secondary"></i>
                                </div>
                                <div class="ms-4 customer">
                                    <h2 class="mb-0 font-w600">
                                        {{ $users2 }}
                                    </h2>
                                    <p class="mb-0 font-w500">Total Admins</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-12">
                    <div class="flex-wrap d-flex">
                        {{-- <a href="javascript:void(0);" class="mb-3 btn btn-primary me-3" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">+ New Tranasactions</a> --}}

                        <div class="mb-3 table-search pe-3">
                            <form action="" method="get">
                                <div class="input-group search-area">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Search user name here" value="{{ Request::get('name') }}" required>
                                    <button type="submit" class="btn btn-sm input-group-text"><i
                                            class="flaticon-381-search-2"></i></button>
                                </div>
                            </form>
                        </div>


                        {{-- <a href="javascript:void(0);" class="mb-3 btn btn-primary me-3"><i
                                class="fas fa-calendar me-3"></i>Filter</a> --}}
                        <a href="{{ route('userinfo') }}" class="mb-3 btn btn-warning">
                            <i class="fas fa-redo-alt"></i>
                        </a>

                        <div class="mb-3 newest me-3">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                data-target="#addUser">
                                Add User
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="addUser" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add user</h5>
                                            <span class="close closebtn" data-dismiss="modal" aria-label="Close"
                                                aria-hidden="true">
                                                &times;
                                            </span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf
                                                <!-- Name -->
                                                <div>
                                                    <x-input-label for="name" :value="__('Name')" />
                                                    <x-text-input id="name" class="block w-full mt-1 form-control"
                                                        type="text" name="name" :value="old('name')" required autofocus
                                                        autocomplete="name" />
                                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                                </div>

                                                <!-- Email Address -->
                                                <div class="mt-4">
                                                    <x-input-label for="email" :value="__('Email')" />
                                                    <x-text-input id="email" class="block w-full mt-1 form-control"
                                                        type="email" name="email" :value="old('email')" required
                                                        autocomplete="username" />
                                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                                </div>

                                                <!-- Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password" :value="__('Password')" />

                                                    <x-text-input id="password" class="block w-full mt-1 form-control"
                                                        type="password" name="password" required
                                                        autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                                </div>

                                                <!-- Confirm Password -->
                                                <div class="mt-4">
                                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                                    <x-text-input id="password_confirmation"
                                                        class="block w-full mt-1 form-control" type="password"
                                                        name="password_confirmation" required autocomplete="new-password" />

                                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                                </div>

                                                <div class="mt-4">
                                                    <select name="role" id="role" class="form-control">
                                                        <option value="1">User</option selected>
                                                        <option value="2">Admin</option>
                                                    </select>
                                                </div>

                                                <div class="items-center mt-4 d-flex">
                                                    <button type="button" class="btn btn-sm btn-secondary w-50"
                                                        data-dismiss="modal">Close</button>

                                                    <x-primary-button class="ml-4 btn btn-primary w-50">
                                                        {{ __('Add User') }}
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

                {{-- * Users * --}}
                <div class="row">
                    <h2 class="text-left">Users</h2>
                    @forelse ($users as $user)
                        <!-- Modal -->
                        <div class="modal fade" id="removeUser" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Remove
                                            user</h5>
                                        <span class="close closebtn" data-dismiss="modal" aria-label="Close"
                                            aria-hidden="true">
                                            &times;
                                        </span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Are you sure you want to remove this user</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form method="POST" action="/delete/{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                Confirm
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-center card">
                                <div class="pb-0 border-0 card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            @if ($user->role == 2)
                                                <div class="p-2 px-3 rounded badge bg-success">
                                                    {{ __('Admin') }}
                                                </div>
                                            @else
                                                <div class="p-2 px-3 rounded badge bg-warning">
                                                    {{ __('User') }}
                                                </div>
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">

                                                {{-- <a href="#" class="dropdown-item" data-ajax-popup="true"
                                                    data-size="md" data-title="{{ __('Edit') }}" data-url="">
                                                    <i class="ti ti-pencil"></i>
                                                    <span>{{ __('Edit') }}</span>
                                                </a> --}}

                                                <a href="#" class="dropdown-item text-danger bs-pass-para"
                                                    data-toggle="modal" data-target="#removeUser">
                                                    <i class="ti ti-trash"></i>
                                                    <span>{{ __('Remove User') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn " data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <a href="#" class="dropdown-item" data-ajax-popup="true"
                                                data-size="md" data-title="{{ __('Reset Password') }}" data-url=""><i
                                                    class="ti ti-edit"></i>
                                                <span>{{ __('Reset Password') }}</span></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="avatar">
                                        <div class="avatar2" style="background-color: {{ $user->color }};">
                                            <h3 class="text-white text-capitalize">{{ $user->name[0] }}</h3
                                                class="text-white">
                                        </div>
                                    </div>
                                    <h4>{{ $user->name }}</h4>

                                    <h4 class="mt-2">{{ $user->created_at }}</h4>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center">No users added</h4>
                    @endforelse
                </div>

                {{-- * Admins * --}}
                <div class="row">
                    <h2 class="text-left">Admins</h2>
                    @forelse ($admins as $admin)
                        <!-- Modal -->
                        <div class="modal fade" id="removeUser" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Remove
                                            Admin</h5>
                                        <span class="close closebtn" data-dismiss="modal" aria-label="Close"
                                            aria-hidden="true">
                                            &times;
                                        </span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Are you sure you want to remove this user</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <form method="POST" action="/delete/{{ $admin->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                Confirm
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="text-center card">
                                <div class="pb-0 border-0 card-header">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h6 class="mb-0">
                                            @if ($admin->role == 2)
                                                <div class="p-2 px-3 rounded badge bg-success">
                                                    {{ __('Admin') }}
                                                </div>
                                            @else
                                                <div class="p-2 px-3 rounded badge bg-warning">
                                                    {{ __('User') }}
                                                </div>
                                            @endif
                                        </h6>
                                    </div>
                                    <div class="card-header-right">
                                        <div class="btn-group card-option">
                                            <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">

                                                {{-- <a href="#" class="dropdown-item" data-ajax-popup="true"
                                                    data-size="md" data-title="{{ __('Edit') }}" data-url="">
                                                    <i class="ti ti-pencil"></i>
                                                    <span>{{ __('Edit') }}</span>
                                                </a> --}}

                                                <a href="#" class="dropdown-item text-danger bs-pass-para"
                                                    data-toggle="modal" data-target="#removeUser">
                                                    <i class="ti ti-trash"></i>
                                                    <span>{{ __('Remove User') }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-end">
                                    <div class="btn-group card-option">
                                        <button type="button" class="btn " data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="feather icon-more-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <a href="#" class="dropdown-item" data-ajax-popup="true"
                                                data-size="md" data-title="{{ __('Reset Password') }}" data-url=""><i
                                                    class="ti ti-edit"></i>
                                                <span>{{ __('Reset Password') }}</span></a>
                                        </div>
                                    </div>
                                </div>


                                <div class="card-body">
                                    <div class="avatar">
                                        <div class="avatar2" style="background-color: {{ $admin->color }};">
                                            <h3 class="text-white">{{ $admin->name[0] }}</h3 class="text-white">
                                        </div>
                                    </div>
                                    <h4>{{ $admin->name }}</h4>

                                    <h4 class="mt-2">{{ $admin->created_at }}</h4>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h4 class="text-center">No users added</h4>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
