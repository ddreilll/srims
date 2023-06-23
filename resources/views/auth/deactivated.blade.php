@extends('layouts.app')

@section('title')
    <title>{{ __('global.user_account') }} {{ __('global.deactivated') }}</title>
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-column-fluid">
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
                <a href="#" class="mb-10 pt-lg-10">
                    <img alt="Logo" src="{{ asset('/assets/media/logo/logo_black.png') }}" class="h-80px mb-5" />
                </a>
                <div class="pt-lg-10">
                    <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">{{ __('global.user_account') }}
                        {{ __('global.deactivated') }}</h1>
                    <div class="fw-bold fs-3 text-muted mb-15">{{ __('global.deactivated_account') }}
                    </div>
                </div>

                <div class="text-center mb-10">
                    <a id="logoutBtn" class="btn btn-dark">
                        <i class="fa-solid fa-arrow-left ms-2"></i>
                        {{ __('global.return_to', ['attribute' => __('global.login')]) }}
                    </a>
                </div>

                <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                    style="background-image: url({{ asset('/assets/media/illustrations/dozzy-1/9.png') }})"></div>
            </div>
        </div>
    </div>

    <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        $("#logoutBtn").on("click", function() {
            $("#logoutForm").submit();
        });
    </script>
@endsection
