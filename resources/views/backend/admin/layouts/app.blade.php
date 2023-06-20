<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{ config('app.name')  }} || @yield('title','Laravel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('/')}}backend/assets/images/favicon.ico">
    @include('backend.admin.includes.header_links')
</head>

<body class="loading show sidebar-enable"
      data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>
<!-- Begin page -->
<div class="wrapper">
@include('sweetalert::alert')
    <!-- ========== Left Sidebar Start ========== -->
    @include('backend.admin.includes.left_side_bar')
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <!-- Topbar Start -->
            @include('backend.admin.includes.header')
            <!-- end Topbar -->

            <!-- Start Content-->
            <div class="my-2"></div>
            @yield('content')
            <!-- container -->
        </div>
        <!-- content -->
        <!-- Footer Start -->
        @include('backend.admin.includes.footer')
        <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
{{--@include('backend.admin.includes.right_sidebar')--}}
<div class="rightbar-overlay"></div>
<!-- /End-bar -->
@include('backend.admin.includes.script')
<!-- end demo js-->
</body>
</html>
