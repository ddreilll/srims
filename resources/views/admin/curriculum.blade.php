@extends('layouts.admin')

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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_curriculum">Add Course</button>
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
                <table id="kt_curriculum_table" class="table table-row-bordered gy-5 gs-7 ">
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

<div class="modal fade" id="kt_modal_add_curriculum" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-1000px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_curriculum_form">
                <div class="modal-header" id="kt_modal_add_curriculum_header">
                    <h2 class="fw-bolder">Add Curriculum</h2>
                    <div id="kt_modal_add_curriculum_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <div class="fv-row mb-10">
                        <label class="required fs-6 fw-bold mb-2">Curriculum Code</label>
                        <input type="text" class="form-control form-control-solid" placeholder="" name="code" />
                    </div>

                    <div id="kt_modal_add_curriculum_list">

                        <a href="javascript:void(0)" id="kt_modal_add_curriculum_list_addBtn" class="mt-10 btn d-block btn-icon-primary btn-lg p-15 btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">
                            <span class="indicator-label">
                                <span class="svg-icon svg-icon-1">
                                    <span class="svg-icon svg-icon-muted svg-icon-1hx">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="black"></path>
                                            <path d="M12 22C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V21C13 21.6 12.6 22 12 22Z" fill="black"></path>
                                        </svg>
                                    </span>
                                </span>
                                Add Year Level
                            </span>
                            <span class="indicator-progress">
                                Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span>
                        </a>

                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_add_curriculum_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_curriculum_submit" class="btn btn-primary">
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
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Form-->
            <form class="form" action="#" id="kt_modal_edit_course_form">
                <input type="text" name="id" hidden />

                <!--begin::Modal header-->
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
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_course_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_edit_course_header" data-kt-scroll-wrappers="#kt_modal_edit_course_scroll" data-kt-scroll-offset="300px">
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
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    KTUtil.onDOMContentLoaded((function() {

        function reset_yearLevel_removeBtn(type) {

            last_yearLevel = $("#kt_modal_" + type + "_curriculum_list > div.year-level").last();

            $("#kt_modal_" + type + "_curriculum_list > div.year-level [kt_modal_" + type + "_curriculum_list_removeBtn]").remove();
            $(`<a href="javascript:void(0)" class="btn btn-danger btn-sm" kt_modal_${type}_curriculum_list_removeBtn>Remove</a>`).appendTo("#kt_modal_" + type + "_curriculum_list div[year-order='" + $(last_yearLevel).attr("year-order") + "'] .year-buttons");
        }

        function add_yearLevel(type) {

            addBtnId = "kt_modal_" + type + "_curriculum_list_addBtn";
            trigger_btnIndicator(addBtnId, "loading");

            yearLevels = $("#kt_modal_" + type + "_curriculum_list > div.year-level");

            axios({
                method: "GET",
                url: "{{ url('/settings/year-level/retrieveAll') }}",
                timeout: "{{ $axios_timeout }}"
            }).then(function(respond) {
                trigger_btnIndicator(addBtnId, "default");

                if (respond.status == 200) {

                    d = respond.data;
                    yearLevels_length = yearLevels.length;
                    yearLevels_data_length = d.length;

                    if (yearLevels_data_length > yearLevels_length) {

                        for (let i = 0; i < yearLevels_data_length; i++) {
                            if (d[i]['year_order'] == yearLevels_length + 1) {
                                d_name = d[i]['year_name'];
                                d_id = d[i]['year_id'];
                                d_order = d[i]['year_order'];
                            }
                        }

                        append_element = $(`<div class="mt-5 card card-bordered shadow-sm year-level" year-id="${d_id}" year-order="${d_order}">
                            <div class="card-header bg-gray-300">
                                <h3 class="card-title fw-bolder">${d_name}</h3>
                                <div class="card-toolbar year-buttons">
                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" kt_modal_add_curriculum_list_removeBtn>Remove
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="card card-dashed">
                                    <div class="card-header min-h-60px" hidden>
                                        <h3 class="card-title">1st Semester</h3>
                                        <div class="card-toolbar">
                                            <button type="button" class="btn btn-sm btn-light">
                                                Action
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        Lorem Ipsum is simply dummy text...
                                    </div>
                                </div>

                                
                                <a href="javascript:void(0)" id="kt_modal_add_curriculum_semester_${d_id}_addBtn" kt_modal_add_curriculum_semester_addBtn class="mt-10 btn d-block btn-icon-primary p-10 btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary">
                                    <span class="indicator-label">
                                        <span class="svg-icon svg-icon-1">
                                            <span class="svg-icon svg-icon-muted svg-icon-1hx">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                                    <path opacity="0.3" d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="black"></path>
                                                    <path d="M12 22C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V21C13 21.6 12.6 22 12 22Z" fill="black"></path>
                                                </svg>
                                            </span>
                                        </span>
                                        Add Semester
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </a>
                            </div>
                        </div>`);

                        if (yearLevels_length >= 1) {
                            append_element.insertAfter(yearLevels.last());
                        } else if (yearLevels_length == 0) {
                            append_element.prependTo("#kt_modal_" + type + "_curriculum_list");
                        }

                        // Hide the add button if total Year level reached
                        if (yearLevels_length + 1 == yearLevels_data_length) {
                            $("#" + addBtnId).attr("style", "display: none !important");
                        } else {
                            $("#" + addBtnId).attr("style", "");
                        }

                        reset_yearLevel_removeBtn(type);
                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                        $("#" + addBtnId).attr("style", "display: none !important");
                    }
                }
            }).catch(function(error) {
                display_axios_error(error);
            });
        }

        function remove_yearLevel(e, type) {

            last_yearLevel = $("#kt_modal_" + type + "_curriculum_list > div.year-level").last();

            if ($(last_yearLevel).attr("year-order") == $(e).closest(".card").attr("year-order")) {

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'remove']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    allowOutsideClick: false,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'remove']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-primary',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.isConfirmed) {
                        $(e).closest(".year-level").remove();
                        $("#kt_modal_" + type + "_curriculum_list_addBtn").attr("style", "");

                        reset_yearLevel_removeBtn(type);
                    }
                });
            } else {
                display_modal_error("{{ __('modal.error_delete', ['reason' => 'Please delete the last Year level first']) }}");
            }

        }


        var table = $("#kt_curriculum_table").DataTable({ // Retrieve all the data
            processing: true,
            ajax: {
                url: "{{ url('/course/retrieveAll') }}",
                dataSrc: function(data) {
                    var return_data = new Array();
                    if (data['status'] == 200) {
                        d = data['data'];
                        for (let i = 0; i < d.length; i++) {
                            return_data.push({
                                DT_RowId: d[i]["cour_id_md5"],
                                Code: d[i]["cour_code"],
                                Name: d[i]["cour_name"],
                                Description: d[i]["cour_description"],
                                Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                            <a href="javascript:void(0)" kt_curriculum_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                                <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                                <span class="svg-icon svg-icon-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                        <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <a href="javascript:void(0)" kt_curriculum_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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
                    data: 'Code'
                },
                {
                    data: 'Name'
                },
                {
                    data: 'Description'
                },
                {
                    data: 'Action'
                },
            ],
        });


        $('[data-kt-course-table-filter="search"]').on('keyup', function(e) { // Search bar 
            table.search(e.target.value).draw();
        });

        //--begin::Add Modal--//

        var add_modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_curriculum'));
        var add_submitBtn = document.getElementById('kt_modal_add_curriculum_submit');

        var add_form = document.getElementById('kt_modal_add_curriculum_form');
        var add_formValidation = FormValidation.formValidation(document.getElementById(
            'kt_modal_add_curriculum_form'), { // Add Form Validation
            fields: {
                'code': {
                    validators: {
                        notEmpty: {
                            message: 'Course Code is required'
                        },
                    },
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Course Name is required'
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

        $("#kt_modal_add_curriculum_list").on("click", "#kt_modal_add_curriculum_list_addBtn", function() {
            add_yearLevel("add");
        });

        $("#kt_modal_add_curriculum_list").on("click", "[kt_modal_add_curriculum_list_removeBtn]", function() {
            remove_yearLevel(this, "add");
        });

        $('#kt_modal_add_curriculum_cancel, #kt_modal_add_curriculum_close').on("click", function( // X and Discard Button
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


        $("#kt_modal_add_curriculum_form").on("submit", function(e) { // Add Form Submission
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
                            data: $("#kt_modal_add_curriculum_form").serialize(),
                            url: "{{ url('/course/add') }}",
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
                                }).then(function(e) {
                                    if (e.isConfirmed)
                                        table.ajax.reload();
                                });
                            }

                            add_form.reset();
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

        //--end::Add Modal--//



        //--begin::Edit Modal--//
        var edit_modal = new bootstrap.Modal(document.querySelector('#kt_modal_edit_course'));
        var edit_submitBtn = document.getElementById('kt_modal_edit_course_submit');

        var edit_form = document.getElementById('kt_modal_edit_course_form');
        var edit_formValidation = FormValidation.formValidation(edit_form, {
            fields: {
                'code': {
                    validators: {
                        notEmpty: {
                            message: 'Course Code is required'
                        },
                    },
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Course Name is required'
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

        $("#kt_curriculum_table").on("click", "[kt_curriculum_table_edit]",
            function() { // Once the Edit button on the DataTable is clicked

                const id = $(this).closest("tr").attr("id");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "{{ url('/course/retrieve') }}",
                    data: {
                        id: id
                    }
                }).done(function(response) {
                    response = JSON.parse(response);

                    if (response['data'].length == 1) {

                        data = response['data'][0];

                        $("#kt_modal_edit_course_form [name='id']").val(data['cour_id_md5']);
                        $("#kt_modal_edit_course_form [name='code']").val(data['cour_code']);
                        $("#kt_modal_edit_course_form [name='name']").val(data['cour_name']);
                        $("#kt_modal_edit_course_form [name='description']").val(data['cour_description']);

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

        $('#kt_modal_edit_course_cancel, #kt_modal_edit_course_close').on("click", function( // X and Discard Button
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

        $("#kt_modal_edit_course_form").on("submit", function(e) { // Edit Form Submission
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
                            data: $("#kt_modal_edit_course_form").serialize(),
                            url: "{{ url('/course/update') }}",
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

        $("#kt_curriculum_table").on("click", "[kt_curriculum_table_delete]",
            function() { // Once the Delete Button on the DataTable is clicked

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
                            url: "{{ url('/course/delete') }}",
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

    }));
</script>
@endsection