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

                <table id="kt_criteria_table" class="table table-row-bordered gy-5 gs-7">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>Start Year</th>
                            <th>End Year</th>
                            <th>No. of Requirements</th>
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
                            Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                            <a href="javascript:void(0)" kt_criteria_table_view class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <path d="M21.7 18.9L18.6 15.8C17.9 16.9 16.9 17.9 15.8 18.6L18.9 21.7C19.3 22.1 19.9 22.1 20.3 21.7L21.7 20.3C22.1 19.9 22.1 19.3 21.7 18.9Z" fill="black"/>
                                                    <path opacity="0.3" d="M11 20C6 20 2 16 2 11C2 6 6 2 11 2C16 2 20 6 20 11C20 16 16 20 11 20ZM11 4C7.1 4 4 7.1 4 11C4 14.9 7.1 18 11 18C14.9 18 18 14.9 18 11C18 7.1 14.9 4 11 4ZM8 11C8 9.3 9.3 8 11 8C11.6 8 12 7.6 12 7C12 6.4 11.6 6 11 6C8.2 6 6 8.2 6 11C6 11.6 6.4 12 7 12C7.6 12 8 11.6 8 11Z" fill="black"/>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="javascript:void(0)" kt_criteria_table_edit class="btn btn-icon btn-light-warning btn-active-warning btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="javascript:void(0)" kt_criteria_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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