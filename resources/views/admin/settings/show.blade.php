@extends('layouts.fluid')


@section('content')

<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-xxl">
        <div class="d-flex flex-column flex-xl-row">
            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                <div class="card mb-5 mb-xl-8">
                    <div class="card-header border-0">
                        <div class="card-title">
                            <h3 class="fw-bolder m-0">Curriculum</h3>
                        </div>
                    </div>

                    <div class="card-body pt-2">
                        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link btn active btn-active-light-dark text-black-50 fw-bolder"
                                    data-bs-toggle="tab" href="#settings_curriculum_yearLevel">
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5">Year Level</span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder"
                                    data-bs-toggle="tab" href="#settings_curriculum_term">
                                    <span class="d-flex flex-column align-items-start">
                                        <span class="fs-5">Terms</span>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

            <div class="flex-lg-row-fluid ms-lg-15">
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="settings_curriculum_yearLevel" role="tabpanel">
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h2>Year Level</h2>
                                </div>
                                <div class="card-toolbar">
                                    <button class="btn btn-sm btn-flex btn-light-primary"
                                        id="kt_drawer_yearLevel_add_button">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                    fill="black" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                    transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        Add Year Level
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-5">

                                <div
                                    class="alert bg-light-primary border border-primary d-flex flex-column flex-sm-row p-5 m-8 mb-10 mt-5">

                                    <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M17.1 10.5H11.1C10.5 10.5 10.1 10.1 10.1 9.5V8.5C10.1 7.9 10.5 7.5 11.1 7.5H17.1C17.7 7.5 18.1 7.9 18.1 8.5V9.5C18.1 10.1 17.7 10.5 17.1 10.5ZM22.1 4.5V3.5C22.1 2.9 21.7 2.5 21.1 2.5H11.1C10.5 2.5 10.1 2.9 10.1 3.5V4.5C10.1 5.1 10.5 5.5 11.1 5.5H21.1C21.7 5.5 22.1 5.1 22.1 4.5ZM22.1 15.5V14.5C22.1 13.9 21.7 13.5 21.1 13.5H11.1C10.5 13.5 10.1 13.9 10.1 14.5V15.5C10.1 16.1 10.5 16.5 11.1 16.5H21.1C21.7 16.5 22.1 16.1 22.1 15.5ZM18.1 20.5V19.5C18.1 18.9 17.7 18.5 17.1 18.5H11.1C10.5 18.5 10.1 18.9 10.1 19.5V20.5C10.1 21.1 10.5 21.5 11.1 21.5H17.1C17.7 21.5 18.1 21.1 18.1 20.5Z"
                                                fill="black"></path>
                                            <path
                                                d="M5.60001 10.5C5.30001 10.5 5.00002 10.4 4.80002 10.2C4.60002 9.99995 4.5 9.70005 4.5 9.30005V5.40002C3.7 5.90002 3.40001 6 3.10001 6C2.90001 6 2.6 5.89995 2.5 5.69995C2.3 5.49995 2.20001 5.3 2.20001 5C2.20001 4.6 2.4 4.40005 2.5 4.30005C2.6 4.20005 2.80001 4.10002 3.10001 3.90002C3.50001 3.70002 3.8 3.50005 4 3.30005C4.2 3.10005 4.40001 2.89995 4.60001 2.69995C4.80001 2.39995 4.9 2.19995 5 2.19995C5.1 2.09995 5.30001 2 5.60001 2C5.90001 2 6.10002 2.10002 6.30002 2.40002C6.50002 2.60002 6.5 2.89995 6.5 3.19995V9C6.6 10.4 5.90001 10.5 5.60001 10.5ZM7.10001 21.5C7.40001 21.5 7.69999 21.4 7.89999 21.2C8.09999 21 8.20001 20.8 8.20001 20.5C8.20001 20.2 8.10002 19.9 7.80002 19.8C7.60002 19.6 7.3 19.6 7 19.6H5.10001C5.30001 19.4 5.50002 19.2 5.80002 19C6.30002 18.6 6.69999 18.3 6.89999 18.1C7.09999 17.9 7.40001 17.6 7.60001 17.2C7.80001 16.8 8 16.3 8 15.9C8 15.6 7.90002 15.3 7.80002 15C7.70002 14.7 7.50002 14.5 7.30002 14.2C7.10002 14 6.80001 13.8 6.60001 13.7C6.20001 13.5 5.70001 13.4 5.10001 13.4C4.60001 13.4 4.20002 13.5 3.80002 13.6C3.40002 13.7 3.09999 13.9 2.89999 14.2C2.69999 14.4 2.50002 14.7 2.30002 15C2.20002 15.3 2.10001 15.6 2.10001 15.9C2.10001 16.3 2.29999 16.5 2.39999 16.6C2.59999 16.8 2.80001 16.9 3.10001 16.9C3.50001 16.9 3.70002 16.7 3.80002 16.6C3.90002 16.4 4.00001 16.2 4.10001 16C4.20001 15.8 4.20001 15.7 4.20001 15.7C4.40001 15.4 4.59999 15.3 4.89999 15.3C4.99999 15.3 5.20002 15.3 5.30002 15.4C5.40002 15.5 5.50001 15.5 5.60001 15.7C5.70001 15.8 5.70001 15.9 5.70001 16.1C5.70001 16.2 5.70001 16.4 5.60001 16.6C5.50001 16.8 5.40001 16.9 5.20001 17.1C5.00001 17.3 4.80001 17.5 4.60001 17.6C4.40001 17.7 4.20002 17.9 3.80002 18.3C3.40002 18.6 3.00001 19 2.60001 19.5C2.50001 19.6 2.30001 19.8 2.20001 20.1C2.10001 20.4 2 20.6 2 20.7C2 21 2.10002 21.3 2.30002 21.5C2.50002 21.7 2.80001 21.8 3.20001 21.8H7.10001V21.5Z"
                                                fill="black"></path>



                                        </svg>
                                    </span>

                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h5 class="mb-1">Arrange order</h5>
                                        <span><span>Drag</span><span class="svg-icon svg-icon-2 me-2 mx-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                        fill="black"></path>
                                                    <path opacity="0.3"
                                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                        fill="black"></path>
                                                </svg></span><span>on each year level to reorder</span></span>
                                    </div>
                                </div>

                                <div id="settings_curriculum_yearLevel_list"
                                    class="rounded p-10 d-flex flex-column draggable-zone">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="settings_curriculum_term" role="tabpanel">
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <div class="card-header border-0">
                                <div class="card-title">
                                    <h2>Terms</h2>
                                </div>
                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-flex btn-light-primary"
                                        id="kt_drawer_term_add_button">
                                        <span class="svg-icon svg-icon-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="5"
                                                    fill="black" />
                                                <rect x="10.8891" y="17.8033" width="12" height="2" rx="1"
                                                    transform="rotate(-90 10.8891 17.8033)" fill="black" />
                                                <rect x="6.01041" y="10.9247" width="12" height="2" rx="1"
                                                    fill="black" />
                                            </svg>
                                        </span>
                                        Add Term
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0 pb-5">

                                <div class="alert bg-light-primary border border-primary d-flex flex-column flex-sm-row p-5 m-8 mb-10 mt-5">

                                    <span class="svg-icon svg-icon-2hx svg-icon-primary me-4 mb-5 mb-sm-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M17.1 10.5H11.1C10.5 10.5 10.1 10.1 10.1 9.5V8.5C10.1 7.9 10.5 7.5 11.1 7.5H17.1C17.7 7.5 18.1 7.9 18.1 8.5V9.5C18.1 10.1 17.7 10.5 17.1 10.5ZM22.1 4.5V3.5C22.1 2.9 21.7 2.5 21.1 2.5H11.1C10.5 2.5 10.1 2.9 10.1 3.5V4.5C10.1 5.1 10.5 5.5 11.1 5.5H21.1C21.7 5.5 22.1 5.1 22.1 4.5ZM22.1 15.5V14.5C22.1 13.9 21.7 13.5 21.1 13.5H11.1C10.5 13.5 10.1 13.9 10.1 14.5V15.5C10.1 16.1 10.5 16.5 11.1 16.5H21.1C21.7 16.5 22.1 16.1 22.1 15.5ZM18.1 20.5V19.5C18.1 18.9 17.7 18.5 17.1 18.5H11.1C10.5 18.5 10.1 18.9 10.1 19.5V20.5C10.1 21.1 10.5 21.5 11.1 21.5H17.1C17.7 21.5 18.1 21.1 18.1 20.5Z"
                                                fill="black"></path>
                                            <path
                                                d="M5.60001 10.5C5.30001 10.5 5.00002 10.4 4.80002 10.2C4.60002 9.99995 4.5 9.70005 4.5 9.30005V5.40002C3.7 5.90002 3.40001 6 3.10001 6C2.90001 6 2.6 5.89995 2.5 5.69995C2.3 5.49995 2.20001 5.3 2.20001 5C2.20001 4.6 2.4 4.40005 2.5 4.30005C2.6 4.20005 2.80001 4.10002 3.10001 3.90002C3.50001 3.70002 3.8 3.50005 4 3.30005C4.2 3.10005 4.40001 2.89995 4.60001 2.69995C4.80001 2.39995 4.9 2.19995 5 2.19995C5.1 2.09995 5.30001 2 5.60001 2C5.90001 2 6.10002 2.10002 6.30002 2.40002C6.50002 2.60002 6.5 2.89995 6.5 3.19995V9C6.6 10.4 5.90001 10.5 5.60001 10.5ZM7.10001 21.5C7.40001 21.5 7.69999 21.4 7.89999 21.2C8.09999 21 8.20001 20.8 8.20001 20.5C8.20001 20.2 8.10002 19.9 7.80002 19.8C7.60002 19.6 7.3 19.6 7 19.6H5.10001C5.30001 19.4 5.50002 19.2 5.80002 19C6.30002 18.6 6.69999 18.3 6.89999 18.1C7.09999 17.9 7.40001 17.6 7.60001 17.2C7.80001 16.8 8 16.3 8 15.9C8 15.6 7.90002 15.3 7.80002 15C7.70002 14.7 7.50002 14.5 7.30002 14.2C7.10002 14 6.80001 13.8 6.60001 13.7C6.20001 13.5 5.70001 13.4 5.10001 13.4C4.60001 13.4 4.20002 13.5 3.80002 13.6C3.40002 13.7 3.09999 13.9 2.89999 14.2C2.69999 14.4 2.50002 14.7 2.30002 15C2.20002 15.3 2.10001 15.6 2.10001 15.9C2.10001 16.3 2.29999 16.5 2.39999 16.6C2.59999 16.8 2.80001 16.9 3.10001 16.9C3.50001 16.9 3.70002 16.7 3.80002 16.6C3.90002 16.4 4.00001 16.2 4.10001 16C4.20001 15.8 4.20001 15.7 4.20001 15.7C4.40001 15.4 4.59999 15.3 4.89999 15.3C4.99999 15.3 5.20002 15.3 5.30002 15.4C5.40002 15.5 5.50001 15.5 5.60001 15.7C5.70001 15.8 5.70001 15.9 5.70001 16.1C5.70001 16.2 5.70001 16.4 5.60001 16.6C5.50001 16.8 5.40001 16.9 5.20001 17.1C5.00001 17.3 4.80001 17.5 4.60001 17.6C4.40001 17.7 4.20002 17.9 3.80002 18.3C3.40002 18.6 3.00001 19 2.60001 19.5C2.50001 19.6 2.30001 19.8 2.20001 20.1C2.10001 20.4 2 20.6 2 20.7C2 21 2.10002 21.3 2.30002 21.5C2.50002 21.7 2.80001 21.8 3.20001 21.8H7.10001V21.5Z"
                                                fill="black"></path>



                                        </svg>
                                    </span>

                                    <div class="d-flex flex-column pe-0 pe-sm-10">
                                        <h5 class="mb-1">Arrange order</h5>
                                        <span><span>Drag</span><span class="svg-icon svg-icon-2 me-2 mx-2"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                        fill="black"></path>
                                                    <path opacity="0.3"
                                                        d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                        fill="black"></path>
                                                </svg></span><span>on each term to reorder</span></span>
                                    </div>
                                </div>

                                <div id="settings_curriculum_term_list"
                                    class="rounded p-10 d-flex flex-column draggable-zone"> </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div id="kt_drawer_yearLevel_add" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_yearLevel_add_button" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'md': '500px'}">
    <div class="card rounded-0 w-100">
        <form class="form" action="#" id="kt_drawer_yearLevel_add_form">
            <div class="card-header pe-5">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Add Year Level</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_yearLevel_add_cancel">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                </div>
            </div>
            <div class="card-footer flex-center text-center">
                <button type="reset" id="kt_drawer_yearLevel_add_cancel" class="btn btn-light me-3">Discard</button>
                <button type="submit" id="kt_drawer_yearLevel_add_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>

