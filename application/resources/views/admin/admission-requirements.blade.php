@extends('layouts.default')

@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-8">
            <div class="card-header border-0 pt-6">
                <!--begin::Card title-->
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
                        <input type="text" data-kt-requirement-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Requirements" />
                    </div>
                    <!--end::Search-->
                </div>
                <!--begin::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    <!--begin::Toolbar-->
                    <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                        <!--begin::Filter-->
                        <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Filter
                        </button>
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true" id="kt-toolbar-filter">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-4 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Separator-->
                            <!--begin::Content-->
                            <div class="px-7 py-5">
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Month:</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid fw-bolder" data-kt-select2="true" data-placeholder="Select option" data-allow-clear="true" data-kt-customer-table-filter="month" data-dropdown-parent="#kt-toolbar-filter">
                                        <option></option>
                                        <option value="aug">August</option>
                                        <option value="sep">September</option>
                                        <option value="oct">October</option>
                                        <option value="nov">November</option>
                                        <option value="dec">December</option>
                                    </select>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="mb-10">
                                    <!--begin::Label-->
                                    <label class="form-label fs-5 fw-bold mb-3">Payment Type:</label>
                                    <!--end::Label-->
                                    <!--begin::Options-->
                                    <div class="d-flex flex-column flex-wrap fw-bold" data-kt-customer-table-filter="payment_type">
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="payment_type" value="all" checked="checked" />
                                            <span class="form-check-label text-gray-600">All</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3 me-5">
                                            <input class="form-check-input" type="radio" name="payment_type" value="visa" />
                                            <span class="form-check-label text-gray-600">Visa</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid mb-3">
                                            <input class="form-check-input" type="radio" name="payment_type" value="mastercard" />
                                            <span class="form-check-label text-gray-600">Mastercard</span>
                                        </label>
                                        <!--end::Option-->
                                        <!--begin::Option-->
                                        <label class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" name="payment_type" value="american_express" />
                                            <span class="form-check-label text-gray-600">American Express</span>
                                        </label>
                                        <!--end::Option-->
                                    </div>
                                    <!--end::Options-->
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true" data-kt-customer-table-filter="reset">Reset</button>
                                    <button type="submit" class="btn btn-primary" data-kt-menu-dismiss="true" data-kt-customer-table-filter="filter">Apply</button>
                                </div>
                                <!--end::Actions-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Menu 1-->
                        <!--end::Filter-->
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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_requirement">Add Requirement</button>
                        <!--end::Add customer-->
                    </div>
                    <!--end::Toolbar-->
                    <!--begin::Group actions-->
                    <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
                        <div class="fw-bolder me-5">
                            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
                        </div>
                        <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
                    </div>
                    <!--end::Group actions-->
                </div>
                <!--end::Card toolbar-->
            </div>

            <div class="card-body py-3">

                <table id="kt_requirement_table" class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                    <thead>
                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
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


<div class="modal fade" id="kt_modal_add_requirement" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_add_requirement_form">

                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_add_customer_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Add Requirement</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_add_requirement_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_add_customer_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_customer_header" data-kt-scroll-wrappers="#kt_modal_add_customer_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
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

                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                            <!--end::Input-->
                        </div>

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_add_requirement_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_add_requirement_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>

