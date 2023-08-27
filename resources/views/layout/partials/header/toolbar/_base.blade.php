<!--begin::Toolbar-->
<div class="toolbar d-flex align-items-stretch">
    <!--begin::Toolbar container-->
    <div
        class=" container-fluid  py-6 py-lg-0 d-flex flex-column flex-lg-row align-items-lg-stretch justify-content-lg-between">

        <!--begin::Page title-->
        @include(config('settings.THEME_LAYOUT_DIR') . '/partials/header/toolbar/partials/_page-title')
        <!--end::Page title-->

        <!--begin::Action group-->
        @include(config('settings.THEME_LAYOUT_DIR') . '/partials/header/toolbar/partials/_action-group')
        <!--end::Action group-->
    </div>
    <!--end::Toolbar container-->
</div>
<!--end::Toolbar-->
