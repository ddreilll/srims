@extends('layouts.admin')


@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <div class="card mb-5 mb-xl-8">

                        @if ($stud_profile->stud_isGraduated === 'YES')
                            <div class="card-header justify-content-end ribbon ribbon-start">
                                <div class="ribbon-label bg-primary">Graduated</div>
                                <div class="card-title text-end">
                                    <p class="mb-0 fs-6" style="line-height:17px;">
                                        {{ date('F d, Y', strtotime($stud_profile->stud_dateGraduated)) }}<br><span
                                            class="text-muted fs-7">Date Graduated</span></p>
                                </div>
                            </div>
                        @endif


                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <div class="symbol symbol-100px symbol-circle mb-7">
                                    <img src="{{ asset('/assets/media/avatar/avatar_main.png') }}" alt="image" />
                                </div>
                                <a href="#"
                                    class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{ $stud_profile->stud_fullName }}</a>
                                <div class="fs-5 fw-bold text-muted mb-3">{{ $stud_profile->stud_course }}</div>

                                {!! $stud_profile->stud_admissionType == 'FRESHMEN' ? '<span class="badge badge-light-success">Freshmen</span>' : '<span class="badge badge-light-dark">TRANSFEREE</span>' !!}

                                <div class="d-flex flex-wrap flex-center mt-10">

                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700 text-center">
                                            <span data-kt-countup="true" data-kt-countup-value="{{ $stud_total_semester }}">0</span>
                                        </div>
                                        <div class="fw-bold text-muted">Total Semester</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 ms-4 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700 text-center">
                                           
                                            <span data-kt-countup="true" data-kt-countup-value="{{ $stud_total_summer_semester }}">0</span>
                                        </div>
                                        <div class="fw-bold text-muted">Summer</div>
                                    </div>

                                </div>
                            </div>
                        </div>
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
                                        {{ $stud_profile->stud_addressLine .', ' .$stud_profile->stud_addressCity .', ' .$stud_profile->stud_addressProvince }}
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
                                    <div class="text-gray-700">Admission</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_admissionType }}</div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="text-gray-700">Year of Admission</div>
                                    <div class="fw-bolder">{{ $stud_profile->stud_yearOfAdmission }}</div>
                                </div>
                            </div>

                            {{-- <div class="card my-10 mb-xl-9">
                                <div class="card-header ps-0 border-dashed border-bottom-1 border-0 border-gray-300" style="min-height:45px">
                                    <div class="card-title">
                                        <h5 class="fs-3 text-gray-800">SCHOOLS ATTENDED</h5>
                                    </div>
                                    <div class="card-toolbar">
                                        <ul class="nav nav-stretch fs-6 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent text-uppercase"
                                            role="tablist">
        
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_view_school_primary"> Primary </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_view_school_primary"> Secondary </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                    href="#kt_student_view_school_primary"> Tertiary </a>
                                            </li>
        
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>

                    
                    

                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-10">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_student_view_academic_records_tab">Academic Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-kt-countup-tabs="true" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_statements">Entrance Credentials </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab"
                                href="#kt_customer_view_overview_events_and_logs_tab">Change Logs </a>
                        </li>
                        <li class="nav-item ms-auto">
                            {{-- <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click"
                                data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                                <span class="svg-icon svg-icon-2 me-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                            fill="black" />
                                    </svg>
                                </span>
                            </a>
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6"
                                data-kt-menu="true">
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Payments</div>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link px-5">Create invoice</a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link flex-stack px-5">Create payments
                                        <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                            title="Specify a target name for future usage and reference"></i></a>
                                </div>
                                <div class="menu-item px-5" data-kt-menu-trigger="hover"
                                    data-kt-menu-placement="left-start">
                                    <a href="#" class="menu-link px-5">
                                        <span class="menu-title">Subscription</span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <div class="menu-sub menu-sub-dropdown w-175px py-4">
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Apps</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Billing</a>
                                        </div>
                                        <div class="menu-item px-3">
                                            <a href="#" class="menu-link px-5">Statements</a>
                                        </div>
                                        <div class="separator my-2"></div>
                                        <div class="menu-item px-3">
                                            <div class="menu-content px-3">
                                                <label class="form-check form-switch form-check-custom form-check-solid">
                                                    <input class="form-check-input w-30px h-20px" type="checkbox" value=""
                                                        name="notifications" checked="checked"
                                                        id="kt_user_menu_notifications" />
                                                    <span class="form-check-label text-muted fs-6"
                                                        for="kt_user_menu_notifications">Notifications</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator my-3"></div>
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link px-5">Reports</a>
                                </div>
                                <div class="menu-item px-5 my-1">
                                    <a href="#" class="menu-link px-5">Account Settings</a>
                                </div>
                                <div class="menu-item px-5">
                                    <a href="#" class="menu-link text-danger px-5">Delete customer</a>
                                </div>
                            </div> --}}
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="kt_student_view_academic_records_tab" role="tabpanel">

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
                                                                <h3 class="card-title">{{ $semester->term_name }}
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

                        <div class="tab-pane fade" id="kt_customer_view_overview_events_and_logs_tab" role="tabpanel">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-body">Hold on, we're launching this very soon <br>We are working very hard to give you the best experience possible!</div>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="kt_customer_view_overview_statements" role="tabpanel">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-body">Hold on, we're launching this very soon <br>We are working very hard to give you the best experience possible!</div>
                            </div>
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
