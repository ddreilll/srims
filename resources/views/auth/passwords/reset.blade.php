<x-auth-layout title="{{ __('global.reset_password') }}">
    <x-slot:content>
        @if ($validToken)
            <form method="POST" action="{{ route('password.update') }}" class="form w-100">
                @csrf

                <input name="token" value="{{ $token }}" type="hidden">

                <div class="text-center mb-11">
                    <h1 class="text-dark fw-bolder mb-3">{{ __('global.reset_password') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">{{ __('Create your new password') }}</div>
                </div>
                <div class="fv-row mb-5">
                    <input class="form-control bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        type="email" name="email" required autocomplete="off"
                        value="{{ $email ? $email : old('email', '') }}" placeholder="{{ __('global.login_email') }}" />
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <x-inputs.password name="password" placeholder="{{ __('global.login_password') }}" :$errors
                    class="mb-5" passwordMeter="true" />

                <x-inputs.password name="password_confirmation" placeholder="{{ __('Confirm Password') }}" :$errors
                    class="mb-5" passwordMeter="false" />

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
        @else
            <x-alerts.message title="Invalid Password Reset" icon="fa-circle-xmark" class="w-100">
                <x-slot:message>
                    <span>{{ $message }}</span>
                </x-slot:message>
            </x-alerts.message>

            <div class="d-grid">
                <a href="{{ route('login') }}"
                    class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i> {{ __('global.return_to', ['attribute' => __('global.login')]) }}
                </a>
            </div>
        @endif
    </x-slot:content>

    @if ($validToken)
        <x-slot:scripts>
            <script type="text/javascript">
                $(function() {

                    $("#submitBtn").on("click", function() {
                        $(this).attr("data-kt-indicator", "on");
                    });
                });
            </script>
        </x-slot:scripts>
    @endif
</x-auth-layout>
