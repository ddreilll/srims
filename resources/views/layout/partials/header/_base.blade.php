<!--begin::Header-->
<div id="kt_header" style="" class="header  align-items-stretch">
    <!--begin::Brand-->
    <div class="header-brand">
        <!--begin::Logo-->
        <img alt="{{ config('app.name_short') }}" src="{{ asset('/assets/media/logo/logo-icon-no-background.svg') }}"
            class="h-25px h-lg-25px" />
        <!--end::Logo-->
        <!--begin::Aside minimize-->
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-minimize"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="aside-minimize">

            <i
                class="svg-icon svg-icon-1 fa-duotone fa-arrow-right-to-bracket fa-rotate-180 minimize-default fa-lg"></i>
            <i class="svg-icon svg-icon-1 fa-duotone fa-arrow-right-to-bracket minimize-active fa-lg"></i>

        </div>
        <!--end::Aside minimize-->
        <!--begin::Aside toggle-->
        <div class="d-flex align-items-center d-lg-none me-n2" title="Show aside menu">
            <div class="btn btn-icon btn-active-color-primary w-30px h-30px" id="kt_aside_mobile_toggle">
                <i class="svg-icon svg-icon-1 fa-duotone fa-bars fa-lg"></i>
            </div>
        </div>
        <!--end::Aside toggle-->
    </div>
    <!--end::Brand-->
    @include(config('settings.THEME_LAYOUT_DIR') . '/partials/header/toolbar/_base')
</div>
<!--end::Header-->
