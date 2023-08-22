<x-auth-layout title="{{ __('global.login') }}">
    <x-slot:content>
        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"action="{{ route('login') }}" method="POST">

            {{ csrf_field() }}

            <div class="text-center mb-11">
                <h1 class="text-dark fw-bolder mb-3">{{ __('global.login') }}</h1>
                <div class="text-gray-500 fw-semibold fs-6">
                    {{ sprintf(
                        'Enter your details to get %s to your
                                                                                                                        account',
                        strtolower(__('global.log_in')),
                    ) }}
                </div>
            </div>

            <div class="fv-row mb-8">
                <input class="form-control bg-transparent {{ $errors->has('email') ? ' is-invalid' : '' }}"
                    type="email" name="email" placeholder="{{ __('global.login_email') }}" required
                    autocomplete="off" />
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <x-inputs.password name="password" placeholder="{{ __('global.login_password') }}" :$errors
            class="mb-5" passwordMeter="false" />

            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                <div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remeberMeChecked" />
                        <label class="form-check-label" for="remeberMeChecked">
                            {{ __('global.remember_me') }}
                        </label>
                    </div>
                </div>
                <a href="{{ route('password.request') }}" class="link-primary">{{ __('global.forgot_password') }}</a>
            </div>


            <div class="d-grid mb-10">
                <button type="submit" id="loginBtn" class="btn btn-primary">
                    <span
                        class="indicator-label">{{ __('global.proceed_to', ['attribute' => __('global.log_in')]) }}</span>
                    <span class="indicator-progress">{{ __('global.logging_in') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <div class="text-gray-500 text-center fw-semibold fs-6">{{ __('Don\'t have an access yet?') }}
                <a href="{{ route('register') }}"
                    class="link-primary">{{ __('global.go_to', ['attribute' => __('global.register')]) }}</a>
            </div>
        </form>
    </x-slot:content>
    <x-slot:scripts>
        <script type="text/javascript">
            $(function() {

                $("#loginBtn").on("click", function() {
                    $(this).attr("data-kt-indicator", "on");
                });
            });
        </script>
    </x-slot:scripts>
</x-auth-layout>
