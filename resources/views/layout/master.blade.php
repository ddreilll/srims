<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! printHtmlAttributes('html') !!}>

<head>
    @yield('title')
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/media/logo/favicon_io/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @foreach (getGlobalAssets('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Vendor Stylesheets(used by this page)-->
    @foreach (getVendors('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Vendor Stylesheets-->

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

    <script type="text/javascript">
        window.$sleek = [];
        window.SLEEK_PRODUCT_ID = 887606659;
        (function() {
            d = document;
            s = d.createElement("script");
            s.src = "https://client.sleekplan.com/sdk/e.js";
            s.async = 1;
            d.getElementsByTagName("head")[0].appendChild(s);
        })();
    </script>
</head>

<body {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

    @yield('content')

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    @foreach (getGlobalAssets() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used by this page)-->
    @foreach (getVendors('js') as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(optional)-->
    @stack('scripts')
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>

</html>
