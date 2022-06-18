<!DOCTYPE html>

<html lang="en">

<head>
    <title>{{ trans('panel.site_title') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ asset('/assets/media/logo/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/assets/media/logo/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/assets/media/logo/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/media/logo/favicon/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        /* poppins-200 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 200;
            src: local(''),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-200.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-200.woff') }}') format('woff');
        }

        /* poppins-300 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            src: local(''),

                url('{{ asset('/assets/font/poppins/poppins-v19-latin-300.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-300.woff') }}') format('woff');

        }

        /* poppins-regular - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            src: local(''),

                url('{{ asset('/assets/font/poppins/poppins-v19-latin-regular.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-regular.woff') }}') format('woff');

        }

        /* poppins-500 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            src: local(''),

                url('{{ asset('/assets/font/poppins/poppins-v19-latin-500.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-500.woff') }}') format('woff');

        }

        /* poppins-600 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            src: local(''),

                url('{{ asset('/assets/font/poppins/poppins-v19-latin-600.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-600.woff') }}') format('woff');

        }

        /* poppins-700 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            src: local(''),

                url('{{ asset('/assets/font/poppins/poppins-v19-latin-700.woff2') }}') format('woff2'),
                url('{{ asset('/assets/font/poppins/poppins-v19-latin-700.woff') }}') format('woff');

        }

    </style>
    {{-- <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="kt_body" class="bg-body">
    @yield('content')

    {{-- <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script> --}}
    <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>
</body>

</html>