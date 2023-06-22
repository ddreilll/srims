@extends('layouts.fluid')


@section('content')

<div class="post d-flex flex-column-fluid">
    <div id="kt_content_container" class="container-fluid">
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
                        <input type="text" data-kt-subject-table-filter="search" class="form-control  w-250px ps-15" placeholder="Search Subject" />
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_subject">Add Subject</button>
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

                <table id="kt_subject_table" class="table table-row-bordered gy-5 gs-7">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>Code</th>
                            <th>Prerequisite</th>
                            <th>Name</th>
                            <th>Units</th>
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

<div class="modal fade" id="kt_modal_add_subject" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_subject_form">
                <div class="modal-header" id="kt_modal_add_subject_header">
                    <h2 class="fw-bolder">Add Subject</h2>
                    <div id="kt_modal_add_subject_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <div id="notice" class="alert alert-danger d-flex align-items-center p-5 mb-10">
                        <span class="svg-icon svg-icon-2hx svg-icon-danger me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"/>
                                <rect x="11" y="17" width="7" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"/>
                                <rect x="11" y="9" width="2" height="2" rx="1" transform="rotate(-90 11 9)" fill="black"/>
                            </svg>
                        </span>
                        <div class="d-flex flex-column">
                            <h4 class="mb-1 text-danger">Important, please read!</h4>
                            <span>Duplicate data validation is not enabled, so please double-check any duplicate data manually.</span>
                        </div>
                    </div>

                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_subject_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_subject_header" data-kt-scroll-wrappers="#kt_modal_add_subject_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Code</label>
                            <input type="text" class="form-control " placeholder="" name="code" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control " placeholder="" name="name" />
                        </div>

                        <div class="fv-row mb-15">
                            <label class="required fs-6 fw-bold mb-2">Units</label>
                            <input type="text" class="form-control " placeholder="" name="units" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="form-label fs-5 fw-bold mb-3">Prerequisite</label>
                            <div class="input-group input-group-solid">
                                <span class="input-group-text"><i class="bi bi-card-checklist fs-4"></i></span>
                                <div class="flex-grow-1">
                                    <select class="form-select  rounded-start-0 border-start" data-control="select2" data-placeholder="Select a Prerequisite" multiple="multiple" data-dropdown-parent="#kt_modal_add_subject_form" name="prerequisite[]" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($formData_subjects as $subject)
                                        <option value="{{ $subject->subj_id }}">{{ $subject->subj_code . ' ― '. $subject->subj_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_add_subject_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_subject_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_subject" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_edit_subject_form">
                <input type="text" name="id" hidden />

                <div class="modal-header" id="kt_modal_edit_subject_header">
                    <h2 class="fw-bolder">Edit Subject</h2>
                    <div id="kt_modal_edit_subject_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_subject_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_subject_header" data-kt-scroll-wrappers="#kt_modal_edit_subject_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Code</label>
                            <input type="text" class="form-control " placeholder="" name="code" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required fs-6 fw-bold mb-2">Name</label>
                            <input type="text" class="form-control " placeholder="" name="name" />
                        </div>

                        <div class="fv-row mb-15">
                            <label class="required fs-6 fw-bold mb-2">Units</label>
                            <input type="text" class="form-control " placeholder="" name="units" />
                        </div>

                        <div class="fv-row mb-7">
                            <label class="form-label fs-5 fw-bold mb-3">Prerequisite</label>
                            <div class="input-group input-group-solid">
                                <span class="input-group-text"><i class="bi bi-card-checklist fs-4"></i></span>
                                <div class="flex-grow-1">
                                    <select class="form-select  rounded-start-0 border-start" data-control="select2" data-placeholder="Select a Prerequisite" multiple="multiple" data-dropdown-parent="#kt_modal_edit_subject_form" name="prerequisite[]" data-allow-clear="true">
                                        <option></option>
                                        @foreach ($formData_subjects as $subject)
                                        <option value="{{ $subject->subj_id }}">{{ $subject->subj_code . ' ― '. $subject->subj_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_edit_subject_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_edit_subject_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
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

        function retrieve_form_data(type) {

            return $("#kt_modal_" + type + "_subject_form").serialize();
        }

        function reset_form(type) {

            $('#kt_modal_' + type + '_subject_form .').val('');
            $('#kt_modal_' + type + '_subject_form .[multiple=""]').val([]).trigger('change');
        }

        function init_inputmask(type) {

            Inputmask({
                'groupSeparator': '.',
                'autoGroup': true,
                'alias': 'decimal',
                rightAlign: false,
            }).mask("#kt_modal_" + type + "_subject_form input[name='units']");
        }

        var form_fields = {
            'code': {
                validators: {
                    notEmpty: {
                        message: 'Subject Code is required'
                    },
                },
            },
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Subject Name is required'
                    },
                },
            },
        };



        var table = $("#kt_subject_table").DataTable({
            processing: true,
            ajax: {
                url: "{{ url('/subject/retrieveAll') }}",
                dataSrc: function(d) {
                    var return_data = new Array();

                    for (let i = 0; i < d.length; i++) {

                        subj_prereq = d[i]['subj_prerequisite'];
                        prereq = '';
                        for (let p = 0; p < subj_prereq.length; p++) {
                            prereq += subj_prereq[p]['subjpreq_subjectCode'] + '<br>';
                        }

                        return_data.push({
                            DT_RowId: d[i]["subj_id_md5"],
                            Code: d[i]["subj_code"],
                            Prerequisite: prereq,
                            Name: d[i]["subj_name"],
                            Units: d[i]["subj_units"],
                            Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                <a href="javascript:void(0)" kt_subject_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="javascript:void(0)" kt_subject_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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
                    data: 'Prerequisite'
                },
                {
                    data: 'Name'
                },
                {
                    data: 'Units'
                },
                {
                    data: 'Action'
                },
            ],
        });

        $('[data-kt-subject-table-filter="search"]').on('keyup', function(e) { // Search bar 
            table.search(e.target.value).draw();
        });



        init_inputmask("add");
        var add_modal = init_modal("kt_modal_add_subject");
        var add_submitBtnId = "kt_modal_add_subject_submit";
        var add_formValidation = init_formValidation("kt_modal_add_subject_form", form_fields);

        $('#kt_modal_add_subject_cancel, #kt_modal_add_subject_close').on("click", function(t) {
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

        $("#kt_modal_add_subject_form").on("submit", function(e) {

            e.preventDefault();

            add_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    trigger_btnIndicator(add_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/subject/add') }}",
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



        init_inputmask("edit");
        var edit_modal = init_modal("kt_modal_edit_subject");
        var edit_submitBtnId = "kt_modal_edit_subject_submit";
        var edit_formValidation = init_formValidation("kt_modal_edit_subject_form", form_fields);

        $('#kt_modal_edit_subject_cancel, #kt_modal_edit_subject_close').on("click", function(t) {

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

        $("#kt_subject_table").on("click", "[kt_subject_table_edit]", function() {

            const id = $(this).closest("tr").attr("id");

            axios({
                method: "POST",
                url: "{{ url('/subject/retrieve') }}",
                data: {
                    id
                },
                timeout: "{{ $axios_timeout }}"
            }).then(function(respond) {

                if (respond.status == 200) {

                    if (respond.data.length == 1) {

                        d = respond.data[0];

                        prerequisite_new = [];
                        prerequisite = d['subj_prerequisite'];
                        for (let i = 0; i < prerequisite.length; i++) {
                            prerequisite_new.push(prerequisite[i]['subjpreq_subjectId']);
                        }

                        $("#kt_modal_edit_subject_form [name='id']").val(d['subj_id_md5']);
                        $("#kt_modal_edit_subject_form [name='code']").val(d['subj_code']);
                        $("#kt_modal_edit_subject_form [name='name']").val(d['subj_name']);
                        $("#kt_modal_edit_subject_form [name='units']").val(d['subj_units']);
                        $("#kt_modal_edit_subject_form [name='prerequisite[]']").val(prerequisite_new).trigger('change');

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

        $("#kt_modal_edit_subject_form").on("submit", function(e) {

            e.preventDefault();

            edit_formValidation.validate().then(function(e) {

                if ('Valid' == e) {

                    trigger_btnIndicator(edit_submitBtnId, "loading");

                    axios({
                        method: "POST",
                        url: "{{ url('/subject/update') }}",
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



        $("#kt_subject_table").on("click", "[kt_subject_table_delete]", function() {

            const id = $(this).closest("tr").attr("id");

            axios({
                method: "POST",
                url: "{{ url('/subject/checkDelete') }}",
                data: {
                    id
                },
                timeout: "{{ $axios_timeout }}"
            }).then(function(respond) {

                if (respond.status == 200) {

                    if (respond.data.isDeletable) {

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
                                    url: "{{ url('/subject/delete') }}",
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

                    } else if (!respond.data.isDeletable) {

                        display_modal_error("{{ __('modal.error_delete', ['reason' => 'this subject is a prerequisite']) }}");
                    }
                } else {

                    display_modal_error("{{ __('modal.error') }}");
                }
            });
        });
    }));
</script>

@endsection