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
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-student-profile-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Student Profile" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            @can('add_student_profile')
                                <a href="{{ url('student/profile/add') }}" class="btn btn-primary">Add Student Profile</a>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="kt_student_profile_table" class="table table-row-bordered gy-5 gs-7 ">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Student no.</th>
                                <th>Name</th>
                                <th>Course</th>
                                <th>Status</th>
                                <th>Created at</th>
                                <th>Last update</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                        transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                        fill="black" />
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

            var table = $("#kt_student_profile_table").DataTable({
                processing: true,
                ajax: {
                    url: "{{ url('/student/profile/retrieveAll') }}",
                    dataSrc: function(d) {
                        var return_data = new Array();

                        for (let i = 0; i < d.length; i++) {

                            let remarks_count = '';
                            if(d[i]['stud_remarks'] && d[i]['stud_remarks'] != "CC"){

                                remarks_count = `<span class="position-absolute top-0 start-100 translate-middle  badge badge-circle badge-dark">1</span>`;
                            }

                            return_data.push({
                                DT_RowId: d[i]["stud_id_md5"],
                                StudNo: `<a href="{{ url('student/profile') }}/${d[i]["stud_uuid"]}" target="_blank"> ${d[i]["stud_studentNo"]}</a>`,
                                Name: d[i]["stud_fullName"],
                                Course: d[i]["stud_course"],
                                Status: d[i]["stud_recordStatus"],
                                CreatedAt: d[i]["stud_createdAt_m_f"] + "<br>" + d[i][
                                    "stud_createdAt_t_f"
                                ],
                                UpdatedAt: d[i]["stud_updatedAt_m_f"] + "<br>" + d[i][
                                    "stud_updatedAt_t_f"
                                ],
                                Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                    <a href="{{ url('student/profile') }}/${d[i]["stud_uuid"]}/edit" class="btn btn-icon btn-light-success btn-sm me-1">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <button type="button" kt_student_profile_table_remarks class="btn btn-icon btn-light-dark btn-sm me-1 position-relative">
                                        <i class="fas fa-sticky-note"></i> ${remarks_count}
                                    </button>

                                    <button type="button" kt_student_profile_table_delete class="btn btn-icon btn-light-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>

                                </div>`,
                            });
                        };
                        return return_data;
                    },
                    error: function(xhr, error, code) {

                        display_modal_error_reload("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'StudNo'
                    },
                    {
                        data: 'Name'
                    },
                    {
                        data: 'Course'
                    },
                    {
                        data: 'Status'
                    },
                    {
                        data: 'CreatedAt'
                    },
                    {
                        data: 'UpdatedAt'
                    },
                    {
                        data: 'Action'
                    }
                ],
            });

            $('[data-kt-student-profile-table-filter="search"]').on('keyup', function(e) { // Search bar 
                table.search(e.target.value).draw();
            });

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_delete]", function() {

                const id = $(this).closest("tr").attr("id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'delete']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    allowOutsideClick: false,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'delete']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.isConfirmed) {

                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/delete') }}",
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
