@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-300px mb-10">
                    <div class="card card-xl-stretch">
                        <div class="card-header">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">Filter</span>
                            </h3>
                        </div>
                        <div class="card-body pt-5">
                            <div class="mb-5">
                                <label
                                    class="form-label fs-6 fw-semibold">{{ __('cruds.student.fields.stud_cour_stud_id') }}</label>
                                <input class="form-control" value="" id="filterCourse" />
                            </div>
                            <div class="mb-5">
                                <label
                                    class="form-label fs-6 fw-semibold">{{ __('cruds.student.fields.stud_academicStatus') }}</label>
                                <input class="form-control" value="" id="filterAcademicStatus" />
                            </div>
                            <div class="mb-5">
                                <label
                                    class="form-label fs-6 fw-semibold">{{ __('cruds.student.fields.stud_yearOfAdmission') }}</label>
                                <input class="form-control" value="" id="filterYearOfAdmission" />
                            </div>
                            <div class="mb-5">
                                <label
                                    class="form-label fs-6 fw-semibold">{{ __('cruds.student.fields.stud_recordType') }}</label>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom me-10">
                                        @php $nonSis = \App\Enums\RecordTypeEnum::NONSIS; @endphp
                                        <input class="form-check-input filterRecordType" type="checkbox"
                                            value="{{ $nonSis }}" id="NONSISCheckbox" />
                                        <label class="form-check-label" for="NONSISCheckbox">
                                            {{ (new App\Enums\RecordTypeEnum())->getDisplayNames()[$nonSis] }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-custom">
                                        @php $sis = \App\Enums\RecordTypeEnum::SIS; @endphp

                                        <input class="form-check-input filterRecordType" type="checkbox"
                                            value="{{ $sis }}" id="SISCheckbox" />
                                        <label class="form-check-label" for="SISCheckbox">
                                            {{ (new App\Enums\RecordTypeEnum())->getDisplayNames()[$sis] }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="separator my-10 opacity-75"></div>
                            <div class="mb-5">
                                <label class="form-label fw-semibold">Created at</label>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <input class="form-control  rounded rounded-end-0" id="filterCreatedAt"
                                            placeholder="Pick date range" />
                                        <button class="btn btn-icon btn-light">
                                            <span class="svg-icon svg-icon-5">
                                                <i class="fa-light fa-xmark"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-10">
                                <label class="form-label fw-semibold">Updated at</label>
                                <div class="d-flex">
                                    <div class="input-group">
                                        <input class="form-control  rounded rounded-end-0" id="filterUpdatedAt"
                                            placeholder="Pick date range" />
                                        <button class="btn btn-icon btn-light">
                                            <span class="svg-icon svg-icon-5">
                                                <i class="fa-light fa-xmark"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary d-block w-100 fw-semibold px-6 mb-2" id="filterApplyBtn">Apply
                                filter</button>

                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header border-0 pt-6">
                                    <div class="card-title">
                                        @include('partials.dataTables.search', [
                                            'resource' => convertToSnakeCase(__('cruds.student.title_singular')),
                                            'resourceDisplay' => __('cruds.student.title_singular'),
                                        ])
                                    </div>
                                    <div class="card-toolbar">
                                        @can('student_create')
                                            <div class="d-flex justify-content-end">
                                                @include('partials.buttons.create', [
                                                    'createRoute' => url('student/profile/add'),
                                                    'resource' => convertToSnakeCase(
                                                        __('cruds.student.title_singular')),
                                                    'resourceDisplay' => __('cruds.student.title_singular'),
                                                ])
                                            </div>
                                        @endcan
                                    </div>
                                </div>

                                <div class="card-body py-3">

                                    <table id="dataTable" class="table border table-rounded table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th>{{ __('cruds.student.fields.stud_studentNo') }}</th>
                                                <th>{{ __('cruds.student.fields.stud_name') }}</th>
                                                <th>{{ __('cruds.student.fields.stud_cour_stud_id') }}</th>
                                                <th>{{ __('cruds.student.fields.stud_academicStatus') }}</th>
                                                <th>{{ __('cruds.student.fields.stud_yearOfAdmission') }}</th>
                                                <th>{{ __('cruds.student.fields.stud_recordType') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            var courses = @json($filterCourses);
            var filterCourse = document.querySelector("#filterCourse");
            new Tagify(filterCourse, {
                whitelist: courses,
                enforceWhitelist: true,
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.id).join(','),
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

            var academicStatus = @json($filterAcademicStatus);
            var filterAcademicStatus = document.querySelector("#filterAcademicStatus");
            new Tagify(filterAcademicStatus, {
                whitelist: academicStatus,
                enforceWhitelist: true,
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.id).join(','),
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    classname: "tagify__inline__suggestions", // <- custom classname for this dropdown, so it could be targeted
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

            var yearOfAdmission = @json($filterYearOfAdmission);
            var filterYearOfAdmission = document.querySelector("#filterYearOfAdmission");
            new Tagify(filterYearOfAdmission, {
                whitelist: yearOfAdmission,
                enforceWhitelist: true,
                originalInputValueFormat: valuesArr => valuesArr.map(item => item.value).join(','),
                dropdown: {
                    maxItems: 20, // <- mixumum allowed rendered suggestions
                    enabled: 0, // <- show suggestions on focus
                    closeOnSelect: false // <- do not hide the suggestions dropdown once an item has been selected
                }
            });

            var filterCreatedAt = $("#filterCreatedAt").flatpickr({
                altInput: !0,
                altFormat: 'm/d/Y',
                dateFormat: 'Y-m-d',
                mode: 'range',
            });

            $($('#filterCreatedAt').closest("div.input-group")).find("button").on("click", function() {
                filterCreatedAt.clear();
            });

            var fitlerUpdatedAt = $('#filterUpdatedAt').flatpickr({
                altInput: !0,
                altFormat: 'm/d/Y',
                dateFormat: 'Y-m-d',
                mode: 'range',
            });

            $($('#filterUpdatedAt').closest("div.input-group")).find("button").on("click", function() {
                fitlerUpdatedAt.clear();
            });



            const resource = "student";

            let table = $("#dataTable").DataTable({
                buttons: $.extend(true, [], $.fn.dataTable.defaults.buttons),
                serverSide: true,
                processing: true,
                retrieve: true,
                searchDelay: 400,
                ajax: {
                    url: "{{ route('students.index') }}",
                    data: {
                        "course": function() {
                            return $("#filterCourse").val();
                        },
                        "academic_status": function() {
                            return $("#filterAcademicStatus").val()
                        },
                        "admission_year": function() {
                            return $("#filterYearOfAdmission").val();
                        },
                        "record_type": function() {
                            return $(".filterRecordType:checked")
                                .map(function() {
                                    return this.value;
                                })
                                .get()
                                .join(",");
                        },
                        "created_at": function() {
                            var selectedDates = filterCreatedAt.selectedDates;
                            if (selectedDates.length >= 1) {

                                var filterData = moment(selectedDates[0]).format("YYYY-MM-DD");

                                if (selectedDates.length == 2) {
                                    filterData += "," + moment(selectedDates[1]).format(
                                        "YYYY-MM-DD");
                                } else {
                                    filterData += "," + moment(selectedDates[0]).format(
                                        "YYYY-MM-DD");
                                }

                                return filterData;
                            }

                        },
                        "updated_at": function() {
                            var selectedDates = fitlerUpdatedAt.selectedDates;
                            if (selectedDates.length >= 1) {

                                var filterData = moment(selectedDates[0]).format("YYYY-MM-DD");

                                if (selectedDates.length == 2) {
                                    filterData += "," + moment(selectedDates[1]).format(
                                        "YYYY-MM-DD");
                                } else {
                                    filterData += "," + moment(selectedDates[0]).format(
                                        "YYYY-MM-DD");
                                }

                                return filterData;
                            }
                        }
                    }
                },
                columns: [{
                        data: 'stud_studentNo',
                        className: "align-middle"
                    },
                    {
                        data: 'full_name',
                        className: "align-middle"
                    },
                    {
                        data: 'course_code',
                        searchable: false,
                        orderable: false,
                        className: "align-middle"
                    },
                    {
                        data: 'stud_academicStatus',
                        searchable: false,
                        orderable: false,
                        className: "align-middle"
                    },
                    {
                        data: 'stud_yearOfAdmission',
                        searchable: false,
                        className: "align-middle"
                    },
                    {
                        data: 'stud_recordType',
                        searchable: false,
                        orderable: false,
                        className: "align-middle"
                    },
                    {
                        data: 'actions',
                        searchable: false,
                        orderable: false,
                        className: "text-end align-middle"
                    },
                ],
                orderCellsTop: true,
                order: [
                    [0, 'asc']
                ],
                lengthMenu: [
                    [10, 25, 50, 100],
                    ['10', '25', '50', '100']
                ],
                pageLength: 10,
                drawCallback: function(settings, json) {
                    KTMenu.createInstances();

                    initializedFormSubmitConfirmation(`[${resource}-destroy="true"]`,
                        `-${resource}-destroy`,
                        "archive", "danger", "warning");
                }
            });

            $(`#${resource}DataTableSearch`).on('keyup', function() {
                table.search($(this).val()).draw();
            });

            $("#filterApplyBtn").on("click", function() {
                table.ajax.reload();
            });
        }));
    </script>
@endsection
