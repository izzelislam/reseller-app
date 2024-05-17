<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Tocly - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- include head css -->
    @include('layouts.head-css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('build/libs/toastr/build/toastr.min.css') }}">
    @stack('after-style')
</head>

@yield('body')

    <!-- Begin page -->
    <div id="layout-wrapper">
            <!-- topbar -->
            @include('layouts.topbar')

            <!-- sidebar components -->
            @include('layouts.sidebar')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <!-- footer -->
                @include('layouts.footer')

            </div>
            <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- customizer -->
    @include('layouts.right-sidebar')

    <!-- vendor-scripts -->
    @include('layouts.vendor-scripts')
    @stack('after-script')
    <script src="{{ URL::asset('build/libs/toastr/build/toastr.min.js') }}"></script>
    <script>
        let sessionSuccess = @json(session('success'));
        let sessionError   = @json(session('error'));

        if(sessionSuccess) {
            toastr["success"](sessionSuccess, "success");
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
        if(sessionError) {
            toastr["error"](sessionError, "success");
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }

    </script>

</body>

</html>
