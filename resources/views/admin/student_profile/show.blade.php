@extends('layouts.fluid')


@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <div class="card mb-5 mb-xl-8">

                        @switch($stud_profile->stud_academicStatus)
                            @case('REG')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-success">Regular</div>
                                    <div class="card-title">
                                    </div>
                                </div>
                            @break

                            @case('RTN')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-warning text-dark">Returnee</div>
                                    <div class="card-title">
                                    </div>
                                </div>
                            @break

                            @case('INC')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-secondary text-dark">Inactive</div>
                                    <div class="card-title">
                                    </div>
                                </div>
                            @break

                            @case('UNK')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-dark">Unknown</div>
                                    <div class="card-title">
                                    </div>
                                </div>
                            @break

                            @case('DIS')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-danger">Dismissed</div>
                                    <div class="card-title">
                                    </div>
                                </div>
                            @break


                            @case('GRD')
                                <div class="card-header justify-content-end ribbon ribbon-start">
                                    <div class="ribbon-label bg-primary">Graduated</div>
                                    <div class="card-title text-end">
                                        <p class="mb-0 fs-6" style="line-height:17px;">
                                            {{ date('F d, Y', strtotime($stud_profile->stud_dateExited)) }}<br><span
                                                class="text-muted fs-7">Date Graduated</span></p>
                                    </div>
                                </div>
                            @break

                            @default
                        @endswitch
                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset('/assets/media/avatar/avatar_main.png') }}" alt="image" />
                                </div>
                                <p class="mb-1 text-gray-800 fw-boldest fs-5">{{ $stud_profile->stud_studentNo }}</p>
                                <p class="fs-3 fw-bolder mb-1">
                                    {{ $stud_profile->stud_lastName . ', ' . $stud_profile->stud_firstName . ($stud_profile->stud_middleName ? ' ' . substr($stud_profile->stud_middleName, 0, 1) . '.' : '') }}</a>
                                <div class="fs-5 fw-bold text-muted mb-3">{{ $stud_profile->stud_course }}</div>

                                {!! $stud_profile->stud_recordType == 'SIS' ? '<span class="badge badge-warning fs-6">SIS Record</span>' : '<span class="badge badge-light-dark fs-6">NON-SIS Record</span>' !!}

                                @if ($stud_profile->stud_recordType == 'NONSIS')
                                    <div class="d-flex flex-wrap flex-center mt-10">

                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700 text-center">
                                                <span data-kt-countup="true"
                                                    data-kt-countup-value="{{ $stud_total_semester }}">0</span>
                                            </div>
                                            <div class="fw-bold text-muted">Total Semester</div>
                                        </div>

                                        <div class="border border-gray-300 border-dashed rounded py-3 px-3 ms-4 mb-3">
                                            <div class="fs-4 fw-bolder text-gray-700 text-center">

                                                <span data-kt-countup="true"
                                                    data-kt-countup-value="{{ $stud_total_summer_semester }}">0</span>
                                            </div>
                                            <div class="fw-bold text-muted">Summer</div>
                                        </div>

                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                    @if ($stud_profile->stud_isHonorableDismissed == "YES")
                    <div class="card bg-danger">
                        <div class="card-body text-center text-light fw-bold fs-5">

                            {!! $stud_profile->stud_honorableDismissedStatus == "ISSUED" ? 'Issued' : 'Granted' !!} Honorable Dismissed on {!! date('M d, Y', strtotime($stud_profile->stud_honorableDismissedDate)) !!} 

                            @if ($stud_profile->stud_honorableDismissedStatus == "GRANTED")
                                <p class="mb-0 mt-2">COPY FOR: <span class="fw-boldest">{{ $stud_profile->stud_honorableDismissedSchool }}</span></p>
                            @endif

                           
                        </div>
                    </div>
                    @endif
                   

                    <div class="d-flex flex-center mt-5">
                        <a href="{{ url('/student/profile/') }}/{{ $stud_profile->stud_uuid }}/edit"
                            class="btn btn-secondary mt-3"><i class="fas fa-user-edit fs-4 me-2"></i>Edit Profile</a>
                    </div>

                </div>


                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="card mb-5">
                        <div class="card-body fs-6">
                            <h5 class="fs-3 text-gray-800">PERSONAL INFORMATION</h5>
                            <div class="separator separator-dashed mt-3 mb-7"></div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="text-gray-700">Full name</div>
                                    <div class="fw-bolder">
                                        {{ $stud_profile->stud_firstName . ' ' . $stud_profile->stud_middleName . ' ' . $stud_profile->stud_lastName }}
                                    </div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="text-gray-700">Permanent Address</div>
                                    <div class="fw-bolder">
                                        {{ $stud_profile->stud_addressLine }} <br>
                                        {{ $stud_profile->stud_addressCity }} <br>
                                        {{ $stud_profile->stud_addressProvince }}
                                    </div>
                                </div>

                            </div>

                            <h5 class="mt-10 fs-3 text-gray-800">STUDENT DETAILS</h5>
                            <div class="separator separator-dashed mt-3 mb-7"></div>

                            <div class="row mb-5">
                                <div class="col-sm-4">
                                    <div class="text-gray-700">Student Number</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_studentNo }}</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-gray-700">Course</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_course_name }}
                                        ({{ $stud_profile->stud_course }})</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="text-gray-700">Admission type</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_admissionType }}</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-gray-700">Year of Admission</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_yearOfAdmission }}</div>
                                </div>
                            </div>

                            <div class="card mt-10 mb-0">
                                <div class="card-header ps-0 border-dashed border-bottom-1 border-0 border-gray-300"
                                    style="min-height:45px">
                                    <div class="card-title">
                                        <h5 class="fs-3 text-gray-800">SCHOOLS ATTENDED</h5>
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-stretch fs-6 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent text-uppercase"
                                            role="tablist">

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                    role="tab" href="#kt_student_view_school_primary"> Primary </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_view_school_secondary"> Secondary </a>
                                            </li>

                                            @if ($stud_profile->stud_admissionType == 'TRANSFEREE')
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                        href="#kt_student_view_school_tertiary"> Tertiary </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body px-0 py-10">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="kt_student_view_school_primary"
                                            role="tabpanel">
                                            @if ($stud_profile->stud_sPrimary)
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <div class="text-gray-700">School</div>
                                                        <div class="fw-bolder">
                                                            {{ $stud_profile->stud_sPrimary->extsch_name }}</div>
                                                    </div>
                                                    <div class="w-25">
                                                        <div class="text-gray-700">Year Graduated</div>
                                                        <div class="fw-bolder">
                                                            {{ $stud_profile->stud_sPrimary->extsch_yearExit }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-flex flex-center">
                                                    <p class="mb-0 mt-3">No available school information</p>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="tab-pane fade" id="kt_student_view_school_secondary" role="tabpanel">
                                            @if ($stud_profile->stud_sSecondary)
                                                <div class="d-flex justify-content-between">
                                                    <div>
                                                        <div class="text-gray-700">School</div>
                                                        <div class="fw-bolder">
                                                            {{ $stud_profile->stud_sSecondary->extsch_name }}</div>
                                                    </div>
                                                    <div class="w-25">
                                                        <div class="text-gray-700">Year Graduated</div>
                                                        <div class="fw-bolder">
                                                            {{ $stud_profile->stud_sSecondary->extsch_yearExit }}</div>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="d-flex flex-center">
                                                    <p class="mb-0 mt-3">No available school information</p>
                                                </div>
                                            @endif
                                        </div>

                                        @if ($stud_profile->stud_admissionType == 'TRANSFEREE')

                                            <div class="tab-pane fade" id="kt_student_view_school_tertiary"
                                                role="tabpanel">
                                                @if (sizeOf($stud_profile->stud_sTertiary) >= 1)
                                                    <div class="d-flex justify-content-between">
                                                        <div>
                                                            <div class="text-gray-700">School</div>
                                                            <div class="fw-bolder">
                                                                {{ $stud_profile->stud_sTertiary[0]->extsch_name }}</div>
                                                        </div>
                                                        <div class="w-25">
                                                            <div class="text-gray-700">Year Exited</div>
                                                            <div class="fw-bolder">
                                                                {{ $stud_profile->stud_sTertiary[0]->extsch_yearExit }}
                                                            </div>
                                                        </div>
                                                    </div>

                                                    @for ($i = 1; $i < sizeOf($stud_profile->stud_sTertiary); $i++)
                                                        <div class="d-flex justify-content-between mt-2">
                                                            <div>
                                                                <div class="text-gray-700">School</div>
                                                                <div class="fw-bolder">
                                                                    {{ $stud_profile->stud_sTertiary[$i]->extsch_name }}
                                                                </div>
                                                            </div>
                                                            <div class="w-25">
                                                                <div class="text-gray-700">Year Exited</div>
                                                                <div class="fw-bolder">
                                                                    {{ $stud_profile->stud_sTertiary[$i]->extsch_yearExit }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endfor
                                                @else
                                                    <div class="d-flex flex-center">
                                                        <p class="mb-0 mt-3">No available school information</p>
                                                    </div>
                                                @endif
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-10">
                        @if ($stud_profile->stud_recordType == 'NONSIS')
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_student_view_academic_records_tab">Academic Records</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 {!! $stud_profile->stud_recordType == 'SIS' ? 'active' : '' !!}"
                                data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_statements">Envelope Documents
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_events_and_logs_tab">Activity </a>
                        </li>
                        <li class="nav-item ms-auto">
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">

                        @if ($stud_profile->stud_recordType == 'NONSIS')
                            <div class="tab-pane fade show active" id="kt_student_view_academic_records_tab"
                                role="tabpanel">

                                @if (sizeOf($stud_grades) >= 1)
                                    <div class="card mb-6 mb-xl-9">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>Grades</h2>
                                            </div>
                                            <div class="card-toolbar">
                                                <ul class="nav nav-stretch fs-5 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent"
                                                    role="tablist">

                                                    @for ($a = 0; $a < sizeOf($stud_grades); $a++)
                                                        <li class="nav-item" role="presentation">
                                                            <a class="nav-link text-active-primary {{ $a == sizeOf($stud_grades) - 1 ? 'active' : '' }}"
                                                                data-bs-toggle="tab" role="tab"
                                                                href="#kt_customer_view_grades_{{ $stud_grades[$a]->acad_year }}">{{ $stud_grades[$a]->acad_year_short }}</a>
                                                        </li>
                                                    @endfor

                                                </ul>
                                            </div>
                                        </div>

                                        <div class="card-body pb-5">
                                            <div id="kt_customer_view_statement_tab_content" class="tab-content">

                                                @for ($b = 0; $b < sizeOf($stud_grades); $b++)
                                                    <div id="kt_customer_view_grades_{{ $stud_grades[$b]->acad_year }}"
                                                        class="py-0 tab-pane fade {{ $b == sizeOf($stud_grades) - 1 ? 'show active' : '' }}"
                                                        role="tabpanel">

                                                        @foreach ($stud_grades[$b]->semesters as $semester)
                                                            <div class="card border border-1 mb-5">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">
                                                                        {{ $semester->term_name }}
                                                                    </h3>
                                                                </div>
                                                                <div class="card-body">

                                                                    <table
                                                                        class="table align-middle table-row-dashed fs-6 text-gray-600 fw-bold gy-4">
                                                                        <thead class="border-bottom border-gray-200">
                                                                            <tr
                                                                                class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                                                <th>No.</th>
                                                                                <th>Subject Code</th>
                                                                                <th>Description</th>
                                                                                <th>Faculty name</th>
                                                                                <th>Units</th>
                                                                                <th>Section code</th>
                                                                                <th>Final grade</th>
                                                                                <th>Grade status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>

                                                                            @for ($i = 0; $i < sizeof($semester->subjects); $i++)
                                                                                <tr>
                                                                                    <td> {{ $i + 1 }} </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_subj_code'] }}
                                                                                    </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_subj_name'] }}
                                                                                    </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_inst_fullName'] }}
                                                                                    </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_subj_units'] }}
                                                                                    </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_sche_section'] }}
                                                                                    </td>
                                                                                    <td> {{ $semester->subjects[$i]['enrsub_grade_display'] }}
                                                                                    </td>
                                                                                </tr>
                                                                            @endfor

                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        @endforeach

                                                    </div>
                                                @endfor

                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="card mb-6 mb-xl-9">
                                        <div class="card-body"> No grades has been encoded yet</div>
                                    </div>
                                @endif

                            </div>
                        @endif

                        <div class="tab-pane fade {!! $stud_profile->stud_recordType == 'SIS' ? 'show active' : '' !!}" id="kt_customer_view_overview_statements"
                            role="tabpanel">
                            <div class="card mb-6">
                                <div class="card-header py-3 border-dashed border-bottom-1 border-0 border-gray-300"
                                    style="min-height:45px">
                                    <div class="card-title">
                                        <h2 class="fs-3 text-gray-800">DOCUMENTS CATEGORY</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-stretch fs-6 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent text-uppercase"
                                            role="tablist">

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                    role="tab" href="#kt_student_documents_entrance" aria-selected="true">
                                                    Entrance </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_documents_records" aria-selected="false">
                                                    Records </a>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_documents_exit" aria-selected="false"> Exit
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="card-body py-10">
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="kt_student_documents_entrance"
                                            role="tabpanel">
                                            <ul>
                                                @foreach ($stud_documents['entrance'] as $docu)
                                                    <li class="fw-bold fs-6 mb-2">
                                                        <span class="fw-bolder">{{ $docu['docu_name'] }}</span>
                                                        @if ($docu['subm_documentType'] != null)
                                                            {{ ' · ' . $docu['subm_documentType'] }}
                                                        @endif
                                                        @if ($docu['subm_dateSubmitted'] != null)
                                                            - <em
                                                                class="fs-7 fw-normal">{{ 'Submitted on ' . date('M d, Y', strtotime($docu['subm_dateSubmitted'])) }}</em>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <div class="tab-pane fade" id="kt_student_documents_records" role="tabpanel">

                                            @if (sizeOf($stud_documents_fixed['records']['regcert']) >= 1)
                                                <div class="rounded-3 p-10 mx-5 mb-0 border-1 border border-gray-200">
                                                    <h4 class="mb-5 text-gray-800 fw-bold">Registration Certificates</h4>
                                                    <div class="d-flex flex-column">
                                                        @foreach ($stud_documents_fixed['records']['regcert'] as $regcert)
                                                            <li class="d-flex align-items-center py-1 fw-bold fs-6">
                                                                <span class="bullet bg-dark bullet-line me-3"></span>
                                                                <span class="fw-bolder me-1">
                                                                    {{ 'SY ' . $regcert['subm_documentType'] . '-\'' . substr($regcert['subm_documentType'] + 1, 2, 2) }}</span>
                                                                @if ($regcert['subm_documentType_1'] != null)
                                                                    {{ '· ' . $regcert['subm_documentType_1'] }}
                                                                @endif
                                                                @if ($regcert['subm_documentType_2'] != null)
                                                                    {{ '― ' . $regcert['subm_documentType_2'] }}
                                                                @endif
                                                                @if ($regcert['subm_dateSubmitted'] != null)
                                                                    - <em
                                                                        class="ms-1 fs-7 fw-normal">{{ 'Submitted on ' . date('M d, Y', strtotime($regcert['subm_dateSubmitted'])) }}</em>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </div>

                                                </div>
                                            @endif


                                            <div class="{!! sizeOf($stud_documents_fixed['records']['regcert']) >= 1 && sizeOf($stud_documents['records']) >= 1 ? 'p-10 pb-0 mx-5 ' : '' !!}">
                                                <h4 class="mb-5 text-gray-800 fw-bold" {!! sizeOf($stud_documents_fixed['records']['regcert']) >= 1 && sizeOf($stud_documents['records']) >= 1 ? '' : 'hidden' !!}>Other
                                                    Documents</h4>

                                                <ul>
                                                    @foreach ($stud_documents['records'] as $docu)
                                                        <li class="fw-bold fs-6 mb-2">
                                                            <span class="fw-bolder">{{ $docu['docu_name'] }}</span>
                                                            @if ($docu['subm_documentType'] != null)
                                                                {{ ' · ' . $docu['subm_documentType'] }}
                                                            @endif
                                                            @if ($docu['subm_dateSubmitted'] != null)
                                                                - <em
                                                                    class="fs-7 fw-normal">{{ 'Submitted on ' . date('M d, Y', strtotime($docu['subm_dateSubmitted'])) }}</em>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>


                                        </div>

                                        <div class="tab-pane fade" id="kt_student_documents_exit" role="tabpanel">
                                            <ul>
                                                @foreach ($stud_documents['exit'] as $docu)
                                                    <li class="fw-bold fs-6 mb-2">
                                                        <span class="fw-bolder">{{ $docu['docu_name'] }}</span>
                                                        @if ($docu['subm_documentType'] != null)
                                                            {{ ' · ' . $docu['subm_documentType'] }}
                                                        @endif
                                                        @if ($docu['subm_dateSubmitted'] != null)
                                                            - <em
                                                                class="fs-7 fw-normal">{{ 'Submitted on ' . date('M d, Y', strtotime($docu['subm_dateSubmitted'])) }}</em>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

        }));
    </script>
@endsection
