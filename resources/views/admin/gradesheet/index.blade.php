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
                    url: "{{ route('admin.gradesheet.index') }}",
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
                        render: function(data, type, row) {

                            if (row.enrolled_student_total > 1) {
                                return `${data}/<span class="fw-bolder">${row.enrolled_student_total}</span>`;
                            }else {
                                return data;
                            }

                            return data;
                        },
                        className: "text-center"
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
