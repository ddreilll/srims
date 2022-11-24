@extends('layouts.fluid')

@section('styles')
    <style>
        .daterangepicker.show-calendar .ranges {
            height: 0px;
        }

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
                                <input type="text" data-kt-student-profile-table-filter-search class="form-control"
                                    placeholder="Search" />
                                <span class="input-group-text p-0"> <select class="form-select form-select-solid"
                                        data-hide-search="true" data-control="select2" data-placeholder="Search by"
                                        data-dropdown-parent="#kt_content_container" data-kt-student-profile-search-by>
                                        <option value="0" selected>Student No.</option>
                                        <option value="1">Name</option>
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

                            @can('add_student_profile')
                                <a href="{{ url('student/profile/add') }}" class="btn btn-primary">Add Student Profile</a>
                            @endcan
                            <a href="{{ url('student/profile/archived') }}" class="mx-2 btn btn-icon btn-danger"
                                data-bs-toggle="tooltip" data-bs-placement="right" data-bs-custom-class="tooltip-dark"
                                title="Archived Profile"><i class="fa-solid fa-box-archive"></i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="kt_student_profile_table" class="align-middle table table-row-bordered gy-7 gs-10">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-200px" data-priority="1">Student no.</th>
                                <th class="min-w-250px" data-priority="3">Name</th>
                                <th class="min-w-100px" data-priority="4">Course</th>
                                <th class="min-w-100px" data-priority="5">Academic status</th>
                                <th class="min-w-100px" data-priority="8">Admission year</th>
                                <th data-priority="9">Record type</th>
                                <th class="min-w-100px" data-priority="6">Created at</th>
                                <th class="min-w-100px" data-priority="7">Last update</th>
                                <th class="min-w-100px" data-priority="2"></th>
                            </tr>
                        </thead>
                        <tbody class="fw-bold">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_remarks" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_remarks_form">
                    <input type="text" name="id" hidden />

                    <div class="modal-header" id="kt_modal_remarks_header">
                        <h2 class="fw-bolder">Remarks</h2>
                        <div id="kt_modal_remarks_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="modal-body py-10 px-lg-17">
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_remarks_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_remarks_header"
                            data-kt-scroll-wrappers="#kt_modal_remarks_scroll" data-kt-scroll-offset="300px">

                            <div class="fv-row mb-7">
                                <textarea class="form-control form-control-solid" placeholder="Type your remarks here" style="height: 100px"
                                    name="remarks"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_remarks_cancel" class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_remarks_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            // ----- Begin:Table -----

            var table = $("#kt_student_profile_table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searchDelay: 2000,
                ajax: {
                    url: "{{ url('/ajax/student/profile/retrieve-all') }}",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'stud_studNo',
                        name: 'stud_studentNo'
                    },
                    {
                        data: 'stud_name',
                        name: 'stud_name'
                    },
                    {
                        data: 'stud_course',
                        name: 'stud_course',
                    },
                    {
                        data: 'stud_academicStatus',
                        name: 'stud_academicStatus',
                        orderable: false,
                        render: function(data, type) {

                            switch (data) {
                                case 'UNG':
                                    return 'Undergraduate';
                                    break;
                                case 'RTN':
                                    return 'Returnee';
                                    break;
                                case 'DIS':
                                    return 'Honorable Dismissal';
                                    break;
                                case 'GRD':
                                    return 'Graduated';
                                    break;
                                default:
                                    return 'Undefined';
                                    break;
                            }

                            return data;
                        },
                    },

                    {
                        data: 'stud_yearOfAdmission',
                        name: 'stud_yearOfAdmission',
                    },
                    {
                        data: 'stud_recordType',
                        name: 'stud_recordType',
                        orderable: false,
                    },
                    {
                        data: 'stud_created_at',
                        name: 'stud_createdAt',
                    },
                    {
                        data: 'stud_updated_at',
                        name: 'stud_updatedAt',
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
                    [6, 'desc']
                ],

            });

            table.on('draw', function() {
                KTMenu.createInstances();
            });

            const resetSearch = function() {
                $("[data-kt-student-profile-search-by] option").each((e, n) => {
                    table.column($(n).attr("value")).search("").draw();
                })
            }

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

            $('[data-kt-student-profile-filter-field="course"]').select2({
                ajax: {
                    url: "{{ url('/select2/course') }}",
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

            $('[data-kt-student-profile-filter-field="admissionYear"]').select2({
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
                        return "{{ __('ajax.retrieving_data', ['data' => 'admission year']) }}";
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

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_archive]", function() {

                const id = $(this).closest("tr").attr("id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'archive']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    allowOutsideClick: false,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'archive']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-active-light',
                        cancelButton: 'btn btn-danger',
                    },
                }).then(function(t) {
                    if (t.isConfirmed) {

                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/archive') }}",
                            data: {
                                id: id
                            },
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {
                            if (respond.status == 200) {
                                display_toastr_info(respond.data.message);
                            } else {
                                display_modal_error("{{ __('modal.error') }}");
                            }

                            table.ajax.reload();
                        }).catch(function(error) {
                            display_axios_error(error);
                        });

                    }
                });

            });

            // ----- End:Table -----


            const resetRemarksFormData = function() {

                $("#kt_modal_remarks_form .form-control-solid").val('');
            }

            var remarks_modal = init_modal("kt_modal_remarks");
            var remarks_submitBtnId = "kt_modal_remarks_submit";
            // var remarks_formValidation = init_formValidation("kt_modal_remarks_form");

            $('#kt_modal_remarks_cancel, #kt_modal_remarks_close').on("click", function(t) {
                t.preventDefault();

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'cancel']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'cancel']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {

                    if (t.value) {
                        resetRemarksFormData();
                        remarks_modal.hide();
                    }
                });
            });

            $("#kt_modal_remarks_form").on("submit", function(e) {
                e.preventDefault();

                // remarks_formValidation.validate().then(function(e) {

                //     if ('Valid' == e) {

                //     } else {

                //         display_modal_error("{{ __('modal.error') }}");
                //     }
                // });

                trigger_btnIndicator(remarks_submitBtnId, "loading");

                axios({
                    method: "POST",
                    url: "{{ url('/student/profile/update-remarks') }}",
                    data: $("#kt_modal_remarks_form").serialize(),
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {

                    trigger_btnIndicator(remarks_submitBtnId,
                        "default");
                    if (respond.status == 200) {

                        display_axios_success(respond.data.message);
                        remarks_modal.hide();
                    } else {

                        display_modal_error(
                            "{{ __('modal.error') }}");
                    }

                    resetRemarksFormData();
                    table.ajax.reload();
                }).catch(function(error) {

                    display_axios_error(error);
                });
            });

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_remarks]",
                function() {

                    const id = $(this).closest("tr").attr("id");

                    axios({
                        method: "POST",
                        url: "{{ url('/student/profile/retrieve') }}",
                        data: {
                            id
                        },
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        if (respond.status == 200) {

                            if (respond.data.length == 1) {

                                d = respond.data[0];

                                $("#kt_modal_remarks_form [name='id']").val(d[
                                    'stud_id_md5']);
                                $("#kt_modal_remarks_form [name='remarks']").val(d[
                                    'stud_remarks']);

                                remarks_modal.show();
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                        }
                    }).catch(function(error) {

                        display_axios_error(error);
                    });
                })

        }));
    </script>
@endsection
