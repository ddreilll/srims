<!--begin::User menu-->
<div class="me-n2">
    <!--begin::Action-->
    <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2" data-kt-menu-trigger="click"
        data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">

        <i class="svg-icon svg-icon-muted fa-solid fa-ellipsis-vertical fa-lg"></i>
    </a>
    <!--begin::User account menu-->
    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
        data-kt-menu="true">
        <!--begin::Menu item-->
        <div class="menu-item px-3">
            <div class="menu-content d-flex align-items-center px-3">
                <!--begin::Avatar-->
                <div class="symbol symbol-50px me-5">
                    <div
                        class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                </div>
                <!--end::Avatar-->
                <!--begin::Username-->
                <div class="d-flex flex-column">
                    <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::user()->name }}
                    </div>
                    <span class="fw-semibold text-muted fs-7">{{ Auth::user()->email }}</span>
                </div>
                <!--end::Username-->
            </div>
        </div>
        <!--end::Menu item-->
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->
        <!--begin::Menu item-->
        @if (Gate::check(['profile_details_edit']) || Gate::check(['profile_password_edit']))
            <div class="menu-item px-5 my-1">
                <a href="{{ route('account-settings.edit') }}"
                    class="menu-link px-5 {{ request()->routeIs('account-settings*') ? 'active' : '' }}">Account
                    Settings</a>
            </div>
        @endif
        <!--end::Menu item-->
        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                class="menu-link px-5">Sign
                Out</a>
        </div>
        <!--end::Menu item-->
    </div>
    <!--end::User account menu-->
    <!--end::Action-->
</div>
<!--end::User menu-->
