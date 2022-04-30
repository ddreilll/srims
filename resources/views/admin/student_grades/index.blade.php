@extends('layouts.admin')

@section('styles')
    <style>
        .daterangepicker.show-calendar .ranges {
            height: 0px;
        }

    </style>
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-xxl">
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
                            <input type="text" data-kt-student-grades-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Student Grades" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_student_grades">Add Student Grades</button>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="kt_student_grades_table" class="table table-row-bordered gy-5 gs-7 ">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Student No.</th>
                                <th>Student</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Semester</th>
                                <th>School Year</th>
                                <th>Instructor</th>
                                <th>Final Grade</th>
                                <th>Remarks</th>
                                <th>Status</th>
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

    <div class="modal fade" id="kt_modal_add_student_grades" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_add_student_grades_form">

                    <div class="modal-header" id="kt_modal_add_student_grades_header">
                        <h2 class="fw-bolder">Add Student Grades</h2>
                        <div id="kt_modal_add_student_grades_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Student</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a student" data-dropdown-parent="#kt_modal_add_student_grades_form"
                                name="student">
                                <option></option>
                                @foreach ($formData_students as $student)
                                    <option value="{{ $student->stud_id }}">
                                        {{ $student->stud_studentNo . ' ― ' . $student->stud_fullName . ' │ ' . $student->stud_course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-5 fw-bold mb-3">Class Schedule</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a class schedule"
                                data-dropdown-parent="#kt_modal_add_student_grades_form" name="schedule">
                                <option></option>
                                @foreach ($formData_schedule as $schedule)
                                    <option value="{{ $schedule->sche_id }}">
                                        {{ $schedule->sche_section .' ― ' .$schedule->sche_subj_code .' │ ' .$schedule->sche_subj_name .' │ ' .$schedule->sche_term_name .' │ ' .$schedule->sche_acadYear_short .' │ ' .$schedule->sche_inst_fullName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="rounded border p-10 mb-10">
                            <div class="fv-row">
                                <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="D">
                                        (D) Dropped
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" checked="checked"
                                            value="W">
                                        (W) Withdrawn
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="INC">
                                        (INC) Incomplete
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white active"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="">
                                        Not Applicable
                                    </label>
                                </div>
                            </div>

                            <div class="fv-row mt-7">
                                <label class="fs-6 fw-bold mb-2">Grade</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a grade"
                                    data-dropdown-parent="#kt_modal_add_student_grades_form" data-allow-clear="true"
                                    name="grade">
                                    <option></option>

                                    @for ($i = 0; $i < sizeof($formData_grades); $i++)
                                        <option value="{{ $formData_grades[$i]['value'] }}">
                                            {{ number_format($formData_grades[$i]['value'], 2) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_student_grades_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_add_student_grades_submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_edit_student_grades" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_edit_student_grades_form">
                    <input type="text" name="id" hidden />

                    <div class="modal-header" id="kt_modal_edit_student_grades_header">
                        <h2 class="fw-bolder">Edit Student Grades</h2>
                        <div id="kt_modal_edit_student_grades_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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

                        <div class="fv-row mb-7">
                            <label class="required form-label fs-5 fw-bold mb-3">Student</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a student"
                                data-dropdown-parent="#kt_modal_edit_student_grades_form" name="student">
                                <option></option>
                                @foreach ($formData_students as $student)
                                    <option value="{{ $student->stud_id }}">
                                        {{ $student->stud_studentNo . ' ― ' . $student->stud_fullName . ' │ ' . $student->stud_course }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="fv-row mb-10">
                            <label class="required form-label fs-5 fw-bold mb-3">Class Schedule</label>
                            <select class="form-select form-select-solid" data-control="select2"
                                data-placeholder="Select a class schedule"
                                data-dropdown-parent="#kt_modal_edit_student_grades_form" name="schedule">
                                <option></option>
                                @foreach ($formData_schedule as $schedule)
                                    <option value="{{ $schedule->sche_id }}">
                                        {{ $schedule->sche_section .' ― ' .$schedule->sche_subj_code .' │ ' .$schedule->sche_subj_name .' │ ' .$schedule->sche_term_name .' │ ' .$schedule->sche_acadYear_short .' │ ' .$schedule->sche_inst_fullName }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="rounded border p-10 mb-10">
                            <div class="fv-row">
                                <div class="btn-group w-100 w-lg-50" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="D">
                                        (D) Dropped
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" checked="checked"
                                            value="W">
                                        (W) Withdrawn
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="INC">
                                        (INC) Incomplete
                                    </label>

                                    <label class="btn btn-outline-dark btn-outline btn-active-color-white active"
                                        data-kt-button="true">
                                        <input class="btn-check" type="radio" name="other_grades" value="">
                                        Not Applicable
                                    </label>
                                </div>
                            </div>

                            <div class="fv-row mt-7">
                                <label class="fs-6 fw-bold mb-2">Grade</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a grade"
                                    data-dropdown-parent="#kt_modal_edit_student_grades_form" data-allow-clear="true"
                                    name="grade">
                                    <option></option>

                                    @for ($i = 0; $i < sizeof($formData_grades); $i++)
                                        <option value="{{ $formData_grades[$i]['value'] }}">
                                            {{ number_format($formData_grades[$i]['value'], 2) }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_edit_student_grades_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_edit_student_grades_submit" class="btn btn-primary">
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

                return $("#kt_modal_" + type + "_student_grades_form").serialize();
            }

            function reset_form(type) {
                $('#kt_modal_' + type + '_student_grades_form .form-select-solid').val('').trigger('change');
                $('#kt_modal_' + type + '_student_grades_form .form-control-solid').val('');
            }

            var form_fields = {
                'student': {
                    validators: {
                        notEmpty: {
                            message: 'Student is required'
                        },
                    },
                },
                'schedule': {
                    validators: {
                        notEmpty: {
                            message: 'Schedule is required'
                        },
                    },
                },
            };

            var table = $("#kt_student_grades_table").DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ url('/student/grades/retrieveAll') }}",
                    dataFilter: function(d) {
                        var d = jQuery.parseJSON(d);

                        d.raw_data = d.data;
                        d.data = [];

                        for (let i = 0; i < d.raw_data.length; i++) {

                            href = (d.raw_data[i]["enrsub_stud_no"]) ?
                                `<a href="{{ url('student/profile') }}/${d.raw_data[i]["enrsub_stud_uuid"]}" target="_blank"> ${d.raw_data[i]["enrsub_stud_no"]}</a>` :
                                "";

                            d.data.push({
                                DT_RowId: d.raw_data[i]["enrsub_id_md5"],
                                StudentNo: href,
                                Student: d.raw_data[i]["enrsub_stud_fullName"],
                                Subject: d.raw_data[i]["enrsub_subj_code"],
                                Description: d.raw_data[i]["enrsub_subj_name"],
                                Semester: d.raw_data[i]["enrsub_term_name"],
                                SchoolYear: d.raw_data[i]["enrsub_sche_acadYear_short"],
                                Instructor: d.raw_data[i]["enrsub_inst_fullName"],
                                FinalGrade: d.raw_data[i]["enrsub_grade_display"],
                                Remarks: d.raw_data[i]["enrsub_remarks"],
                                Status: d.raw_data[i]["enrsub_status"],
                                Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                    <a href="javascript:void(0)" kt_student_grades_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="javascript:void(0)" kt_student_grades_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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

                        d.recordsTotal = d.total;
                        d.recordsFiltered = d.total;

                        console.log(JSON.stringify(d))
                        return JSON.stringify(d);

                    },
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error_reload("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'StudentNo'
                    },
                    {
                        data: 'Student'
                    },
                    {
                        data: 'Subject'
                    },
                    {
                        data: 'Description'
                    },
                    {
                        data: 'Semester'
                    },
                    {
                        data: 'SchoolYear'
                    },
                    {
                        data: 'Instructor'
                    },
                    {
                        data: 'FinalGrade'
                    },
                    {
                        data: 'Remarks'
                    },
                    {
                        data: 'Status'
                    },
                    {
                        data: 'Action'
                    },
                ],
            });

            $('[data-kt-student-grades-table-filter="search"]').on('keyup', function(e) { // Search bar 
                table.search(e.target.value).draw();
            });


            var add_modal = init_modal("kt_modal_add_student_grades");
            var add_submitBtnId = "kt_modal_add_student_grades_submit";
            var add_formValidation = init_formValidation("kt_modal_add_student_grades_form", form_fields);

            $('#kt_modal_add_student_grades_cancel, #kt_modal_add_student_grades_close').on("click", function(
                t) {
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

            $("#kt_modal_add_student_grades_form").on("submit", function(e) {
                e.preventDefault();

                add_formValidation.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(add_submitBtnId, "loading");

                        axios({
                            method: "POST",
                            url: "{{ url('/student/grades/add') }}",
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

            $("#kt_modal_add_student_grades_form input[name='other_grades']").on("change", function() {

                if ($(this).val() == 'D' || $(this).val() == 'W') {
                    $($(
                            "#kt_modal_add_student_grades_form [name='grade']").closest(".fv-row"))
                        .prop(
                            'hidden', true);
                    $('#kt_modal_add_student_grades_form [name="grade"]').val('').trigger('change')
                } else {
                    $($("#kt_modal_add_student_grades_form [name='grade']")
                        .closest(".fv-row")).prop('hidden', false);
                }
            });



            var edit_modal = init_modal("kt_modal_edit_student_grades");
            var edit_submitBtnId = "kt_modal_edit_student_grades_submit";
            var edit_formValidation = init_formValidation("kt_modal_edit_student_grades_form", form_fields);

            $('#kt_modal_edit_student_grades_cancel, #kt_modal_edit_student_grades_close').on("click",
                function(t) {
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

            $("#kt_student_grades_table").on("click", "[kt_student_grades_table_edit]", function() {

                const id = $(this).closest("tr").attr("id");

                axios({
                    method: "POST",
                    url: "{{ url('/student/grades/retrieve') }}",
                    data: {
                        id: id
                    },
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {

                    if (respond.status == 200) {

                        if (respond.data.length == 1) {
                            d = respond.data[0];

                            $('#kt_modal_edit_student_grades_form [name="id"]').val(d[
                                'enrsub_id_md5']);
                            $('#kt_modal_edit_student_grades_form [name="student"]').val(d[
                                'stud_enrsub_id']).trigger('change');
                            $('#kt_modal_edit_student_grades_form [name="schedule"]').val(
                                d['sche_enrsub_id']).trigger('change');
                            $('#kt_modal_edit_student_grades_form [name="grade"]')
                                .val((d['enrsub_grade'] * 1)).trigger('change');

                            $('#kt_modal_edit_student_grades_form [name="other_grades"][value="' +
                                    d['enrsub_otherGrade'] + '"]')
                                .prop("checked", true);

                            $($('#kt_modal_edit_student_grades_form [name="other_grades"]')
                                .closest("label")).removeClass("active");
                            $($('#kt_modal_edit_student_grades_form [name="other_grades"]:checked')
                                .closest("label")).addClass(
                                "active");

                            if (d['enrsub_otherGrade'] == 'D' || d['enrsub_otherGrade'] ==
                                'W') {
                                $($(
                                        "#kt_modal_edit_student_grades_form [name='grade']"
                                    ).closest(".fv-row"))
                                    .prop(
                                        'hidden', true);
                                $('#kt_modal_edit_student_grades_form [name="grade"]').val('')
                                    .trigger('change')
                            } else {
                                $($("#kt_modal_edit_student_grades_form [name='grade']")
                                    .closest(".fv-row")).prop('hidden', false);
                            }

                            edit_modal.show();
                        }

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                }).catch(function(error) {
                    display_axios_error(error);
                });
            })

            $("#kt_modal_edit_student_grades_form").on("submit", function(e) {
                e.preventDefault();

                edit_formValidation.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(edit_submitBtnId, "loading");

                        axios({
                            method: "POST",
                            url: "{{ url('/student/grades/update') }}",
                            data: retrieve_form_data("edit"),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(edit_submitBtnId, "default");

                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                                edit_modal.hide();
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            reset_form("edit");
                            table.ajax.reload();
                        }).catch(function(error) {

                            display_axios_error(error);
                        });

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });
            });

            $("#kt_modal_edit_student_grades_form input[name='other_grades']").on("change", function() {

                if ($(this).val() == 'D' || $(this).val() == 'W') {
                    $($(
                            "#kt_modal_edit_student_grades_form [name='grade']").closest(
                            ".fv-row"))
                        .prop(
                            'hidden', true);
                } else {
                    $($("#kt_modal_edit_student_grades_form [name='grade']")
                        .closest(".fv-row")).prop('hidden', false);
                }
            });


            $("#kt_student_grades_table").on("click", "[kt_student_grades_table_delete]", function() {

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
                            url: "{{ url('/student/grades/delete') }}",
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
