@extends('layouts.admin')

@section('styles')
    <style>
        .daterangepicker.show-calendar .ranges {
            height: 0px;
        }

    </style>
@endsection

@section('content')
    <div class="post" id="kt_post">

        <div class="container d-flex justify-content-between my-15">
            <div
                class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-2 pb-5 pb-lg-0">
                <h1 class="d-flex flex-column text-dark fw-bolder my-0 fs-1">Student Form</h1>
                <div class="text-muted mt-1 fw-bold fs-base">Add a new Student Profile</div>
            </div>
            <div class="d-flex flex-center">
                <button id="kt_form_add_student_profile_clearAllFields" type="button" class="btn btn-danger"><i
                        class="fas fa-eraser me-1"></i> Clear all fields
                </button>
            </div>


        </div>

        <div id="kt_content_container" class="container-xxl">

            <form class="form" action="#" id="kt_form_add_student_profile">
                <div class="d-flex flex-column flex-xl-row">
                    <div class="d-flex flex-column flex-lg-row-auto gap-7 gap-lg-10 w-100 w-xl-450px mb-10">

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Student Number</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row">
                                    <input type="text" class="form-control form-control-solid" name="studentNo" />
                                    <div class="text-muted fs-7 mb-5 mt-2">This is required and recommended to be unique
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Course</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select a course"
                                        data-dropdown-parent="#kt_form_add_student_profile" name="course">
                                        <option></option>
                                        @foreach ($formData_course as $course)
                                            <option value="{{ $course->cour_id }}">
                                                {{ $course->cour_code . ' ― ' . $course->cour_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Admission details</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row mb-7">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Admission Type"
                                        data-dropdown-parent="#kt_form_add_student_profile" data-allow-clear="true"
                                        name="admissionType">
                                        <option></option>
                                        <option value="FRESHMEN">Freshmen</option>
                                        <option value="TRANSFEREE">Transferee</option>
                                    </select>
                                    <div class="text-muted fs-7 mb-5 mt-2">Set the Admission type</div>
                                </div>

                                <div class="fv-row">
                                    <label class="form-label">Year of Admission</label>
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Select a year" data-dropdown-parent="#kt_form_add_student_profile"
                                        data-allow-clear="true" name="yearOfAdmission">
                                        <option></option>
                                        @foreach ($formData_year as $year)
                                            <option value="{{ $year->syear_year }}">{{ $year->syear_year }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="card card-flush py-4">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2>Academic Status</h2>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div class="fv-row mb-7">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Academic Status"
                                        data-dropdown-parent="#kt_form_add_student_profile" data-allow-clear="true"
                                        name="academicStatus">
                                        <option></option>
                                        <option value="UNK">Unknown</option>
                                        <option value="REG">Regular</option>
                                        <option value="RTN">Returnee</option>
                                        <option value="INC">Inactive</option>
                                        <option value="DRP">Dropped</option>
                                        <option value="HD">Honorable Dismissed</option>
                                        <option value="GRD">Graduated</option>
                                    </select>
                                    <div class="text-muted fs-7 mb-5 mt-2">Set the Academic Status</div>
                                </div>

                                <div class="fv-row mb-7" style="display:none !important">
                                    <label class="form-label">Date Exited</label>
                                    <input class="form-control form-control-solid" placeholder="" name="dateExited">
                                </div>

                                <div class="fv-row" style="display:none !important">
                                    <select class="form-select form-select-solid" data-control="select2"
                                        data-placeholder="Honor" data-dropdown-parent="#kt_form_add_student_profile"
                                        data-allow-clear="true" name="honor">
                                        <option></option>

                                    </select>
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column flex-lg-row-fluid ms-lg-15 gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-body">
                                <div class="d-flex flex-stack">
                                    <div class="me-7">
                                        <h2 class="mb-0">Record Type</h2>
                                    </div>
                                    <div>
                                        <div class="fv-row">
                                            <select class="form-select form-select-solid" data-control="select2"
                                                data-placeholder="Select a record type"
                                                data-dropdown-parent="#kt_form_add_student_profile" name="recordType">
                                                <option></option>
                                                <option value="NONSIS">Non SIS</option>
                                                <option value="SIS">SIS</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-10">
                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                    href="#kt_form_add_student_profile_general_tab">General Information</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-active-primary pb-4 " data-kt-countup-tabs="true"
                                    data-bs-toggle="tab" href="#kt_form_add_student_profile_envelope">Envelope Documents
                                </a>
                            </li>

                        </ul>

                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="kt_form_add_student_profile_general_tab"
                                role="tabpanel">

                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>General Information</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">

                                        <div class="row g-9 mb-7">

                                            <div class="col-md-6 fv-row">
                                                <label class="required form-label">First name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="firstName">
                                            </div>

                                            <div class="col-md-6 fv-row">
                                                <label class="form-label">Middle name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="middleName">
                                            </div>
                                        </div>

                                        <div class="row g-9 mb-7">

                                            <div class="col-md-12 fv-row">
                                                <label class="required form-label">Last name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="lastName">
                                            </div>
                                        </div>

                                        <div class="text-muted fs-7 mb-15 mt-2">Set the Student name for better
                                            indentification
                                        </div>


                                        <div class="fv-row mb-7">
                                            <label class="form-label">Permanent Address</label>
                                            <input class="form-control form-control-solid" placeholder=""
                                                name="addressLine">
                                        </div>

                                        <div class="row mb-7">
                                            <div class="col-md-6 fv-row">
                                                <label class="form-label fs-5 fw-bold mb-3">Province</label>
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Select a province"
                                                    data-dropdown-parent="#kt_form_add_student_profile"
                                                    data-allow-clear="true" name="addressProvince">
                                                    <option></option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 fv-row">
                                                <label class="form-label fs-5 fw-bold mb-3">City</label>
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    data-placeholder="Select a city"
                                                    data-dropdown-parent="#kt_form_add_student_profile"
                                                    data-allow-clear="true" name="addressCity">
                                                    <option></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Elementary and High School</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">

                                        <div class="row g-9 mb-7">

                                            <div class="col-md-9 fv-row">
                                                <label class="form-label">Elementary School name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="es_name">
                                            </div>


                                            <div class="col-md-3 fv-row">
                                                <label class="form-label">Year graduated</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="es_yearGraduated">
                                            </div>
                                        </div>

                                        <div class="row g-9">

                                            <div class="col-md-9 fv-row">
                                                <label class="form-label">High School name</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="hs_name">
                                            </div>


                                            <div class="col-md-3 fv-row">
                                                <label class="form-label">Year graduated</label>
                                                <input class="form-control form-control-solid" placeholder=""
                                                    name="hs_yearGraduated">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-flush py-4" id="kt_form_add_student_profile_prev_college"
                                    style="display: none !important">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Previous College or University</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0" id="kt_form_add_student_profile_prev_college_table">

                                        <div class="d-flex justify-content-between">

                                            <div class="fv-row w-50">
                                                <input placeholder="School name" class="form-control form-control-solid"
                                                    name="college[0][name]">
                                            </div>


                                            <div class="fv-row">
                                                <input placeholder="Year Exited" class="form-control form-control-solid"
                                                    name="college[0][yearExited]">
                                            </div>

                                            <div class="">
                                                <button kt_form_add_student_profile_prev_college_addBtn type="button"
                                                    class="btn btn-icon btn-dark btn-sm"><i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </div>

                                        <div id="kt_form_add_student_profile_prev_college_template"
                                            class="d-flex justify-content-between mt-7" style="display: none !important">

                                            <div class="fv-row w-50">
                                                <input placeholder="School name" data-name="college.name"
                                                    class="form-control form-control-solid">
                                            </div>


                                            <div class="fv-row">
                                                <input placeholder="Year Exited" data-name="college.yearExited"
                                                    class="form-control form-control-solid">
                                            </div>

                                            <div>
                                                <button kt_form_add_student_profile_prev_college_removeBtn type="button"
                                                    class="btn btn-icon btn-secondary btn-sm"><i
                                                        class="fas fa-minus"></i></button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="kt_form_add_student_profile_envelope" role="tabpanel">

                                <div class="card mb-6">
                                    <div class="card-header py-3 border-dashed border-bottom-1 border-0 border-gray-300"
                                        style="min-height:45px">
                                        <div class="card-title">
                                            <h2 class=" text-gray-800">Documents Category</h2>
                                        </div>
                                        <div class="card-toolbar">
                                            <ul class="nav nav-stretch fs-6 fw-bold nav-line-tabs nav-line-tabs-2x border-transparent text-uppercase"
                                                role="tablist">

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary active" data-bs-toggle="tab"
                                                        role="tab" href="#kt_student_view_school_primary"
                                                        aria-selected="true"> Entrance </a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                        href="#kt_student_view_school_secondary" aria-selected="false">
                                                        Records </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link text-active-primary" data-bs-toggle="tab" role="tab"
                                                        href="#kt_student_view_school_tertiary" aria-selected="false"> Exit
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-body px-0 py-10">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade active show" id="kt_student_view_school_primary"
                                                role="tabpanel">

                                                <div id="kt_form_add_student_profile_document_entrance_list"
                                                    class="px-8">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[entrance][0][docu]">
                                                                <option></option>
                                                                @foreach ($formData_docu_ent as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[entrance][0][type]">
                                                                <option></option>

                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                name="documents[entrance][0][date_submitted]">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_entrace_addBtn
                                                                type="button" class="btn btn-icon btn-dark btn-sm"><i
                                                                    class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                    <div id="kt_form_add_student_profile_document_entrace_template"
                                                        class="d-flex justify-content-between mt-5"
                                                        style="display:none !important;">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.docu">
                                                                <option></option>
                                                                @foreach ($formData_docu_ent as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.type">
                                                                <option></option>
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                data-name="documents.date_submitted">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_entrace_removeBtn
                                                                type="button" class="btn btn-icon btn-secondary btn-sm"><i
                                                                    class="fas fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="kt_student_view_school_secondary"
                                                role="tabpanel">

                                                <div id="kt_form_add_student_profile_document_records_list"
                                                    class="px-8">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[records][0][docu]">
                                                                <option></option>
                                                                @foreach ($formData_docu_rec as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[records][0][type]">
                                                                <option></option>

                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                name="documents[records][0][date_submitted]">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_records_addBtn
                                                                type="button" class="btn btn-icon btn-dark btn-sm"><i
                                                                    class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                    <div id="kt_form_add_student_profile_document_records_template"
                                                        class="d-flex justify-content-between mt-5"
                                                        style="display:none !important;">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.docu">
                                                                <option></option>
                                                                @foreach ($formData_docu_rec as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.type">
                                                                <option></option>
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                data-name="documents.date_submitted">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_records_removeBtn
                                                                type="button" class="btn btn-icon btn-secondary btn-sm"><i
                                                                    class="fas fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="tab-pane fade" id="kt_student_view_school_tertiary"
                                                role="tabpanel">

                                                <div id="kt_form_add_student_profile_document_exit_list"
                                                    class="px-8">
                                                    <div class="d-flex justify-content-between">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[exit][0][docu]">
                                                                <option></option>
                                                                @foreach ($formData_docu_ext as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-control="select2" data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" name="documents[exit][0][type]">
                                                                <option></option>

                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                name="documents[exit][0][date_submitted]">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_exit_addBtn
                                                                type="button" class="btn btn-icon btn-dark btn-sm"><i
                                                                    class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                    <div id="kt_form_add_student_profile_document_exit_template"
                                                        class="d-flex justify-content-between mt-5"
                                                        style="display:none !important;">

                                                        <div class="fv-row w-200px">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Document"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.docu">
                                                                <option></option>
                                                                @foreach ($formData_docu_ext as $docu)
                                                                    <option value="{{ $docu->docu_id }}">
                                                                        {{ $docu->docu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-25">
                                                            <select class="form-select form-select-solid"
                                                                data-placeholder="Type"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents.type">
                                                                <option></option>
                                                            </select>
                                                        </div>

                                                        <div class="fv-row w-150px">
                                                            <input placeholder="Date Submitted"
                                                                class="form-control form-control-solid"
                                                                data-name="documents.date_submitted">
                                                        </div>

                                                        <div>
                                                            <button kt_form_add_student_profile_document_exit_removeBtn
                                                                type="button" class="btn btn-icon btn-secondary btn-sm"><i
                                                                    class="fas fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ url('/student/profile') }}" class="btn btn-light me-5">Cancel</a>
                            <button type="button" id="kt_form_add_student_profile_save_view" class="btn btn-primary me-2">
                                <span class="indicator-label">Save and View</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" id="kt_form_add_student_profile_save_add_more"
                                class="btn btn-primary me-2">
                                <span class="indicator-label">Save and Add more</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                            <button type="button" id="kt_form_add_student_profile_save" class="btn btn-success">
                                <span class="indicator-label"><i class="fas fa-save me-1"></i> Save</span>
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {


            // Form logics
            let fv = init_formValidation("kt_form_add_student_profile", {
                'recordType': {
                    validators: {
                        notEmpty: {
                            message: 'Record type is required'
                        },
                    },
                },
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
                'lastName': {
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
                "college[0][name]": {
                    validators: {
                        notEmpty: {
                            enabled: false,
                            message: 'College name is required',
                        },
                    },
                },
                "college[0][yearExited]": {
                    validators: {
                        notEmpty: {
                            enabled: false,
                            message: 'College year exited is required',
                        },
                    },
                },
            });

            const collegeNameValidators = {
                validators: {
                    notEmpty: {
                        message: 'College name is required',
                    },
                },
            }

            const collegeYearExitedValidators = {
                validators: {
                    notEmpty: {
                        message: 'College year exited is required',
                    },
                },
            }

            const resetPrevCollegeData = function() {

                prevCollegeRows = $("#kt_form_add_student_profile_prev_college_table").find(
                    'div[data-row-index]');

                if (prevCollegeRows.length >= 1) {
                    for (let index = 0; index < prevCollegeRows.length; index++) {

                        let rowIndex = $(prevCollegeRows[index]).attr('data-row-index');
                        removeCollege(rowIndex);
                    }
                }

                fv.disableValidator("college[0][name]")
                    .disableValidator("college[0][yearExited]");

                $("#kt_form_add_student_profile_prev_college_table input").val(
                    "");
                $("#kt_form_add_student_profile_prev_college_table input").val("");
            }

            const resetAcadStatusData = function() {
                const dateExitedElem = $("#kt_form_add_student_profile [name='dateExited']").parent();
                const honorElem = $("#kt_form_add_student_profile [name='honor']").parent();

                $(dateExitedElem).attr("style", "display:none !important");
                $(honorElem).attr("style", "display:none !important");

            }

            const showAcadStatusData = function(acadStatus) {
                const dateExitedElem = $("#kt_form_add_student_profile [name='dateExited']").parent();
                const honorElem = $("#kt_form_add_student_profile [name='honor']").parent();

                $(dateExitedElem).find("label.form-label").text('Date Exited');

                if (acadStatus == "HD") {
                    $(dateExitedElem).attr("style", "");
                } else if (acadStatus == "GRD") {
                    $(dateExitedElem).attr("style", "");
                    $(honorElem).attr("style", "");

                    $(dateExitedElem).find("label.form-label").text('Date Graduated');
                }
            }

            const resetFormData = function() {

                $('#kt_form_add_student_profile .form-select-solid').val('').trigger(
                    'change');
                $('#kt_form_add_student_profile .form-control-solid').val('');

            }

            const retrieveFormData = function() {

                return $("#kt_form_add_student_profile").serialize();
            }

            $("#kt_form_add_student_profile_clearAllFields").on("click", function() {

                resetFormData();
            });

            $("#kt_form_add_student_profile_save").on("click", function() {

                const add_submitBtnId = "kt_form_add_student_profile_save";

                fv.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(add_submitBtnId, "loading");
                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/add') }}",
                            data: retrieveFormData(),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(add_submitBtnId, "default");
                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);

                                setInterval(() => {
                                    window.location =
                                        "{{ url('/student/profile') }}";
                                }, 1500);
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            resetFormData();

                        }).catch(function(error) {

                            display_axios_error(error);
                        });
                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });
            });

            $("#kt_form_add_student_profile_save_add_more").on("click", function() {

                const add_submitBtnId = "kt_form_add_student_profile_save_add_more";

                fv.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(add_submitBtnId, "loading");
                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/add') }}",
                            data: retrieveFormData(),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(add_submitBtnId, "default");
                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);

                                setInterval(() => {
                                    window.location =
                                        "{{ url('/student/profile/add') }}";
                                }, 1500);
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            resetFormData();

                        }).catch(function(error) {

                            display_axios_error(error);
                        });
                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });
            });

            $("#kt_form_add_student_profile_save_view").on("click", function() {

                const add_submitBtnId = "kt_form_add_student_profile_save_view";

                fv.validate().then(function(e) {

                    if ('Valid' == e) {

                        trigger_btnIndicator(add_submitBtnId, "loading");
                        axios({
                            method: "POST",
                            url: "{{ url('/student/profile/add') }}",
                            data: retrieveFormData(),
                            timeout: "{{ $axios_timeout }}"
                        }).then(function(respond) {

                            trigger_btnIndicator(add_submitBtnId, "default");
                            if (respond.status == 200) {

                                display_axios_success(respond.data.message);

                                setInterval(() => {
                                    window.location =
                                        "{{ url('/student/profile') }}" +
                                        "/" +
                                        respond.data.id;
                                }, 1500);
                            } else {

                                display_modal_error("{{ __('modal.error') }}");
                            }

                            resetFormData();

                        }).catch(function(error) {

                            display_axios_error(error);
                        });
                    } else {
                        display_modal_error("{{ __('modal.error') }}");
                    }
                });
            });

            // Initialize Form fields

            const removeCollege = function(rowIndex) {

                fv.removeField("college[" + rowIndex + "][name]")
                    .removeField("college[" + rowIndex + "][yearExited]");

                $("#kt_form_add_student_profile_prev_college_table").find(
                    'div[data-row-index="' + rowIndex + '"]').remove();
            }

            const template = $("#kt_form_add_student_profile_prev_college_template");
            let rowIndex = 0;

            $("#kt_form_add_student_profile button[kt_form_add_student_profile_prev_college_addBtn]").on(
                "click",
                function() {

                    rowIndex++;

                    const clone = template.clone(true);
                    clone.removeAttr("id");

                    clone.attr("style", "");
                    clone.attr("data-row-index", rowIndex);

                    clone.insertBefore(template);

                    $(clone).find('[data-name="college.name"]').attr("name", "college[" + rowIndex +
                        "][name]");
                    $(clone).find('[data-name="college.yearExited"]').attr("name", "college[" +
                        rowIndex + "][yearExited]");

                    fv.addField("college[" + rowIndex + "][name]", collegeNameValidators)
                        .addField("college[" + rowIndex + "][yearExited]",
                            collegeYearExitedValidators);

                    const removeBtn = clone.find(
                        'button[kt_form_add_student_profile_prev_college_removeBtn]');
                    removeBtn.attr('data-row-index', rowIndex);

                    $(removeBtn).on('click', function(e) {

                        const index = $(this).attr('data-row-index');
                        removeCollege(index);
                    })
                });

            var city = new City();

            city.getProvinces().forEach((e) => {
                $(`<option value="${e}">${e}</option>`).appendTo(
                    "#kt_form_add_student_profile [name='addressProvince']");
            });

            $("#kt_form_add_student_profile [name='addressProvince']").on("change", function() {

                if ($(this).val()) {
                    var c = new City();

                    $("#kt_form_add_student_profile [name='addressCity']").empty();

                    c.getCities($("#kt_form_add_student_profile [name='addressProvince']").val())
                        .forEach((e) => {
                            $(`<option value="${e}">${e}</option>`).appendTo(
                                "#kt_form_add_student_profile [name='addressCity']");
                        });
                }
            });

            $("#kt_form_add_student_profile [name='admissionType']").on("change", function() {

                const admissionType = $(this).val();

                if (admissionType == "FRESHMEN" || admissionType == "") {

                    resetPrevCollegeData();

                    $("#kt_form_add_student_profile_prev_college").attr("style",
                        "display: none !important");
                } else if (admissionType == "TRANSFEREE") {

                    fv.enableValidator("college[0][name]")
                        .enableValidator("college[0][yearExited]");

                    $("#kt_form_add_student_profile_prev_college").attr("style", "");
                }

            });

            $("#kt_form_add_student_profile [name='academicStatus']").on("change", function() {

                resetAcadStatusData();
                showAcadStatusData($(this).val());
            });

            Inputmask({
                "mask": "99/99/9999"
            }).mask("#kt_form_add_student_profile [name='dateExited']");



            // Documents
            let ent_rowIndex = 0;
            let rec_rowIndex = 0;
            let ext_rowIndex = 0;

            const removeDocumentRow = function(rowIndex, docuCategory) {

                $("#kt_form_add_student_profile_document_" + docuCategory + "_list").find(
                    'div[data-row-index="' + rowIndex + '"]').remove();
            }

            const initDocumentRow = function(rowIndex, docuCategory) {

                $("#kt_form_add_student_profile_document_" + docuCategory +
                    "_list [name='documents[" + docuCategory + "][" + rowIndex + "][docu]']").select2();

                $("#kt_form_add_student_profile_document_" + docuCategory +
                    "_list [name='documents[" + docuCategory + "][" + rowIndex + "][type]']").select2();

                Inputmask({
                    "mask": "99/99/9999"
                }).mask("#kt_form_add_student_profile_document_" + docuCategory +
                    "_list [name='documents[" + docuCategory + "][" + rowIndex + "][date_submitted]']");


                $("#kt_form_add_student_profile_document_" + docuCategory +
                    "_list [name='documents[" + docuCategory + "][" + rowIndex + "][docu]']").on(
                    "change",
                    function() {

                        const docuTypesElement = $(
                            "#kt_form_add_student_profile_document_" + docuCategory +
                            "_list [name='documents[" + docuCategory + "][" + rowIndex + "][type]"
                        );

                        id = $(this).val();

                        $(docuTypesElement).empty().append("<option></option>");

                        if (id || id != "") {
                            axios({
                                method: "POST",
                                url: "{{ url('/documents/document-types') }}",
                                data: {
                                    id
                                },
                                timeout: "{{ $axios_timeout }}"
                            }).then(function(respond) {

                                if (respond.status == 200) {

                                    let docuTypes = respond.data;

                                    docuTypes.forEach(type => {

                                        $(docuTypesElement).append('<option value="' +
                                            type
                                            .docuType_name + '">' + type
                                            .docuType_name +
                                            '</option>');
                                    });
                                } else {

                                    display_modal_error("{{ __('modal.error') }}");
                                }

                            }).catch(function(error) {

                                display_axios_error(error);
                            });
                        }
                    });
            }

            initDocumentRow(ent_rowIndex, "entrance");
            initDocumentRow(rec_rowIndex, "records");
            initDocumentRow(ext_rowIndex, "exit");

            $("#kt_form_add_student_profile_document_entrance_list button[kt_form_add_student_profile_document_entrace_addBtn]")
                .on(
                    "click",
                    function() {

                        ent_rowIndex++;

                        const template = $("#kt_form_add_student_profile_document_entrace_template");
                        const clone = template.clone(true);
                        clone.removeAttr("id");

                        clone.attr("style", "");
                        clone.attr("data-row-index", ent_rowIndex);

                        clone.insertBefore(template);

                        $(clone).find('[data-name="documents.docu"]').attr("name", "documents[entrance][" +
                            ent_rowIndex +
                            "][docu]");
                        $(clone).find('[data-name="documents.type"]').attr("name", "documents[entrance][" +
                            ent_rowIndex + "][type]");
                        $(clone).find('[data-name="documents.date_submitted"]').attr("name",
                            "documents[entrance][" +
                            ent_rowIndex + "][date_submitted]");

                        const removeBtn = clone.find(
                            'button[kt_form_add_student_profile_document_entrace_removeBtn]');
                        removeBtn.attr('data-row-index', ent_rowIndex);

                        $(removeBtn).on('click', function(e) {

                            const index = $(this).attr('data-row-index');
                            removeDocumentRow(index, "entrance");
                        });

                        initDocumentRow(ent_rowIndex, "entrance");
                    });

            $("#kt_form_add_student_profile_document_records_list button[kt_form_add_student_profile_document_records_addBtn]")
                .on(
                    "click",
                    function() {

                        rec_rowIndex++;

                        const template = $("#kt_form_add_student_profile_document_records_template");
                        const clone = template.clone(true);
                        clone.removeAttr("id");

                        clone.attr("style", "");
                        clone.attr("data-row-index", rec_rowIndex);

                        clone.insertBefore(template);

                        $(clone).find('[data-name="documents.docu"]').attr("name", "documents[records][" +
                            rec_rowIndex +
                            "][docu]");
                        $(clone).find('[data-name="documents.type"]').attr("name", "documents[records][" +
                            rec_rowIndex + "][type]");
                        $(clone).find('[data-name="documents.date_submitted"]').attr("name",
                            "documents[records][" +
                            rec_rowIndex + "][date_submitted]");

                        const removeBtn = clone.find(
                            'button[kt_form_add_student_profile_document_records_removeBtn]');
                        removeBtn.attr('data-row-index', rec_rowIndex);

                        $(removeBtn).on('click', function(e) {

                            const index = $(this).attr('data-row-index');
                            removeDocumentRow(index, "records");
                        });

                        initDocumentRow(rec_rowIndex, "records");
                    });

            $("#kt_form_add_student_profile_document_exit_list button[kt_form_add_student_profile_document_exit_addBtn]")
                .on(
                    "click",
                    function() {

                        ext_rowIndex++;

                        const template = $("#kt_form_add_student_profile_document_exit_template");
                        const clone = template.clone(true);
                        clone.removeAttr("id");

                        clone.attr("style", "");
                        clone.attr("data-row-index", ext_rowIndex);

                        clone.insertBefore(template);

                        $(clone).find('[data-name="documents.docu"]').attr("name", "documents[exit][" +
                            ext_rowIndex +
                            "][docu]");
                        $(clone).find('[data-name="documents.type"]').attr("name", "documents[exit][" +
                            ext_rowIndex + "][type]");
                        $(clone).find('[data-name="documents.date_submitted"]').attr("name",
                            "documents[exit][" +
                            ext_rowIndex + "][date_submitted]");

                        const removeBtn = clone.find(
                            'button[kt_form_add_student_profile_document_exit_removeBtn]');
                        removeBtn.attr('data-row-index', ext_rowIndex);

                        $(removeBtn).on('click', function(e) {

                            const index = $(this).attr('data-row-index');
                            removeDocumentRow(index, "exit");
                        });

                        initDocumentRow(ext_rowIndex, "exit");
                    });

        }));
    </script>
@endsection