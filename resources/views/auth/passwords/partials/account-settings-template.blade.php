<x-default-layout>

    <x-slot:title>
        @yield('account-settings-title')
    </x-slot:title>

    <x-slot:pageTitle>
        @yield('account-settings-page-title')
    </x-slot:pageTitle>

    <x-slot:styles>
        @yield('account-settings-styles')
    </x-slot:styles>

    <x-slot:content>
        <div class="d-flex flex-column flex-xl-row">

            <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                <div class="card mb-5 mb-xl-8">

                    <div class="card-body">

                        <div class="menu-content d-flex align-items-center px-3">

                            <div class="symbol symbol-50px me-5">
                                <div
                                    class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                                    {{ substr(Auth::user()->name, 0, 1) }}
                                </div>
                            </div>

                            <div class="d-flex flex-column">
                                <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
                                </div>
                                <span class="fw-semibold text-muted fs-7">{{ Auth::user()->roles()->implode('title', ',') }}</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex-lg-row-fluid ms-xl-15">
                <div class="tab-content">

                    <div class="tab-pane fade show active">
                        @yield('account-settings-content')
                    </div>

                </div>
            </div>
        </div>
    </x-slot:content>

    <x-slot:scripts>
        @yield('account-settings-scripts')
    </x-slot:scripts>

</x-default-layout>
