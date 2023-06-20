{{--<style>--}}
{{--    body{--}}
{{--        -webkit-touch-callout: none; /* Disable iOS context menu */--}}
{{--        -webkit-user-select: none; /* Disable text selection on iOS Safari */--}}
{{--        -khtml-user-select: none; /* Disable text selection on Konqueror HTML */--}}
{{--        -moz-user-select: none; /* Disable text selection on Firefox */--}}
{{--        -ms-user-select: none; /* Disable text selection on Internet Explorer/Edge */--}}
{{--        user-select: none; /* Disable text selection on other browsers */--}}
{{--    }--}}
{{--</style>--}}
<!-- third party css -->
<link href="{{asset('/')}}backend/assets/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
<link href="{{asset('/')}}backend/assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
<link href="{{asset('/')}}backend/assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
<link href="{{asset('/')}}backend/assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
<link href="{{asset('/')}}backend/assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
<!-- third party css end -->

<!-- App css -->
<link href="{{asset('/')}}backend/assets/css/icons.min.css" rel="stylesheet" type="text/css">
<link href="{{asset('/')}}backend/assets/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
<link href="{{asset('/')}}backend/assets/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">
<link rel="stylesheet" href="{{asset('backend/assets/js/lib/dropify.css')}}">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@yield('style')
<style>
    .form-control{
        border: 1px solid #9f9f9f;
    }
    .fit{
        width: 30px;
        height: 30px;
        overflow: hidden;
        border-radius: 50px;
    }
    .fit img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
    .c-pointer{
        cursor: pointer !important;
    }
    .user-image {
        width: 120px;
        height: 120px;
        border-radius: 100px;
        border: 1px solid gray;
        overflow: hidden;
    }
    .user-image img{
        width: 100%;
        height: 100%;
    }
</style>
