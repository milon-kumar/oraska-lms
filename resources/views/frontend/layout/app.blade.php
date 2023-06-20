<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }} || @yield('title')</title>
    @include('backend.admin.includes.header_links')
    @yield('frontcss')
</head>
<body class="loading">
@include('sweetalert::alert')
@include('frontend.includes.header')

@yield('content')


@include('backend.admin.includes.script')

@yield('frontjs')
</body>
</html>
