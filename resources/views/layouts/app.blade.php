<!DOCTYPE html>

<html lang="en">

<head>
    <title>{{ trans('panel.site_title') }}</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-body">
    @yield('content')

    <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>
</body>

</html>