<div class="modal fade" id="kt_modal_edit_requirement" tabindex="-1">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_edit_requirement_form">
                <input type="text" name="id" hidden />

                <!--begin::Modal header-->
                <div class="modal-header" id="kt_modal_edit_requirement_header">
                    <!--begin::Modal title-->
                    <h2 class="fw-bolder">Edit Requirement</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div id="kt_modal_edit_requirement_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_requirement_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_requirement_header" data-kt-scroll-wrappers="#kt_modal_edit_requirement_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Input group-->
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

                        <div class="fv-row mb-15">
                            <!--begin::Label-->
                            <label class="fs-6 fw-bold mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-solid" placeholder="" name="description" />
                            <!--end::Input-->
                        </div>

                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">
                    <!--begin::Button-->
                    <button type="reset" id="kt_modal_edit_requirement_cancel" class="btn btn-light me-3">Discard</button>
                    <!--end::Button-->
                    <!--begin::Button-->
                    <button type="submit" id="kt_modal_edit_requirement_submit" class="btn btn-primary">
                        <span class="indicator-label">Update</span>
                        <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">

    var table = $("#kt_requirement_table").DataTable({ // Retrieve all the data
        processing: true,
        ajax: {
            url: "{{ url('/admission-requirements/retrieveAll') }}",
            dataSrc: function(data) {
                var return_data = new Array();

                if (data['status'] == 200) {
                    d = data['data'];

                    for (let i = 0; i < d.length; i++) {

                        return_data.push({
                            DT_RowId: d[i]["adre_id"],
                            Code: d[i]["adre_docuCode"],
                            Name: d[i]["adre_docuName"],
                            Description: d[i]["adre_docuDescription"],
                            __: `<div class="text-center"><a href="javascript:void(0)" kt_table_requirement_edit
                                    class="btn btn-icon btn-success"><i style="padding-left: 0.5rem;"
                                        class="las la-edit fs-2 me-2"></i></a> <a href="javascript:void(0)"
                                    kt_table_requirement_delete class="btn btn-icon btn-danger"><i
                                        style="padding-left: 0.5rem;" class="las la-trash fs-2 me-2"></i></a></div>`,
                        });

                    };

                    return return_data;

                }

            }
        },
        columns: [{
                data: 'Code'
            },
            {
                data: 'Name'
            },
            {
                data: 'Description'
            },
            {
                data: '__'
            },
        ],
    });


    $('[data-kt-requirement-table-filter="search"]').on('keyup', function(e) { // Search bar 
        table.search(e.target.value).draw();
    });

    //--begin::Add Modal--//

    var add_modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_requirement'));
    var add_submitBtn = document.getElementById('kt_modal_add_requirement_submit');

    var add_form = document.getElementById('kt_modal_add_requirement_form');
    var add_formValidation = FormValidation.formValidation(document.getElementById('kt_modal_add_requirement_form'), { // Add Form Validation
        fields: {
            'code': {
                validators: {
                    notEmpty: {
                        message: 'Requirement Code is required'
                    },
                },
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'Requirement Name is required'
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


    $('#kt_modal_add_requirement_cancel, #kt_modal_add_requirement_close').on("click", function( // X and Discard Button
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


    $("#kt_modal_add_requirement_form").on("submit", function(e) { // Add Form Submission
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
                        data: $("#kt_modal_add_requirement_form").serialize(),
                        url: "{{ url('/admission-requirements/add') }}",
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
                                        add_form.reset();
                                        table.ajax.reload();
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

    //--end::Add Modal--//



    //--begin::Edit Modal--//
    var edit_modal = new bootstrap.Modal(document.querySelector('#kt_modal_edit_requirement'));
    var edit_submitBtn = document.getElementById('kt_modal_edit_requirement_submit');

    var edit_form = document.getElementById('kt_modal_edit_requirement_form');
    var edit_formValidation = FormValidation.formValidation(edit_form, {
        fields: {
            'code': {
                validators: {
                    notEmpty: {
                        message: 'Requirement Code is required'
                    },
                },
            },
            name: {
                validators: {
                    notEmpty: {
                        message: 'Requirement Name is required'
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

    $("#kt_requirement_table").on("click", "[kt_table_requirement_edit]", function() { // Once the Edit button on the DataTable is clicked

        const id = $(this).closest("tr").attr("id");

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "{{ url('/admission-requirements/retrieve') }}",
            data: {
                id: id
            }
        }).done(function(response) {
            response = JSON.parse(response);

            if (response['data'].length == 1) {

                data = response['data'][0];
                edit_modal.show();

                $("#kt_modal_edit_requirement_form [name='id']").val(data['adre_id']);
                $("#kt_modal_edit_requirement_form [name='code']").val(data['adre_docuCode']);
                $("#kt_modal_edit_requirement_form [name='name']").val(data['adre_docuName']);
                $("#kt_modal_edit_requirement_form [name='description']").val(data['adre_docuDescription']);

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


    $('#kt_modal_edit_requirement_cancel, #kt_modal_edit_requirement_close').on("click", function( // X and Discard Button
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
                t.value ? (edit_form.reset(), edit_modal.hide()) : ''
            });
    });

    $("#kt_modal_edit_requirement_form").on("submit", function(e) { // Edit Form Submission
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
                        data: $("#kt_modal_edit_requirement_form").serialize(),
                        url: "{{ url('/admission-requirements/update') }}",
                        datatype: "html",
                    }).done(function(response) {
                        response = JSON.parse(response);

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
                                        table.ajax.reload();
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

    $("#kt_requirement_table").on("click", "[kt_table_requirement_delete]", function() { // Once the Delete Button on the DataTable is clicked

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
                    url: "{{ url('/admission-requirements/delete') }}",
                    data: {
                        id: id
                    }
                }).done(function(response) {
                    response = JSON.parse(response);

                    if (response['status'] == 401) {
                        toastr.info("{{ __('modal.deleted_success', ['attribute' => 'Requirement']) }}");
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