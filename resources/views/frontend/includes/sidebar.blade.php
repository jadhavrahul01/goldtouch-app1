{{-- <!--**********************************
        Sidebar start
    ***********************************--> --}}
<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a class="" href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ route('profile.edit') }}" aria-expanded="false">
                    <i class="fa fa-user-circle"></i>
                    <span class="nav-text">Profile</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ route('orders') }}" aria-expanded="false">
                    <i class="fa fa-clock" aria-hidden="true"></i>
                    <span class="nav-text">Orders</span>
                </a>
            </li>
            @if (Auth::user()->role == 2)
                <li>
                    <a class="" href="{{ route('userinfo') }}" aria-expanded="false">
                        <i class="mdi mdi-account-group"></i>
                        <span class="nav-text">User Info</span>
                    </a>
                </li>

                <li>
                    <a class="" href="{{ route('sendUserTask') }}" aria-expanded="false">
                        <i class="fa-regular fa-message"></i>
                        <span class="nav-text">Send Notification</span>
                    </a>
                </li>
            @endif

            <li>
                <a class="" href="{{ route('userorder') }}" aria-expanded="false">
                    <i class="flaticon-067-plus"></i>
                    <span class="nav-text">Order</span>
                </a>
            </li>

            <li>
                <a class="" href="{{ route('calender') }}" aria-expanded="false">
                    <i class="fa-solid fa-calendar-days"></i>
                    <span class="nav-text">Calender</span>
                </a>
            </li>
        </ul>

        <div class="copyright">
            <p>
                <strong>Manashvi Garments Admin</strong> © 2023 All Rights
                Reserved
            </p>
            <p class="fs-12">
                Made by <a href="https://maestlopermedia.com/" target="_blank">Maestloper Media</a>
            </p>
        </div>
    </div>
</div>
{{-- <!--**********************************
            Sidebar end
    ***********************************--> --}}
