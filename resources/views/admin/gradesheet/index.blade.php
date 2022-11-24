@extends('layouts.fluid')

@section('styles')
    <style>
        .menu-state-bg-light-primary .menu-item.hover:not(.here)>.menu-hover-warning:not(.disabled):not(.active):not(.here),
        .menu-state-bg-light-primary .menu-item:not(.here) .menu-hover-warning:hover:not(.disabled):not(.active):not(.here) {
            transition: color .2s ease, background-color .2s ease;
            background-color: #fff5f8;
            color: #f1416c;
        }

        .menu-state-bg-light-primary .menu-item.hover:not(.here)>.menu-hover-warning:not(.disabled):not(.active):not(.here) .menu-title,
        .menu-state-bg-light-primary .menu-item:not(.here) .menu-hover-warning:hover:not(.disabled):not(.active):not(.here) .menu-title {
            color: #f1416c;
        }

        .swal2-icon.swal2-warning {
            border-color: #f1416c;
            color: #f1416c;
        }
    </style>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">

            @include('admin.gradesheet.includes.alert')

            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-duotone fa-magnifying-glass fs-4"></i></span>
                                <input type="text" gradesheet-table-filter-search class="form-control"
                                    placeholder="Search" />
                                <span class="input-group-text p-0"> <select class="form-select form-select-solid"
                                        data-hide-search="true" data-control="select2" data-placeholder="Search by"
                                        data-dropdown-parent="#kt_content_container" gradesheet-search-by>
                                        <option value="0" selected>Subject Code</option>
                                        <option value="1">Subject Description</option>
                                        <option value="2">Section</option>
                                        <option value="5">Instructor</option>
                                    </select></span>
                            </div>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            <button data-kt-student-profile-filter-button type="button" class="btn btn-light-primary me-3"
                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="fa-solid fa-filter me-2 fs-3"></i>Filter
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge badge-circle badge-dark"
                                    hidden data-kt-student-profile-filter-counter>0</span>
                            </button>
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true"
                                data-kt-student-profile-filter="form">
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bold">Filter Options</div>
                                </div>
                                <div class="separator border-gray-200"></div>
                                <div class="px-7 py-5" data-kt-student-profile="form">
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Course</label>
                                        <select data-kt-student-profile-filter-type="select"
                                            class="form-select form-select-solid fw-bold" data-placeholder="Select option"
                                            data-allow-clear="true" data-kt-student-profile-filter-field="course"
                                            data-kt-student-profile-filter-column="2">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Admission Year</label>
                                        <select data-kt-student-profile-filter-type="select"
                                            class="form-select form-select-solid fw-bold" data-placeholder="Select option"
                                            data-allow-clear="true" data-kt-student-profile-filter-field="admissionYear"
                                            data-kt-student-profile-filter-column="4">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Academic Status</label>
                                        <select data-kt-student-profile-filter-type="select"
                                            class="form-select form-select-solid fw-bold" data-control="select2"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-student-profile-filter-column="3">
                                            {{-- 'UNG - Undergraduate', 'RTN - Returnee', 'DIS - Honorable Dismissal', 'GRD - Graduated' --}}
                                            <option></option>
                                            <option value="UNG">Undergraduate</option>
                                            <option value="RTN">Returnee</option>
                                            <option value="DIS">Honorable Dismissal</option>
                                            <option value="GRD">Graduated</option>
                                            <option value="NA">------------ Undefined ------------</option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Record type</label>
                                        <div class="d-flex">
                                            <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                                                <input data-kt-student-profile-filter-column="5"
                                                    name="student_profile_filter_recordType" class="form-check-input"
                                                    data-kt-student-profile-filter-type="radioBtn" type="radio"
                                                    value="SIS" id="student_profile_sis">
                                                <span class="form-check-label" for="student_profile_sis">SIS</span>
                                            </label>
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input data-kt-student-profile-filter-column="5"
                                                    name="student_profile_filter_recordType" class="form-check-input"
                                                    data-kt-student-profile-filter-type="radioBtn" type="radio"
                                                    value="NONSIS" id="student_profile_nonsis">
                                                <span class="form-check-label" for="student_profile_nonsis">NON-SIS</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="separator my-10 opacity-75"></div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Created at</label>
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <input class="form-control form-control-solid rounded rounded-end-0"
                                                    placeholder="Pick date range"
                                                    data-kt-student-profile-filter-type="flatPickr"
                                                    data-kt-student-profile-filter-field="createdAt"
                                                    data-kt-student-profile-filter-column="6" />
                                                <button class="btn btn-icon btn-light"
                                                    data-kt-student-profile-filter-clear="createdAt">
                                                    <span class="svg-icon svg-icon-5">
                                                        <i class="fa-light fa-xmark"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-10">
                                        <label class="form-label fw-semibold">Updated at</label>
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <input class="form-control form-control-solid rounded rounded-end-0"
                                                    placeholder="Pick date range"
                                                    data-kt-student-profile-filter-type="flatPickr"
                                                    data-kt-student-profile-filter-field="updatedAt"
                                                    data-kt-student-profile-filter-column="7" />
                                                <button class="btn btn-icon btn-light"
                                                    data-kt-student-profile-filter-clear="updatedAt">
                                                    <span class="svg-icon svg-icon-5">
                                                        <i class="fa-light fa-xmark"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                            data-kt-menu-dismiss="true"
                                            data-kt-student-profile-filter-action="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-semibold px-6"
                                            data-kt-menu-dismiss="true"
                                            data-kt-student-profile-filter-action="apply">Apply</button>
                                    </div>
                                </div>
                            </div>

                            <a href="{{ url('gradesheet/create') }}" class="btn btn-primary">Add Gradesheet</a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="kt_student_grades_table" class="align-middle table table-row-bordered gy-7 gs-10">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px" data-priority="2">Subject Code</th>
                                <th class="min-w-250px" data-priority="3">Description</th>
                                <th class="min-w-75px" data-priority="5">Section</th>
                                <th class="min-w-250px">Schedule (Day / Time / Room)</th>
                                <th class="min-w-250px" data-priority="6">Semester & Academic Year</th>
                                <th class="min-w-200px" data-priority="7">Instructor</th>
                                <th data-priority="4">Total Enrolled Students</th>
                                <th>Created at</th>
                                <th class="min-w-150px">Last update</th>
                                <th class="min-w-150px" class="text-end" data-priority="1"></th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            var table = $("#kt_student_grades_table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 2000,
                ajax: {
                    url: "{{ url('/gradesheet/fetch-all') }}",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'subject_code',
                        name: 'subject_code'
                    },
                    {
                        data: 'subject_name',
                        name: 'subject_name'
                    },
                    {
                        data: 'section',
                        name: 'section'
                    },
                    {
                        data: 'schedule',
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'semester_sy',
                        name: 'sche_acadYear'
                    },
                    {
                        data: 'instructor',
                        name: 'instructor'
                    },
                    {
                        data: 'enrolled_student_count',
                        searchable: false,
                    },
                    {
                        data: 'created_at',
                        name: 'class_createdAt',
                        searchable: false,
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        searchable: false,
                        render: function(data, type) {
                            if (type === 'display' && data) {

                                return '<div class="badge badge-light fw-bolder">' + moment(
                                    data).fromNow() + '</div>';
                            }

                            return data;
                        },
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false,
                        className: "text-end",
                    },
                ],
                order: [
                    [7, 'desc']
                ],
            });

            table.on('draw', function() {
                KTMenu.createInstances();
            });

            // Search bar
            const resetSearch = function() {
                $("[gradesheet-search-by] option").each((e, n) => {
                    table.column($(n).attr("value")).search("").draw();
                })
            }

            $('[gradesheet-table-filter-search]').on('keyup', function(e) {
                table.column($('[gradesheet-search-by]').val()).search($(this).val())
                    .draw();
            });

            $('[gradesheet-search-by]').on('change', function(e) {
                resetSearch();
                $('[gradesheet-table-filter-search]').val('');
            })
        }));
    </script>
@endsection
