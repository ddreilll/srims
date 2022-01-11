@extends('layouts.default')


@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                <div class="card-title">
                    <!--begin::Search-->
                    <div class="d-flex align-items-center position-relative my-1">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <input type="text" data-kt-criteria-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Criteria" />
                    </div>
                    <!--end::Search-->
                </div>
                <div class="card-toolbar">
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                        <!--begin::Export-->
                        <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_customers_export_modal">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr078.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="black" />
                                    <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="black" />
                                    <path d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="#C4C4C4" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Export
                        </button>
                        <!--end::Export-->
                        <!--begin::Add customer-->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_criteria">Add Criteria</button>
                        <!--end::Add customer-->
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

                <table id="kt_criteria_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th colspan="2" class="border-bottom">Academic Year Coverage</th>
                            <th rowspan="2" class="align-middle border-start border-bottom">No. of Requirements</th>
                            <th rowspan="2" class="align-middle border-start border-bottom"></th>
                        </tr>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>Start</th>
                            <th>End</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_view_criteria" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog mw-650px">
        <div class="modal-content">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <div class="text-center mb-13">
                    <h2 class="mb-3">Admission Requirement Criteria</h2>
                    <div class="text-muted fw-bold fs-3" id="kt_modal_view_criteria_year">2003-2010
                    </div>
                </div>
                <div class="mb-15">
                    <div class="mh-375px scroll-y me-n7 pe-7" id="kt_modal_view_criteria_list">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_add_criteria" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_criteria_form">
                <div class="modal-header" id="kt_modal_add_criteria_header">
                    <h2 class="fw-bolder">Add Criteria</h2>
                    <div id="kt_modal_add_criteria_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_criteria_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Start Year</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a year" data-dropdown-parent="#kt_modal_add_criteria_form" name="yearStart">
                                <option></option>
                                @foreach ($formData_acadYears as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-15">
                            <label class="required form-label fs-5 fw-bold mb-3">End Year</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a year" data-dropdown-parent="#kt_modal_add_criteria_form" name="yearEnd">
                                <option></option>
                                @foreach ($formData_acadYears as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Requirements</label>
                            <div class="input-group input-group-solid">
                                <span class="input-group-text"><i class="bi bi-card-checklist fs-4"></i></span>
                                <div class="flex-grow-1">
                                    <select class="form-select form-select-solid rounded-start-0 border-start" data-control="select2" data-placeholder="Select a requirements" multiple="multiple" data-dropdown-parent="#kt_modal_add_criteria_form" name="requirements[]">
                                        <option></option>
                                        @foreach ($formData_admissionRed as $admissionReq)
                                        <option value="{{ $admissionReq->adre_id }}">{{ $admissionReq->adre_docuName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_criteria_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_criteria_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_criteria" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_edit_criteria_form">
                <input type="text" name="id" hidden />

                <div class="modal-header" id="kt_modal_edit_criteria_header">
                    <h2 class="fw-bolder">Edit Criteria</h2>
                    <div id="kt_modal_edit_criteria_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_criteria_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_criteria_header" data-kt-scroll-wrappers="#kt_modal_edit_criteria_scroll" data-kt-scroll-offset="300px">

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Start Year</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a year" data-dropdown-parent="#kt_modal_edit_criteria" name="yearStart">
                                <option></option>
                                @foreach ($formData_acadYears as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-15">
                            <label class="required form-label fs-5 fw-bold mb-3">End Year</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a year" data-dropdown-parent="#kt_modal_edit_criteria" name="yearEnd">
                                <option></option>
                                @foreach ($formData_acadYears as $year)
                                <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Requirements</label>
                            <div class="input-group input-group-solid">
                                <span class="input-group-text"><i class="bi bi-card-checklist fs-4"></i></span>
                                <div class="flex-grow-1">
                                    <select class="form-select form-select-solid rounded-start-0 border-start" data-control="select2" data-placeholder="Select a requirements" multiple="multiple" data-dropdown-parent="#kt_modal_edit_criteria" name="requirements[]">
                                        <option></option>
                                        @foreach ($formData_admissionRed as $admissionReq)
                                        <option value="{{ $admissionReq->adre_id }}">{{ $admissionReq->adre_docuName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_edit_criteria_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_edit_criteria_submit" class="btn btn-primary">
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
    
    var table = $("#kt_criteria_table").DataTable({ // Retrieve all the data
        processing: true,
        ajax: {
            url: "{{ url('/admission-criteria/retrieveAll') }}",
            dataSrc: function(data) {
                var return_data = new Array();

                if (data['status'] == 200) {
                    d = data['data'];

                    for (let i = 0; i < d.length; i++) {

                        return_data.push({
                            DT_RowId: d[i]["adcr_id_md5"],
                            StartYear: d[i]["adcr_yearStart"],
                            EndYear: d[i]["adcr_yearEnd"],
                            TotRequirements: `<div class="text-center"><span class="badge badge-square badge-dark">${d[i]["adcr_requirements"].length}</span></div>`,
                            Action: `<div class="text-center"><a href="javascript:void(0)" kt_criteria_table_view
                                    class="btn btn-icon btn-success"><i style="padding-left: 0.5rem;"
                                        class="las la-eye fs-2 me-2"></i></a> <a href="javascript:void(0)" kt_criteria_table_edit
                                    class="btn btn-icon btn-warning"><i style="padding-left: 0.5rem;"
                                        class="las la-edit fs-2 me-2"></i></a> <a href="javascript:void(0)"
                                    kt_criteria_table_delete class="btn btn-icon btn-danger"><i
                                        style="padding-left: 0.5rem;" class="las la-trash fs-2 me-2"></i></a></div>`,
                        });

                    };

                    return return_data;

                }

            }
        },
        columns: [{
                data: 'StartYear'
            },
            {
                data: 'EndYear'
            },
            {
                data: 'TotRequirements'
            },
            {
                data: 'Action'
            },
        ],
    });

    $('[data-kt-criteria-table-filter="search"]').on('keyup', function(e) { // Search bar 
        table.search(e.target.value).draw();
    });

    //-- begin:View Modal --//

    var view_modal = new bootstrap.Modal(document.querySelector('#kt_modal_view_criteria'));

    $("#kt_criteria_table").on("click", "[kt_criteria_table_view]", function() {

        const id = $(this).closest("tr").attr("id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ url('/admission-criteria/retrieve') }}",
            data: {
                id: id
            }
        }).done(function(response) {
            response = JSON.parse(response);

            if (response['data'].length == 1) {

                data = response['data'][0];

                $("#kt_modal_view_criteria_year").empty().text(data['adcr_yearStart'] + " - " + data['adcr_yearEnd']);

                $("#kt_modal_view_criteria_list").empty();
                requirements = data['adcr_requirements'];
                for (let i = 0; i < requirements.length; i++) {

                    $(`<div class="d-flex flex-stack py-5 border-bottom border-gray-300 border-bottom-dashed">
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-35px symbol-circle">
                                    <span class="symbol-label bg-light-danger text-danger fw-bold">${i + 1}</span>
                                </div>
                                <div class="ms-6">
                                    <div class="fw-bold text-muted fs-8">${requirements[i]['adre_docuCode']}</div>
                                    <span class="d-flex align-items-center fs-4 fw-bolder text-dark">${requirements[i]['adre_docuName']}</span>
                                </div>
                            </div>
                        </div>`).appendTo('#kt_modal_view_criteria_list');
                }

                view_modal.show();

            } else {
                Swal.fire({
                    text: "{{ __('modal.error') }}",
                    icon: 'error',
                    buttonsStyling: !1,
                    confirmButtonText: 'Ok, got it!',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                });
            }

        });
    });

    //-- end::View Modal --//


    //--begin::Add Modal--//

    var add_modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_criteria'));
    var add_submitBtn = document.getElementById('kt_modal_add_criteria_submit');

    var add_form = document.getElementById('kt_modal_add_criteria_form');
    var add_formValidation = FormValidation.formValidation(document.getElementById('kt_modal_add_criteria_form'), { // Add Form Validation
        fields: {
            'yearStart': {
                validators: {
                    notEmpty: {
                        message: 'Criteria Start Year is required'
                    },
                },
            },
            'yearEnd': {
                validators: {
                    notEmpty: {
                        message: 'Criteria End Year is required'
                    },
                },
            },
            'requirements[]': {
                validators: {
                    notEmpty: {
                        message: 'Requirements is required'
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: '',
            }),
        },
    })


    $('#kt_modal_add_criteria_cancel, #kt_modal_add_criteria_close').on("click", function( // X and Discard Button
        t) { // "X" and Discard button
        t.preventDefault(),
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
                t.value ? (add_form.reset(), add_modal.hide()) : ''
            });
    });


    $("#kt_modal_add_criteria_form").on("submit", function(e) { // Add Form Submission
        e.preventDefault(),
            add_formValidation &&
            add_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    add_submitBtn.setAttribute('data-kt-indicator', 'on');
                    add_submitBtn.disabled = !0;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: $("#kt_modal_add_criteria_form").serialize(),
                        url: "{{ url('/admission-criteria/add') }}",
                        datatype: "html",
                    }).done(function(response) {

                        response = JSON.parse(response);

                        if (response['status'] == 200) {

                            add_submitBtn.removeAttribute('data-kt-indicator'),
                                Swal.fire({
                                    text: response['message'],
                                    icon: 'success',
                                    buttonsStyling: !1,
                                    allowOutsideClick: false,
                                    confirmButtonText: 'Ok, got it!',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                }).then(function(e) {

                                    if (e.isConfirmed) {
                                        add_modal.hide();
                                        add_submitBtn.disabled = !1;
                                    }
                                });
                        } else {
                            Swal.fire({
                                text: "{{ __('modal.error') }}",
                                icon: 'error',
                                buttonsStyling: !1,
                                allowOutsideClick: false,
                                confirmButtonText: 'Ok, got it!',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                            })
                        }

                        $('#kt_modal_add_criteria_form .form-select-solid').val('').trigger('change');
                        table.ajax.reload();


                    });
                } else {
                    Swal.fire({
                        text: "{{ __('modal.error_validation') }}",
                        icon: 'error',
                        buttonsStyling: !1,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                    });
                }
            });
    });

    //--end::Add Modal--//



    //--begin::Edit Modal--//
    var edit_modal = new bootstrap.Modal(document.querySelector('#kt_modal_edit_criteria'));
    var edit_submitBtn = document.getElementById('kt_modal_edit_criteria_submit');

    var edit_form = document.getElementById('kt_modal_edit_criteria_form');
    var edit_formValidation = FormValidation.formValidation(edit_form, {
        fields: {
            'yearStart': {
                validators: {
                    notEmpty: {
                        message: 'Criteria Start Year is required'
                    },
                },
            },
            'yearEnd': {
                validators: {
                    notEmpty: {
                        message: 'Criteria End Year is required'
                    },
                },
            },
            'requirements[]': {
                validators: {
                    notEmpty: {
                        message: 'Requirements is required'
                    },
                },
            },
        },
        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: '',
            }),
        },
    })

    $("#kt_criteria_table").on("click", "[kt_criteria_table_edit]", function() { // Once the Edit button on the DataTable is clicked

        const id = $(this).closest("tr").attr("id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ url('/admission-criteria/retrieve') }}",
            data: {
                id: id
            }
        }).done(function(response) {
            response = JSON.parse(response);

            if (response['data'].length == 1) {

                data = response['data'][0];

                requirements_new = [];
                requirements = data['adcr_requirements'];
                for (let i = 0; i < requirements.length; i++) {
                    requirements_new.push(requirements[i]['adre_id']);
                }

                $("#kt_modal_edit_criteria_form [name='id']").val(data['adcr_id_md5']);
                $("#kt_modal_edit_criteria_form [name='yearStart']").val(data['adcr_yearStart']).trigger('change');
                $("#kt_modal_edit_criteria_form [name='yearEnd']").val(data['adcr_yearEnd']).trigger('change');
                $("#kt_modal_edit_criteria_form [name='requirements[]']").val(requirements_new).trigger('change');

                edit_modal.show();

            } else {
                Swal.fire({
                    text: "{{ __('modal.error') }}",
                    icon: 'error',
                    buttonsStyling: !1,
                    confirmButtonText: 'Ok, got it!',
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    },
                });
            }

        });
    })

    $('#kt_modal_edit_criteria_cancel, #kt_modal_edit_criteria_close').on("click", function( // X and Discard Button
        t) {
        t.preventDefault(),
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
                t.value ? (edit_form.reset(), edit_modal.hide()) : ''
            });
    });

    $("#kt_modal_edit_criteria_form").on("submit", function(e) { // Edit Form Submission
        e.preventDefault(),
            edit_formValidation &&
            edit_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    edit_submitBtn.setAttribute('data-kt-indicator', 'on');
                    edit_submitBtn.disabled = !0;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "POST",
                        data: $("#kt_modal_edit_criteria_form").serialize(),
                        url: "{{ url('/admission-criteria/update') }}",
                        datatype: "html",
                    }).done(function(response) {
                        response = JSON.parse(response);

                        console.log(response);
                        if (response['status'] == 200) {

                            edit_submitBtn.removeAttribute('data-kt-indicator'),
                                Swal.fire({
                                    text: response['message'],
                                    icon: 'success',
                                    buttonsStyling: !1,
                                    allowOutsideClick: false,
                                    confirmButtonText: 'Ok, got it!',
                                    customClass: {
                                        confirmButton: 'btn btn-primary'
                                    },
                                }).then(function(e) {

                                    if (e.isConfirmed) {
                                        edit_modal.hide();
                                        edit_submitBtn.disabled = !1;
                                    }
                                });
                        } else {
                            Swal.fire({
                                text: "{{ __('modal.error') }}",
                                icon: 'error',
                                buttonsStyling: !1,
                                allowOutsideClick: false,
                                confirmButtonText: 'Ok, got it!',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                },
                            }).then(function(e) {
                                if (e.isConfirmed)
                                    table.ajax.reload();

                            });
                        }

                        table.ajax.reload();
                    });
                } else {
                    Swal.fire({
                        text: "{{ __('modal.error') }}",
                        icon: 'error',
                        buttonsStyling: !1,
                        confirmButtonText: 'Ok, got it!',
                        customClass: {
                            confirmButton: 'btn btn-primary'
                        },
                    });
                }
            });
    });

    //--end::Edit Modal--//

    //--begin::Delete--//

    $("#kt_criteria_table").on("click", "[kt_criteria_table_delete]", function() { // Once the Delete Button on the DataTable is clicked

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

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ url('/admission-criteria/delete') }}",
                    data: {
                        id: id
                    }
                }).done(function(response) {
                    response = JSON.parse(response);

                    if (response['status'] == 401) {
                        toastr.info(response['message']);
                    } else {
                        Swal.fire({
                            text: "{{ __('modal.error') }}",
                            icon: 'error',
                            buttonsStyling: !1,
                            confirmButtonText: 'Ok, got it!',
                            customClass: {
                                confirmButton: 'btn btn-primary'
                            },
                        });
                    }
                    table.ajax.reload();

                });
            }
        });

    });

    //--end::Delete--//
</script>

@endsection