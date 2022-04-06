<div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-toolbar flex-column-auto" id="kt_aside_toolbar">
        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
            <div class="symbol symbol-50px">
                <img src="{{ asset('/assets/media/avatar/avatar_main.png') }}" alt="" />
            </div>
            <div class="aside-user-info flex-row-fluid flex-wrap ms-5">
                <div class="d-flex">
                    <div class="flex-grow-1 me-2">
                        <a href="#" class="text-white text-hover-primary fs-6 fw-bold">{{ auth()->user()->name }}</a>
                        <span class="text-gray-600 fw-bold d-block fs-8 mb-1">{{ \Auth::user()->roles->pluck('title')->toArray()[0] }}</span>
                        <div class="d-flex align-items-center text-success fs-9">
                            <span class="bullet bullet-dot bg-success me-1"></span>online
                        </div>
                    </div>
                    <div class="me-n2">
                        <a href="#" class="btn btn-icon btn-sm btn-active-color-primary mt-n2"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start"
                            data-kt-menu-overflow="true">
                            <span class="svg-icon svg-icon-muted svg-icon-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path opacity="0.3"
                                        d="M22.1 11.5V12.6C22.1 13.2 21.7 13.6 21.2 13.7L19.9 13.9C19.7 14.7 19.4 15.5 18.9 16.2L19.7 17.2999C20 17.6999 20 18.3999 19.6 18.7999L18.8 19.6C18.4 20 17.8 20 17.3 19.7L16.2 18.9C15.5 19.3 14.7 19.7 13.9 19.9L13.7 21.2C13.6 21.7 13.1 22.1 12.6 22.1H11.5C10.9 22.1 10.5 21.7 10.4 21.2L10.2 19.9C9.4 19.7 8.6 19.4 7.9 18.9L6.8 19.7C6.4 20 5.7 20 5.3 19.6L4.5 18.7999C4.1 18.3999 4.1 17.7999 4.4 17.2999L5.2 16.2C4.8 15.5 4.4 14.7 4.2 13.9L2.9 13.7C2.4 13.6 2 13.1 2 12.6V11.5C2 10.9 2.4 10.5 2.9 10.4L4.2 10.2C4.4 9.39995 4.7 8.60002 5.2 7.90002L4.4 6.79993C4.1 6.39993 4.1 5.69993 4.5 5.29993L5.3 4.5C5.7 4.1 6.3 4.10002 6.8 4.40002L7.9 5.19995C8.6 4.79995 9.4 4.39995 10.2 4.19995L10.4 2.90002C10.5 2.40002 11 2 11.5 2H12.6C13.2 2 13.6 2.40002 13.7 2.90002L13.9 4.19995C14.7 4.39995 15.5 4.69995 16.2 5.19995L17.3 4.40002C17.7 4.10002 18.4 4.1 18.8 4.5L19.6 5.29993C20 5.69993 20 6.29993 19.7 6.79993L18.9 7.90002C19.3 8.60002 19.7 9.39995 19.9 10.2L21.2 10.4C21.7 10.5 22.1 11 22.1 11.5ZM12.1 8.59998C10.2 8.59998 8.6 10.2 8.6 12.1C8.6 14 10.2 15.6 12.1 15.6C14 15.6 15.6 14 15.6 12.1C15.6 10.2 14 8.59998 12.1 8.59998Z"
                                        fill="black" />
                                    <path
                                        d="M17.1 12.1C17.1 14.9 14.9 17.1 12.1 17.1C9.30001 17.1 7.10001 14.9 7.10001 12.1C7.10001 9.29998 9.30001 7.09998 12.1 7.09998C14.9 7.09998 17.1 9.29998 17.1 12.1ZM12.1 10.1C11 10.1 10.1 11 10.1 12.1C10.1 13.2 11 14.1 12.1 14.1C13.2 14.1 14.1 13.2 14.1 12.1C14.1 11 13.2 10.1 12.1 10.1Z"
                                        fill="black" />
                                </svg>
                            </span>
                        </a>
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                            data-kt-menu="true">
                            <div class="menu-item px-3">
                                <div class="menu-content d-flex align-items-center px-3">
                                    <div class="symbol symbol-50px me-5">
                                        <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}" />
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
                                        </div>
                                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-2"></div>
                            <div class="menu-item px-5">
                                <a href="#" class="menu-link px-5 disabled">My
                                    Profile 
                                    <span class="badge badge-light-danger fw-bolder fs-8 px-2 py-1 ms-2">Soon</span></a>
                            </div>

                            <div class="separator my-2"></div>

                            <div class="menu-item px-5 my-1">
                                <a href="#" class="menu-link px-5 disabled">Account
                                    Settings <span class="badge badge-light-danger fw-bolder fs-8 px-2 py-1 ms-2">Soon</span></a>
                            </div>

                            <div class="menu-item px-5">
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
                                    class="menu-link px-5">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
            data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="5px">
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                @can('category_transaction')
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu</span>
                        </div>
                    </div>

                    @can('menu_student_request')
                        <div class="menu-item">
                            <a class="menu-link" href="#" data-bs-toggle="tooltip" data-bs-trigger="hover"
                                data-bs-dismiss="click" data-bs-placement="right">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen019.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                                                fill="black" />
                                            <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                                        </svg></span>
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Student Requests</span>
                            </a>
                        </div>
                    @endcan

                    @can('menu_student_records')
                        <div data-kt-menu-trigger="click"
                            class="menu-item {{ $menu === 'student-records' ? 'here show' : '' }} menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
                                            <path
                                                d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Student Records</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">

                                @can('access_student_profile')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'student-profile' ? 'active' : '' }}"
                                            href="{{ url('/student/profile') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Profile</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_student_grades')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'student-grades' ? 'active' : '' }}"
                                            href="{{ url('/student/grades') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Grades</span>
                                        </a>
                                    </div>
                                @endcan

                            </div>
                        </div>
                    @endcan
                @endcan

                @can('category_system_setup')

                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">System Setup</span>
                        </div>
                    </div>

                    @can('menu_admission_requirements')
                        <div data-kt-menu-trigger="click"
                            class="menu-item {{ $menu === 'admission-requirements' ? 'here show' : '' }} menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M17 10H11C10.4 10 10 9.6 10 9V8C10 7.4 10.4 7 11 7H17C17.6 7 18 7.4 18 8V9C18 9.6 17.6 10 17 10ZM22 4V3C22 2.4 21.6 2 21 2H11C10.4 2 10 2.4 10 3V4C10 4.6 10.4 5 11 5H21C21.6 5 22 4.6 22 4ZM22 15V14C22 13.4 21.6 13 21 13H11C10.4 13 10 13.4 10 14V15C10 15.6 10.4 16 11 16H21C21.6 16 22 15.6 22 15ZM18 20V19C18 18.4 17.6 18 17 18H11C10.4 18 10 18.4 10 19V20C10 20.6 10.4 21 11 21H17C17.6 21 18 20.6 18 20Z"
                                                fill="black" />
                                            <path
                                                d="M8 5C8 6.7 6.7 8 5 8C3.3 8 2 6.7 2 5C2 3.3 3.3 2 5 2C6.7 2 8 3.3 8 5ZM5 4C4.4 4 4 4.4 4 5C4 5.6 4.4 6 5 6C5.6 6 6 5.6 6 5C6 4.4 5.6 4 5 4ZM8 16C8 17.7 6.7 19 5 19C3.3 19 2 17.7 2 16C2 14.3 3.3 13 5 13C6.7 13 8 14.3 8 16ZM5 15C4.4 15 4 15.4 4 16C4 16.6 4.4 17 5 17C5.6 17 6 16.6 6 16C6 15.4 5.6 15 5 15Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Admission Requirements</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                @can('access_requirements')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'requirements' ? 'active' : '' }}"
                                            href="{{ url('/admission-requirements/list') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Requirements</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_requirements_criteria')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'requirements-criteria' ? 'active' : '' }}"
                                            href="{{ url('/admission-criteria/list') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Requirements Criteria</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    @can('menu_course_curriculum')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ $menu == 'course-curiculum' ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                fill="black" />
                                            <path
                                                d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                fill="black" />
                                            <path
                                                d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">Course Curriculum</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                @can('access_curriculum')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'curriculum' ? 'active' : '' }}"
                                            href="{{ url('/curriculum') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">List of Curriculum</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_course')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'course' ? 'active' : '' }}"
                                            href="{{ url('/course') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Course</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_subject')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'subject' ? 'active' : '' }}"
                                            href="{{ url('/subject') }} ">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Subjects</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                    @can('menu_schedules')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ $menu == 'schedules-menu' ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path opacity="0.3"
                                                d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                                fill="black" />
                                            <path
                                                d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                                fill="black" />
                                            <path
                                                d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">Schedules</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                @can('access_schedules')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'schedules' ? 'active' : '' }}"
                                            href="{{ url('/schedules') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">List of Schedules</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_rooms')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'room' ? 'active' : '' }}"
                                            href="{{ url('/room') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Rooms</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_instructors')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'instructor' ? 'active' : '' }}"
                                            href="{{ url('/instructor') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Instructors</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan

                @endcan

                @can('category_system_settings')
                    <div class="menu-item">
                        <div class="menu-content pt-8 pb-2">
                            <span class="menu-section text-muted text-uppercase fs-8 ls-1">Settings</span>
                        </div>
                    </div>

                    @can('menu_user_accounts')
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <!--begin::Svg Icon | path: icons/duotune/general/gen022.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                fill="black" />
                                            <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="black" />
                                            <path
                                                d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                fill="black" />
                                            <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-title">User Accounts</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">

                                @can('access_users')
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Manage Users</span>
                                        </a>
                                    </div>
                                @endcan

                                @can('access_user_roles')
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">User Roles</span>
                                        </a>
                                    </div>
                                @endcan

                            </div>
                        </div>
                    @endcan

                    @can('menu_system_settings')
                        <div data-kt-menu-trigger="click"
                            class="menu-item menu-accordion {{ $menu == 'system-settings' ? 'here show' : '' }}">
                            <span class="menu-link">
                                <span class="menu-icon">
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M17.5 11H6.5C4 11 2 9 2 6.5C2 4 4 2 6.5 2H17.5C20 2 22 4 22 6.5C22 9 20 11 17.5 11ZM15 6.5C15 7.9 16.1 9 17.5 9C18.9 9 20 7.9 20 6.5C20 5.1 18.9 4 17.5 4C16.1 4 15 5.1 15 6.5Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M17.5 22H6.5C4 22 2 20 2 17.5C2 15 4 13 6.5 13H17.5C20 13 22 15 22 17.5C22 20 20 22 17.5 22ZM4 17.5C4 18.9 5.1 20 6.5 20C7.9 20 9 18.9 9 17.5C9 16.1 7.9 15 6.5 15C5.1 15 4 16.1 4 17.5Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                </span>
                                <span class="menu-title">System Settings</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                @can('access_system_settings_curriculum')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'settings-curriculum' ? 'active' : '' }}"
                                            href="{{ url('/settings/curriculum') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Curriculum</span>
                                        </a>
                                    </div>
                                @endcan
                                @can('access_system_settings_student_profile')
                                    <div class="menu-item">
                                        <a class="menu-link {{ $sub_menu === 'settings-student-profile' ? 'active' : '' }}"
                                            href="{{ url('/settings/student-profile') }}">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Student Profile</span>
                                        </a>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endcan
                @endcan

            </div>
        </div>
    </div>
    <div class="aside-footer flex-column-auto py-5" id="kt_aside_footer">
        <a href="#" class="btn btn-custom btn-primary w-100">
            <span class="btn-label">Encode Student</span>
            <span class="svg-icon btn-icon svg-icon-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path opacity="0.3"
                        d="M19 22H5C4.4 22 4 21.6 4 21V3C4 2.4 4.4 2 5 2H14L20 8V21C20 21.6 19.6 22 19 22ZM15 17C15 16.4 14.6 16 14 16H8C7.4 16 7 16.4 7 17C7 17.6 7.4 18 8 18H14C14.6 18 15 17.6 15 17ZM17 12C17 11.4 16.6 11 16 11H8C7.4 11 7 11.4 7 12C7 12.6 7.4 13 8 13H16C16.6 13 17 12.6 17 12ZM17 7C17 6.4 16.6 6 16 6H8C7.4 6 7 6.4 7 7C7 7.6 7.4 8 8 8H16C16.6 8 17 7.6 17 7Z"
                        fill="black" />
                    <path d="M15 8H20L14 2V7C14 7.6 14.4 8 15 8Z" fill="black" />
                </svg>
            </span>
        </a>
    </div>
</div>
