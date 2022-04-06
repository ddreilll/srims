@extends('layouts.admin')

@section('title')
<title>404 Not Found</title>
@endsection

@section('content')
<div class="d-flex flex-column flex-root">
    <!--begin::Authentication - Signup Welcome Message -->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
            <div class="pt-lg-10 mb-10">
                <!--begin::Logo-->
                <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Resource not found</h1>
                <!--end::Logo-->
                <!--begin::Message-->
                <div class="fw-bold fs-3 text-muted mb-15">Sorry, this page isn't available.
                    <br />The link you followed may be broken, or the resource may have been removed.
                </div>
                <!--end::Message-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Illustration-->
            <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url({{ asset('/new_assets/media/illustrations/sketchy-1/17.png') }})"></div>
            <!--end::Illustration-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Authentication - Signup Welcome Message-->
</div>

@endsection