<div id="kt_drawer_yearLevel_edit" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_yearLevel_edit_button" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'md': '500px'}">
    <div class="card rounded-0 w-100">
        <form class="form" action="#" id="kt_drawer_yearLevel_edit_form">
            <input type="text" hidden name="id" />
            <div class="card-header pe-5">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Edit Year Level</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_yearLevel_edit_cancel">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                </div>
            </div>
            <div class="card-footer flex-center text-center">
                <button type="reset" id="kt_drawer_yearLevel_edit_cancel" class="btn btn-light me-3">Discard</button>
                <button type="submit" id="kt_drawer_yearLevel_edit_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>

<div id="kt_drawer_term_add" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_term_add_button" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'md': '500px'}">
    <div class="card rounded-0 w-100">
        <form class="form" action="#" id="kt_drawer_term_add_form">
            <div class="card-header pe-5">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Add Term</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_term_add_cancel">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fv-row mb-12">
                    <label class="required fs-6 fw-bold mb-2">Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                </div>

               

            </div>
            <div class="card-footer flex-center text-center">
                <button type="reset" id="kt_drawer_term_add_cancel" class="btn btn-light me-3">Discard</button>
                <button type="submit" id="kt_drawer_term_add_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>

<div id="kt_drawer_term_edit" class="bg-white" data-kt-drawer="true" data-kt-drawer-activate="true"
    data-kt-drawer-toggle="#kt_drawer_term_edit_button" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'300px', 'md': '500px'}">
    <div class="card rounded-0 w-100">
        <form class="form" action="#" id="kt_drawer_term_edit_form">
            <input type="text" hidden name="id" />
            <div class="card-header pe-5">
                <div class="card-title">
                    <div class="d-flex justify-content-center flex-column me-3">
                        <span class="fs-4 fw-bolder text-gray-900 me-1 lh-1">Edit Term</span>
                    </div>
                </div>
                <div class="card-toolbar">
                    <div class="btn btn-sm btn-icon btn-active-light-primary" id="kt_drawer_term_edit_cancel">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">Name</label>
                    <input type="text" class="form-control form-control-solid" placeholder="" name="name" />
                </div>
            </div>
            <div class="card-footer flex-center text-center">
                <button type="reset" id="kt_drawer_term_edit_cancel" class="btn btn-light me-3">Discard</button>
                <button type="submit" id="kt_drawer_term_edit_submit" class="btn btn-primary">
                    <span class="indicator-label">Submit</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
