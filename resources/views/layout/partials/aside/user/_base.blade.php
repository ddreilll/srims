<!--begin::User-->
<div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
    <!--begin::Symbol-->
    <div class="symbol symbol-50px">
        @php $avatar = auth()->user()->avatar; @endphp

        @if (!$avatar)
            <div
                class="symbol-label fs-3 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
        @else
            <img src="{{ $avatar }}" alt="">
        @endif
    </div>
    <!--end::Symbol-->
    <!--begin::Wrapper-->
    <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
        <!--begin::Section-->
        <div class="d-flex">
            <!--begin::Info-->
            <div class="flex-grow-1 me-2">
                <!--begin::Username-->
                <a href="{{ route('account.overview') }}" class="text-white fs-6 fw-bold text-hover-primary">{{ Auth::user()->name }}</a>
                <!--end::Username-->
                <!--begin::Description-->
                <span
                    class="text-gray-600 fw-semibold d-block fs-8 mb-1">{{ Auth::user()->roles()->implode('title', ',') }}</span>
                <!--end::Description-->
                <!--begin::Label-->
                <div class="d-flex align-items-center text-success fs-9">
                    <span class="bullet bullet-dot bg-success me-1"></span>online
                </div>
                <!--end::Label-->
            </div>
            <!--end::Info-->
            @include(config('settings.THEME_LAYOUT_DIR') . '/partials/aside/user/partials/_menu')
        </div>
        <!--end::Section-->
    </div>
    <!--end::Wrapper-->
</div>
<!--end::User-->
