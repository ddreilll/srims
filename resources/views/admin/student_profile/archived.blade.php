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
                    <h4 class="mb-1 text-danger">Please take note</h4>
                    <span>A student profile that will be deleted will removed immediately. It cannot be restored.</span>
                </div>
            </div>

            <div class="card mb-5 mb-xl-8">
                <div class="card-body py-3">
                    <table id="kt_student_profile_table" class="align-middle table table-row-bordered gy-5 gs-10">
                        <thead>
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="min-w-125px" data-priority="1">Student no.</th>
                                <th data-priority="3">Name</th>
                                <th data-priority="4">Course</th>
                                <th class="min-w-100px" data-priority="5">Created at</th>
                                <th class="min-w-100px" data-priority="6">Archived at</th>
                                <th data-priority="2"></th>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
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

            var table = $("#kt_student_profile_table").DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: {
                    url: "{{ url('/ajax/student/profile/retrieve-archived') }}",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error_reload("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'stud_studentNo',
                        name: 'stud_studentNo'
                    },
                    {
                        data: 'stud_name',
                        name: 'stud_name'
                    },
                    {
                        data: 'stud_course',
                        name: 'stud_course'
                    },
                    {
                        data: 'stud_created_at',
                        name: 'stud_created_at'
                    },
                    {
                        data: 'stud_deleted_at',
                        name: 'stud_deleted_at'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false,
                        className: "text-end",
                    },
                ],
                order: [
                    [4, 'desc']
                ],

            });

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_restore]", function() {

                const id = $(this).closest("tr").attr("id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'restore']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    allowOutsideClick: false,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'restore']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-warning',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.isConfirmed) {

                        axios({
                            method: "POST",
                            url: "{{ url('/ajax/student/profile/restore') }}",
                            data: {
                                id
                            },
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            if (respond.status == 200) {
                                if (!respond.data.duplicated) {
                                    display_toastr_info(respond.data.message);
                                } else if (respond.data.duplicated) {
                                    display_modal_error(respond.data.message);
                                }
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

        }));
    </script>
@endsection
