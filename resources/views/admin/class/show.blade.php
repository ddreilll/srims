@extends('layouts.fluid')


@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <div id="kt_content_container" class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <div class="card mb-5 mb-xl-8">

                        <div class="card-body pt-15">
                            <div class="d-flex flex-center flex-column mb-5">
                                <p class="mb-1 text-gray-800 fw-boldest fs-5">{{ $class->class_subj_code }}</p>
                                <p class="fs-3 fw-bolder mb-1 text-center">
                                    {{ $class->class_subj_name }}</p>

                                {!! $class->class_section ? '<span class="badge badge-light-dark fs-6 my-5">' . $class->class_section . '<span>' : '' !!}
                            </div>

                            <div class="d-flex flex-stack fs-4 py-3">
                                <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse"
                                    href="#kt_class_view_details" role="button" aria-expanded="false"
                                    aria-controls="kt_class_view_details">Details
                                    <span class="ms-2 rotate-180">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                {{-- <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit class details">
                                    <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_update_class">Edit</a>
                                </span> --}}
                            </div>

                            <div class="separator separator-dashed my-3"></div>
                            <div id="kt_class_view_details" class="collapse show">
                                <div class="py-5 fs-6">

                                    <div class="fw-bolder mt-5">Semester & SY</div>
                                    <div class="text-gray-600">{{ $class->class_sem_sy }}</div>

                                    <div class="fw-bolder mt-5">Day & Time</div>
                                    <div class="text-gray-600">
                                        {{ $class->class_day_time ? $class->class_day_time : 'N/A' }}</div>

                                    <div class="fw-bolder mt-5">Room</div>
                                    <div class="text-gray-600">{{ $class->class_room ? $class->class_room : 'N/A' }}
                                    </div>

                                    <div class="fw-bolder mt-5">Instructor</div>
                                    <div class="text-gray-600">{{ $class->class_instructor }}</div>

                                    @if ($class->class_file_link)
                                        <div
                                            class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-5 p-6 mt-10">
                                            <span class="svg-icon svg-icon-2tx svg-icon-primary me-4">
                                                <img width="40" alt="Google Drive icon"
                                                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/Google_Drive_icon_%282020%29.svg/512px-Google_Drive_icon_%282020%29.svg.png">
                                            </span>
                                            <div class="d-flex flex-stack flex-grow-1">
                                                <div class="fw-bold">
                                                    <div class="fs-6 text-gray-700">Google Drive file found<br>
                                                        <a href="{{ $class->class_file_link }}" class="me-1" target="_blank">Click here to view
                                                            the file</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="card mb-5 mb-xl-8">
                        <div class="card-header border-0 pt-6">
                            <div class="card-title">
                                <div class="d-flex align-items-center position-relative my-1">
                                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="black" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <input type="text" data-kt-student-grades-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-15" placeholder="Search" />
                                </div>
                            </div>
                            <div class="card-toolbar">
                                <div class="d-flex justify-content-end">
                                    <div id="kt_student_grades_table_buttons" class="me-2">

                                    </div>
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#kt_modal_add_student_grade ">Add Student</button>
                                </div>
                            </div>
                        </div>
                        <form class="form" action="#" id="kt_form_edit_student_grade">
                            <input type="text" name="grade_id" hidden>

                            <div class="card-body py-3">

                                <div>
                                    <div class="fv-row mb-7" id="edit_template_midterm_grade"
                                        style="display:none !important">
                                        <select class="form-select form-select-solid" data-placeholder="Grade"
                                            data-allow-clear="true" data-dropdown-parent="#kt_form_edit_student_grade"
                                            data-name="midterm_grade">
                                            <option></option>
                                            @foreach (get_grading_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="fv-row mb-7" id="edit_template_final_grade"
                                        style="display:none !important">
                                        <select class="form-select form-select-solid" data-placeholder="Grade"
                                            data-allow-clear="true" data-dropdown-parent="#kt_form_edit_student_grade"
                                            data-name="final_grade">
                                            <option></option>
                                            @foreach (get_grading_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="fv-row mb-7" id="edit_template_final_rating"
                                        style="display:none !important">
                                        <select class="form-select form-select-solid" data-placeholder="Rating"
                                            data-allow-clear="true" data-dropdown-parent="#kt_form_edit_student_grade"
                                            data-name="final_rating">
                                            <option></option>
                                            @foreach (get_final_rating_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="fv-row mb-7" id="edit_template_grade_status"
                                        style="display:none !important">
                                        <select class="form-select form-select-solid" data-placeholder="Status"
                                            data-allow-clear="true" data-dropdown-parent="#kt_form_edit_student_grade"
                                            data-name="grade_status">
                                            <option></option>
                                            @foreach (get_grading_status_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <table id="kt_student_grades_table" class="table table-row-bordered gy-5 gs-7">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                            <th>No.</th>
                                            <th>Student No.</th>
                                            <th>Name</th>
                                            <th>Course</th>
                                            <th>Midterm</th>
                                            <th>Final</th>
                                            <th>Final Rating</th>
                                            <th>Grade Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_add_student_grade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_add_student_grade_form">
                    <input type="text" name="class_id" value="{{ $class->class_id }}" hidden>

                    <div class="modal-header" id="kt_modal_add_student_grade_header">
                        <h2 class="fw-bolder">Add Student</h2>
                        <div id="kt_modal_add_student_grade_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                            <span class="svg-icon svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                        rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                        transform="rotate(45 7.41422 6)" fill="black" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    <div class="modal-body py-10 px-lg-17">

                        <div class="d-flex align-items-center position-relative mt-3 mb-10">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" data-kt-student-profile-table-filter="search"
                                class="form-control form-control-solid form-control-lg ps-15"
                                placeholder="Search by Student number or full name" />
                        </div>

                        <table id="kt_modal_add_student_grade_table"
                            class="table table-hover table-rounded table-striped border gy-5 gs-7">
                            <thead>
                                <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                    <th>SNo.</th>
                                    <th>First name</th>
                                    <th>Middle name</th>
                                    <th>Last name</th>
                                    <th>Course</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                        <div class="separator separator-content border-dark my-15"><span
                                class="w-250px fw-bolder">Imported Student Profiles</span></div>

                        <div class="card-body pt-0" id="kt_modal_add_student_grade_imported_list">

                            <div id="kt_modal_add_student_grade_imported_template"
                                class="row mt-7 border border-dashed border-bottom-1 border-top-0 border-left-0 border-right-0"
                                style="display:none !important">

                                <div class="col-3">
                                    <input data-name="student.id" type="text" hidden>
                                    <p class="mb-0 fs-6 fw-bold" data-name="student.no"></p>
                                    <p class="fs-6" data-name="student.name"></p>
                                </div>

                                <div class="col-2">
                                    <div class="fv-row mb-7">
                                        <select class="form-select form-select-solid" data-placeholder="Midterm"
                                            data-allow-clear="true"
                                            data-dropdown-parent="#kt_modal_add_student_grade_form"
                                            data-name="student.midterm_grade">
                                            <option></option>
                                            @foreach (get_grading_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="fv-row mb-7">
                                        <select class="form-select form-select-solid" data-placeholder="Final"
                                            data-allow-clear="true"
                                            data-dropdown-parent="#kt_modal_add_student_grade_form"
                                            data-name="student.final_grade">
                                            <option></option>
                                            @foreach (get_grading_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="fv-row mb-7">
                                        <select class="form-select form-select-solid" data-placeholder="Final Rating"
                                            data-allow-clear="true"
                                            data-dropdown-parent="#kt_modal_add_student_grade_form"
                                            data-name="student.final_rating">
                                            <option></option>
                                            @foreach (get_final_rating_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-2">
                                    <div class="fv-row mb-7">
                                        <select class="form-select form-select-solid" data-placeholder="Status"
                                            data-allow-clear="true"
                                            data-dropdown-parent="#kt_modal_add_student_grade_form"
                                            data-name="student.grade_status">
                                            <option></option>
                                            @foreach (get_grading_status_list() as $grade)
                                                <option value="{{ $grade['value'] }}">
                                                    {{ $grade['value'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-1">
                                    <button kt_modal_add_student_grade_imported_remove type="button"
                                        class="btn btn-icon btn-secondary btn-sm"><i class="fas fa-minus"></i></button>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_add_student_grade_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="button" id="kt_modal_add_student_grade_submit" class="btn btn-primary">
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

            var table = $("#kt_student_grades_table").DataTable({
                processing: true,
                serverSide: true,
                dom: 'B<"row my-5"<"col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"li><"col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"p>>rt<"row my-5"<"col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"li><"col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"p>>',
                buttons: [
                    'csv', 'excel', 'pdf', 'print'
                ],
                ajax: {
                    url: "{{ url('/class') }}/{{ $class->class_id }}/students",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'row_no',
                        searchable: false,
                        width: "5%"
                    },
                    {
                        data: 'stud_no',
                        name: 'r_student.stud_studentNo',
                        width: "10%"

                    },
                    {
                        data: 'name',
                        name: 'r_student.stud_lastName',
                        width: "30%"

                    },
                    {
                        data: 'course',
                        name: 's_course.cour_code',
                        orderable: false
                    },
                    {
                        data: 'midterm_grade',
                        name: 'enrsub_midtermGrade',
                        width: "7%"
                    },
                    {
                        data: 'final_grade',
                        name: 'enrsub_finalGrade',
                        width: "7%"
                    },
                    {
                        data: 'final_rating',
                        name: 'enrsub_finalRating',
                        width: "7%"
                    },
                    {
                        data: 'grade_status',
                        name: 'enrsub_grade_status',
                        width: "7%"
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false
                    },
                ],
            });

            table.buttons().container()
                .appendTo($('#kt_student_grades_table_buttons'));

            $('[data-kt-student-grades-table-filter="search"]').on('keyup', function(e) { // Search bar 
                table.search(e.target.value).draw();
            });

            $("#kt_student_grades_table").on("click", "[kt_student_grades_table_edit]", function() {

                const row_dom = $(this).closest("tr");

                $("#kt_student_grades_table [kt_student_grades_table_edit]").attr("disabled", true);
                $("#kt_student_grades_table [kt_student_grades_table_delete]").attr("disabled", true);

                d = table.row($(this).closest("tr")).data();
                const midterm_grade = d['midterm_grade'];
                const final_grade = d['final_grade'];
                const final_rating = d['final_rating'];
                const grade_status = d['grade_status'];

                const midterm_grade_clone = $("#edit_template_midterm_grade").clone(true);
                const final_grade_clone = $("#edit_template_final_grade").clone(true);
                const final_rating_clone = $("#edit_template_final_rating").clone(true);
                const grade_status_clone = $("#edit_template_grade_status").clone(true);

                midterm_grade_clone.removeAttr("id").attr("style", "");
                final_grade_clone.removeAttr("id").attr("style", "");
                final_rating_clone.removeAttr("id").attr("style", "");
                grade_status_clone.removeAttr("id").attr("style", "");

                $(midterm_grade_clone).find('[data-name="midterm_grade"]').attr("name",
                    "midterm_grade");
                $(final_grade_clone).find('[data-name="final_grade"]').attr("name", "final_grade");
                $(final_rating_clone).find('[data-name="final_rating"]').attr("name", "final_rating");
                $(grade_status_clone).find('[data-name="grade_status"]').attr("name", "grade_status");

                if (midterm_grade) {

                    $(midterm_grade_clone).find('[data-name="midterm_grade"]').append(
                        `<option value="${midterm_grade}" selected>${midterm_grade}</option>`);
                }

                if (final_grade) {

                    $(final_grade_clone).find('[data-name="final_grade"]').append(
                        `<option value="${final_grade}" selected>${final_grade}</option>`);
                }

                if (final_rating) {

                    $(final_rating_clone).find('[data-name="final_rating"]').append(
                        `<option value="${final_rating}" selected>${final_rating}</option>`);
                }

                if (grade_status) {

                    $(grade_status_clone).find('[data-name="grade_status"]').append(
                        `<option value="${grade_status}" selected>${grade_status}</option>`);
                }


                d['midterm_grade'] = $(midterm_grade_clone).prop('outerHTML');
                d['final_grade'] = $(final_grade_clone).prop('outerHTML');
                d['final_rating'] = $(final_rating_clone).prop('outerHTML');
                d['grade_status'] = $(grade_status_clone).prop('outerHTML');
                d['action'] = `<div class="d-flex justify-content-start flex-shrink-0">
                    <button type="button" id="kt_student_grades_table_save" class="btn btn-success btn-sm me-1">
                        <span class="indicator-label"><i class="fas fa-save me-1"></i>Save Changes </span>
                        <span class="indicator-progress">Saving...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>

                    <button type="button" kt_student_grades_table_cancel class="btn btn-icon btn-secondary btn-sm">
                    <i class="fas fa-ban"></i>
                    </button>
                </div>`;
                table.row($(this).closest("tr")).data(d);
                $(row_dom).find(".form-select").select2({tags: true});
                $("[name='grade_id']").val(d['id']);

                $(row_dom).on("click", "[kt_student_grades_table_cancel]", function() {

                    table.draw();
                });


                $(row_dom).on("click", "#kt_student_grades_table_save", function() {

                    $("#kt_student_grades_table [kt_student_grades_table_cancel]").attr(
                        "disabled", true);

                    const edit_submitBtnId = "kt_student_grades_table_save";
                    trigger_btnIndicator(edit_submitBtnId, "loading");
                    axios({
                        method: "POST",
                        url: "{{ url('/class/update-grade') }}",
                        data: $("#kt_form_edit_student_grade").serialize(),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {

                        trigger_btnIndicator(edit_submitBtnId, "default");
                        if (respond.status == 200) {

                            display_toastr_success(respond.data.message);
                            table.draw();
                        } else {

                            display_modal_error("{{ __('modal.error') }}");
                            $("#kt_student_grades_table [kt_student_grades_table_cancel]")
                                .attr(
                                    "disabled", false);
                        }

                    }).catch(function(error) {

                        display_modal_error(error);
                    });

                });

            })

            $("#kt_student_grades_table").on("click", "[kt_student_grades_table_delete]", function() {

                d = table.row($(this).closest("tr")).data();
                const id = d['id'];

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
                            url: "{{ url('/class/delete-grade') }}",
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

                            table.draw();
                        }).catch(function(error) {
                            display_axios_error(error);
                        });
                    }
                });

            });

            // Adding Student Grades
            var stud_table = $("#kt_modal_add_student_grade_table").DataTable({
                processing: true,
                serverSide: true,
                dom: 'rt',
                pageLength: 5,
                ajax: {
                    url: "{{ url('class/') }}/{{ $class->class_id }}/search/student-profile",
                    error: function(xhr, error, code) {

                        console.log(error);

                        display_modal_error("{{ __('modal.error_datatable') }}");
                    }
                },
                columns: [{
                        data: 'student_no',
                        name: 'stud_studentNo',
                        width: "10%"

                    },
                    {
                        data: 'first_name',
                        name: 'stud_firstName',
                    },
                    {
                        data: 'middle_name',
                        name: 'stud_middleName',
                    },
                    {
                        data: 'last_name',
                        name: 'stud_lastName',
                    },
                    {
                        data: 'course',
                        name: 's_course.cour_code',
                        orderable: false,
                        searchable: false,
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false
                    },
                ],
            });

            $('[data-kt-student-profile-table-filter="search"]').on('keyup', function(e) { // Search bar 
                stud_table.search(e.target.value).draw();
            });

            const removeAllImportedStudents = function() {

                $("#kt_modal_add_student_grade_imported_list").find(
                    'div[data-row-index]').remove();
            }

            const checkImportedStudent = function(stud_id) {

                let id = new Array();
                let stud_ids = $('#kt_modal_add_student_grade_form [data-name="student.id"]');

                for (let c = 0; c < stud_ids.length; c++) {
                    id.push($(stud_ids[c]).val());
                }

                return id.includes(stud_id.toString());
            }

            const removeImportedStudent = function(rowIndex) {

                $("#kt_modal_add_student_grade_imported_list").find(
                    'div[data-row-index="' + rowIndex + '"]').remove();
            }

            const resetAddStudentForm = function() {

                removeAllImportedStudents();
                $("[data-kt-student-profile-table-filter='search']").val("");
                stud_table.draw();
            }

            var add_student_modal = init_modal("kt_modal_add_student_grade");

            $('#kt_modal_add_student_grade_close, #kt_modal_add_student_grade_cancel').on("click", function(t) {
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
                        resetAddStudentForm();
                        add_student_modal.hide();
                    }
                });
            });

            const template = $("#kt_modal_add_student_grade_imported_template");
            let rowIndex = 0;

            $("#kt_modal_add_student_grade_table").on("click", "[kt_modal_add_student_grade_table_import]",
                function() {

                    d = stud_table.row($(this).closest("tr")).data();

                    if (!checkImportedStudent(d['id'])) {

                        d["action"] =
                            `<div class="d-flex justify-content-center"><p class="fw-bold mb-0"><i class="fas fa-check me-1 text-dark"></i> Added</p></div>`;
                        stud_table.row($(this).closest("tr")).data(d);

                        const row_dom = $(this).closest("tr");

                        rowIndex++;

                        const clone = template.clone(true);
                        clone.removeAttr("id");

                        clone.attr("style", "");
                        clone.attr("data-row-index", rowIndex);

                        clone.insertBefore(template);

                        $(clone).find('[data-name="student.id"]').attr("name", "student[" + rowIndex +
                            "][id]").val(d['id']);
                        $(clone).find('[data-name="student.no"]').text(d['student_no']);
                        $(clone).find('[data-name="student.name"]').text(d['last_name'] + ", " + d[
                            'first_name'] + " " + ((d['middle_name']) ? d['middle_name'] : ""));

                        $(clone).find('[data-name="student.midterm_grade"]').attr("name", "student[" +
                            rowIndex +
                            "][midterm_grade]").select2({tags: true});
                        $(clone).find('[data-name="student.final_grade"]').attr("name", "student[" +
                            rowIndex +
                            "][final_grade]").select2({tags: true});
                        $(clone).find('[data-name="student.final_rating"]').attr("name", "student[" +
                            rowIndex +
                            "][final_rating]").select2({tags: true});
                        $(clone).find('[data-name="student.grade_status"]').attr("name", "student[" +
                            rowIndex +
                            "][grade_status]").select2({tags: true});

                        const removeBtn = clone.find(
                            'button[kt_modal_add_student_grade_imported_remove]');
                        removeBtn.attr('data-row-index', rowIndex);

                        $(removeBtn).on('click', function(e) {

                            const index = $(this).attr('data-row-index');
                            stud_table.draw();
                            removeImportedStudent(index);
                        })
                    } else {
                        d["action"] =
                            `<div class="d-flex justify-content-center"><p class="fw-bold mb-0"><i class="fas fa-check-double me-1 text-dark"></i> Already added</p></div>`;
                        stud_table.row($(this).closest("tr")).data(d);
                        display_toastr_warning("{{ __('modal.error_duplicate') }}");
                    }


                });


            $("#kt_modal_add_student_grade_submit").on("click", function() {

                const add_stuedent_submitBtnId = "kt_modal_add_student_grade_submit";
                trigger_btnIndicator(add_stuedent_submitBtnId, "loading");
                axios({
                    method: "POST",
                    url: "{{ url('/class/add-grade') }}",
                    data: $("#kt_modal_add_student_grade_form").serialize(),
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {

                    trigger_btnIndicator(add_stuedent_submitBtnId, "default");
                    if (respond.status == 200) {

                        display_axios_success(respond.data.message);

                        add_student_modal.hide();
                        resetAddStudentForm();
                        table.draw();
                    } else {

                        display_modal_error("{{ __('modal.error') }}");
                    }

                }).catch(function(error) {

                    display_modal_error(error);
                });
            })

        }));
    </script>
@endsection
