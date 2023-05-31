<!-- bundle -->
<script src="{{asset('/')}}backend/assets/js/vendor.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/app.min.js"></script>

<!-- third party js -->
<script src="{{asset('/')}}backend/assets/js/vendor/apexcharts.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/jquery.dataTables.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.bootstrap5.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.responsive.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/responsive.bootstrap5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.buttons.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.bootstrap5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.html5.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.flash.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/buttons.print.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.keyTable.min.js"></script>
<script src="{{asset('/')}}backend/assets/js/vendor/dataTables.select.min.js"></script>
<!-- third party js ends -->

<!-- demo app -->
<script src="{{asset('/')}}backend/assets/js/pages/demo.datatable-init.js"></script>
<script src="{{asset('/')}}backend/assets/js/pages/demo.dashboard.js"></script>
<script src="{{ asset('backend/assets/js/lib/dropify.js') }}"></script>

<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@yield('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $('.dropify').dropify();
</script>
