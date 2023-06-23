@extends('layouts.app')

@section('title')
    <title>404 Not Found</title>
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
                <a href="#" class="mb-10 pt-lg-10">
                    <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}" class="h-80px mb-5" />
                </a>
                <div class="pt-lg-10 mb-10">
                    <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">404 Not Found</h1>
                    <div class="fw-bold fs-3 text-muted mb-15">Sorry, this page isn't available.
                        <br />The link you followed may be broken, or the page may have been removed.
                    </div>
                </div>
                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                    style="background-image: url({{ asset('/assets/media/illustrations/dozzy-1/18.png') }})"></div>
            </div>
        </div>
    </div>
@endsection
