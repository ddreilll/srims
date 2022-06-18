<!DOCTYPE html>

<html lang="en">

<head>
    <title>{{ trans('panel.site_title') }}</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html" />

    <style>
        /* poppins-200 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 200;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-200.ttf') }}') format('truetype');
        }

        /* poppins-300 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-300.ttf') }}') format('truetype');

        }

        /* poppins-regular - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-regular.ttf') }}') format('truetype');

        }

        /* poppins-500 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-500.ttf') }}') format('truetype');

        }

        /* poppins-600 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-600.ttf') }}') format('truetype');

        }

        /* poppins-700 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            src: url('{{ storage_path('/fonts/poppins/poppins-v19-latin-700.ttf') }}') format('truetype');

        }

        body {
            font-family: "Poppins";
        }
    </style>

    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

</head>

<body id="kt_body" style="background-color: #fff;" >
    @yield('content')

</body>

</html>
