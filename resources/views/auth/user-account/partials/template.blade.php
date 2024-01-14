<x-default-layout title="{{ __('Account Settings') }}" pageTitle="{{ __('Account Settings') }}">

    <x-slot:title>
        @yield('user-account-title')
    </x-slot:title>

    <x-slot:pageTitle>
        @yield('user-account-page-title')
    </x-slot:pageTitle>

    <x-slot:styles>
        @yield('user-account-styles')
    </x-slot:styles>

    <x-slot:content>
        <div class="card mb-5 mb-xl-10">
            <div class="card-body pt-9 pb-0">
                <div class="d-flex flex-wrap flex-sm-nowrap align-items-center">
                    <div class="me-7 mb-4">

                        <div class="symbol symbol-100px symbol-lg-100px symbol-fixed position-relative">

                            @php $avatar = auth()->user()->avatar; @endphp

                            @if (!$avatar)
                                <div
                                    class="symbol-label fs-1 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            @else
                                <img src="{{ $avatar }}" alt="{{ auth()->user()->name . ' avatar' }}">
                            @endif

                            <div
                                class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                            </div>
                        </div>

                    </div>

                    <div class="flex-grow-1">
                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                            <div class="d-flex flex-column">
                                <div class="d-flex align-items-center">
                                    <span href="#"
                                        class="text-gray-900 fs-2 fw-bold me-1">{{ auth()->user()->name }}
                                        @if (auth()->user()->email_verified_at)
                                            <i class="fa-duotone fa-badge-check ms-2 text-primary"></i>
                                        @endif
                                    </span>
                                </div>
                                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                    <span
                                        class="d-flex align-items-center text-gray-400 me-5 mb-2">{{ Auth::user()->roles()->implode('title', ',') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">

                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('account.overview*') ? 'active' : '' }}"
                            href="{{ !request()->routeIs('account.overview*') ? route('account.overview') : '#' }}">Overview</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ request()->routeIs('account.settings*') ? 'active' : '' }}"
                            href="{{ !request()->routeIs('account.settings*') ? route('account.settings') : '#' }}">Settings</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Security</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Activity</a>
                    </li>
                    <li class="nav-item mt-2">
                        <a class="nav-link text-active-primary ms-0 me-10 py-5" href="#">Logs</a>
                    </li>
                </ul>
            </div>
        </div>

        @yield('user-account-content')
    </x-slot:content>

    <x-slot:scripts>
        @yield('user-account-scripts')
    </x-slot:scripts>
</x-default-layout>
