@extends('layouts.default')

@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <div class="d-flex align-items-center position-relative my-1">
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <input type="text" data-kt-course-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Course" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                                    <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                                    <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                                </svg>
                            </span>
                            Export
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_course">Add Course</button>
                    </div>
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                    </div>
                </div>
            </div>

            <div class="card-body py-3">
                <table id="kt_course_table" class="table table-row-bordered gy-5 gs-7 ">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>Code</th>
                            <th>Name</th>
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

<div class="modal fade" id="kt_modal_add_course" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_course_form">

                <div class="modal-header" id="kt_modal_add_course_header">
                    <h2 class="fw-bolder">Add Course</h2>
                    <div id="kt_modal_add_course_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_course_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_course_header" data-kt-scroll-wrappers="#kt_modal_add_course_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Code</label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="code" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_add_course_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_course_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_course" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_edit_course_form">
                <input type="text" name="id" hidden />

                <div class="modal-header" id="kt_modal_edit_course_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Edit Course</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_edit_course_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_course_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_course_header" data-kt-scroll-wrappers="#kt_modal_edit_course_scroll" data-kt-scroll-offset="300px">
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Code</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="code" />
                            <!--end::Input-->
                        </div>

                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-bold mb-2">Name</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                            <!--end::Input-->
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_edit_course_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_edit_course_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script type="text/javascript">
    KTUtil.onDOMContentLoaded((function() {

        function retrieve_form_data(type) {
            return $("#kt_modal_" + type + "_course_form").serialize();
        }

        function reset_form(type) {
            $('#kt_modal_' + type + '_course_form .form-control-solid').val('');
        }

        var form_fields = {
            'code': {
                validators: {
                    notEmpty: {
                        message: 'Course Code is required'
                    },
                },
            },
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Course Name is required'
                    },
                },
            },
        };


        
        var table = $("#kt_course_table").DataTable({
            processing: true,
            ajax: {
                url: "{{ url('/course/retrieveAll') }}",
                dataSrc: function(d) {

                    var return_data = new Array();

                    for (let i = 0; i < d.length; i++) {

                        return_data.push({
                            DT_RowId: d[i]["cour_id_md5"],
                            Code: d[i]["cour_code"],
                            Name: d[i]["cour_name"],
                            Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                            <a href="javascript:void(0)" kt_course_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="javascript:void(0)" kt_course_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
                                                <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
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
                    data: 'Code'
                },
                {
                    data: 'Name'
                },
                {
                    data: 'Action'
                },
            ],
        });

        $('[data-kt-course-table-filter="search"]').on('keyup', function(e) {
            table.search(e.target.value).draw();
        });



        var add_modal = init_modal("kt_modal_add_course");
        var add_submitBtnId = "kt_modal_add_course_submit";
        var add_formValidation = init_formValidation("kt_modal_add_course_form", form_fields);

        $('#kt_modal_add_course_cancel, #kt_modal_add_course_close').on("click", function(t) {
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

                    reset_form("add");
                    add_modal.hide();
                }
            });
        });

        $("#kt_modal_add_course_form").on("submit", function(e) {
            e.preventDefault();

            add_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    trigger_btnIndicator(add_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/course/add') }}",
                        data: retrieve_form_data("add"),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        trigger_btnIndicator(add_submitBtnId, "default");
                        if (respond.status == 200) {

                            display_axios_success(respond.data.message);
                            add_modal.hide();
                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                        }

                        reset_form("add");
                        table.ajax.reload();
                    }).catch(function(error) {

                        display_axios_error(error);
                    });
                } else {

                    display_modal_error("{{ __('modal.error') }}");
                }
            });
        });



        var edit_modal = init_modal("kt_modal_edit_course");
        var edit_submitBtnId = "kt_modal_edit_course_submit";
        var edit_formValidation = init_formValidation("kt_modal_edit_course_form", form_fields);

        $('#kt_modal_edit_course_cancel, #kt_modal_edit_course_close').on("click", function(t) {

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

                    reset_form("edit");
                    edit_modal.hide();
                }
            });
        });

        $("#kt_course_table").on("click", "[kt_course_table_edit]", function() {

            const id = $(this).closest("tr").attr("id");

            axios({
                method: "POST",
                url: "{{ url('/course/retrieve') }}",
                data: {
                    id
                },
                timeout: "{{ $axios_timeout }}"
            }).then(function(respond) {

                if (respond.status == 200) {

                    if (respond.data.length == 1) {

                        d = respond.data[0];

                        $("#kt_modal_edit_course_form [name='id']").val(d['cour_id_md5']);
                        $("#kt_modal_edit_course_form [name='code']").val(d['cour_code']);
                        $("#kt_modal_edit_course_form [name='name']").val(d['cour_name']);

                        edit_modal.show();
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

        $("#kt_modal_edit_course_form").on("submit", function(e) {

            e.preventDefault();

            edit_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    trigger_btnIndicator(edit_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/course/update') }}",
                        data: retrieve_form_data("edit"),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        if (respond.status == 200) {

                            trigger_btnIndicator(edit_submitBtnId, "default");
                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                                edit_modal.hide();
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            reset_form("edit");
                            table.ajax.reload();
                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                        }
                    }).catch(function(error) {

                        display_axios_error(error);
                    });
                } else {

                    display_modal_error("{{ __('modal.error') }}");
                }
            });
        });



        $("#kt_course_table").on("click", "[kt_course_table_delete]", function() {

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
                        url: "{{ url('/course/delete') }}",
                        data: {
                            id
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