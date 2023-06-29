@if (Gate::check(['document_access']) || Gate::check(['course_access']) || Gate::check(['honor_access']))
    <div class="card mb-5 mb-xl-8">
        <div class="card-body pb-5">
            <div class="fw-bolder rotate collapsible {{ request()->routeIs('settings.documents.*') || request()->routeIs('settings.courses.*') || request()->routeIs('settings.honors.*') ? '' : 'collapsed' }} h3 mb-4"
                data-bs-toggle="collapse" href="#students" role="button" aria-expanded="true" aria-controls="students">
                Students
                <span class="ms-2 rotate-180">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                fill="black"></path>
                        </svg>
                    </span>
                </span>
            </div>

            <div id="students"
                class="collapse {{ request()->routeIs('settings.documents.*') || request()->routeIs('settings.courses.*') || request()->routeIs('settings.honors.*') ? 'show' : '' }}"
                style="">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
                    @can('document_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.documents.*') ? 'active' : '' }}"
                                href="{{ route('settings.documents.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-folder-open me-2"></i>{{ __('cruds.document.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('course_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.courses.*') ? 'active' : '' }}"
                                href="{{ route('settings.courses.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-diploma me-2"></i>{{ __('cruds.course.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('honor_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.honors.*') ? 'active' : '' }}"
                                href="{{ route('settings.honors.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-file-certificate me-2"></i>{{ __('cruds.honor.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
@endif

@if (Gate::check(['room_access']) || Gate::check(['instructor_access']) || Gate::check(['subject_access']))
    <div class="card mb-5 mb-xl-8">
        <div class="card-body pb-5">
            <div class="fw-bolder rotate collapsible {{ request()->routeIs('settings.rooms.*') || request()->routeIs('settings.instructors.*') || request()->routeIs('settings.subjects.*') ? '' : 'collapsed' }} h3 mb-4"
                data-bs-toggle="collapse" href="#gradesheets" role="button" aria-expanded="true"
                aria-controls="gradesheets">{{ __('cruds.gradesheet.title') }}
                <span class="ms-2 rotate-180">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                fill="black"></path>
                        </svg>
                    </span>
                </span>
            </div>
            <div id="gradesheets"
                class="collapse {{ request()->routeIs('settings.rooms.*') || request()->routeIs('settings.instructors.*') || request()->routeIs('settings.subjects.*') ? 'show' : '' }}"
                style="">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
                    @can('room_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.rooms.*') ? 'active' : '' }}"
                                href="{{ route('settings.rooms.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-door-open me-2"></i>{{ __('cruds.room.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('instructor_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.instructors.*') ? 'active' : '' }}"
                                href="{{ route('settings.instructors.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-chalkboard-user me-2"></i>{{ __('cruds.instructor.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('subject_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.subjects.*') ? 'active' : '' }}"
                                href="{{ route('settings.subjects.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-book-bookmark me-2"></i>{{ __('cruds.subject.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
@endif

@if (Gate::check(['year_level_access']) || Gate::check(['semester_access']) || Gate::check(['school_year_access']))
    <div class="card mb-5 mb-xl-8">
        <div class="card-body pb-5">

            <div class="fw-bolder rotate collapsible {{ request()->routeIs('settings.year-levels.*') || request()->routeIs('settings.semesters.*') || request()->routeIs('settings.school-years.*') ? '' : 'collapsed' }} h3 mb-4"
                data-bs-toggle="collapse" href="#misc" role="button" aria-expanded="true" aria-controls="misc">Misc
                <span class="ms-2 rotate-180">
                    <span class="svg-icon svg-icon-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <path
                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                fill="black"></path>
                        </svg>
                    </span>
                </span>
            </div>
            <div id="misc"
                class="collapse {{ request()->routeIs('settings.year-levels.*') || request()->routeIs('settings.semesters.*') || request()->routeIs('settings.school-years.*') ? 'show' : '' }}"
                style="">
                <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
                    @can('year_level_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.year-levels.*') ? 'active' : '' }}"
                                href="{{ route('settings.year-levels.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-list-ol me-2"></i>{{ __('cruds.yearLevel.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('semester_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.semesters.*') ? 'active' : '' }}"
                                href="{{ route('settings.semesters.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-list-ol me-2"></i>{{ __('cruds.semester.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                    @can('school_year_access')
                        <li class="nav-item me-0 mb-md-2">
                            <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.school-years.*') ? 'active' : '' }}"
                                href="{{ route('settings.school-years.index') }}">
                                <span class="d-flex flex-column align-items-start">
                                    <span class="fs-5"><i
                                            class="fa-duotone fa-list-ol me-2"></i>{{ __('cruds.schoolYear.title') }}</span>
                                </span>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
@endif

@if (Gate::check(['system_backup_access']) || Gate::check(['system_error_logs_access']))
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0">
            <div class="card-title">
                <h3 class="fw-bolder  m-0">Backup & Maintenance</h3>
            </div>
        </div>

        <div class="card-body pt-2">

            <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed mb-9 p-6">
                <i class="ki-duotone ki-design-1 fs-2tx text-primary me-4"></i>

                <div class="d-flex flex-stack flex-grow-1 ">
                    <div class=" fw-semibold">

                        <div class="fs-6 text-gray-700 ">{{ __('panel.setup_maintenance_description') }}
                        </div>
                    </div>

                </div>
            </div>

            <div class="py-2">
                @can('system_backup_access')
                    <div class="d-flex flex-stack">
                        <div class="d-flex">
                            <i class="fa-duotone fa-database fs-3 text-gray-500 me-6 my-auto"></i>

                            <div class="d-flex flex-column">
                                <a href="#"
                                    class="fs-5 text-dark text-hover-primary fw-bold">{{ __('Database Backup') }}</a>
                                <div class="fs-6 fw-semibold text-muted">{{ __('Automated Tool') }}</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('settings.backups.index') }}" class="btn btn-icon btn-primary btn-sm">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endcan

                @can('system_error_logs_access')
                    <div class="separator separator-dashed my-5"></div>

                    <div class="d-flex flex-stack">
                        <div class="d-flex">
                            <i class="fa-duotone text-gray-500 fa-bug fs-3 me-6 my-auto"></i>

                            <div class="d-flex flex-column">
                                <a href="#"
                                    class="fs-5 text-dark text-hover-primary fw-bold">{{ __('Error Logs') }}</a>
                                <div class="fs-6 fw-semibold text-muted">{{ __('Diagnostic Tool and Viewer') }}</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('log-viewer.index') }}" target="_blank"
                                class="btn btn-icon btn-primary btn-sm">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endcan

            </div>
        </div>
    </div>
@endif
