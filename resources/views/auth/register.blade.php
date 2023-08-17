<x-auth-layout title="{{ __('global.register') }}">
    <x-slot:content>
        @if (config('panel.registration') == 'on')
            <form class="form w-100" novalidate="novalidate" action="{{ route('register') }}" method="POST">

                {{ csrf_field() }}

                <div class="text-center mb-11">
                    <h1 class="text-dark fw-bolder mb-3">{{ __('global.register') }}</h1>
                    <div class="text-gray-500 fw-semibold fs-6">{{ __('Enter your details to continue') }}</div>
                </div>

                <div class="fv-row mb-8">
                    <input class="form-control bg-transparent {{ $errors->has('name') ? ' is-invalid' : '' }}"
                        type="name" name="name" placeholder="{{ __('Name') }}" required
                        value="{{ old('name', '') }}" autocomplete="off" />
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="fv-row mb-5">
                    <input class="form-control bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}"
                        type="email" name="email" required autocomplete="off" value="{{ old('email', '') }}"
                        placeholder="{{ __('global.login_email') }}" />
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

                <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                    <div>
                        <div class="form-check">
                            <input class="form-check-input {{ $errors->has('agree_terms') ? ' is-invalid' : '' }}"
                                type="checkbox" name="agree_terms" id="remeberMeChecked" />
                            <label class="form-check-label" for="remeberMeChecked">
                                {{ __('I agree to') }} <a href="#" target="_blank">{{ __('Terms') }}</a>
                            </label>

                            @if ($errors->has('agree_terms'))
                                <div class="invalid-feedback fw-normal">
                                    {{ $errors->first('agree_terms') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-grid mb-10">
                    <button type="submit" id="signupBtn" class="btn btn-primary">
                        <span class="indicator-label">{{ __('global.submit') }}</span>
                        <span class="indicator-progress">{{ __('Submitting..') }}
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>

                <div class="text-gray-500 text-center fw-semibold fs-6"> {{ __('Aleady have an access?') }}
                    <a href="{{ route('login') }}"
                        class="link-primary">{{ __('global.go_to', ['attribute' => __('global.login')]) }}</a>
                </div>
            </form>
        @else
            <x-alerts.message title="Access Request Available Soon" icon="fa-circle-xmark" class="w-100">
                <x-slot:message>
                    <span>{{ __('This service is temporarily unavailable') }}</span>
                </x-slot:message>
            </x-alerts.message>

            <div class="d-grid">
                <a href="{{ route('login') }}" class="btn btn-primary"><i class="fa-solid fa-arrow-left me-1"></i>
                    {{ __('global.return_to', ['attribute' => __('global.login')]) }}
                </a>
            </div>
        @endif

    </x-slot:content>

    @if (config('panel.registration') == 'on')
        <x-slot:scripts>
            <script type="text/javascript">
                $(function() {

                    $("#signupBtn").on("click", function() {
                        $(this).attr("data-kt-indicator", "on");
                    });
                });
            </script>
        </x-slot:scripts>
    @endif
</x-auth-layout>
