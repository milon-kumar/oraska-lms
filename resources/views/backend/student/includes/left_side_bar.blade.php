<div class="leftside-menu">

    <!-- LOGO -->
    <a href="{{route('student.dashboard')}}" class="logo text-center logo-light">
                    <span class="logo-lg">
                        <img src="{{asset('/')}}backend/assets/images/logo.png" alt="" height="16">
                    </span>
        <span class="logo-sm">
                        <img src="{{asset('/')}}backend/assets/images/logo_sm.png" alt="" height="16">
                    </span>
    </a>

    <!-- LOGO -->
    <a href="{{route('student.dashboard')}}" class="logo text-center logo-dark">
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
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-user"></i>
                    <span> Profile </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.post.index') }}" class="side-nav-link">
                    <i class="dripicons-blog"></i>
                    <span> Community Post </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.courses') }}" class="side-nav-link">
                    <i class="dripicons-checklist"></i>
                    <span> My Courses </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-shopping-bag"></i>
                    <span> Buy New Courses </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-graph-line"></i>
                    <span> Progress Report </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-media-play"></i>
                    <span> View all Class Videos </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarEcommerce" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="dripicons-cloud-download"></i>
                    <span> Download </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarEcommerce">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Lecture notes </a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">CQ Questions</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">CQ Solves</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">PDF Questions</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">PDF Solves</a>
                        </li>
                        <li>
                            <a href="apps-ecommerce-products.html">Essentials</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="side-nav-item">
                <a href="{{ route('student.dashboard') }}" class="side-nav-link">
                    <i class="dripicons-information"></i>
                    <span> Complain Box </span>
                </a>
            </li>
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false"
                   aria-controls="sidebarEcommerce" class="side-nav-link">
                    <i class="dripicons-gear"></i>
                    <span> Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="apps-ecommerce-products.html">Account</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Help Box -->
{{--        @include('backend.admin.components.helpbox')--}}
        <!-- end Help Box -->
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
