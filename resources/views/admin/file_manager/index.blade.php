@extends('layouts.fluid')

@section('styles')
    <link href="{{ asset('/assets/plugins/custom/file-manager/css/file-manager.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <div id="kt_content_container" class="container-fluid">
            <div class="card mb-5">
                <div class="card-body p-10 h-750px">
                    <div id="fm">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script src="{{ asset('/assets/plugins/custom/file-manager/js/file-manager.js') }}"></script>

@endsection