KTUtil.onDOMContentLoaded((function() {

    var e = document.querySelectorAll('.draggable-zone');
    new Sortable.default(e, {
        draggable: '.draggable',
        handle: '.draggable .draggable-handle',
        mirror: {
            appendTo: 'body',
            constrainDimensions: !0
        },
    });

    /*
    |--------------------------------------------------------------------------
    |    Begin::Year Level
    |-------------------------------------------------------------------------- 
    |
    */

    function refresh_list_yearLevel() {

        axios({
            method: "GET",
            url: "{{ url('/settings/year-level/retrieveAll') }}",
            timeout: "{{ $axios_timeout }}"
        }).then(function(respond) {
            if (respond.status == 200) {
                $('#settings_curriculum_yearLevel_list').empty();

                data = respond.data;
                for (let i = 0; i < data.length; i++) {
                    $(`<div id="${data[i]['year_id_md5']}" class="d-flex align-items-center border border-2 rounded p-5 mb-5 draggable">
                            <span class="svg-icon svg-icon-dark me-4">
                                <a href="#" class="btn btn-icon draggable-handle">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <span class="fw-bolder text-gray-800 fs-6">${data[i]['year_name']}</span>
                            </div>
                            <div class="d-flex justify-content-start flex-shrink-0">
                                <a href="javascript:void(0)" settings_curriculum_yearLevel_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="javascript:void(0)" settings_curriculum_yearLevel_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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
                            </div>
                        </div>`).appendTo("#settings_curriculum_yearLevel_list");
                }
            } else {
                display_modal_error("{{ __('modal.error') }}");
            }

        }).catch(function(error) {
            display_axios_error(error);
        });
    };

    refresh_list_yearLevel();

    $("#settings_curriculum_yearLevel_list").on("drag:stop", function() {
        var years = $("#settings_curriculum_yearLevel_list > .draggable");

        var list_years = new Array();
        for (let i = 0; i < years.length; i++) {
            list_years.push($(years[i]).attr('id'));
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: {
                id_list: list_years
            },
            url: "{{ url('/settings/year-level/updateOrder') }}",
        }).done(function(response) {
            response = JSON.parse(response);
            if (response['status'] == 200) {
                toastr.success(response['message']);
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
            refresh_list_yearLevel();
        })

    })

    //--begin::Add Drawer --//

    var add_yearLevel_drawerElement = document.querySelector("#kt_drawer_yearLevel_add");
    var add_yearLevel_drawer = KTDrawer.getInstance(add_yearLevel_drawerElement);

    var add_yearLevel_submitBtn = document.getElementById('kt_drawer_yearLevel_add_submit');
    var add_yearLevel_form = document.getElementById('kt_drawer_yearLevel_add_form');
    var add_yearLevel_formValidation = FormValidation.formValidation(document.getElementById(
        'kt_drawer_yearLevel_add_form'), { // Add Form Validation
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Year Level Name is required'
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

    $('#kt_drawer_yearLevel_add_cancel, #kt_drawer_yearLevel_add_close').on("click",
        function( // X and Discard Button
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
                    if (t.value) {
                        add_yearLevel_drawer.hide();
                        add_yearLevel_form.reset();
                    }
                });
        });

    $("#kt_drawer_yearLevel_add_form").on("submit", function(e) { // Add Form Submission
        e.preventDefault(),
            add_yearLevel_formValidation &&
            add_yearLevel_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    add_yearLevel_submitBtn.setAttribute('data-kt-indicator', 'on');
                    add_yearLevel_submitBtn.disabled = !0;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        type: "POST",
                        data: $("#kt_drawer_yearLevel_add_form").serialize(),
                        url: "{{ url('/settings/year-level/add') }}",
                        datatype: "html",
                    }).done(function(response) {
                        response = JSON.parse(response);

                        if (response['status'] == 200) {

                            add_yearLevel_submitBtn.removeAttribute(
                                    'data-kt-indicator'),
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
                                        add_yearLevel_drawer.hide();
                                        add_yearLevel_submitBtn.disabled = !1;
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
                            });
                        }

                        refresh_list_yearLevel();
                        add_yearLevel_form.reset();
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

    //--end::Add Drawer --//


    //--begin::Edit Modal--//

    var edit_yearLevel_drawerElement = document.querySelector("#kt_drawer_yearLevel_edit");
    var edit_yearLevel_drawer = KTDrawer.getInstance(edit_yearLevel_drawerElement);

    var edit_yearLevel_submitBtn = document.getElementById('kt_drawer_yearLevel_edit_submit');
    var edit_yearLevel_form = document.getElementById('kt_drawer_yearLevel_edit_form');
    var edit_yearLevel_formValidation = FormValidation.formValidation(edit_yearLevel_form, {
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Year Level Name is required'
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

    $("#settings_curriculum_yearLevel_list").on("click", "[settings_curriculum_yearLevel_edit]",
        function() {

            const id = $(this).closest("div.draggable").attr("id");

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ url('/settings/year-level/retrieve') }}",
                data: {
                    id: id
                }
            }).done(function(response) {
                response = JSON.parse(response);
                if (response['data'].length == 1) {

                    data = response['data'][0];
                    $("#kt_drawer_yearLevel_edit_form [name='id']").val(data[
                        'year_id_md5']);
                    $("#kt_drawer_yearLevel_edit_form [name='name']").val(data[
                        'year_name']);

                    edit_yearLevel_drawer.show();
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

    $('#kt_drawer_yearLevel_edit_cancel, #kt_drawer_yearLevel_edit_close').on("click",
        function( // X and Discard Button
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
                    if (t.value) {
                        edit_yearLevel_drawer.hide();
                        edit_yearLevel_form.reset();
                    }
                });
        });

    $("#kt_drawer_yearLevel_edit_form").on("submit", function(e) { // Edit Form Submission
        e.preventDefault(),
            edit_yearLevel_formValidation &&
            edit_yearLevel_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    edit_yearLevel_submitBtn.setAttribute('data-kt-indicator', 'on');
                    edit_yearLevel_submitBtn.disabled = !0;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        type: "POST",
                        data: $("#kt_drawer_yearLevel_edit_form").serialize(),
                        url: "{{ url('/settings/year-level/update') }}",
                        datatype: "html",
                    }).done(function(response) {

                        response = JSON.parse(response);

                        if (response['status'] == 200) {

                            edit_yearLevel_submitBtn.removeAttribute(
                                    'data-kt-indicator'),
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
                                        edit_yearLevel_drawer.hide();
                                        edit_yearLevel_submitBtn.disabled = !1;
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
                        refresh_list_yearLevel();
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

    //--start::Delete Modal--//
    $("#settings_curriculum_yearLevel_list").on("click", "[settings_curriculum_yearLevel_delete]",
        function() {

            const id = $(this).closest("div.draggable").attr("id");

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
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        type: "POST",
                        url: "{{ url('/settings/year-level/delete') }}",
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
                        refresh_list_yearLevel();
                    });
                }
            });







        });

    //--end::Delete Modal--//

    /*
    |--------------------------------------------------------------------------
    |    End::Year Level
    |-------------------------------------------------------------------------- 
    |
    */



    /*
    |--------------------------------------------------------------------------
    |    Begin::Term
    |-------------------------------------------------------------------------- 
    |
    */

    // function add_subsequent(type, value = []) {

    //     if (!value) {
    //         value['name'] = "";
    //     }

    //     append_element = $(` <div class="d-flex align-items-sm-center mb-7 subsequent">
    //             <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
    //                 <div class="flex-grow-1 my-lg-0 my-2 me-10">
    //                     <div class="fv-row">
    //                         <input type="text" class="form-control form-control-solid" placeholder="Name" name="name_subsequent" />
    //                     </div>
    //                 </div>

    //                 <div class="d-flex align-items-center">
    //                     <a href="#" class="btn btn-icon btn-danger btn-sm btn-sm border-0 btn-circle" kt_drawer_term_${type}_subsequents_delete>
    //                         <span class="svg-icon svg-icon-2 svg-icon-primary">
    //                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
    //                                 <path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black" />
    //                                 <path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black" />
    //                             </svg>
    //                         </span>
    //                     </a>
    //                 </div>
    //             </div>
    //         </div>`);

    //     if ($("#kt_drawer_term_" + type + "_subsequents > div.subsequent").last().length >= 1) {
    //         append_element.insertAfter($("#kt_drawer_term_" + type + "_subsequents > div.subsequent")
    //             .last());
    //     } else {
    //         append_element.prependTo("#kt_drawer_term_" + type + "_subsequents");
    //     }

    //     $('#kt_drawer_term_' + type + '_subsequents > div.subsequent [name="name_subsequent"]').last().val(
    //         value['name']);
    // };

    // function delete_subsequentt(e, type) {
    //     $(e).closest(".subsequent").remove();
    // };

    // function retrieve_form_data(type) {

    //     return_data = {
    //         name: $("#kt_drawer_term_" + type + "_form [name='name_main']").val(),
    //         subsequents: []
    //     };

    //     if (type == "edit") {
    //         return_data['id'] = $("#kt_drawer_term_" + type + "_form [name='id']").val();
    //     }

    //     subsequents = $('#kt_drawer_term_' + type + '_subsequents > div.subsequent');

    //     if (subsequents.length >= 1) {
    //         for (let i = 0; i < subsequents.length; i++) {

    //             subsequent_name = $($('#kt_drawer_term_' + type + '_subsequents > div.subsequent')[i]).find(
    //                 "[name='name_subsequent']").val();

    //             return_data['subsequents'].push({
    //                 name: (subsequent_name == '') ? null : subsequent_name
    //             });
    //         }
    //     }

    //     return return_data;
    // }

    function refresh_list_term() {
        $.ajax({
            url: "{{ url('/settings/term/retrieveAll') }}"
        }).done(function(response) {
            var data = JSON.parse(response);

            if (data['status'] == 200) {
                $('#settings_curriculum_term_list').empty();

                data = data['data'];
                for (let i = 0; i < data.length; i++) {
                    $(`<div id="${data[i]['term_id_md5']}" class="d-flex align-items-center border border-2 rounded p-5 mb-5 draggable">
                            <span class="svg-icon svg-icon-dark me-4">
                                <a href="#" class="btn btn-icon draggable-handle">
                                    <span class="svg-icon svg-icon-2x">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
                                            <path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
                                        </svg>
                                    </span>
                                </a>
                            </span>
                            <div class="flex-grow-1 me-2">
                                <span class="fw-bolder text-gray-800 fs-6">${data[i]['term_name']}</span>
                            </div>
                            <div class="d-flex justify-content-start flex-shrink-0">
                                <a href="javascript:void(0)" settings_curriculum_term_edit class="btn btn-icon btn-light-success btn-active-success btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                                <a href="javascript:void(0)" settings_curriculum_term_delete class="btn btn-icon btn-light-danger btn-active-danger btn-sm">
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
                            </div>
                        </div>`).appendTo("#settings_curriculum_term_list");
                }
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
                });
            }
        });
    };

    refresh_list_term();

    $("#settings_curriculum_term_list").on("drag:stop", function() {
        var terms = $("#settings_curriculum_term_list > .draggable");

        var list_terms = new Array();
        for (let i = 0; i < terms.length; i++) {
            list_terms.push($(terms[i]).attr('id'));
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            data: {
                id_list: list_terms
            },
            url: "{{ url('/settings/term/updateOrder') }}",
        }).done(function(response) {
            response = JSON.parse(response);
            if (response['status'] == 200) {
                toastr.success(response['message']);
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
            refresh_list_term();
        })

    })

    //--begin::Add Drawer --//

    var add_term_drawerElement = document.querySelector("#kt_drawer_term_add");
    var add_term_drawer = KTDrawer.getInstance(add_term_drawerElement);

    var add_term_submitBtn = document.getElementById('kt_drawer_term_add_submit');
    var add_term_form = document.getElementById('kt_drawer_term_add_form');
    var add_term_formValidation = FormValidation.formValidation(document.getElementById(
        'kt_drawer_term_add_form'), { // Add Form Validation
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Term Name is required'
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

    // $("#kt_drawer_term_add_subsequents_addBtn").on("click", function() {
    //     add_subsequent("add");
    // });

    // $("#kt_drawer_term_add_subsequents").on("click", "[kt_drawer_term_add_subsequents_delete]", function() {
    //     delete_subsequentt(this, "add");
    // });

    $('#kt_drawer_term_add_cancel, #kt_drawer_term_add_close').on("click", function(t) {
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
                add_term_drawer.hide();
                add_term_form.reset();
            }
        });
    });

    $("#kt_drawer_term_add_form").on("submit", function(e) { // Add Form Submission
        e.preventDefault();

        add_term_formValidation.validate().then(function(e) {

            if ('Valid' == e) {
                add_term_submitBtn.setAttribute('data-kt-indicator', 'on');
                add_term_submitBtn.disabled = !0;

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    },
                    type: "POST",
                    data: $("#kt_drawer_term_add_form").serialize(),
                    url: "{{ url('/settings/term/add') }}",
                    datatype: "html",
                }).done(function(response) {
                    response = JSON.parse(response);

                    if (response['status'] == 200) {

                        add_term_submitBtn.removeAttribute('data-kt-indicator'),
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
                                    add_term_drawer.hide();
                                    add_term_submitBtn.disabled = !1;
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
                        });
                    }

                    refresh_list_term();
                    add_term_form.reset();
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

    //--end::Add Drawer --//

    //--begin::Edit Modal--//

    var edit_term_drawerElement = document.querySelector("#kt_drawer_term_edit");
    var edit_term_drawer = KTDrawer.getInstance(edit_term_drawerElement);

    var edit_term_submitBtn = document.getElementById('kt_drawer_term_edit_submit');
    var edit_term_form = document.getElementById('kt_drawer_term_edit_form');
    var edit_term_formValidation = FormValidation.formValidation(edit_term_form, {
        fields: {
            'name': {
                validators: {
                    notEmpty: {
                        message: 'Term Name is required'
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

    $("#settings_curriculum_term_list").on("click", "[settings_curriculum_term_edit]",
        function() {

            const id = $(this).closest("div.draggable").attr("id");

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: "POST",
                url: "{{ url('/settings/term/retrieve') }}",
                data: {
                    id: id
                }
            }).done(function(response) {
                response = JSON.parse(response);
                if (response['data'].length == 1) {

                    data = response['data'][0];
                    $("#kt_drawer_term_edit_form [name='id']").val(data[
                        'term_id_md5']);
                    $("#kt_drawer_term_edit_form [name='name']").val(data[
                        'term_name']);

                    edit_term_drawer.show();
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

    $('#kt_drawer_term_edit_cancel, #kt_drawer_term_edit_close').on("click",
        function( // X and Discard Button
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
                    if (t.value) {
                        edit_term_drawer.hide();
                        edit_term_form.reset();
                    }
                });
        });

    $("#kt_drawer_term_edit_form").on("submit", function(e) { // Edit Form Submission
        e.preventDefault(),
            edit_term_formValidation &&
            edit_term_formValidation.validate().then(function(e) {

                if ('Valid' == e) {
                    edit_term_submitBtn.setAttribute('data-kt-indicator', 'on');
                    edit_term_submitBtn.disabled = !0;

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        type: "POST",
                        data: $("#kt_drawer_term_edit_form").serialize(),
                        url: "{{ url('/settings/term/update') }}",
                        datatype: "html",
                    }).done(function(response) {

                        response = JSON.parse(response);

                        if (response['status'] == 200) {

                            edit_term_submitBtn.removeAttribute(
                                    'data-kt-indicator'),
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
                                        edit_term_drawer.hide();
                                        edit_term_submitBtn.disabled = !1;
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
                        refresh_list_term();
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

    //--start::Delete Modal--//
    $("#settings_curriculum_term_list").on("click", "[settings_curriculum_term_delete]",
        function() {

            const id = $(this).closest("div.draggable").attr("id");

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
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        type: "POST",
                        url: "{{ url('/settings/term/delete') }}",
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
                        refresh_list_term();
                    });
                }
            });
        });

    //--end::Delete Modal--//


}));
</script>
@endsection
