<x-auth-layout title="{{ __('Verify Your Email Address') }}">
    <x-slot:content>

        <div class="text-center mb-11">
            <h1 class="text-dark fw-bolder mb-3">{{ __('Verify Your Email Address') }}</h1>
            <div class="text-gray-500 fw-semibold fs-6">
                <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                <p class="text-muted my-10">
                    {{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}
                </p>
            </div>
        </div>
        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <div class="d-grid mb-10">
                <button type="submit" id="sendBtn" class="btn btn-primary">
                    <span class="indicator-label">{{ __('Not received? Request another') }}</span>
                    <span class="indicator-progress">{{ __('Sending..') }}
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
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

                $("#sendBtn").on("click", function() {
                    $(this).attr("data-kt-indicator", "on");
                });
            });
        </script>
    </x-slot:scripts>
</x-auth-layout>
