@extends('layouts.default')


@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0">
                            <div class="card-title">
                                <h3 class="fw-bolder m-0">Student Profile</h3>
                            </div>
                        </div>

                        <div class="card-body pt-2">
                            <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
                                <li class="nav-item">
                                    <a class="nav-link btn active btn-active-light-dark text-black-50 fw-bolder"
                                        data-bs-toggle="tab" href="#settings_student_profile_honor">
                                        <span class="d-flex flex-column align-items-start">
                                            <span class="fs-5">Honor</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" id="settings_student_profile_honor" role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Honor</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                            id="kt_drawer_honor_add_button">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                        fill="black" />
                                                    <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                        transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                    <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                        fill="black" />
                                                </svg>
                                            </span>
                                            Add Honor
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="card-body py-3">
                                        <table id="kt_honor_table"
                                            class="table border table-rounded table-row-bordered gy-5 gs-7">
                                            <thead>
                                                <tr class="fw-bolder fs-6 text-gray-800 px-7">
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

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="kt_drawer_honor_add" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
        data-kt-drawer-toggle="#kt_drawer_honor_add_button" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'300px', 'md': '500px'}">
        <div class="card rounded-0 w-100">
            <form class="form" action="#" id="kt_drawer_honor_add_form">
                <div class="card-header pe-5">
                    <div class="card-title">
                        <div class="d-flex justify-content-center flex-column me-3">
                            <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Add Honor</span>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_honor_add_cancel">
                            <span class="svg-icon svg-icon-2">
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
                </div>
                <div class="card-body">
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Name</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                    </div>
                </div>
                <div class="card-footer flex-center text-center">
                    <button type="reset" id="kt_drawer_honor_add_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_drawer_honor_add_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div id="kt_drawer_honor_edit" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
        data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'300px', 'md': '500px'}">
        <div class="card rounded-0 w-100">
            <form class="form" action="#" id="kt_drawer_honor_edit_form">
                <input type="text" hidden name="id" />
                <div class="card-header pe-5">
                    <div class="card-title">
                        <div class="d-flex justify-content-center flex-column me-3">
                            <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Edit Honor</span>
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_honor_edit_cancel">
                            <span class="svg-icon svg-icon-2">
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
                </div>
                <div class="card-body">
                    <div class="fv-row mb-7">
                        <label class="required fs-6 fw-bold mb-2">Name</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                    </div>
                </div>
                <div class="card-footer flex-center text-center">
                    <button type="reset" id="kt_drawer_honor_edit_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_drawer_honor_edit_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {


            function refresh_list_honor() {

                axios({
                    method: "GET",
                    url: "{{ url('/settings/student-profile/retrieveAll') }}",
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {
                    if (respond.status == 200) {
                        $('#kt_honor_table tbody').empty();

                        data = respond.data;
                        for (let i = 0; i < data.length; i++) {
                            $(`<tr id="${data[i]['honor_id_md5']}">
                                    <td class="align-middle">
                                        ${data[i]['honor_name']}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-end flex-shrink-0">
                                            <a href="javascript:void(0)" kt_honor_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                            <a href="javascript:void(0)" kt_honor_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="black"></path>
                                                        <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="black"></path>
                                                        <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                </tr>`).appendTo("#kt_honor_table tbody");
                        }
                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }

                }).catch(function(error) {
                    display_axios_error(error);
                });
            };

            refresh_list_honor();

            //--begin::Add Drawer --//

            function retrieve_honor_form_data(type) {

                return $("#kt_drawer_honor_" + type + "_form").serialize();
            }

            function reset_honor_form(type) {
                $('#kt_drawer_honor_' + type + '_form .form-control-solid').val('');
            }

            var honor_form_fields = {
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'Honor name is required'
                        },
                    },
                },
            };

            var add_honor_drawer = init_drawer("kt_drawer_honor_add");
            var add_honor_submitBtn = 'kt_drawer_honor_add_submit';
            var add_honor_formValidation = init_formValidation("kt_drawer_honor_add_form", honor_form_fields);


            $('#kt_drawer_honor_add_cancel, #kt_drawer_honor_add_close').on("click", function() {
                add_honor_drawer.hide();
            });

            $("#kt_drawer_honor_add_form").on("submit", function(e) {

                e.preventDefault();

                add_honor_formValidation.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(add_honor_submitBtn, "loading");

                        axios({
                            method: "POST",
                            url: "{{ url('/settings/student-profile/add') }}",
                            data: retrieve_honor_form_data("add"),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(add_honor_submitBtn, "default");

                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                            } else {

                                display_modal_error(
                                    "{{ __('modal.error') }}"
                                );
                            }

                            add_honor_drawer.hide();
                            reset_honor_form('add');
                            refresh_list_honor();

                        }).catch(function(error) {
                            display_axios_error(error);
                        });

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });

            });

            //--end::Add Drawer --//


            //--begin::Edit Modal--//

            var edit_honor_drawer = init_drawer("kt_drawer_honor_edit");
            var edit_honor_submitBtn = 'kt_drawer_honor_edit_submit';
            var edit_honor_formValidation = init_formValidation("kt_drawer_honor_edit_form", honor_form_fields);

            $("#kt_honor_table").on("click", "[kt_honor_table_edit]", function() {

                const id = $(this).closest("tr").attr("id");

                axios({
                    method: "POST",
                    url: "{{ url('/settings/student-profile/retrieve') }}",
                    data: {
                        id: id
                    },
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {

                    if (respond.status == 200) {

                        d = respond.data[0];

                        $("#kt_drawer_honor_edit_form [name='id']").val(d['honor_id_md5']);
                        $("#kt_drawer_honor_edit_form [name='name']").val(d['honor_name']);

                        edit_honor_drawer.show();

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                }).catch(function(error) {
                    display_axios_error(error);
                });
            })

            $('#kt_drawer_honor_edit_cancel, #kt_drawer_honor_edit_close').on("click", function() {
                edit_honor_drawer.hide();
            });

            $("#kt_drawer_honor_edit_form").on("submit", function(e) {
                e.preventDefault();

                edit_honor_formValidation.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(edit_honor_submitBtn, "loading");

                        axios({
                            method: "POST",
                            url: "{{ url('/settings/student-profile/update') }}",
                            data: retrieve_honor_form_data("edit"),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(edit_honor_submitBtn, "default");

                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                            } else {

                                display_modal_error(
                                    "{{ __('modal.error') }}"
                                );
                            }

                            edit_honor_drawer.hide();
                            reset_honor_form('edit');
                            refresh_list_honor();

                        }).catch(function(error) {
                            display_axios_error(error);
                        });

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });
            });


            $("#kt_honor_table").on("click", "[kt_honor_table_delete]", function() {

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
                            url: "{{ url('/settings/student-profile/delete') }}",
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

                            refresh_list_honor();
                        }).catch(function(error) {
                            display_axios_error(error);
                        });

                    }
                });
            });



        }));
    </script>
@endsection
