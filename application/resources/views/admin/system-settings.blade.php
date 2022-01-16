@extends('layouts.default')


@section('content')

    <!-- Begin::Year Level -->

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

    <!-- End::Year Level -->

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

                        <!-- Begin::Left Bar for Options -->
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
                                <li class="nav-item">
                                    <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder"
                                        data-bs-toggle="tab" href="#settings_curriculum_term">
                                        <span class="d-flex flex-column align-items-start">
                                            <span class="fs-5">Terms</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End::Left Bar for Options -->

                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <!-- Begin::Year Level tabpanel -->
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
                                    <div id="settings_curriculum_yearLevel_list"
                                        class="rounded p-10 d-flex flex-column draggable-zone">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End::Year Level tabpanel -->

                        <!-- Begin::Term tabpanel -->
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
                                    <div id="settings_curriculum_term_list"
                                        class="rounded p-10 d-flex flex-column draggable-zone">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End::Term tabpanel -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin::Term -->

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
                    <div class="fv-row mb-7">
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
                $.ajax({
                    url: "{{ url('/settings/year-level/retrieveAll') }}"
                }).done(function(response) {
                    var data = JSON.parse(response);

                    if (data['status'] == 200) {
                        $('#settings_curriculum_yearLevel_list').empty();

                        data = data['data'];
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

            $('#kt_drawer_term_add_cancel, #kt_drawer_term_add_close').on("click",
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
                                add_term_drawer.hide();
                                add_term_form.reset();
                            }
                        });
                });

            $("#kt_drawer_term_add_form").on("submit", function(e) { // Add Form Submission
                e.preventDefault(),
                    add_term_formValidation &&
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
