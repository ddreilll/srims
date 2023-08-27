<!--begin::Aside Menu-->
<div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
    data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
    data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
        id="#kt_aside_menu" data-kt-menu="true">

        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <span class="menu-icon">
                    <i class="fa-duotone fa-chart-mixed"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </div>

        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('messages*') ? 'active' : '' }}"
                href="{{ route('messages.index') }}">
                <span class="menu-icon">
                    <i class="fa-duotone fa-inbox"></i>
                </span>
                <span class="menu-title">{{ __('global.messages') }}</span>
                @if (!request()->routeIs('messages*') && ($unreadCounts = (new App\Models\QaTopic())->unreadCount() > 0))
                    <span class="menu-badge"><span class="badge badge-warning">{{ $unreadCounts }}</span></span>
                @endif
            </a>
        </div>

        @if (Gate::check(['student_access']) || Gate::check(['gradesheet_access']))
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu</span>
                </div>
            </div>

            @can('student_access')
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('admin.student.*') || request()->routeIs('students.*') ? 'active' : '' }}"
                        href="{{ route('students.index') }}">
                        <span class="menu-icon">
                            <i class="fa-duotone fa-screen-users"></i>
                        </span>
                        <span class="menu-title">{{ __('cruds.student.title') }}</span>
                    </a>
                </div>
            @endcan

            @can('gradesheet_access')
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('admin.gradesheet.*') || request()->routeIs('gradesheets.*') ? 'active' : '' }}"
                        href="{{ route('gradesheets.index') }}">
                        <span class="menu-icon">
                            <i class="fa-duotone fa-file-lines"></i>
                        </span>
                        <span class="menu-title">{{ __('cruds.gradesheet.title') }}</span>
                        <span class="menu-badge"><span class="badge badge-secondary">NON-SIS</span></span>
                    </a>
                </div>
            @endcan
        @endif

        @if (Gate::check(['user_management_access']) || Gate::check(['system_setup_access']))

            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
                </div>
            </div>

            @can('user_management_access')
                <div data-kt-menu-trigger="click"
                    class="menu-item menu-accordion {{ request()->routeIs('users.*') ? 'here show' : '' }}">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="fa-duotone fa-users"></i>
                        </span>
                        <span class="menu-title">{{ __('cruds.userManagement.title') }}</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg">

                        @can('user_access')
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                    href="{{ route('users.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('cruds.user.title') }}</span>
                                </a>
                            </div>
                        @endcan
                    </div>
                </div>
            @endcan

            @can('system_setup_access')
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('settings.*') ? 'active' : '' }}"
                        href="{{ url('settings') }}">
                        <span class="menu-icon">
                            <i class="fa-duotone fa-sliders-simple"></i>
                        </span>
                        <span class="menu-title">{{ __('cruds.systemConfigMaintenance.title') }}</span>
                    </a>
                </div>
            @endcan

        @endif
    </div>
    <!--end::Menu-->
</div>
<!--end::Aside Menu-->
