<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">Students</h3>
        </div>
    </div>

    <div class="card-body pt-2">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.documents.*') ? 'active' : '' }}"
                    href="">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Documents</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.courses.*') ? 'active' : '' }}"
                    href="">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Courses</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.honors.*') ? 'active' : '' }}"
                    href="{{ route('settings.honors.index') }}">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Honors</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">Gradesheets</h3>
        </div>
    </div>

    <div class="card-body pt-2">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.rooms.*') ? 'active' : '' }}"
                    href="">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Rooms</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.instuctors.*') ? 'active' : '' }}"
                    href="">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Instructors</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.subjects.*') ? 'active' : '' }}"
                    href="">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Subjects</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="card mb-5 mb-xl-8">
    <div class="card-header border-0">
        <div class="card-title">
            <h3 class="fw-bolder m-0">Misc</h3>
        </div>
    </div>

    <div class="card-body pt-2">
        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column mb-3 mb-md-0 fs-6">
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.year-levels.*') ? 'active' : '' }}"
                    href="{{ route('settings.year-levels.index') }}">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Year Levels</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.semesters.*') ? 'active' : '' }}"
                    href="{{ route('settings.semesters.index') }}">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">Semesters</span>
                    </span>
                </a>
            </li>
            <li class="nav-item me-0 mb-md-2">
                <a class="nav-link btn btn-active-light-dark text-black-50 fw-bolder {{ request()->routeIs('settings.school-years.*') ? 'active' : '' }}"
                    href="{{ route('settings.school-years.index') }}">
                    <span class="d-flex flex-column align-items-start">
                        <span class="fs-5">School Years</span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
</div>
