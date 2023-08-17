<x-system-layout title="{{ __('global.user_account') }} {{ __('global.deactivated') }}">
    <x-slot:content>
        <div class="pt-lg-10">
            <h1 class="fw-bolder fs-2qx text-gray-800 mb-7">{{ __('global.user_account') }}
                {{ __('global.deactivated') }}</h1>
            <div class="fw-bold fs-3 text-muted mb-15">{!! __('We\'re sorry, but your user account is currently deactivated. <br> As a result, you do not have access to certain features or areas of the application.') !!}
            </div>
        </div>

        <div class="text-center mb-10">
            <a id="logoutBtn" class="btn btn-primary">
                <i class="fa-solid fa-arrow-left me-1"></i>
                {{ __('global.return_to', ['attribute' => __('global.login')]) }}
            </a>
        </div>

        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            $("#logoutBtn").on("click", function() {
                $("#logoutForm").submit();
            });
        </script>
    </x-slot:scripts>
</x-system-layout>
