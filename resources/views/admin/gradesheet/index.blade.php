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
                                        <label class="form-label fs-6 fw-semibold">Subject</label>
                                        <select data-kt-student-profile-filter-type="select" class="form-select  fw-bold"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-student-profile-filter-field="subject"
                                            data-kt-student-profile-filter-column="0">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Academic Year</label>
                                        <select data-kt-student-profile-filter-type="select" class="form-select  fw-bold"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-student-profile-filter-field="academicYear"
                                            data-kt-student-profile-filter-column="4">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Semester</label>
                                        <select data-kt-student-profile-filter-type="select" class="form-select  fw-bold"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-student-profile-filter-field="semester"
                                            data-kt-student-profile-filter-column="4">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="mb-5">
                                        <label class="form-label fs-6 fw-semibold">Instructor</label>
                                        <select data-kt-student-profile-filter-type="select" class="form-select  fw-bold"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-student-profile-filter-field="instructor"
                                            data-kt-student-profile-filter-column="5">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="separator my-10 opacity-75"></div>
                                    <div class="mb-5">
                                        <label class="form-label fw-semibold">Created at</label>
                                        <div class="d-flex">
                                            <div class="input-group">
                                                <input class="form-control  rounded rounded-end-0"
                                                    placeholder="Pick date range"
                                                    data-kt-student-profile-filter-type="flatPickr"
                                                    data-kt-student-profile-filter-field="createdAt"
                                                    data-kt-student-profile-filter-column="7" />
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
                                                <input class="form-control  rounded rounded-end-0"
                                                    placeholder="Pick date range"
                                                    data-kt-student-profile-filter-type="flatPickr"
                                                    data-kt-student-profile-filter-field="updatedAt"
                                                    data-kt-student-profile-filter-column="8" />
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
                    <table id="gradesheet_table" class="align-middle table table-row-bordered gy-7 gs-10">
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

            var table = $("#gradesheet_table").DataTable({
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
                        name: 'sche_acadYear',
                        searchable: false,
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
                            } else {
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
                drawCallback: function(settings, json) {
                    KTMenu.createInstances();

                    initializedFormSubmitConfirmation(`[gradesheet-destroy="true"]`,
                        `-gradesheet-destroy`,
                        "delete", "danger", "warning");
                }
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
            });

            let filter_createdAt = $('[data-kt-student-profile-filter-field="createdAt"]').flatpickr({
                altInput: !0,
                altFormat: 'm/d/Y',
                dateFormat: 'Y-m-d',
                mode: 'range',
            });

            let filter_updatedAt = $('[data-kt-student-profile-filter-field="updatedAt"]').flatpickr({
                altInput: !0,
                altFormat: 'm/d/Y',
                dateFormat: 'Y-m-d',
                mode: 'range',
            });


            const resetFilter = function() {
                // Clear all flatpickr inputs
                filter_createdAt.clear();
                filter_updatedAt.clear();

                // Dynamically clear all remaining inputs
                $('[data-kt-student-profile-filter="form"] :radio:checked, [data-kt-student-profile-filter="form"] [data-kt-student-profile-filter-type="select"], [data-kt-student-profile-filter="form"] [data-kt-student-profile-filter-type="flatPickr"]')
                    .each((e, n) => {
                        table.column($(n).attr('data-kt-student-profile-filter-column')).search("")
                            .draw();

                        switch ($(n).attr('data-kt-student-profile-filter-type')) {
                            case 'radioBtn':
                                $(n).prop('checked', false);
                                break;

                            case 'select':
                                $(n).val('').trigger('change');
                                break;
                        }

                    })
            }

            const showFilterCounter = function(show, count) {
                if (show) {
                    $("[data-kt-student-profile-filter-button]").removeClass('me-3');
                    $("[data-kt-student-profile-filter-button]").addClass('me-5 position-relative');

                    $("[data-kt-student-profile-filter-counter]").attr('hidden', false);
                    $("[data-kt-student-profile-filter-counter]").text(count);
                } else {
                    $("[data-kt-student-profile-filter-button]").removeClass('me-5 position-relative');
                    $("[data-kt-student-profile-filter-button]").addClass('me-3');

                    $("[data-kt-student-profile-filter-counter]").attr('hidden', true);
                }
            }

            $('[data-kt-student-profile-table-filter-search]').on('keyup', function(e) {
                table.column($('[data-kt-student-profile-search-by]').val()).search($(this).val())
                    .draw();
            });

            $('[data-kt-student-profile-search-by]').on('change', function(e) {
                resetSearch();
                $('[data-kt-student-profile-table-filter-search]').val('');
            })

            $('[data-kt-student-profile-filter-field="subject"]').select2({
                ajax: {
                    url: "{{ url('/subject/select2') }}",
                    type: "POST",
                    dataType: 'json',
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            term: params.term || '',
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    },
                    cache: true,
                },
                language: {
                    searching: function() {
                        return "{{ __('ajax.retrieving_data', ['data' => 'course']) }}";
                    }
                },
            });

            $('[data-kt-student-profile-filter-field="academicYear"]').select2({
                ajax: {
                    url: "{{ url('/select2/settings/school-year/base') }}",
                    type: "POST",
                    dataType: 'json',
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            term: params.term || '',
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    },
                    cache: true,
                },
                language: {
                    searching: function() {
                        return "{{ __('ajax.retrieving_data', ['data' => 'years']) }}";
                    }
                },
            });

            $('[data-kt-student-profile-filter-field="semester"]').select2({
                ajax: {
                    url: "{{ url('/settings/semester/select2') }}",
                    type: "POST",
                    dataType: 'json',
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            term: params.term || '',
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    },
                    cache: true,
                },
                language: {
                    searching: function() {
                        return "{{ __('ajax.retrieving_data', ['data' => 'semester']) }}";
                    }
                },
            });


            $(`[data-kt-student-profile-filter-field="instructor"]`).select2({
                ajax: {
                    url: "{{ url('/instructor/select2') }}",
                    type: "POST",
                    dataType: 'json',
                    data: function(params) {
                        return {
                            _token: "{{ csrf_token() }}",
                            term: params.term || '',
                            page: params.page || 1
                        };
                    },
                    processResults: function(data, params) {
                        params.page = params.page || 1;
                        return {
                            results: data.results,
                            pagination: {
                                more: (params.page * 10) < data.count_filtered
                            }
                        };
                    },
                    cache: true,
                },
                templateResult: function(item) {

                    if (!item.id) {
                        return item.text;
                    }

                    var span = document.createElement('span');
                    var template = '';

                    template += '<div class="d-flex align-items-center">';
                    template += '<div class="d-flex flex-column">'
                    template += '<span class="lh-2">ENo.: <span class="fw-bolder">' + item.emp_no +
                        '</span></span>';
                    template += '<span class="fw-bold">' + item.full_name + '</span>';
                    template += '</div>';
                    template += '</div>';

                    span.innerHTML = template;

                    return $(span);
                },
                templateSelection: function(item) {

                    if (!item.full_name) {
                        return item.text;
                    }

                    return item.full_name;
                },
                language: {
                    searching: function() {
                        return "{{ __('ajax.retrieving_data', ['data' => 'instructors']) }}";
                    }
                },
            });

            $('[data-kt-student-profile-filter-clear="createdAt"]').on("click", function() {
                filter_createdAt.clear();
            })

            $('[data-kt-student-profile-filter-clear="updatedAt"]').on("click", function() {
                filter_updatedAt.clear();
            })

            $('[data-kt-student-profile-filter-action="apply"]').on("click", function() {
                filterCount = 0;

                $('[data-kt-student-profile-filter="form"] :radio:checked, [data-kt-student-profile-filter="form"] [data-kt-student-profile-filter-type="select"], [data-kt-student-profile-filter="form"] [data-kt-student-profile-filter-type="flatPickr"]')
                    .each((e, n) => {
                        filterCount += ($(n).val()) ? 1 : 0;

                        table.column($(n).attr('data-kt-student-profile-filter-column')).search($(n)
                                .val())
                            .draw();
                    })

                if (filterCount >= 1) {
                    showFilterCounter(true, filterCount);
                } else {
                    showFilterCounter(false);
                }

            })

            $('[data-kt-student-profile-filter-action="reset"]').on("click", function() {

                resetFilter();
                showFilterCounter(false);
            })
        }));
    </script>
@endsection
