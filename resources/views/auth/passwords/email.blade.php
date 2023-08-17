<x-auth-layout title="{{ __('global.reset_password') }}">
    <x-slot:content>
        <form method="POST" action="{{ route('password.email') }}" class="form w-100">
            @csrf

            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-3">{{ __('global.reset_password') }}</h1>
                <div class="text-gray-500 fw-semibold fs-6">{{ __('Enter your email to continue') }}</div>
            </div>
            <div class="fv-row mb-5">
                <input class="form-control bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}" type="email"
                    name="email" required autocomplete="off" value="{{ old('email', '') }}"
                    placeholder="{{ __('global.login_email') }}" />
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="d-grid mb-10">
                <button type="submit" id="submitBtn" class="btn btn-primary">
                    <span class="indicator-label">{{ __('global.submit') }}</span>
                    <span class="indicator-progress">{{ __('Submitting..') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>

            <div class="text-gray-500 text-center fw-semibold fs-6"> {{ __('Remember your access?') }}
                <a href="{{ route('login') }}"
                    class="link-primary">{{ __('global.go_to', ['attribute' => __('global.login')]) }}</a>
            </div>
        </form>
    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            $(function() {

                $("#submitBtn").on("click", function() {
                    $(this).attr("data-kt-indicator", "on");
                });
            });
        </script>
    </x-slot:scripts>
</x-auth-layout>
