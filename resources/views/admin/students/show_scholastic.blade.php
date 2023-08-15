@extends('admin.students.partials.template')
@section('student-styles')
    <style>
        .accordion-button:not(.collapsed) {
            background-color: #eff2f5 !important;
        }
    </style>
@endsection
@section('student-content')

    @if (sizeOf($schoolYears = $student->getGrades()) >= 1)
        <div class="py-3 py-lg-6 ">
            <div class="d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Scholastic Data
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    @can('student_generate_scholastic_data')
                        <a href="{{ route('students.export.scholastic-data', $student->stud_id) }}" target="_blank"
                            class="btn fw-bold btn-primary">Export to PDF </a>
                    @endcan
                </div>
            </div>
        </div>

        <div class="accordion" id="scholasticData">
            @php
                $yearCount = 1;
            @endphp

            @foreach ($schoolYears as $year => $schoolYear)
                <div class="accordion-item">
                    <h2 class="accordion-header" id="scholasticDataHeader{{ $yearCount }}">
                        <button class="accordion-button fs-5 fw-bolder {{ $yearCount == 1 ? '' : 'collapsed' }}"
                            type="button" data-bs-toggle="collapse" data-bs-target="#scholasticDataBody{{ $yearCount }}"
                            aria-expanded="{{ $yearCount == 1 ? 'true' : 'false' }}"
                            aria-controls="scholasticDataBody{{ $yearCount }}">
                            {{ sprintf('%s - %s', $year, $year + 1) }} <span
                                class="badge badge-secondary ms-5">{{ sizeOf($schoolYear) }}</span>
                        </button>
                    </h2>
                    <div id="scholasticDataBody{{ $yearCount }}"
                        class="accordion-collapse collapse {{ $yearCount == 1 ? 'show' : '' }}"
                        aria-labelledby="scholasticDataHeader{{ $yearCount }}" data-bs-parent="#scholasticData">
                        <div class="accordion-body">

                            @foreach ($schoolYear as $semester => $semesters)
                                <div class="card border border-1 mb-5">
                                    <div class="card-header bg-gray-100">
                                        <p class="card-title fs-6">
                                            {{ strtoupper($semester) }}
                                        </p>
                                    </div>
                                    <div class="card-body">

                                        <table class="table align-middle table-row-dashed fs-7 gy-4">
                                            <thead class="border-bottom border-gray-200">
                                                <tr class="text-start text-muted fw-bolder text-uppercase gs-0">
                                                    <th>No.</th>
                                                    <th>Subject Code</th>
                                                    <th>Description</th>
                                                    <th>Faculty name</th>
                                                    <th>Units</th>
                                                    <th>Section code</th>
                                                    <th>Final grade</th>
                                                    <th>Grade status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($semesters as $key => $gradesheet)
                                                    <tr>
                                                        <td> {{ $key + 1 }} </td>
                                                        <td>
                                                            {{ $gradesheet->subject->subj_code }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->subject->subj_name }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->instructor->full_name }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->subject->subj_units }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->class_section }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->pivot->enrsub_finalRating }}
                                                        </td>
                                                        <td>
                                                            {{ $gradesheet->pivot->enrsub_grade_status }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                @php
                    $yearCount++;
                @endphp
            @endforeach
        </div>
    @else
        <div class="py-3 py-lg-6 ">
            <div class="d-flex flex-stack ">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                        Scholastic Data
                    </h1>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                </div>
            </div>
        </div>
        <div class="card mb-6 mb-xl-9">
            <div class="card-body"> No grades has been encoded yet</div>
        </div>
    @endif
@endsection
