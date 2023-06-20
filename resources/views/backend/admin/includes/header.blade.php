<div class="navbar-custom bg-dark navbar-dark" style="border-bottom: 4px solid var(--bs-secondary)">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-none d-sm-inline-block">
            <a class="nav-link dropdown-toggle arrow-none text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-view-apps noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg p-0" style="">
                <div class="p-2">
                    <div class="row g-0">
                        <div class="col">
                            <a class="dropdown-icon-item" href="{{ route('frontend.home') }}" target="_blank">
                                <img src="{{asset('/')}}backend/assets/images/brands/slack.png" alt="slack">
                                <span>Website</span>
                            </a>
                        </div>
                        <div class="col">
                            <a class="dropdown-icon-item" href="https://www.github.com" target="_blank">
                                <img src="{{asset('/')}}backend/assets/images/brands/github.png" alt="Github">
                                <span>GitHub</span>
                            </a>
                        </div>

                        <div class="col">
                            <a class="dropdown-icon-item" href="https://www.goole.com" target="_blank">
                                <img src="{{asset('/')}}backend/assets/images/brands/g-suite.png" alt="G Suite">
                                <span>Google</span>
                            </a>
                        </div>
                    </div>

{{--                    <div class="row g-0">--}}
{{--                        <div class="col">--}}
{{--                            <a class="dropdown-icon-item" href="#">--}}
{{--                                <img src="{{asset('/')}}backend/assets/images/brands/bitbucket.png" alt="bitbucket">--}}
{{--                                <span>Bitbucket</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <a class="dropdown-icon-item" href="#">--}}
{{--                                <img src="{{asset('/')}}backend/assets/images/brands/dropbox.png" alt="dropbox">--}}
{{--                                <span>Dropbox</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                        <div class="col">--}}
{{--                            <a class="dropdown-icon-item" href="#">--}}
{{--                                <img src="{{asset('/')}}backend/assets/images/brands/g-suite.png" alt="G Suite">--}}
{{--                                <span>G Suite</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div> <!-- end row-->--}}
                </div>

            </div>
        </li>


        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
               role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <img src="{{asset('/')}}backend/assets/images/users/avatar-1.jpg"
                         alt="user-image" class="rounded-circle">
                </span>
                <span>
                    <span class="account-user-name">{{Auth::user()->name}}</span>
                    <span class="account-position text-uppercase">{{Auth::user()->type}}</span>
                </span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ route('admin.setting.profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>My Account</span>
                </a>

                <!-- item-->
                <a href="{{ route('admin.setting.index') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Settings</span>
                </a>
                <!-- item-->
                <a href="javascript:void(0);" onclick="event.preventDefault();document.getElementById('logoutFormAdmin').submit();" class="dropdown-item notify-item">
                    <i class="mdi mdi-logout me-1"></i>
                    <span>Logout</span>
                </a>
                <form action="{{route('logout')}}" method="post" id="logoutFormAdmin">@csrf</form>
            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left text-white">
        <i class="mdi mdi-menu"></i>
    </button>

</div>
