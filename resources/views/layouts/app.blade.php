<!DOCTYPE html>

<html lang="en">

<head>
    @yield('title')
    <title>{{ trans('panel.site_title_short') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/media/logo/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/media/logo/favicon_io/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        /* poppins-200 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 200;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-200.ttf') }}') format('truetype');
        }

        /* poppins-300 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-300.ttf') }}') format('truetype');

        }

        /* poppins-regular - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-regular.ttf') }}') format('truetype');

        }

        /* poppins-500 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-500.ttf') }}') format('truetype');

        }

        /* poppins-600 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-600.ttf') }}') format('truetype');

        }

        /* poppins-700 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-700.ttf') }}') format('truetype');

        }

        body {
            font-family: "Poppins";
        }
    </style>

    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/assets/plugins/custom/fontawesome-pro/css/all.min.css') }}" rel="stylesheet"
        type="text/css" />
</head>

<body id="kt_body" class="bg-body">
    
    @yield('content')
    
    <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script>
    @yield('scripts')
</body>

</html>
