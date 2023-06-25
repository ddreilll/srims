<!doctype html>

<html lang="{{ app()->getLocale() }}">

<head>
    <title>{{ trans('panel.site_title_short') }}</title>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/assets/media/logo/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('/assets/media/logo/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/assets/media/logo/favicon_io/site.webmanifest') }}">
    <meta name="theme-color" content="#ffffff">

    <style>
        /* poppins-200 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 200;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-200.ttf') }}') format('truetype');
        }

        /* poppins-300 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 300;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-300.ttf') }}') format('truetype');

        }

        /* poppins-regular - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 400;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-regular.ttf') }}') format('truetype');

        }

        /* poppins-500 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 500;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-500.ttf') }}') format('truetype');

        }

        /* poppins-600 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 600;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-600.ttf') }}') format('truetype');

        }

        /* poppins-700 - latin */
        @font-face {
            font-family: 'Poppins';
            font-style: normal;
            font-weight: 700;
            src: url('{{ asset('assets/fonts/poppins/poppins-v19-latin-700.ttf') }}') format('truetype');

        }

        body {
            font-family: "Poppins";
        }
    </style>

    <link href="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('/assets/plugins/custom/fontawesome-pro/css/all.min.css') }}" rel="stylesheet"
        type="text/css" />

    <style>
        .select2-container--bootstrap5 .select2-selection--multiple:not(.form-select-sm):not(.form-select-lg) .select2-search.select2-search--inline .select2-search__field {
            font-family: Poppins, Helvetica, sans-serif;
        }
    </style>
    @yield('styles')

</head>

