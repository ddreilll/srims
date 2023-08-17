<x-auth-layout title="{{ __('global.two_factor.title') }}">
    <x-slot:content>
        <form class="form w-100" novalidate="novalidate" action="{{ route('twoFactor.check') }}" method="POST">

            {{ csrf_field() }}

            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-3">{{ __('global.two_factor.title') }}</h1>
                <div class="text-gray-500 fw-semibold fs-6">
                    <p class="mb-4">{{ __('global.two_factor.sub_title', ['minutes' => 15]) }}</p>
                    <p>{{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}</p>
                </div>
            </div>

            <div class="fv-row mb-5">
                <input class="form-control bg-transparent {{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}"
                    type="text" name="two_factor_code" required autocomplete="off"
                    value="{{ old('two_factor_code', '') }}" placeholder="{{ __('Code') }}" autofocus />
                @if ($errors->has('two_factor_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('two_factor_code') }}
                    </div>
                @endif
            </div>

            <div class="d-grid mb-10">
                <button type="submit" id="verifyBtn" class="btn btn-primary">
                    <span class="indicator-label">{{ __('global.two_factor.verify') }}</span>
                    <span class="indicator-progress">{{ __('Verifying..') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <a href="{{ route('twoFactor.resend') }}" class="btn btn-secondary mt-2">
                    <i class="fa-solid fa-envelope me-1"></i>
                    {{ __('global.two_factor.resend') }}
                </a>
            </div>
        </form>

        <div class="text-gray-500 text-center fw-semibold fs-6"> {{ __('Forget it,') }}
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="link-primary">{{ __('global.return_to', ['attribute' => __('global.login')]) }}</a>
        </div>

        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            $(function() {

                $("#verifyBtn").on("click", function() {
                    $(this).attr("data-kt-indicator", "on");
                });
            });
        </script>
    </x-slot:scripts>
</x-auth-layout>
