@extends('layouts.fluid')
@section('content')
<div class="post d-flex flex-column-fluid" id="kt_post">
    <div id="kt_content_container" class="container-fluid">

        <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
            <div class="pt-lg-10 mb-10">
                <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">Feature available soon</h1>
                <div class="fw-bold fs-3 text-muted mb-15">Hold on, we're launching this very soon
                    <br />We are working very hard to give you the best experience possible!
                </div>
            </div>
            <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                style="background-image: url({{ asset('/new_assets/media/illustrations/unitedpalms-1/9.png') }})">
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection