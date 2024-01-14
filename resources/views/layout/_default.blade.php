@extends('layout.master')

@section('title')
    <title>{{ $title && $title != '' ? $title . ' | ' . config('app.name_short') : config('app.name_short') }}</title>
@endsection

@isset($styles)
    @push('styles')
        {{ $styles }}
    @endpush
@endisset

@section('content')
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            @include(config('settings.THEME_LAYOUT_DIR') . '/partials/aside/_base')
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                @include(config('settings.THEME_LAYOUT_DIR') . '/partials/header/_base')
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Post-->
                    <div class="post d-flex flex-column-fluid" id="kt_post">
                        <!--begin::Container-->
                        <div id="kt_content_container" {!! printHtmlClasses('container') !!}>

                            @if (strtoupper(config('app.env')) == 'TEST')
                                <div class="bg-light-danger rounded border-danger border border-dashed p-6 mb-10">
                                    <span class="fs-6 text-danger fw-semibold">
                                        <i class="fa-solid fa-triangle-exclamation fs-3 me-2 text-danger"></i>
                                        {!! __('panel.test_environment_advisory') !!}
                                    </span>
                                </div>
                            @endif

                            {{ $content }}

                        </div>
                        <!--end::Container-->
                    </div>
                    <!--end::Post-->

                </div>
                <!--end::Content-->
                @include(config('settings.THEME_LAYOUT_DIR') . '/partials/_footer')
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

@push('scripts')
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

        //begin::Helper Functions
        function initializeBootstrapModal(dom) {
            return $(dom).modal({
                backdrop: 'static',
                keyboard: false
            })
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

                    console.log(`${resourceId}${formId}`);

                    if (t.value) {
                        $(`form#${resourceId}${formId}`).submit();
                    }
                });
            });
        }

        function initializedTagify(dom, selection, inline = false) {
            return new Tagify(dom, {
                whitelist: selection,
                enforceWhitelist: true,
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.id).join(','),
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    classname: inline ? "tagify__inline__suggestions" :
                    "", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });
        }

        function initializedFlatpickr(dom, mode = "range", clearable = false) {
            var flatpickr = $(dom).flatpickr({
                altInput: !0,
                altFormat: 'm/d/Y',
                dateFormat: 'Y-m-d',
                mode: mode,
            });

            if (clearable) {
                $($(dom).closest("div.input-group")).find("button").on("click", function() {
                    flatpickr.clear();
                });
            }

            return flatpickr;
        }

        function getFlatpickrDates(flatpickr) {
            var selectedDates = flatpickr.selectedDates;
            if (selectedDates.length >= 1) {

                var filterData = moment(selectedDates[0]).format("YYYY-MM-DD");

                if (selectedDates.length == 2) {
                    filterData += "," + moment(selectedDates[1]).format(
                        "YYYY-MM-DD");
                } else {
                    filterData += "," + moment(selectedDates[0]).format(
                        "YYYY-MM-DD");
                }

                return filterData;
            }
        }

        function initializedNoSlider(dom) {
            var slider = document.querySelector(dom);
            var max = ($(dom).attr("max") * 1) + 20;

            noUiSlider.create(slider, {
                start: [1, max],
                connect: true,
                range: {
                    "min": 0,
                    "max": max,
                },
                tooltips: true,
                format: wNumb({
                    decimals: 0
                }),
            });

            slider.noUiSlider.on("update", function(values, handle) {
                if (handle) {
                    $(`${dom}Max`).val(values[handle]);
                } else {
                    $(`${dom}Min`).val(values[handle]);
                }
            });
        }

        function getCheckedValues(dom) {
            return $(`${dom}:checked`)
                .map(function() {
                    return this.value;
                })
                .get()
                .join(",");

        }

        function getNoSliderValue(dom) {

            var minDOM = $(`${dom}Min`).val();
            var maxDOM = $(`${dom}Max`).val();

            return minDOM && maxDOM ? `${minDOM},${maxDOM}` : "";
        }

        function getToggleValues(dom) {
            return $(dom).is(":checked") ? 1 : 0;
        }
        //end::Helper Functions
    </script>
@endpush

@isset($scripts)
    @push('scripts')
        {{ $scripts }}
    @endpush
@endisset
