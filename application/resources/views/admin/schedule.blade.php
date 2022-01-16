@extends('layouts.default')

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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_add_schedule">Add Course</button>
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
                            <th>Subject</th>
                            <th>Section</th>
                            <th>Schedule (Day / Time / Room)</th>
                            <th>Semester</th>
                            <th>Academic Year</th>
                            <th>Instructor</th>
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

<div class="modal fade" id="kt_modal_add_schedule" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <form class="form" action="#" id="kt_modal_add_schedule_form">

                <div class="modal-header" id="kt_modal_add_schedule_header">
                    <h2 class="fw-bolder">Add Schedule</h2>
                    <div id="kt_modal_add_schedule_close" class="btn btn-icon btn-sm btn-active-icon-primary">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                            </svg>
                        </span>
                    </div>
                </div>
                <div class="modal-body py-10 px-lg-17">

                    <div class="fv-row mb-7">
                        <label class="required form-label fs-5 fw-bold mb-3">Subject</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a subject" data-dropdown-parent="#kt_modal_add_schedule_form" name="subject">
                            <option></option>
                            @foreach ($formData_subjects as $subject)
                            <option value="{{ $subject->subj_id }}">{{ $subject->subj_code. ' ― ' . $subject->subj_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="fv-row mb-7">
                        <label class="fs-6 fw-bold mb-2">Section</label>
                        <input type="text" class="form-control form-control-solid" name="section" />
                    </div>

                    <div class="row mb-10">
                        <div class="col-md-5 fv-row">
                            <label class="required form-label fs-5 fw-bold mb-3">Semester</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a semester" data-dropdown-parent="#kt_modal_add_schedule_form" name="semester">
                                <option></option>
                                <option value="1">1st Semester</option>
                                <option value="2">2nd Semester</option>
                                <option value="3">Summer Semester</option>
                            </select>
                        </div>
                        <div class="col-md-7 fv-row">
                            <label class="required form-label fs-5 fw-bold mb-3">Academic Year</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an academic year" data-dropdown-parent="#kt_modal_add_schedule_form" name="year">
                                <option></option>
                                @for ($i = 0; $i < sizeOf($formData_acadYears); $i++) <option value="{{ $formData_acadYears[$i]['year'] }}">{{ $formData_acadYears[$i]['year_acad'] }}</option>
                                    @endfor
                            </select>
                        </div>
                    </div>

                    <div class="fv-row mb-7">
                        <label class=" form-label fs-5 fw-bold mb-3">Room</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select a room" data-dropdown-parent="#kt_modal_add_schedule_form" name="room" data-allow-clear="true">
                            <option></option>
                            @foreach ($formData_rooms as $room)
                            <option value="{{ $room->room_id }}">{{ $room->room_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="fv-row mb-15">
                        <label class="required form-label fs-5 fw-bold mb-3">Instructor</label>
                        <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an instructor" data-dropdown-parent="#kt_modal_add_schedule_form" name="instructor">
                            <option></option>
                            @foreach ($formData_instructors as $instructor)
                            <option value="{{ $instructor->inst_id }}">{{ $instructor->inst_name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-8">
                        <label class="d-flex align-items-center fs-5 fw-bold">
                            <span>Day and Time Slots</span>
                        </label>
                        <div class="fs-7 fw-bold text-muted">Day and Time slots should be on weekly basis</div>
                    </div>

                    <div class="card-body p-2" id="kt_modal_add_schedule_dayTimeSlots">
                        <a href="#" id="kt_modal_add_schedule_dayTimeSlots_addBtn" class="mt-3 btn d-block btn-icon-primary p-3 btn-outline btn-outline-dashed btn-outline-primary btn-active-light-primary"><span class="svg-icon svg-icon-1"><span class="svg-icon svg-icon-muted svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.3" d="M21 13H3C2.4 13 2 12.6 2 12C2 11.4 2.4 11 3 11H21C21.6 11 22 11.4 22 12C22 12.6 21.6 13 21 13Z" fill="black"></path>
                                        <path d="M12 22C11.4 22 11 21.6 11 21V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V21C13 21.6 12.6 22 12 22Z" fill="black"></path>
                                    </svg></span></span>Add Day and Time Slot</a>
                    </div>
                </div>
                <div class="modal-footer flex-center">
                    <button type="reset" id="kt_modal_add_schedule_cancel" class="btn btn-light me-3">Discard</button>
                    <button type="submit" id="kt_modal_add_schedule_submit" class="btn btn-primary">
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

        function add_timeSlot(type) {

            append_element = $(`<div class="d-flex align-items-sm-center mb-7 time-slot">
                <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                    <div class="flex-grow-1 my-lg-0 my-2 me-10">
                        <div class="row">
                            <div class="col-md-4 fv-row">
                                <select class="form-select" aria-label="Day" name="day">
                                <option value="" disabled>Day</option>
                                 @foreach ($formData_days as $day)
                                    <option value="{{ $day->day_initial }}">{{ $day->day }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="col-md-8 fv-row">
                                <input class="form-control " placeholder="Time Duration" name="time"/>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-icon btn-danger btn-sm btn-sm border-0 btn-circle" kt_modal_add_schedule_dayTimeSlots_delete>
                            <span class="svg-icon svg-icon-2 svg-icon-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black" />
                                    <path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black" />
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>`);

            if ($("#kt_modal_" + type + "_schedule_dayTimeSlots > div.time-slot").last().length >= 1) {
                append_element.insertAfter($("#kt_modal_" + type + "_schedule_dayTimeSlots > div.time-slot").last());
            } else {
                append_element.prependTo("#kt_modal_" + type + "_schedule_dayTimeSlots");
            }

            $('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot input[name="time"]').last().daterangepicker({
                timePicker: true,
                timePickerIncrement: 1,
                locale: {
                    format: 'hh:mm A'
                }
            }).on('show.daterangepicker', function(ev, picker) {
                picker.container.find(".calendar-table").hide();
            });

            $('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot [name="time"]').last().val("");
            $('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot [name="day"]').last().val("");
        };

        function delete_timeSlot(e, type) {
            $(e).closest(".time-slot").remove();
        };

        function retrieve_schedule_data(type) {

            return_data = {
                subject: $("#kt_modal_" + type + "_schedule_form [name='subject']").val(),
                section: $("#kt_modal_" + type + "_schedule_form [name='section']").val(),
                semester: $("#kt_modal_" + type + "_schedule_form [name='semester']").val(),
                year: $("#kt_modal_" + type + "_schedule_form [name='year']").val(),
                room: $("#kt_modal_" + type + "_schedule_form [name='room']").val(),
                instructor: $("#kt_modal_" + type + "_schedule_form [name='instructor']").val(),
                time_slots: []
            };

            time_slots = $('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot');

            if (time_slots.length >= 1) {
                for (let i = 0; i < time_slots.length; i++) {
                    return_data['time_slots'].push({
                        day: $($('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot')[i]).find("[name='day']").val(),
                        time: $($('#kt_modal_' + type + '_schedule_dayTimeSlots > div.time-slot')[i]).find("[name='time']").val()
                    });
                }
            }

            return return_data;
        }

        var table = $("#kt_curriculum_table").DataTable({
            processing: true,
            ajax: {
                url: "{{ url('/schedules/retrieveAll') }}",
                dataSrc: function(data) {
                    var return_data = new Array();
                    console.log(data);
                    if (data.status == 200) {

                        d = data['data'];

                        for (let i = 0; i < d.length; i++) {

                            sched_timeSlot_day = "";
                            sched_timeSlot_time = "";

                            sched_timeSlots = d[i]['sche_timeSlots'];
                            if (sched_timeSlots.length == 1) {
                                sched_timeSlot_day = sched_timeSlots[0]['time_day'];
                                sched_timeSlot_time = sched_timeSlots[0]['time_duration'].replace(/\s+/g, '');
                            } else if (sched_timeSlots.length > 1) {

                                for (let a = 0; a < sched_timeSlots.length; a++) {
                                    console.log("loop - " + a);

                                    if (a == 0) { // start
                                        console.log("first");
                                        sched_timeSlot_day += sched_timeSlots[a]['time_day'] + "/";
                                        sched_timeSlot_time += sched_timeSlots[a]['time_duration'].replace(/\s+/g, '') + "/";
                                    } else if ((a != sched_timeSlots.length - 1) && (a > 0 && a < sched_timeSlots.length - 1)) { // mid
                                        console.log("mid");
                                        sched_timeSlot_day += sched_timeSlots[a]['time_day'] + "/";
                                        sched_timeSlot_time += sched_timeSlots[a]['time_duration'].replace(/\s+/g, '') + "/";
                                    } else if (a == sched_timeSlots.length - 1) { // last
                                        console.log("last");
                                        sched_timeSlot_day += sched_timeSlots[a]['time_day'];
                                        sched_timeSlot_time += sched_timeSlots[a]['time_duration'].replace(/\s+/g, '');
                                    }
                                }

                            }

                            return_data.push({
                                DT_RowId: d[i]["sche_id_md5"],
                                Subject: `<div class="d-flex align-items-center">
                                                    <div class="d-flex justify-content-start flex-column">
                                                        <span class="text-gray-700 d-block">${d[i]["sche_subj_code"]}</span>
                                                        <span>${d[i]["sche_subj_name"]}</span>
                                                    </div>
                                                </div>`,
                                Section: d[i]["sche_section"],
                                Schedule: `${(sched_timeSlot_day) ? sched_timeSlot_day : ""} ${(sched_timeSlot_time) ? sched_timeSlot_time : ""}  ${ (d[i]["sche_room_code"]) ? d[i]["sche_room_code"] : "" }`,
                                Semester: d[i]["sche_term_name"],
                                AcadYear: d[i]["sche_acadYear"],
                                Instructor: d[i]["sche_inst_name"],
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
                    data: 'Subject'
                },
                {
                    data: 'Section'
                },
                {
                    data: 'Schedule'
                },
                {
                    data: 'Semester'
                },
                {
                    data: 'AcadYear'
                },
                {
                    data: 'Instructor'
                },
                {
                    data: 'Action'
                }
            ],
        });

        $('[data-kt-course-table-filter="search"]').on('keyup', function(e) { // Search bar 
            table.search(e.target.value).draw();
        });

        //--begin::Add Modal--//

        var add_modal = new bootstrap.Modal(document.querySelector('#kt_modal_add_schedule'));
        var add_submitBtn = document.getElementById('kt_modal_add_schedule_submit');

        var add_form = document.getElementById('kt_modal_add_schedule_form');
        var add_formValidation = FormValidation.formValidation(document.getElementById(
            'kt_modal_add_schedule_form'), {
            fields: {
                'subject': {
                    validators: {
                        notEmpty: {
                            message: 'Subject is required'
                        },
                    },
                },
                'semester': {
                    validators: {
                        notEmpty: {
                            message: 'Semester is required'
                        },
                    },
                },
                'year': {
                    validators: {
                        notEmpty: {
                            message: 'Academic Year is required'
                        },
                    },
                },
                'instructor': {
                    validators: {
                        notEmpty: {
                            message: 'Instructor is required'
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
        });

        $("#kt_modal_add_schedule_form select").on('change', function() {
            add_formValidation.revalidateField($(this).attr("name"));
        });

        $('#kt_modal_add_schedule_cancel, #kt_modal_add_schedule_close').on("click", function(
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

        $("#kt_modal_add_schedule_dayTimeSlots_addBtn").on("click", function() {
            add_timeSlot("add");
        });

        $("#kt_modal_add_schedule_dayTimeSlots").on("click", "[kt_modal_add_schedule_dayTimeSlots_delete]", function() {
            delete_timeSlot(this, "add");
        });

        $("#kt_modal_add_schedule_form").on("submit", function(e) {
            e.preventDefault();

            add_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    add_submitBtn.setAttribute('data-kt-indicator', 'on');
                    add_submitBtn.disabled = !0;

                    axios({
                        method: "POST",
                        url: "{{ url('/schedules/add') }}",
                        data: retrieve_schedule_data("add"),
                        timeout: "{{ $axios_timeout }}"
                    }).then(function(respond) {
                        if (respond.status == 200) {
                            add_submitBtn.removeAttribute('data-kt-indicator');
                            add_submitBtn.disabled = !1;
                            add_modal.hide();

                            display_axios_success(respond.data.message);
                        }

                        table.ajax.reload();
                    }).catch(function(error) {
                        display_axios_error(error);
                    });
                } else {
                    display_modal_error("{{ __('modal.error') }}");
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