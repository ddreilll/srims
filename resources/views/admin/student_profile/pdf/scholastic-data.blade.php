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
    <table class="table table-borderless table-xs">
        <tr>
            <td class="align-middl">Student No.:</td>
            <th class="align-middle">{{ $student->stud_studentNo }}</th>
            <th class="align-middle text-right"><span class="font-weight-normal ms-2">Admission Status:</span>
                {{ $student->stud_admissionType }}</th>
            <th class="align-middle text-right"><span class="font-weight-normal ms-2">Year:</span>
                {{ $student->stud_yearOfAdmission }}</th>
        </tr>
        <tr>
            <td class="align-middle">Name:</td>
            <th class="align-middle" colspan="3">
                {{ sprintf('%s, %s %s', $student->stud_lastName, $student->stud_firstName, $student->stud_middleName) }}
            </th>
        </tr>
        <tr>
            <td class="align-middle">Course:</td>
            <th class="align-middle" colspan="3">{{ $student->course->cour_name }}</th>
        </tr>
    </table>
    <hr />

    <div>
        @foreach ($vd['stud_grades'] as $gradeSheetPerYear)
            <table class="table table-bordered table-sm">
                <thead>
                    <tr class="table-active bg-secondary">
                        <th scope="col" colspan="6" class="py-3"><span
                                class="text-uppercase">{{ $gradeSheetPerYear['acad_year_long'] }}</span>
                        </th>
                    </tr>
                    <tr class="table-active">
                        <th scope="col"
                            width="5%"class="text-center font-weight-normal small align-middle font-weight-bold">NO.
                        </th>
                        <th scope="col" width="15%"
                            class="font-weight-normal small align-middle font-weight-bold">
                            SUBJECT CODE</th>
                        <th scope="col" width="65%"
                            class="font-weight-normal small align-middle font-weight-bold">
                            DESCRIPTION</th>
                        <th scope="col" width="5%"
                            class="font-weight-normal small align-middle font-weight-bold">
                            UNITS</th>
                        <th scope="col" width="5%"
                            class="font-weight-normal small align-middle font-weight-bold">
                            FINAL GRADE</th>
                        <th scope="col" width="5%"
                            class="font-weight-normal small align-middle font-weight-bold">
                            REMARKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gradeSheetPerYear['semesters'] as $semester)
                        <tr>
                            <th scope="col" colspan="6"class="align-middle text-center"><span
                                    class="text-uppercase">{{ $semester['term_name'] }}</span>
                            </th>
                        </tr>
                        @foreach ($semester['subjects'] as $key => $subject)
                            <tr>
                                <th class="text-center">{{ $key + 1 }}.</th>
                                <td class="text-center">{{ $subject['enrsub_subj_code'] }}</td>
                                <td>{{ $subject['enrsub_subj_name'] }}</td>
                                <td class="text-center">{{ $subject['enrsub_subj_units'] }}</td>
                                <td class="text-center">{{ $subject['enrsub_finalGrade'] }}</td>
                                <td class="text-center">{{ $subject['enrsub_grade_status'] }}</td>
                            </tr>
                        @endforeach
                    @endforeach



                </tbody>
            </table>
        @endforeach
    </div>
</body>

</html>