<body id="kt_body" class="header-tablet-and-mobile-fixed aside-enabled">
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">

            @include('partials.menu')

            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">

                <div id="kt_header" class="header align-items-stretch">
                    <div class="header-brand">
                        <a href="../../demo8/dist/index.html">
                            <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}"
                                class="h-25px h-lg-25px" />
                        </a>

                        <div id="kt_aside_toggle"
                            class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
                            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
                            data-kt-toggle-name="aside-minimize">
                            <span class="svg-icon svg-icon-1 me-n1 minimize-default">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="8.5" y="11" width="12" height="2"
                                        rx="1" fill="currentColor" />
                                    <path
                                        d="M10.3687 11.6927L12.1244 10.2297C12.5946 9.83785 12.6268 9.12683 12.194 8.69401C11.8043 8.3043 11.1784 8.28591 10.7664 8.65206L7.84084 11.2526C7.39332 11.6504 7.39332 12.3496 7.84084 12.7474L10.7664 15.3479C11.1784 15.7141 11.8043 15.6957 12.194 15.306C12.6268 14.8732 12.5946 14.1621 12.1244 13.7703L10.3687 12.3073C10.1768 12.1474 10.1768 11.8526 10.3687 11.6927Z"
                                        fill="currentColor" />
                                    <path opacity="0.5"
                                        d="M16 5V6C16 6.55228 15.5523 7 15 7C14.4477 7 14 6.55228 14 6C14 5.44772 13.5523 5 13 5H6C5.44771 5 5 5.44772 5 6V18C5 18.5523 5.44771 19 6 19H13C13.5523 19 14 18.5523 14 18C14 17.4477 14.4477 17 15 17C15.5523 17 16 17.4477 16 18V19C16 20.1046 15.1046 21 14 21H5C3.89543 21 3 20.1046 3 19V5C3 3.89543 3.89543 3 5 3H14C15.1046 3 16 3.89543 16 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <span class="svg-icon svg-icon-1 minimize-active">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" width="12" height="2" rx="1"
                                        transform="matrix(-1 0 0 1 15.5 11)" fill="currentColor" />
                                    <path
                                        d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                        fill="currentColor" />
                                    <path
                                        d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                        fill="#C4C4C4" />
                                </svg>
                            </span>
                        </div>

                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_aside_mobile_toggle">
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="currentColor" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="toolbar d-flex align-items-stretch">
                        <div
                            class="container-fluid py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">

                            <div class="page-title d-flex justify-content-center flex-column me-5">
                                <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0"></h1>
                            </div>

                            <div class="d-flex align-items-stretch overflow-auto pt-3 pt-lg-0">
                                <div class="d-flex align-items-center">
                                    <span class="fs-7 text-gray-700 fw-bolder pe-3">Quick Tools:</span>
                                    <div class="d-flex">
                                        <a href="{{ route('admin.student.create') }}"
                                            class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary pulse pulse-primary"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                            title="Add Student Profile">
                                            <i class="fas fa-user-plus fs-4"></i>
                                            <span class="pulse-ring border-3"></span>
                                        </a>

                                        <a href="{{ route('admin.student.index') }}"
                                            class="btn btn-sm btn-icon btn-icon-muted btn-active-icon-primary"
                                            data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
                                            title="View List of Students">
                                            <i class="fas fa-clipboard-list fs-3"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    @yield('content')
                </div>

                <div class="footer py-6 d-flex flex-lg-column" id="kt_footer">
                    <div
                        class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-bold me-1">2021©</span>
                            <a href="#" target="_blank" class="text-gray-800 text-hover-primary">PUPQC</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <script src="{{ asset('/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('/assets/js/scripts.bundle.js') }}"></script>

    <script src="{{ asset('/assets/plugins/custom/axios/dist/axios.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/draggable/draggable.bundle.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/ph-cities/city.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/session-timeout/dist/bootstrap-session-timeout.min.js') }}"></script>
    <script src="{{ asset('/assets/plugins/custom/fontawesome-pro/js/all.min.js') }}"></script>

    <script type="text/javascript">
        @if (session('message'))
            Swal.fire({
                html: '{!! session('message') !!}',
                icon: 'success',
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
            });
        @endif

        @if (session('info'))
            Swal.fire({
                html: '{!! session('info') !!}',
                icon: 'info',
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
            });
        @endif

        @if (session('warning'))
            Swal.fire({
                html: '{!! session('warning') !!}',
                icon: 'warning',
                customClass: {
                    confirmButton: 'btn btn-primary',
                },
            });
        @endif

        toastr.options = {
            "closeButton": false,
            "debug": true,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toastr-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        function display_axios_error(error) {
            Swal.fire({
                html: "<b>" + ((error.code != undefined) ? error.code : 'Unknown Code') + "</b>: " + error.name +
                    " ― " + error.message + "<br><br> Please try again later",
                icon: 'error',
                buttonsStyling: !1,
                allowOutsideClick: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
            }).then(function(e) {
                if (e.isConfirmed)
                    location.reload();
            });
        }

        function display_axios_success(message) {
            Swal.fire({
                text: message,
                icon: 'success',
                buttonsStyling: !1,
                allowOutsideClick: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
            });
        }

        function display_modal_error(error_message) {
            Swal.fire({
                text: error_message,
                icon: 'error',
                buttonsStyling: !1,
                allowOutsideClick: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
            });
        }

        function display_modal_error_reload(error_message) {
            Swal.fire({
                text: error_message,
                icon: 'error',
                buttonsStyling: !1,
                allowOutsideClick: false,
                confirmButtonText: 'Ok, got it!',
                customClass: {
                    confirmButton: 'btn btn-primary'
                },
            }).then(function(e) {
                if (e.isConfirmed)
                    location.reload();
            });
        }

        function display_toastr_info(info_message) {
            toastr.info(info_message);
        }

        function display_toastr_success(info_message) {
            toastr.success(info_message);
        }

        function display_toastr_warning(info_message) {
            toastr.warning(info_message);
        }


        function trigger_btnIndicator(elementId, trigger) {
            var submitBtn = document.getElementById(elementId);

            if (trigger == "default") {
                submitBtn.removeAttribute('data-kt-indicator');
                submitBtn.disabled = !1;
            } else if (trigger == "loading") {
                submitBtn.setAttribute('data-kt-indicator', 'on');
                submitBtn.disabled = !0;
            }

        }

        function init_formValidation(formId, fields) {
            return FormValidation.formValidation(document.getElementById(formId), {
                fields: fields,
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: '',
                    }),
                },
            });
        }

        function init_modal(modalId) {
            return new bootstrap.Modal(document.getElementById(modalId));
        }

        function init_bs_modal(modalId) {
            return $('#' + modalId).modal({
                backdrop: 'static',
                keyboard: false
            })
        }

        function init_drawer(drawerId) {
            return KTDrawer.getInstance(document.getElementById(drawerId))
        }

        function init_stepper(stepperId) {

            return new KTStepper(document.getElementById(stepperId));

        }

        function initializedFormSubmitConfirmation(dom, formId, action, btnColor, icon = "info") {

            $(`${dom}`).on("click", function(e) {
                e.preventDefault();

                var resourceId = $(this).attr("data-id");

                Swal.fire({
                    text: ("{{ __('modal.confirmation', ['action' => ':action']) }}").replace(":action",
                        action),
                    icon: icon,
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: ("{{ __('modal.confirm_btn', ['action' => ':action']) }}").replace(
                        ":action", action),
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: `btn btn-${btnColor}`,
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.value) {
                        $(`form#${resourceId}${formId}`).submit();
                    }
                });
            });
        }
    </script>

    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
            let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
            let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
            let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
            let printButtonTrans = '{{ trans('global.datatables.print') }}'
            let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'

            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
            };

            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
                className: 'btn'
            });

            $.extend(true, $.fn.dataTable.defaults, {
                responsive: {
                    details: {
                        renderer: function(api, rowIdx, columns) {

                            var dl = $('<dl class="row" style="font-size: .9rem"/>');

                            columns.forEach((col, i) => {
                                if (col.hidden) {
                                    col.title = (col.title).trim();
                                    $(dl).append(`<dt class="col-5">${(col.title && col.title != "&nbsp;") ? col.title + ':' : ''}</dt>
                            <dd class="col-7">${col.data}</dd>`);
                                }
                            });

                            return columns.length >= 1 ? dl : false;
                        }
                    }
                },
                language: {
                    buttons: {
                        pageLength: {
                            _: "Show %d entries",
                            '-1': "Show All"
                        }
                    }
                },
                columnDefs: [{
                    orderable: false,
                    searchable: false,
                    responsivePriority: 2,
                    targets: -1
                }, {
                    responsivePriority: 1,
                    targets: 0
                }, ],
                pageLength: 10, 
            });

            $.fn.dataTable.ext.classes.sPageButton = '';

            $(`[destroy-resource="true"]`).on("click", function() {

                var documentId = $(this).attr("data-id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'delete']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'delete']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.value) {
                        $(`form#${documentId}-destroy`).submit();
                    }
                });
            });
        }));
    </script>

    @yield('scripts')

</body>

</html>
