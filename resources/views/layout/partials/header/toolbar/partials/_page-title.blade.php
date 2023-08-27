<!--begin::Page title-->
<div class="page-title d-flex justify-content-center flex-column me-5">
    <!--begin::Title-->
    <h1 class="d-flex flex-column text-dark fw-bold fs-3 mb-0"> {{ isset($pageTitle) ? $pageTitle : '' }} </h1>
    <!--end::Title-->
    <!--begin::Breadcrumb-->
    {{ isset($breadcrumbs) ? $breadcrumbs : '' }}
    <!--end::Breadcrumb-->
</div>
<!--end::Page title-->
