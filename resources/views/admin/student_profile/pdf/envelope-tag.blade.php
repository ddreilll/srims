<!DOCTYPE html>
<html>

<head>
    <title>ENVELOPE-TAG-{{ $student->stud_studentNo }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ public_path('assets/plugins/custom/bootstrap-4.6.2/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        div.breakNow {
            page-break-inside: avoid;
            page-break-after: always;
        }

        body {
            font-size: 13px;
        }

        .table thead th {
            border-bottom-color: #a7a7a7;
        }

        .table-bordered td,
        .table-bordered th {
            border: 1px solid #7c7c7c
        }

        .table-xs td,
        .table-xs th {
            padding: 0px;
        }
    </style>
</head>

<body class="p-0 m-0">
    <table class="table table-borderless table-xs">
        <tr>
            <th style="font-size:2rem" class="align-middle">
                {{ sprintf('%s, %s %s', $student->stud_lastName, $student->stud_firstName, $student->stud_middleName) }}
            </th>
        </tr>
        <tr>
            <th style="font-size:1.5rem" class="align-middle">{{ $student->stud_studentNo }}</th>
        </tr>
        <tr>
            <th style="font-size:1.5rem" class="align-middle">{{ $student->course->cour_code }}</th>
        </tr>
    </table>
    <hr />
</body>

</html>
