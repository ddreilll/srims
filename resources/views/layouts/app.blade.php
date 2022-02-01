<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    @yield('title')
    
    <meta charset="utf-8" />
   
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('/new_assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/new_assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    @yield('content')
    <!--end::Main-->

    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('/new_assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/new_assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>