<div class="leftside-menu">
    <!-- LOGO -->
    <a href="{{route('admin.dashboard')}}" class="logo text-center logo-light">
        <span class="logo-lg">
            <img src="{{asset('/')}}backend/assets/images/logo.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('/')}}backend/assets/images/logo_sm.png" alt="" height="16">
        </span>
    </a>
    <!-- LOGO -->
    <a href="{{route('admin.dashboard')}}" class="logo text-center logo-dark">
        <span class="logo-lg">
            <img src="{{asset('/')}}backend/assets/images/logo-dark.png" alt="" height="16">
        </span>
        <span class="logo-sm">
            <img src="{{asset('/')}}backend/assets/images/logo_sm_dark.png" alt="" height="16">
        </span>
    </a>
    <div class="h-100" id="leftside-menu-container" data-simplebar="">
        <!--- Sidemenu -->
        <ul class="side-nav">
            <li class="side-nav-title side-nav-item">Navigation</li>
            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Dashboard </span>
                </a>
            </li>
            <li class="side-nav-title side-nav-item">Main Content</li>
            <li class="side-nav-item">
                <a href="{{ route('admin.user.index') }}" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Users </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('admin.main.main-all-course') }}" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Authorization </span>
                </a>
            </li>

{{--            <li class="side-nav-item">--}}
{{--                <a href="{{ route('admin.form') }}" class="side-nav-link">--}}
{{--                    <i class="uil-store"></i>--}}
{{--                    <span> Dashboard </span>--}}
{{--                </a>--}}
{{--            </li>--}}
            {{--<li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#course" aria-expanded="false"
                   aria-controls="course" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Course </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="course">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.category.index')}}">Category</a>
                        </li>
                        <li>
                            <a href="{{route('admin.course.index')}}">Course</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#users" aria-expanded="false"
                   aria-controls="users" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Users </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="users">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.student.index')}}">Students</a>
                        </li>
                        <li>
                            <a href="{{route('admin.teacher.index')}}">Teachers</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="uil-store"></i>
                    <span> Dashboard </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{route('admin.form')}}">Forms</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings" class="side-nav-link">
                    <i class="uil-folder-plus"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="side-nav-second-level">
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#header" aria-expanded="false" aria-controls="header">
                                <span> Header </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="header">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="{{ route('admin.header-appearance') }}">Appearance</a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);">Item 2</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="side-nav-item">
                            <a data-bs-toggle="collapse" href="#sidebarThirdLevel" aria-expanded="false" aria-controls="sidebarThirdLevel">
                                <span> Third Level </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sidebarThirdLevel">
                                <ul class="side-nav-third-level">
                                    <li>
                                        <a href="javascript: void(0);">Item 1</a>
                                    </li>
                                    <li class="side-nav-item">
                                        <a data-bs-toggle="collapse" href="#sidebarFourthLevel" aria-expanded="false" aria-controls="sidebarFourthLevel">
                                            <span> Item 2 </span>
                                            <span class="menu-arrow"></span>
                                        </a>
                                        <div class="collapse" id="sidebarFourthLevel">
                                            <ul class="side-nav-forth-level">
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.1</a>
                                                </li>
                                                <li>
                                                    <a href="javascript: void(0);">Item 2.2</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>--}}
        </ul>

        <!-- Help Box -->
{{--        @include('backend.admin.components.helpbox')--}}
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
