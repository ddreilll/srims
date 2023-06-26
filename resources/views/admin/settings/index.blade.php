@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    @include('admin.settings.partials.menu')
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ __('cruds.systemConfigMaintenance.title') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <p class="mb-7">{{ __('panel.setup_description') }}</p>

                                    <ul class="nav nav-pills d-flex justify-content-around nav-pills-custom gap-3 mb-6">

                                        @can('document_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.documents.index') }}"
                                                    style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-folder-open fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.document.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.student.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('course_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.courses.index') }}" style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-diploma fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.course.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.student.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('honor_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.honors.index') }}" style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-file-certificate fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.honor.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.student.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>

                                    <ul class="nav nav-pills d-flex justify-content-around nav-pills-custom gap-3 mb-6">
                                        @can('room_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.rooms.index') }}" style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-door-open fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.room.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.gradesheet.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('subject_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.subjects.index') }}" style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-book-bookmark fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.subject.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.gradesheet.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('instructor_access')
                                            <li class="nav-item mb-3 me-0" role="presentation">
                                                <a class="nav-link nav-link-border-solid btn btn-outline btn-flex btn-active-color-primary flex-column flex-stack pt-9 pb-7 page-bg show"
                                                    href="{{ route('settings.instructors.index') }}" style="width: 133px;height: 130px" aria-selected="false">
                                                    <div class="nav-icon mb-3">
                                                        <i class="fa-duotone fa-chalkboard-user fs-1"></i>
                                                    </div>

                                                    <div>
                                                        <span
                                                            class="text-gray-800 fw-bold fs-5 d-block">{{ __('cruds.instructor.title') }}</span>
                                                        <span
                                                            class="text-gray-400 fw-semibold fs-7">{{ __('cruds.gradesheet.title') }}</span>
                                                    </div>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
