<x-default-layout title="{{ __('global.add') }} {{ __('cruds.student.title_singular') }}"
    pageTitle="{{ __('global.add') }} {{ __('cruds.student.title_singular') }}">

    <x-slot:breadcrumbs>
        {{ Breadcrumbs::render('students.create') }}
    </x-slot:breadcrumbs>

    <x-slot:content>

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
                            <div class="fv-row mb-7">
                                <input type="text" class="form-control" name="studentNo" />
                                <div class="text-muted fs-7 mb-5 mt-2">This is required and recommended to be unique
                                </div>
                            </div>

                            <div class="fv-row">
                                <label class="form-label">Course</label>
                                <select class="form-select " data-placeholder="Select a course" data-control="select2"
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
                                <select class="form-select " data-control="select2" data-placeholder="Admission Type"
                                    data-dropdown-parent="#kt_form_add_student_profile" name="admissionType">
                                    <option></option>
                                    <option value="FRESHMEN">Freshmen</option>
                                    <option value="TRANSFEREE">Transferee</option>
                                    <option value="LADDERIZED">Ladderized</option>
                                </select>
                                <div class="text-muted fs-7 mb-5 mt-2">Set the Admission type</div>
                            </div>

                            <div class="fv-row">
                                <label class="form-label">Year of Admission</label>
                                <select class="form-select " data-control="select2" data-placeholder="Select a year"
                                    data-dropdown-parent="#kt_form_add_student_profile" name="yearOfAdmission">
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
                                <select class="form-select " data-control="select2" data-placeholder="Academic Status"
                                    data-dropdown-parent="#kt_form_add_student_profile" name="academicStatus">
                                    <option></option>
                                    @foreach ((new App\Enums\AcademicStatusEnum())->getSelectable() as $value => $displayName)
                                        <option value="{{ $value }}">
                                            {{ $displayName }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="text-muted fs-7 mb-5 mt-2">Set the Academic Status</div>
                            </div>

                            <div class="fv-row mb-7" style="display:none !important">
                                <label class="form-label">Date Exited</label>
                                <input class="form-control " placeholder="" name="dateExited">
                            </div>

                            <div class="fv-row" style="display:none !important">
                                <select class="form-select " data-control="select2" data-placeholder="Honor"
                                    data-dropdown-parent="#kt_form_add_student_profile" data-allow-clear="true"
                                    name="honor">
                                    <option></option>
                                    @foreach ($formData_honors as $honor)
                                        <option value="{{ $honor->honor_id }}">
                                            {{ $honor->honor_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                        </div>
                    </div>

                    <div class="card card-flush py-4 bg-danger bg-opacity-15"
                        id="kt_form_add_student_profile_honorableDissmissed" style="display:none !important">
                        <div class="card-header">
                            <div class="card-title">
                                <h2 class="">Honorable Dismissal</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="fv-row mb-7" style="display:none !important">
                                <label class="form-label">Have granted an Honorable Dismissal?</label>

                                <select class="form-select " data-control="select2" data-placeholder="Yes or No"
                                    data-dropdown-parent="#kt_form_add_student_profile" name="isHonorableDismissed">
                                    <option></option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                            </div>

                            <div class="fv-row mb-7" style="display:none !important">
                                <select class="form-select " data-control="select2" data-placeholder="Status"
                                    data-dropdown-parent="#kt_form_add_student_profile"
                                    name="honorableDismissedStatus">
                                    <option></option>
                                    <option value="ISSUED">Issued</option>
                                    <option value="GRANTED">Granted</option>
                                </select>
                            </div>

                            <div class="fv-row mb-7" style="display:none !important">
                                <label class="form-label ">Date Issued</label>
                                <input class="form-control " value="" name="honorableDismissedDate">
                            </div>

                            <div class="fv-row" style="display:none !important">
                                <label class="form-label ">School name and Address</label>
                                <input class="form-control " value="" name="honorableDismissedSchool">
                                <div class=" fs-7 mb-5 mt-2">The school where the document will be transferred
                                </div>
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
                                        <select class="form-select " data-control="select2"
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

                    <ul
                        class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 mt-10">
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab"
                                href="#kt_form_add_student_profile_general_tab">General Information</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 " data-kt-countup-tabs="true"
                                data-bs-toggle="tab" href="#kt_form_add_student_profile_envelope">Envelope
                                Documents
                            </a>
                        </li>

                    </ul>

                    <div class="tab-content" id="myTabContent">

                        <div class="tab-pane fade show active" id="kt_form_add_student_profile_general_tab"
                            role="tabpanel">

                            <div class="card card-flush mb-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>General Information</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    <div class="row g-9 mb-7">

                                        <div class="col-md-6 fv-row">
                                            <label class="required form-label">First name</label>
                                            <input class="form-control "
                                                oninput="this.value = this.value.toUpperCase()" name="firstName">
                                        </div>

                                        <div class="col-md-6 fv-row">
                                            <label class="form-label">Middle name</label>
                                            <input class="form-control "
                                                oninput="this.value = this.value.toUpperCase()" name="middleName">
                                        </div>
                                    </div>

                                    <div class="row g-9 mb-7">

                                        <div class="col-md-12 fv-row">
                                            <label class="required form-label">Last name</label>
                                            <input class="form-control "
                                                oninput="this.value = this.value.toUpperCase()" name="lastName">
                                        </div>
                                    </div>

                                    <div class="text-muted fs-7 mb-15 mt-2">Set the Student name for better
                                        indentification
                                    </div>


                                    <div class="fv-row mb-7">
                                        <label class="form-label">Permanent Address</label>
                                        <input class="form-control " oninput="this.value = this.value.toUpperCase()"
                                            name="addressLine">
                                    </div>

                                    <div class="row mb-7">
                                        <div class="col-md-6 fv-row">
                                            <label class="form-label fs-5 fw-bold mb-3">Province</label>
                                            <select class="form-select " data-control="select2"
                                                data-placeholder="Select a province"
                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                data-allow-clear="true" name="addressProvince">
                                                <option></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 fv-row">
                                            <label class="form-label fs-5 fw-bold mb-3">City</label>
                                            <select class="form-select " data-control="select2"
                                                data-placeholder="Select a city"
                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                data-allow-clear="true" name="addressCity">
                                                <option></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-flush mb-10">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Elementary and High School</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">

                                    <div class="row g-9 mb-7">

                                        <div class="col-md-9 fv-row">
                                            <label class="form-label">Elementary School name</label>
                                            <input class="form-control "
                                                oninput="this.value = this.value.toUpperCase()" name="es_name">
                                        </div>


                                        <div class="col-md-3 fv-row">
                                            <label class="form-label">Year graduated</label>
                                            <input class="form-control " placeholder="" name="es_yearGraduated">
                                        </div>
                                    </div>

                                    <div class="row g-9">

                                        <div class="col-md-9 fv-row">
                                            <label class="form-label">High School name</label>
                                            <input class="form-control "
                                                oninput="this.value = this.value.toUpperCase()" name="hs_name">
                                        </div>


                                        <div class="col-md-3 fv-row">
                                            <label class="form-label">Year graduated</label>
                                            <input class="form-control " placeholder="" name="hs_yearGraduated">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-flush mb-10" id="kt_form_add_student_profile_prev_college"
                                style="display: none !important">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Previous College or University</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0" id="kt_form_add_student_profile_prev_college_table">

                                    <div class="d-flex justify-content-between">

                                        <div class="fv-row w-50">
                                            <input placeholder="School name" class="form-control "
                                                oninput="this.value = this.value.toUpperCase()"
                                                name="college[0][name]">
                                        </div>


                                        <div class="fv-row">
                                            <input placeholder="Year Exited" class="form-control "
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
                                                oninput="this.value = this.value.toUpperCase()" class="form-control ">
                                        </div>


                                        <div class="fv-row">
                                            <input placeholder="Year Exited" data-name="college.yearExited"
                                                class="form-control ">
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

                            <div class="card mb-10">
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
                                                    aria-selected="true">
                                                    Entrance </a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab"
                                                    role="tab" href="#kt_student_view_school_secondary"
                                                    aria-selected="false">
                                                    Records </a>
                                            </li>

                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link text-active-primary" data-bs-toggle="tab"
                                                    role="tab" href="#kt_student_view_school_tertiary"
                                                    aria-selected="false"> Exit
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

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Document"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true"
                                                            name="documents[entrance][0][docu]">
                                                            <option></option>
                                                            @foreach ($formData_docu_ent as $docu)
                                                                <option value="{{ $docu->docu_id }}">
                                                                    {{ $docu->docu_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true"
                                                            name="documents[entrance][0][type]">
                                                            <option></option>

                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
                                                            name="documents[entrance][0][date_submitted]">
                                                    </div>

                                                    <div>
                                                        <button kt_form_add_student_profile_document_entrance_addBtn
                                                            type="button" class="btn btn-icon btn-dark btn-sm"><i
                                                                class="fas fa-plus"></i></button>
                                                    </div>
                                                </div>

                                                <div id="kt_form_add_student_profile_document_entrance_template"
                                                    class="d-flex justify-content-between mt-5"
                                                    style="display:none !important;">

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-placeholder="Document"
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
                                                        <select class="form-select " data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true" data-name="documents.type">
                                                            <option></option>
                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
                                                            data-name="documents.date_submitted">
                                                    </div>

                                                    <div>
                                                        <button kt_form_add_student_profile_document_entrance_removeBtn
                                                            type="button"
                                                            class="btn btn-icon btn-secondary btn-sm"><i
                                                                class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="kt_student_view_school_secondary"
                                            role="tabpanel">

                                            <div
                                                class="rounded-3 p-10 pb-15 mx-5 mb-15 border-1 border border-gray-200">
                                                <h4 class="mb-5 text-gray-800 fw-bold">Registration Certificates
                                                </h4>

                                                <div id="kt_form_add_student_profile_document_records_regcert_list">
                                                    <div class="row">

                                                        <div class="col-3">
                                                            <select class="form-select "
                                                                data-placeholder="School Year"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true"
                                                                name="documents_fix[records][regcert][0][sy]">
                                                                <option></option>
                                                                @foreach ($formData_year as $year)
                                                                    <option value="{{ $year->syear_year }}">
                                                                        {{ $year->syear_year }} -
                                                                        {{ $year->syear_year + 1 }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-3">
                                                            <select class="form-select " data-placeholder="Semester"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true"
                                                                name="documents_fix[records][regcert][0][sem]">
                                                                <option></option>
                                                                @foreach ($formData_terms as $term)
                                                                    <option value="{{ $term->term_name }}">
                                                                        {{ $term->term_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-2">
                                                            <select class="form-select " data-placeholder="Year level"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true"
                                                                name="documents_fix[records][regcert][0][yrlvl]">
                                                                <option></option>
                                                                @foreach ($formData_yrLevel as $year)
                                                                    <option value="{{ $year->year_name }}">
                                                                        {{ $year->year_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-3">
                                                            <input placeholder="Date Submitted" class="form-control "
                                                                name="documents_fix[records][regcert][0][date_submitted]">
                                                        </div>

                                                        <div class="col-1 d-flex flex-center">
                                                            <button
                                                                kt_form_add_student_profile_document_records_regcert_addBtn
                                                                type="button" class="btn btn-icon btn-dark btn-sm"><i
                                                                    class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>

                                                    <div id="kt_form_add_student_profile_document_records_regcert_template"
                                                        class="mt-5 row" style="display:none !important;">

                                                        <div class="col-3">
                                                            <select class="form-select "
                                                                data-placeholder="School Year"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents_fix.sy">
                                                                <option></option>
                                                                @foreach ($formData_year as $year)
                                                                    <option value="{{ $year->syear_year }}">
                                                                        {{ $year->syear_year }} -
                                                                        {{ $year->syear_year + 1 }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-3">
                                                            <select class="form-select " data-placeholder="Semester"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true" data-name="documents_fix.sem">
                                                                <option></option>
                                                                @foreach ($formData_terms as $term)
                                                                    <option value="{{ $term->term_name }}">
                                                                        {{ $term->term_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-2">
                                                            <select class="form-select " data-placeholder="Year level"
                                                                data-dropdown-parent="#kt_form_add_student_profile"
                                                                data-allow-clear="true"
                                                                data-name="documents_fix.yrlvl">
                                                                <option></option>
                                                                @foreach ($formData_yrLevel as $year)
                                                                    <option value="{{ $year->year_name }}">
                                                                        {{ $year->year_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>

                                                        <div class="col-3">
                                                            <input placeholder="Date Submitted" class="form-control "
                                                                data-name="documents_fix.date_submitted">
                                                        </div>

                                                        <div class="col-1 d-flex flex-center">
                                                            <button
                                                                kt_form_add_student_profile_document_records_regcert_removeBtn
                                                                type="button"
                                                                class="btn btn-icon btn-secondary btn-sm"><i
                                                                    class="fas fa-minus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div id="kt_form_add_student_profile_document_records_list"
                                                class="mx-5 p-10 py-0">
                                                <h4 class="mb-5 text-gray-800 fw-bold">Other documents</h4>

                                                <div class="d-flex justify-content-between">

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Document"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true"
                                                            name="documents[records][0][docu]">
                                                            <option></option>
                                                            @foreach ($formData_docu_rec as $docu)
                                                                <option value="{{ $docu->docu_id }}">
                                                                    {{ $docu->docu_name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true"
                                                            name="documents[records][0][type]">
                                                            <option></option>

                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
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

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-placeholder="Document"
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
                                                        <select class="form-select " data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true" data-name="documents.type">
                                                            <option></option>
                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
                                                            data-name="documents.date_submitted">
                                                    </div>

                                                    <div>
                                                        <button kt_form_add_student_profile_document_records_removeBtn
                                                            type="button"
                                                            class="btn btn-icon btn-secondary btn-sm"><i
                                                                class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade" id="kt_student_view_school_tertiary"
                                            role="tabpanel">

                                            <div id="kt_form_add_student_profile_document_exit_list" class="px-8"
                                                style="display:none !important">

                                                <div class="d-flex justify-content-between">

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Document"
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
                                                        <select class="form-select " data-control="select2"
                                                            data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true" name="documents[exit][0][type]">
                                                            <option></option>

                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
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

                                                    <div class="fv-row w-25">
                                                        <select class="form-select " data-placeholder="Document"
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
                                                        <select class="form-select " data-placeholder="Type"
                                                            data-dropdown-parent="#kt_form_add_student_profile"
                                                            data-allow-clear="true" data-name="documents.type">
                                                            <option></option>
                                                        </select>
                                                    </div>

                                                    <div class="fv-row">
                                                        <input placeholder="Date Submitted" class="form-control "
                                                            data-name="documents.date_submitted">
                                                    </div>

                                                    <div>
                                                        <button kt_form_add_student_profile_document_exit_removeBtn
                                                            type="button"
                                                            class="btn btn-icon btn-secondary btn-sm"><i
                                                                class="fas fa-minus"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="kt_form_add_student_profile_document_exit_na"
                                                class="d-flex flex-center py-10" style="">
                                                <p class="mb-0 mt-3 fs-5">This is applicable for <b>Graduated</b>
                                                    and
                                                    <b>Honorable Dismissed</b> academic status only
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ url('/student/profile') }}" class="btn btn-light me-5">Cancel</a>
                        <button type="button" id="kt_form_add_student_profile_save_view"
                            class="btn btn-primary me-2">
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
    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            "use strict";

            var KTCreateAccount = function() {

                var e, t, i, o, a, r, s = [];

                return {
                    init: function() {
                        (e = document.querySelector("#kt_modal_create_account")) && new bootstrap.Modal(e), (t =
                            document.querySelector("#kt_create_account_stepper")) && (i = t.querySelector(
                            "#kt_create_account_form"), o = t.querySelector(
                            '[data-kt-stepper-action="submit"]'), a = t.querySelector(
                            '[data-kt-stepper-action="next"]'), (r = new KTStepper(t)).on("kt.stepper.changed",
                            (function(e) {
                                4 === r.getCurrentStepIndex() ? (o.classList.remove("d-none"), o.classList
                                        .add("d-inline-block"), a.classList.add("d-none")) : 5 === r
                                    .getCurrentStepIndex() ? (o.classList.add("d-none"), a.classList.add(
                                        "d-none")) : (o.classList.remove("d-inline-block"), o.classList
                                        .remove("d-none"), a.classList.remove("d-none"))
                            })), r.on("kt.stepper.next", (function(e) {
                            console.log("stepper.next");
                            var t = s[e.getCurrentStepIndex() - 1];
                            t ? t.validate().then((function(t) {
                                console.log("validated!"), "Valid" == t ? (e.goNext(),
                                    KTUtil.scrollTop()) : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then((function() {
                                    KTUtil.scrollTop()
                                }))
                            })) : (e.goNext(), KTUtil.scrollTop())
                        })), r.on("kt.stepper.previous", (function(e) {
                            console.log("stepper.previous"), e.goPrevious(), KTUtil.scrollTop()
                        })), s.push(FormValidation.formValidation(i, {
                            fields: {
                                account_type: {
                                    validators: {
                                        notEmpty: {
                                            message: "Account type is required"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        })), s.push(FormValidation.formValidation(i, {
                            fields: {
                                account_team_size: {
                                    validators: {
                                        notEmpty: {
                                            message: "Time size is required"
                                        }
                                    }
                                },
                                account_name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Account name is required"
                                        }
                                    }
                                },
                                account_plan: {
                                    validators: {
                                        notEmpty: {
                                            message: "Account plan is required"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        })), s.push(FormValidation.formValidation(i, {
                            fields: {
                                business_name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Busines name is required"
                                        }
                                    }
                                },
                                business_descriptor: {
                                    validators: {
                                        notEmpty: {
                                            message: "Busines descriptor is required"
                                        }
                                    }
                                },
                                business_type: {
                                    validators: {
                                        notEmpty: {
                                            message: "Busines type is required"
                                        }
                                    }
                                },
                                business_email: {
                                    validators: {
                                        notEmpty: {
                                            message: "Busines email is required"
                                        },
                                        emailAddress: {
                                            message: "The value is not a valid email address"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        })), s.push(FormValidation.formValidation(i, {
                            fields: {
                                card_name: {
                                    validators: {
                                        notEmpty: {
                                            message: "Name on card is required"
                                        }
                                    }
                                },
                                card_number: {
                                    validators: {
                                        notEmpty: {
                                            message: "Card member is required"
                                        },
                                        creditCard: {
                                            message: "Card number is not valid"
                                        }
                                    }
                                },
                                card_expiry_month: {
                                    validators: {
                                        notEmpty: {
                                            message: "Month is required"
                                        }
                                    }
                                },
                                card_expiry_year: {
                                    validators: {
                                        notEmpty: {
                                            message: "Year is required"
                                        }
                                    }
                                },
                                card_cvv: {
                                    validators: {
                                        notEmpty: {
                                            message: "CVV is required"
                                        },
                                        digits: {
                                            message: "CVV must contain only digits"
                                        },
                                        stringLength: {
                                            min: 3,
                                            max: 4,
                                            message: "CVV must contain 3 to 4 digits only"
                                        }
                                    }
                                }
                            },
                            plugins: {
                                trigger: new FormValidation.plugins.Trigger,
                                bootstrap: new FormValidation.plugins.Bootstrap5({
                                    rowSelector: ".fv-row",
                                    eleInvalidClass: "",
                                    eleValidClass: ""
                                })
                            }
                        })), o.addEventListener("click", (function(e) {
                            s[3].validate().then((function(t) {
                                console.log("validated!"), "Valid" == t ? (e
                                    .preventDefault(), o.disabled = !0, o.setAttribute(
                                        "data-kt-indicator", "on"), setTimeout((
                                        function() {
                                            o.removeAttribute("data-kt-indicator"),
                                                o.disabled = !1, r.goNext()
                                        }), 2e3)) : Swal.fire({
                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                    icon: "error",
                                    buttonsStyling: !1,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn btn-light"
                                    }
                                }).then((function() {
                                    KTUtil.scrollTop()
                                }))
                            }))
                        })), $(i.querySelector('[name="card_expiry_month"]')).on("change", (function() {
                            s[3].revalidateField("card_expiry_month")
                        })), $(i.querySelector('[name="card_expiry_year"]')).on("change", (function() {
                            s[3].revalidateField("card_expiry_year")
                        })), $(i.querySelector('[name="business_type"]')).on("change", (function() {
                            s[2].revalidateField("business_type")
                        })))
                    }
                }
            }();

            KTUtil.onDOMContentLoaded((function() {
                KTCreateAccount.init()
            }));
        </script>
    </x-slot:scripts>

</x-default-layout>
