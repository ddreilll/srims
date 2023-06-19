<!DOCTYPE html>
<html>

<head>
    <title>SCHOLASTIC-DATA-{{ $student->stud_studentNo }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ public_path('assets/plugins/custom/bootstrap-4.6.2/css/bootstrap.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        div.breakNow {
            page-break-inside: avoid;
            page-break-after: always;
        }

        *,
        ::after,
        ::before {
            box-sizing: border-box;
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
            padding: 2px;
            padding-left: 0.3rem;
            padding-right: 0.3rem;
        }
    </style>
</head>

<body>
    <p class="font-weight-bold pb-0" style="font-size: 1rem">SCHOLASTIC DATA REPORT</p>
    <hr />
    <div>
        <table class="table table-borderless table-xs">
            <tr>
                <td>Student No.:</td>
                <th>{{ $student->stud_studentNo }}</th>
                <td class="text-right">Admission Status:</td>
                <th>{{ $student->stud_admissionType }}</th>
                <td class="text-right">Year:</td>
                <th>{{ $student->stud_yearOfAdmission }}</th>
            </tr>
            <tr>
                <td>Name:</td>
                <th>{{ sprintf('%s, %s %s', $student->stud_lastName, $student->stud_firstName, $student->stud_middleName) }}
                </th>
            </tr>
            <tr>
                <td>Course:</td>
                <th>{{ $student->course->cour_name }}</th>
            </tr>
        </table>
    </div>
    <hr />

    <div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="table-active bg-secondary">
                    <th scope="col" colspan="6" class="py-3"><span class="text-uppercase">SY 2000 - 2001</span>
                    </th>
                </tr>
                <tr class="table-active">
                    <th scope="col"
                        width="5%"class="text-center font-weight-normal small align-middle font-weight-bold">NO.
                    </th>
                    <th scope="col" width="15%" class="font-weight-normal small align-middle font-weight-bold">
                        SUBJECT CODE</th>
                    <th scope="col" width="65%" class="font-weight-normal small align-middle font-weight-bold">
                        DESCRIPTION</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        UNITS</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        FINAL GRADE</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        GRADE STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" colspan="6"class="align-middle text-center"><span class="text-uppercase">2nd
                            Semester</span>
                    </th>
                </tr>
                <tr>
                    <th class="text-center">1.</th>
                    <td class="text-center">MT 123</td>
                    <td>COLLEGE ALGEBRA</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">2.50</td>
                    <td class="text-center">P</td>
                </tr>
                <tr>
                    <th scope="col" colspan="6"class="align-middle text-center"><span class="text-uppercase">1st
                            Semester</span>
                    </th>
                </tr>
                <tr>
                    <th class="text-center">1.</th>
                    <td class="text-center">MT 143</td>
                    <td>Plane & Spherical Trigonometry</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">1.00</td>
                    <td class="text-center">P</td>
                </tr>
                <tr>
                    <th class="text-center">2.</th>
                    <td class="text-center">MT 123</td>
                    <td>Calculus</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">1.75</td>
                    <td class="text-center">P</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="table-active bg-secondary">
                    <th scope="col" colspan="6" class="py-3"><span class="text-uppercase">SY 1999 - 2000</span>
                    </th>
                </tr>
                <tr class="table-active">
                    <th scope="col"
                        width="5%"class="text-center font-weight-normal small align-middle font-weight-bold">NO.
                    </th>
                    <th scope="col" width="15%" class="font-weight-normal small align-middle font-weight-bold">
                        SUBJECT CODE</th>
                    <th scope="col" width="65%" class="font-weight-normal small align-middle font-weight-bold">
                        DESCRIPTION</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        UNITS</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        FINAL GRADE</th>
                    <th scope="col" width="5%" class="font-weight-normal small align-middle font-weight-bold">
                        GRADE STATUS</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="col" colspan="6"class="align-middle text-center"><span class="text-uppercase">2nd
                            Semester</span>
                    </th>
                </tr>
                <tr>
                    <th class="text-center">1.</th>
                    <td class="text-center">MT 123</td>
                    <td>COLLEGE ALGEBRA</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">2.50</td>
                    <td class="text-center">P</td>
                </tr>
                <tr>
                    <th scope="col" colspan="6"class="align-middle text-center"><span class="text-uppercase">1st
                            Semester</span>
                    </th>
                </tr>
                <tr>
                    <th class="text-center">1.</th>
                    <td class="text-center">MT 143</td>
                    <td>Plane & Spherical Trigonometry</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">1.00</td>
                    <td class="text-center">P</td>
                </tr>
                <tr>
                    <th class="text-center">2.</th>
                    <td class="text-center">MT 123</td>
                    <td>Calculus</td>
                    <td class="text-center">3.0</td>
                    <td class="text-center">1.75</td>
                    <td class="text-center">P</td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
