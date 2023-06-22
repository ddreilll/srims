@extends('layouts.fluid')

@section('styles')
    <style>
        .daterangepicker.show-calendar .ranges {
            height: 0px;
        }
    </style>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="alert alert-danger d-flex align-items-center p-5 mb-10">
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                    <i class="fa-duotone fa-circle-info"></i>
                </span>
                <div class="d-flex flex-column">
                    <h4 class="mb-1 text-danger">Take note</h4>
                    <span>This only applies to <b>NON SIS Students</b> only</span>
                </div>
            </div>
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-student-grades-table-filter="search"
                                class="form-control  w-250px ps-15" placeholder="Search" />
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
                                <th class="text-end" data-priority="1">Action</th>
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
                ajax: {
                    url: "{{ url('/ajax/class/retrieve-all') }}",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error_reload("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'subject_code',
                        name: 'subj_code'
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

            $('[data-kt-student-grades-table-filter="search"]').on('keyup', function(e) { // Search bar 
                table.search(e.target.value).draw();
            });
        }));
    </script>
@endsection
