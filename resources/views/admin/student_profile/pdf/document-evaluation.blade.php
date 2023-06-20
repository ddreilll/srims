<!DOCTYPE html>
<html>

<head>
    <title>DOCUMENT-EVALUATION-{{ $student->stud_studentNo }}</title>
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
    <p class="font-weight-bold pb-0" style="font-size: 1rem">STUDENT DOCUMENT EVALUATION REPORT</p>
    <hr />
    <div>
        <table class="table table-borderless table-xs">
            <tr>
                <td class="align-middle">Student No.:</td>
                <th class="align-middle">{{ $student->stud_studentNo }}</th>
                <th class="align-middle text-right"><span class="font-weight-normal ms-2">Admission Status:</span> {{ $student->stud_admissionType }}</th>
                <th class="align-middle text-right"><span class="font-weight-normal ms-2">Year:</span> {{ $student->stud_yearOfAdmission }}</th>
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
    </div>
    <hr />

    <div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="table-active bg-secondary">
                    <th scope="col" colspan="4" class="py-3"><span class="text-uppercase">Entrance
                            Documents</span>
                    </th>
                </tr>
                <tr class="table-active">
                    <th scope="col" width="5%"
                        class="text-center font-weight-normal small align-middle font-weight-bold">NO.</th>
                    <th scope="col" width="60%" class="font-weight-normal small align-middle font-weight-bold">
                        DOCUMENT</th>
                    <th scope="col" width="10%" class="font-weight-normal small align-middle font-weight-bold">
                        DATE
                        RECEIVED</th>
                    <th scope="col" width="25%" class="font-weight-normal small align-middle font-weight-bold">
                        REMARKS
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($documents['all']["entrance"] as $key => $document)
                    <tr>
                        <td class="text-center font-weight-bold">{{ $key + 1 }}.</td>
                        <td>{!! sprintf('<span>%s</span>', $document->docu_name) !!} @if ($document->subm_documentType)
                                · <i class="small">{{ $document->subm_documentType }}</i>
                            @endif
                        </td>
                        <td>{{ $document->subm_dateSubmitted ? date('m/d/Y', strtotime($document->subm_dateSubmitted)) : '' }}
                        </td>
                        <td></td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center py-3" colspan="4"> No available documents.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        <table class="table table-bordered table-sm">
            <thead>
                <tr class="table-active bg-secondary">
                    <th scope="col" colspan="4" class="py-3"><span class="text-uppercase">RECORDS
                            Documents</span>
                    </th>
                </tr>
                <tr class="table-active">
                    <th scope="col" width="5%"
                        class="text-center font-weight-normal small align-middle font-weight-bold">NO.</th>
                    <th scope="col" width="60%" class="font-weight-normal small align-middle font-weight-bold">
                        DOCUMENT</th>
                    <th scope="col" width="10%" class="font-weight-normal small align-middle font-weight-bold">
                        DATE
                        RECEIVED</th>
                    <th scope="col" width="25%" class="font-weight-normal small align-middle font-weight-bold">
                        REMARKS
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (sizeOf($documents['all']['records']) >= 1 || sizeOf($documents['default']['records']['regcert']) >= 1)
                    @foreach ($documents['all']['records'] as $key => $document)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $key + 1 }}.</td>
                            <td>{!! sprintf('<span>%s</span> · <i class="small">%s</i>', $document->docu_name, $document->subm_documentType) !!}</td>
                            <td>{{ $document->subm_dateSubmitted ? date('m/d/Y', strtotime($document->subm_dateSubmitted)) : '' }}
                            </td>
                            <td></td>
                        </tr>
                    @endforeach

                    @if (sizeOf($documents['default']['records']['regcert']) >= 1)
                        <tr>
                            <td class="text-center" colspan="4">Registration Certificates</td>
                        </tr>

                        @foreach ($documents['default']['records']['regcert'] as $key => $regcert)
                            <tr>
                                <td class="text-center font-weight-bold">{{ $key + 1 }}.</td>
                                <td>{!! sprintf('SY %s-%s', $regcert->subm_documentType, $regcert->subm_documentType + 1) !!}
                                    @if ($regcert->subm_documentType_1)
                                        · <span class="small">{{ $regcert->subm_documentType_1 }}
                                            @endif @if ($regcert->subm_documentType_2)
                                                - {{ $regcert->subm_documentType_2 }}
                                            @endif
                                        </span>

                                </td>
                                <td>{{ $regcert->subm_dateSubmitted ? date('m/d/Y', strtotime($regcert->subm_dateSubmitted)) : '' }}
                                </td>
                                <td></td>
                            </tr>
                        @endforeach
                    @endif
                @else
                    <tr>
                        <td class="text-center py-3" colspan="4"> No available documents.</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

    <div>
        <table class="table table-bordered table-sm">

            <thead>
                <tr class="table-active bg-secondary">
                    <th scope="col" colspan="4" class="py-3"><span class="text-uppercase">EXIT Documents</span>
                    </th>
                </tr>
                <tr class="table-active">
                    <th scope="col" width="5%"
                        class="text-center font-weight-normal small align-middle font-weight-bold">NO.</th>
                    <th scope="col" width="60%" class="font-weight-normal small align-middle font-weight-bold">
                        DOCUMENT</th>
                    <th scope="col" width="10%" class="font-weight-normal small align-middle font-weight-bold">
                        DATE
                        RECEIVED</th>
                    <th scope="col" width="25%" class="font-weight-normal small align-middle font-weight-bold">
                        REMARKS
                    </th>
                </tr>
            </thead>
            <tbody>
                @if ($student->stud_academicStatus == 'GRD' || $student->stud_academicStatus == 'DIS')
                    @forelse ($documents['all']["exit"] as $key => $document)
                        <tr>
                            <td class="text-center font-weight-bold">{{ $key + 1 }}.</td>
                            <td>{!! sprintf('<span>%s</span> · <i class="small">%s</i>', $document->docu_name, $document->subm_documentType) !!}</td>
                            <td>{{ $document->subm_dateSubmitted ? date('m/d/Y', strtotime($document->subm_dateSubmitted)) : '' }}
                            </td>
                            <td></td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center py-3" colspan="4"> No available documents.</td>
                        </tr>
                    @endforelse
                @else
                    <tr>
                        <td class="text-center py-3" colspan="4"> This is applicable for student with
                            <b>Graduated</b> and <b>Honorable Dismissed</b> <br>academic status only.
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>

</html>
