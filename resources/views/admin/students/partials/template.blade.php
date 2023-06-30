@extends('layouts.fluid')

@section('styles')
    <style>
        .timeline-label:before {
            left: 1px !important;
        }
    </style>

    @yield('student-styles')

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row g-7">
            <div class="col-sm-4">
                <div class="card mb-5">

                    @switch($student->stud_academicStatus)
                        @case('UNG')
                            <div class="card-header justify-content-end ribbon ribbon-start">
                                <div class="ribbon-label bg-gray-600">Undergraduate</div>
                                <div class="card-title">
                                </div>
                            </div>
                        @break

                        @case('RTN')
                            <div class="card-header justify-content-end ribbon ribbon-start">
                                <div class="ribbon-label bg-warning text-dark">Returnee</div>
                                <div class="card-title">
                                </div>
                            </div>
                        @break

                        @case('DIS')
                            <div class="card-header justify-content-end ribbon ribbon-start">
                                <div class="ribbon-label bg-danger">Dismissed</div>
                                <div class="card-title">
                                </div>
                            </div>
                        @break

                        @case('GRD')
                            <div class="card-header justify-content-end ribbon ribbon-start">
                                <div class="ribbon-label bg-primary">Graduated</div>
                                <div class="card-title text-end">
                                    <p class="mb-0 fs-6" style="line-height:17px;">
                                        {{ date('F d, Y', strtotime($student->stud_dateExited)) }}<br><span
                                            class="text-muted fs-7">Date Graduated</span></p>
                                </div>
                            </div>
                        @break

                        @default
                    @endswitch

                    <div class="card-body pt-15">
                        <div class="d-flex flex-center flex-column mb-5">
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                <img src="{{ asset('/assets/media/avatar/avatar_main.jpg') }}" alt="image" />
                            </div>
                            <p class="mb-1 text-gray-800 fw-boldest fs-5">{{ $student->stud_studentNo }}</p>
                            <p class="fs-3 fw-bolder mb-1">
                                {{ $student->stud_lastName . ', ' . $student->stud_firstName . ($student->stud_middleName ? ' ' . substr($student->stud_middleName, 0, 1) . '.' : '') }}</a>
                            <div class="fs-5 fw-bold text-muted mb-3">{{ $student->stud_course }}</div>

                            {!! $student->stud_recordType == 'SIS'
                                ? '<span class="badge badge-light-dark fs-6">SIS Record</span>'
                                : '<span class="badge badge-light-dark fs-6">NON-SIS Record</span>' !!}

                            @if ($student->stud_recordType == 'NONSIS')
                                <div class="d-flex flex-wrap flex-center mt-10">

                                    @php
                                        $scholasticSummary = $student->getScholasticSummary();
                                    @endphp

                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700 text-center">
                                            <span data-kt-countup="true"
                                                data-kt-countup-value="{{ $scholasticSummary['all'] }}">0</span>
                                        </div>
                                        <div class="fw-bold text-muted">Total Semester</div>
                                    </div>

                                    <div class="border border-gray-300 border-dashed rounded py-3 px-3 ms-4 mb-3">
                                        <div class="fs-4 fw-bolder text-gray-700 text-center">

                                            <span data-kt-countup="true"
                                                data-kt-countup-value="{{ $scholasticSummary['summer'] }}">0</span>
                                        </div>
                                        <div class="fw-bold text-muted">Summer</div>
                                    </div>

                                </div>
                            @endif

                        </div>

                        <div class="separator my-4"></div>

                        <ul class="nav nav-tabs nav-pills flex-row border-0 flex-md-column fs-6">
                            <li class="nav-item me-0 mb-md-2">
                                <a class="nav-link btn btn-active-light-primary text-gray-800 text-active-primary fw-bolder {{ request()->input('tab', 'personal') == 'personal' ? 'active' : '' }}"
                                    href="{{ request()->input('tab', 'personal') == 'personal' ? '#' : route('students.show', $student->stud_id . '?tab=personal') }}">

                                    <span class="d-flex">
                                        <span class="align-middle">
                                            <i class="fa-duotone fa-address-card me-3"></i>
                                        </span>

                                        <span class="text-start">
                                            {{ __('Personal & Student Information') }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            @can('student_show_documents')
                                <li class="nav-item me-0 mb-md-2">
                                    <a class="nav-link btn btn-active-light-primary text-gray-800 text-active-primary fw-bolder {{ request()->input('tab', 'personal') == 'documents' ? 'active' : '' }}"
                                        href="{{ request()->input('tab', 'personal') == 'documents' ? '#' : route('students.show', $student->stud_id . '?tab=documents') }}">

                                        <span class="d-flex">
                                            <span class="align-middle">
                                                <i class="fa-duotone fa-envelope-open-text me-3"></i>
                                            </span>

                                            <span class="text-start">
                                                {{ __('Envelope Documents') }}
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            @endcan
                            @if ($student->stud_recordType == 'NONSIS')
                                @can('student_show_scholastic')
                                    <li class="nav-item me-0 mb-md-2">
                                        <a class="nav-link btn btn-active-light-primary text-gray-800 text-active-primary fw-bolder {{ request()->input('tab', 'personal') == 'scholastic' ? 'active' : '' }}"
                                            href="{{ request()->input('tab', 'personal') == 'scholastic' ? '#' : route('students.show', $student->stud_id . '?tab=scholastic') }}">
                                            <span class="d-flex">
                                                <span class="align-middle">
                                                    <i class="fa-duotone fa-file-certificate me-3"></i>
                                                </span>

                                                <span class="text-start">
                                                    {{ __('Scholastic Data') }}
                                                </span>
                                            </span>
                                        </a>
                                    </li>
                                @endcan
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header pt-7 pb-5">
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-800">{{ __('Activity Logs') }}</span>
                            <span class="text-gray-400 mt-1 fw-semibold fs-7">as of {{ formatDatetime(now()) }}</span>
                        </h3>
                        <div class="card-toolbar">
                            @can('student_logs_access')
                                <a href="#" class="btn btn-sm btn-light">{{ __('Show More') }}</a>
                            @endcan
                        </div>
                    </div>
                    <div class="card-body pt-5">

                        @if (sizeOf($activityLogs) >= 1)
                            <div class="timeline-label">
                                @foreach ($activityLogs as $key => $activityLog)
                                    @if ($activityLog->log_name == 'activity')
                                        <div class="timeline-item">
                                            <div class="timeline-badge">
                                                <i class="fa fa-genderless text-gray-700 fs-1"></i>
                                            </div>
                                            <div class="fw-normal timeline-content ps-3">
                                                {!! sprintf(
                                                    '%s by %s at %s',
                                                    $activityLog->event,
                                                    $activityLog->user->name,
                                                    formatDatetime($activityLog->created_at),
                                                ) !!}
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <p class="text-center mb-0">{{ __('global.no_available', ['attribute' => 'Logs']) }}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                @yield('student-content')
            </div>
        </div>
    </div>
@stop
