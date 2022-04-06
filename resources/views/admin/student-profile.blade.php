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
                            <input type="text" data-kt-student-profile-table-filter="search"
                                class="form-control form-control-solid w-250px ps-15" placeholder="Search Student Profile" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            @can('add_student_profile')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_add_student_profile">Add Student Profile</button>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="kt_student_profile_table" class="table table-row-bordered gy-5 gs-7 ">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Student no.</th>
                                <th>Name</th>
                                <th>Course</th>
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

    <div class="modal fade" id="kt_modal_add_student_profile" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-700px">
            <div class="modal-content">


                <div class="stepper stepper-pills" id="kt_modal_add_student_profile_stepper">
                    <div class="stepper-nav flex-center flex-wrap mb-10" hidden>
                        <div class="stepper-item mx-2 my-4 current" data-kt-stepper-element="nav">
                            <div class="stepper-line w-40px"></div>

                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 1
                                </h3>

                                <div class="stepper-desc">
                                    Description
                                </div>
                            </div>
                        </div>

                        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                            <div class="stepper-line w-40px"></div>

                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 2
                                </h3>

                                <div class="stepper-desc">
                                    Description
                                </div>
                            </div>
                        </div>

                        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                            <div class="stepper-line w-40px"></div>

                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 3
                                </h3>

                                <div class="stepper-desc">
                                    Description
                                </div>
                            </div>
                        </div>

                        <div class="stepper-item mx-2 my-4" data-kt-stepper-element="nav">
                            <div class="stepper-line w-40px"></div>

                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">4</span>
                            </div>

                            <div class="stepper-label">
                                <h3 class="stepper-title">
                                    Step 4
                                </h3>

                                <div class="stepper-desc">
                                    Description
                                </div>
                            </div>
                        </div>
                    </div>

                    <form class="form" action="#" id="kt_modal_add_student_profile_form">

                        <div class="modal-header" id="kt_modal_add_student_profile_header">
                            <h2 class="fw-bolder">Add Student Profile</h2>
                            <div id="kt_modal_add_student_profile_close"
                                class="btn btn-icon btn-sm btn-active-icon-primary">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                            transform="rotate(-45 6 17.3137)" fill="black" />
                                        <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                            transform="rotate(45 7.41422 6)" fill="black" />
                                    </svg>
                                </span>
                            </div>
                        </div>

                        <div class="modal-body py-10 px-lg-17">
                            <div class="scroll-y me-n7 pe-7" id="kt_modal_add_student_profile_scroll" data-kt-scroll="true"
                                data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                                data-kt-scroll-dependencies="#kt_modal_add_student_profile_header"
                                data-kt-scroll-wrappers="#kt_modal_add_student_profile_scroll"
                                data-kt-scroll-offset="280px">

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-bold mb-2">Student No.</label>
                                    <input type="text" class="form-control form-control-solid" name="studentNo" />
                                </div>

                                <div class="row g-9 mb-7">

                                    <div class="col-md-7 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">First name</label>
                                        <input class="form-control form-control-solid" placeholder="" name="firstName">
                                    </div>

                                    <div class="col-md-5 fv-row">
                                        <label class="fs-6 fw-bold mb-2">Middle name</label>
                                        <input class="form-control form-control-solid" placeholder="" name="middleName">
                                    </div>
                                </div>

                                <div class="row g-9 mb-7">

                                    <div class="col-md-7 fv-row">
                                        <label class="required fs-6 fw-bold mb-2">Last name</label>
                                        <input class="form-control form-control-solid" placeholder="" name="lastName">
                                    </div>

                                    <div class="col-md-3 fv-row">
                                        <label class="fs-6 fw-bold mb-2">Suffix</label>
                                        <input class="form-control form-control-solid" placeholder="" name="suffix">
                                    </div>
                                </div>

                                <div class="fv-row mb-7">
                                    <label class="required form-label fs-5 fw-bold mb-3">Course</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select a course"
                                        data-dropdown-parent="#kt_modal_add_student_profile_form" name="course">
                                        <option></option>
                                        @foreach ($formData_course as $course)
                                            <option value="{{ $course->cour_id }}">
                                                {{ $course->cour_code . ' ― ' . $course->cour_name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="row mb-10">
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label fs-5 fw-bold mb-3">Year of Admission</label>
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select a year"
                                            data-dropdown-parent="#kt_modal_add_student_profile_form"
                                            name="yearOfAdmission">
                                            <option></option>
                                            @foreach ($formData_year as $year)
                                                <option value="{{ $year->syear_year }}">{{ $year->syear_year }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="border border-1 rounded p-5 mb-5 fv-row">

                                    <div class="d-flex flex-stack ">
                                        <div class="me-5">
                                            <label class="fs-6 fw-bold required">Admission Type</label>
                                        </div>

                                        <div class="d-flex">
                                            <label class="form-check form-check-custom form-check-solid me-5">
                                                <input class="form-check-input" type="radio" value="FRESHMEN"
                                                    name="admissionType">
                                                <span class="form-check-label">Freshmen</span>
                                            </label>
                                            <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="radio" value="TRANSFEREE"
                                                    name="admissionType">
                                                <span class="form-check-label">Transferee</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-1 rounded p-5">

                                    <div class="d-flex flex-stack">
                                        <div class="me-5">
                                            <label class="fs-6 fw-bold">Has been graduated?</label>
                                            <div class="fs-7 fw-bold text-muted">If yes, toggle the button</div>
                                        </div>
                                        <label class="form-check form-switch form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="checkbox"
                                                id="kt_modal_add_student_profile_if_graduated" />
                                            <span class="form-check-label fw-bold text-muted"
                                                for="kt_modal_add_student_profile_if_graduated">Yes</span>
                                        </label>
                                    </div>

                                    <input type="text" name="isGraduated" value="NO" hidden>

                                    <div id="kt_modal_add_student_profile_has_graduated" class="collapse mt-7">

                                        <div class="row">
                                            <div class="col-md-6 fv-row">
                                                <label class="form-label fs-5 fw-bold mb-3"><span
                                                        class="required">Date
                                                        Graduated</span>
                                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                        title="Date must between {{ $formData_year[0]->syear_year }} and {{ $formData_year[sizeof($formData_year) - 1]->syear_year }}"></i>
                                                </label>
                                                <input class="form-control form-control-solid" name="dateGraduated"
                                                    placeholder="MM/DD/YYYY" />
                                            </div>

                                            <div class="col-md-6 fv-row">
                                                <label class="form-label fs-5 fw-bold mb-3">Honor</label>
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Select a honor"
                                                    data-dropdown-parent="#kt_modal_add_student_profile_form" name="honor"
                                                    data-allow-clear="true">
                                                    <option></option>
                                                    @foreach ($formData_honors as $honor)
                                                        <option value="{{ $honor->honor_name }}">
                                                            {{ $honor->honor_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="fw-bolder fs-3 rotate collapsible mb-10 mt-10" data-bs-toggle="collapse"
                                    href="#kt_modal_add_student_profile_permanent_address" role="button"
                                    aria-expanded="false" aria-controls="kt_customer_view_details">Permanent Address
                                    <span class="ms-2 rotate-180">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <path
                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                    </span>
                                </div>

                                <div id="kt_modal_add_student_profile_permanent_address" class="collapse show">

                                    <div class="fv-row mb-7">
                                        <label class="required fs-6 fw-bold mb-2">Address line</label>
                                        <input class="form-control form-control-solid" placeholder="" name="addressLine">
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-6 fv-row">
                                            <label class="required form-label fs-5 fw-bold mb-3">Province</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Select a province"
                                                data-dropdown-parent="#kt_modal_add_student_profile_form"
                                                name="addressProvince">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="required form-label fs-5 fw-bold mb-3">City</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Select a city"
                                                data-dropdown-parent="#kt_modal_add_student_profile_form"
                                                name="addressCity">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer flex-center">
                            <button type="button" class="btn btn-light btn-active-light-primary"
                                data-kt-stepper-action="previous">
                                Back
                            </button>
                            <div>
                                <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit"
                                    id="kt_stepper_login_submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>

                                <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                    <span>Continue</span> <span class="svg-icon svg-icon-1 me-0 ms-1"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                                fill="black" />
                                        </svg></span>
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_edit_student_profile" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <form class="form" action="#" id="kt_modal_edit_student_profile_form">
                    <input type="text" name="id" hidden />

                    <div class="modal-header" id="kt_modal_edit_student_profile_header">
                        <h2 class="fw-bolder">Edit Student Profile</h2>
                        <div id="kt_modal_edit_student_profile_close" class="btn btn-icon btn-sm btn-active-icon-primary">
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
                        <div class="scroll-y me-n7 pe-7" id="kt_modal_edit_student_profile_scroll" data-kt-scroll="true"
                            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto"
                            data-kt-scroll-dependencies="#kt_modal_edit_student_profile_header"
                            data-kt-scroll-wrappers="#kt_modal_edit_student_profile_scroll" data-kt-scroll-offset="280px">

                            <div class="fv-row mb-7">
                                <label class="required fs-6 fw-bold mb-2">Student No.</label>
                                <input type="text" class="form-control form-control-solid" name="studentNo" />
                            </div>

                            <div class="row g-9 mb-7">

                                <div class="col-md-7 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">First name</label>
                                    <input class="form-control form-control-solid" placeholder="" name="firstName">
                                </div>

                                <div class="col-md-5 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Middle name</label>
                                    <input class="form-control form-control-solid" placeholder="" name="middleName">
                                </div>
                            </div>

                            <div class="row g-9 mb-7">

                                <div class="col-md-7 fv-row">
                                    <label class="required fs-6 fw-bold mb-2">Last name</label>
                                    <input class="form-control form-control-solid" placeholder="" name="lastName">
                                </div>

                                <div class="col-md-3 fv-row">
                                    <label class="fs-6 fw-bold mb-2">Suffix</label>
                                    <input class="form-control form-control-solid" placeholder="" name="suffix">
                                </div>
                            </div>

                            <div class="fv-row mb-7">
                                <label class="required form-label fs-5 fw-bold mb-3">Course</label>
                                <select class="form-select form-select-solid" data-control="select2"
                                    data-placeholder="Select a course"
                                    data-dropdown-parent="#kt_modal_edit_student_profile_form" name="course">
                                    <option></option>
                                    @foreach ($formData_course as $course)
                                        <option value="{{ $course->cour_id }}">
                                            {{ $course->cour_code . ' ― ' . $course->cour_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-10">
                                <div class="col-md-6 fv-row">
                                    <label class="required form-label fs-5 fw-bold mb-3">Year of Admission</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select a year"
                                        data-dropdown-parent="#kt_modal_edit_student_profile_form" name="yearOfAdmission">
                                        <option></option>
                                        @foreach ($formData_year as $year)
                                            <option value="{{ $year->syear_year }}">{{ $year->syear_year }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 fv-row">
                                    <label class="required form-label fs-5 fw-bold mb-3">Admission type</label>

                                    <div class="d-flex mt-3">
                                        <label class="form-check form-check-custom form-check-solid me-5">
                                            <input class="form-check-input" type="radio" value="FRESHMEN"
                                                name="admissionType">
                                            <span class="form-check-label">Freshmen</span>
                                        </label>
                                        <label class="form-check form-check-custom form-check-solid">
                                            <input class="form-check-input" type="radio" value="TRANSFEREE"
                                                name="admissionType">
                                            <span class="form-check-label">Transferee</span>
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="border border-1 rounded p-5">

                                <div class="d-flex flex-stack">
                                    <div class="me-5">
                                        <label class="fs-6 fw-bold">Has been graduated?</label>
                                        <div class="fs-7 fw-bold text-muted">If yes, toggle the button</div>
                                    </div>
                                    <label class="form-check form-switch form-check-custom form-check-solid me-5">
                                        <input class="form-check-input" type="checkbox"
                                            id="kt_modal_edit_student_profile_if_graduated" />
                                        <span class="form-check-label fw-bold text-muted"
                                            for="kt_modal_edit_student_profile_if_graduated">Yes</span>
                                    </label>
                                </div>

                                <input type="text" name="isGraduated" value="NO" hidden>

                                <div id="kt_modal_edit_student_profile_has_graduated" class="collapse mt-7">

                                    <div class="row">
                                        <div class="col-md-6 fv-row">
                                            <label class="form-label fs-5 fw-bold mb-3"><span class="required">Date
                                                    Graduated</span>
                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    title="Date must between {{ $formData_year[0]->syear_year }} and {{ $formData_year[sizeof($formData_year) - 1]->syear_year }}"></i>
                                            </label>
                                            <input class="form-control form-control-solid" name="dateGraduated"
                                                placeholder="MM/DD/YYYY" />
                                        </div>

                                        <div class="col-md-6 fv-row">
                                            <label class="form-label fs-5 fw-bold mb-3">Honor</label>
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Select a honor"
                                                data-dropdown-parent="#kt_modal_edit_student_profile_form" name="honor"
                                                data-allow-clear="true">
                                                <option></option>
                                                @foreach ($formData_honors as $honor)
                                                    <option value="{{ $honor->honor_name }}">{{ $honor->honor_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="fw-bolder fs-3 rotate collapsible mb-10 mt-10" data-bs-toggle="collapse"
                                href="#kt_modal_edit_student_profile_permanent_address" role="button" aria-expanded="false"
                                aria-controls="kt_customer_view_details">Permanent Address
                                <span class="ms-2 rotate-180">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </span>
                            </div>

                            <div id="kt_modal_edit_student_profile_permanent_address" class="collapse show">

                                <div class="fv-row mb-7">
                                    <label class="required fs-6 fw-bold mb-2">Address line</label>
                                    <input class="form-control form-control-solid" placeholder="" name="addressLine">
                                </div>

                                <div class="row mb-7">
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label fs-5 fw-bold mb-3">Province</label>
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select a province"
                                            data-dropdown-parent="#kt_modal_edit_student_profile_form"
                                            name="addressProvince">
                                            <option></option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 fv-row">
                                        <label class="required form-label fs-5 fw-bold mb-3">City</label>
                                        <select class="form-select form-select-solid" data-control="select2"
                                            data-placeholder="Select a city"
                                            data-dropdown-parent="#kt_modal_edit_student_profile_form" name="addressCity">
                                            <option></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer flex-center">
                        <button type="reset" id="kt_modal_edit_student_profile_cancel"
                            class="btn btn-light me-3">Discard</button>
                        <button type="submit" id="kt_modal_edit_student_profile_submit" class="btn btn-primary">
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

                return $("#kt_modal_" + type + "_student_profile_form").serialize();
            }

            function reset_form(type) {
                $('#kt_modal_' + type + '_student_profile_form .form-select-solid').val('').trigger('change');
                $('#kt_modal_' + type + '_student_profile_form .form-control-solid').val('');
                $('#kt_modal_' + type + '_student_profile_form .form-check-input').prop('checked', false);

                $('#kt_modal_' + type + '_student_profile_permanent_address').addClass('show');
                $('#kt_modal_' + type + '_student_profile_has_graduated').removeClass('show');
            }

            var form_fields = {
                'studentNo': {
                    validators: {
                        notEmpty: {
                            message: 'Student number is required'
                        },
                    },
                },
                'firstName': {
                    validators: {
                        notEmpty: {
                            message: 'First name is required'
                        },
                    },
                },
                'lastLame': {
                    validators: {
                        notEmpty: {
                            message: 'Last name is required'
                        },
                    },
                },
                'course': {
                    validators: {
                        notEmpty: {
                            message: 'Course is required'
                        },
                    },
                },
                'addressLine': {
                    validators: {
                        notEmpty: {
                            message: 'Address is required'
                        },
                    },
                },
                'addressProvince': {
                    validators: {
                        notEmpty: {
                            message: 'Province is required'
                        },
                    },
                },
                'addressCity': {
                    validators: {
                        notEmpty: {
                            message: 'City is required'
                        },
                    },
                },
                'yearOfAdmission': {
                    validators: {
                        notEmpty: {
                            message: 'Year of admission is required'
                        },
                    },
                },
                'admissionType': {
                    validators: {
                        notEmpty: {
                            message: 'Admission type is required'
                        },
                    },
                },
                'dateGraduated': {
                    validators: {
                        notEmpty: {
                            enabled: false,
                            message: 'Date graduated is required'
                        },
                        date: {
                            format: 'MM/DD/YYYY',
                            message: 'The value is not a valid date',
                            min: '01/01/{{ $formData_year[0]->syear_year }}',
                            max: '01/01/{{ $formData_year[sizeof($formData_year) - 1]->syear_year }}',
                        },
                    },
                }
            };

            var table = $("#kt_student_profile_table").DataTable({
                processing: true,
                ajax: {
                    url: "{{ url('/student/profile/retrieveAll') }}",
                    dataSrc: function(d) {
                        var return_data = new Array();

                        for (let i = 0; i < d.length; i++) {

                            return_data.push({
                                DT_RowId: d[i]["stud_id_md5"],
                                StudNo: `<a href="{{ url('student/profile') }}/${d[i]["stud_uuid"]}" target="_blank"> ${d[i]["stud_studentNo"]}</a>`,
                                Name: d[i]["stud_fullName"],
                                Course: d[i]["stud_course"],
                                Status: d[i]["stud_recordStatus"],
                                Action: `<div class="d-flex justify-content-start flex-shrink-0">
                                    <a href="javascript:void(0)" kt_student_profile_table_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                        <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                                <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <a href="javascript:void(0)" kt_student_profile_table_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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
                        data: 'StudNo'
                    },
                    {
                        data: 'Name'
                    },
                    {
                        data: 'Course'
                    },
                    {
                        data: 'Status'
                    },
                    {
                        data: 'Action'
                    }
                ],
            });

            $('[data-kt-student-profile-table-filter="search"]').on('keyup', function(e) { // Search bar 
                table.search(e.target.value).draw();
            });


            @can('add_student_profile')
                var add_modal = init_bs_modal("kt_modal_add_student_profile");
                var add_submitBtnId = "kt_modal_add_student_profile_submit";
                var add_formValidation = init_formValidation("kt_modal_add_student_profile_form", form_fields);
            
                var add_modal_stepper = init_stepper("kt_modal_add_student_profile_stepper");
            
                $('#kt_modal_add_student_profile_cancel, #kt_modal_add_student_profile_close').on("click", function(
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
            
                add_formValidation.disableValidator('dateGraduated');
                add_modal.modal("hide");
                }
                });
                });
            
                $("#kt_modal_add_student_profile_form").on("submit", function(e) {
                e.preventDefault();
            
                add_formValidation.validate().then(function(e) {
            
                if ('Valid' == e) {
            
                trigger_btnIndicator(add_submitBtnId, "loading");
            
                axios({
                method: "POST",
                url: "{{ url('/student/profile/add') }}",
                data: retrieve_form_data("add"),
                timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {
                trigger_btnIndicator(add_submitBtnId, "default");
            
                if (respond.status == 200) {
            
                display_axios_success(respond.data.message);
                add_modal.modal('hide');
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
            
                var add_city = new City();
            
                add_city.getProvinces().forEach((e) => {
                $(`<option value="${e}">${e}</option>`).appendTo(
                "#kt_modal_add_student_profile_form [name='addressProvince']");
                });
            
                $("#kt_modal_add_student_profile_form [name='addressProvince']").on("change", function() {
            
                if ($(this).val()) {
                var c = new City();
            
                $("#kt_modal_add_student_profile_form [name='addressCity']").empty();
            
                c.getCities($("#kt_modal_add_student_profile_form [name='addressProvince']").val())
                .forEach((e) => {
                $(`<option value="${e}">${e}</option>`).appendTo(
                "#kt_modal_add_student_profile_form [name='addressCity']");
                });
                }
                });
            
                $("#kt_modal_add_student_profile_form #kt_modal_add_student_profile_if_graduated").on("click",
                function() {
            
                $("#kt_modal_add_student_profile_form [name='dateGraduated']").val(null);
                $("#kt_modal_add_student_profile_form [name='honor']").val(null).trigger("change");
            
                if ($(this).is(':checked')) {
            
                $("#kt_modal_add_student_profile_form [name='isGraduated']").val('YES');
                $("#kt_modal_add_student_profile_has_graduated").addClass("show");
                add_formValidation.enableValidator('dateGraduated');
                } else {
            
                $("#kt_modal_add_student_profile_form [name='isGraduated']").val('NO');
                $("#kt_modal_add_student_profile_has_graduated").removeClass("show");
                add_formValidation.disableValidator('dateGraduated');
                };
                });
            
                Inputmask({
                "mask": "99/99/9999"
                }).mask("#kt_modal_add_student_profile_form [name='dateGraduated']");
            @endcan

            var edit_modal = init_bs_modal("kt_modal_edit_student_profile");
            var edit_submitBtnId = "kt_modal_edit_student_profile_submit";
            var edit_formValidation = init_formValidation("kt_modal_edit_student_profile_form", form_fields);

            $('#kt_modal_edit_student_profile_cancel, #kt_modal_edit_student_profile_close').on("click",
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
                            edit_modal.modal('hide');
                        }
                    });
                });

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_edit]", function() {

                const id = $(this).closest("tr").attr("id");

                axios({
                    method: "POST",
                    url: "{{ url('/student/profile/retrieve') }}",
                    data: {
                        id: id
                    },
                    timeout: "{{ $axios_timeout }}"
                }).then(function(respond) {

                    if (respond.status == 200) {

                        if (respond.data.length == 1) {
                            d = respond.data[0];

                            $('#kt_modal_edit_student_profile_form [name="id"]').val(d[
                                'stud_id_md5']);
                            $('#kt_modal_edit_student_profile_form [name="studentNo"]').val(d[
                                'stud_studentNo']);
                            $('#kt_modal_edit_student_profile_form [name="firstName"]')
                                .val(d[
                                    'stud_firstName']);
                            $('#kt_modal_edit_student_profile_form [name="middleName"]')
                                .val(d[
                                    'stud_middleName']);
                            $('#kt_modal_edit_student_profile_form [name="lastName"]').val(
                                d['stud_lastName']);
                            $('#kt_modal_edit_student_profile_form [name="suffix"]')
                                .val(d['stud_suffix']);
                            $('#kt_modal_edit_student_profile_form [name="course"]').val(d[
                                'cour_stud_id']).trigger('change');
                            $('#kt_modal_edit_student_profile_form [name="yearOfAdmission"]')
                                .val(d['stud_yearOfAdmission']).trigger('change');
                            $('#kt_modal_edit_student_profile_form [name="admissionType"][value="' +
                                    d[
                                        'stud_admissionType'] + '"]')
                                .prop("checked", true);
                            $('#kt_modal_edit_student_profile_form [name="dateGraduated"]')
                                .val(d['stud_dateGraduated']).trigger('change');

                            if (d['stud_isGraduated'] == "YES") {

                                $("#kt_modal_edit_student_profile_if_graduated").prop("checked",
                                    true);

                                $('#kt_modal_edit_student_profile_has_graduated').addClass(
                                    'show');

                                $('#kt_modal_edit_student_profile_form [name="dateGraduated"]')
                                    .val(moment(d['stud_dateGraduated']).format("MM/DD/YYYY"));
                                $('#kt_modal_edit_student_profile_form [name="honor"]')
                                    .val(d['stud_honor']).trigger('change');

                                edit_formValidation.enableValidator('dateGraduated');

                            } else {
                                $("#kt_modal_edit_student_profile_if_graduated").prop("checked",
                                    false);
                                $('#kt_modal_edit_student_profile_has_graduated')
                                    .removeClass(
                                        'show');

                                edit_formValidation.disableValidator('dateGraduated');
                            }

                            $('#kt_modal_edit_student_profile_form [name="addressLine"]').val(d[
                                'stud_addressLine']);
                            $('#kt_modal_edit_student_profile_form [name="addressProvince"]')
                                .val(d['stud_addressProvince']).trigger('change');
                            $('#kt_modal_edit_student_profile_form [name="addressCity"]')
                                .val(d['stud_addressCity']).trigger('change');

                            edit_modal.modal('show');
                        }

                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                }).catch(function(error) {
                    display_axios_error(error);
                });
            })

            $("#kt_modal_edit_student_profile_form").on("submit", function(e) {
                e.preventDefault();

                edit_formValidation.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(edit_submitBtnId, "loading");

                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/update') }}",
                            data: retrieve_form_data("edit"),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(edit_submitBtnId, "default");

                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);
                                edit_modal.modal('hide');
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

            var edit_city = new City();

            edit_city.getProvinces().forEach((e) => {
                $(`<option value="${e}">${e}</option>`).appendTo(
                    "#kt_modal_edit_student_profile_form [name='addressProvince']");
            });

            $("#kt_modal_edit_student_profile_form [name='addressProvince']").on("change", function() {

                if ($(this).val()) {
                    var c = new City();

                    $("#kt_modal_edit_student_profile_form [name='addressCity']").empty();

                    c.getCities($("#kt_modal_edit_student_profile_form [name='addressProvince']").val())
                        .forEach((e) => {
                            $(`<option value="${e}">${e}</option>`).appendTo(
                                "#kt_modal_edit_student_profile_form [name='addressCity']");
                        });
                }
            });

            $("#kt_modal_edit_student_profile_form #kt_modal_edit_student_profile_if_graduated").on("click",
                function() {

                    if ($(this).is(':checked')) {

                        $("#kt_modal_edit_student_profile_form [name='isGraduated']").val('YES');
                        $("#kt_modal_edit_student_profile_has_graduated").addClass("show");
                        edit_formValidation.enableValidator('dateGraduated');
                    } else {

                        $("#kt_modal_edit_student_profile_form [name='isGraduated']").val('NO');
                        $("#kt_modal_edit_student_profile_has_graduated").removeClass("show");
                        edit_formValidation.disableValidator('dateGraduated');
                    };
                });

            Inputmask({
                "mask": "99/99/9999"
            }).mask("#kt_modal_edit_student_profile_form [name='dateGraduated']");

            $("#kt_student_profile_table").on("click", "[kt_student_profile_table_delete]", function() {

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
                            url: "{{ url('/student/profile/delete') }}",
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
