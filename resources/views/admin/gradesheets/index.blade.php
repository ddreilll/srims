<x-default-layout title="{{ __('global.list_of', ['attribute' => __('cruds.gradesheet.title')]) }}" pageTitle="{{ __('global.list_of', ['attribute' => __('cruds.gradesheet.title')]) }}">

    <x-slot:breadcrumbs>
        {{ Breadcrumbs::render('gradesheets') }}
    </x-slot:breadcrumbs>

    <x-slot:content>
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
                            <label class="form-label fs-6 fw-semibold">{{ __('cruds.subject.title_singular') }}</label>
                            <input class="form-control" value="" id="filterSubject" />
                        </div>
                        <div class="mb-5">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_room_id') }}</label>
                            <input class="form-control" value="" id="filterRoom" />
                        </div>
                        <div class="mb-5">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_term_id') }}</label>
                            <input class="form-control" value="" id="filterSemester" />
                        </div>
                        <div class="mb-5">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_acadYear') }}</label>
                            <input class="form-control" value="" id="filterAcadYear" />
                        </div>
                        <div class="mb-5">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_inst_id') }}</label>
                            <input class="form-control" value="" id="filterInstructor" />
                        </div>

                        <div class="mb-7">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_fstorage') }}</label>
                            <div class="d-flex">
                                @php
                                    $LOCAL = \App\Enums\GradesheetFileStorageEnum::LOCAL;
                                    $ONLINE = \App\Enums\GradesheetFileStorageEnum::ONLINE;
                                @endphp
                                <div class="form-check form-check-custom form-check-solid  form-check-sm me-5">
                                    <input class="form-check-input filterFileStorageType" type="checkbox"
                                        value="{{ $LOCAL }}" id="filterFileStorageTypeLocal" />
                                    <label class="form-check-label" for="filterFileStorageTypeLocal">
                                        {{ (new \App\Enums\GradesheetFileStorageEnum())->getDisplayNames()[$LOCAL] }}
                                    </label>
                                </div>
                                <div class="form-check form-check-custom form-check-solid form-check-sm ">
                                    <input class="form-check-input filterFileStorageType" type="checkbox"
                                        value="{{ $ONLINE }}" id="filterFileStorageTypeOnline" />
                                    <label class="form-check-label" for="filterFileStorageTypeOnline">
                                        {{ (new \App\Enums\GradesheetFileStorageEnum())->getDisplayNames()[$ONLINE] }}
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="mb-7">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_total_student') }}</label>
                            <div id="filterTotalStudents" class="mt-10" max="{{ $filterMaxStudent }}"></div>
                            <input value="" id="filterTotalStudentsMin" hidden>
                            <input value="" id="filterTotalStudentsMax" hidden>
                        </div>

                        <div class="mb-5">
                            <label
                                class="form-label fs-6 fw-semibold">{{ __('cruds.gradesheet.fields.class_total_slots') }}</label>
                            <div id="filterTotalSlots" class="mt-10" max="{{ $filterMaxSlots }}"></div>
                            <input value="" id="filterTotalSlotsMin" hidden>
                            <input value="" id="filterTotalSlotsMax" hidden>
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

                <div class="rounded border p-10 bg-white mb-10">
                    <div class="d-flex flex-stack">
                        <div class="me-5">
                            <label class="fs-6 fw-semibold form-label">Show Gradesheet with no pages</label>
                            <div class="fs-7 fw-semibold text-muted">Certain gradesheets are currently hidden as there
                                are no <br> corresponding gradesheet pages.</div>
                        </div>

                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input id="showGradesheetNoPages" class="form-check-input" type="checkbox">
                            <span class="form-check-label fw-semibold text-nowrap text-muted"
                                id="showGradesheetNoPagesLabel">
                                Hidden
                            </span>
                        </label>
                    </div>
                </div>

                <div class="card mb-6 mb-xl-9">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            @include('partials.dataTables.search', [
                                'resource' => convertToSnakeCase(__('cruds.gradesheet.title_singular')),
                                'resourceDisplay' => __('cruds.gradesheet.title_singular'),
                            ])
                        </div>
                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end">
                                @can('gradesheet_create')
                                    @include('partials.buttons.create', [
                                        'createRoute' => route('admin.gradesheet.create'),
                                        'resource' => convertToSnakeCase(__('cruds.gradesheet.title_singular')),
                                        'resourceDisplay' => __('cruds.gradesheet.title_singular'),
                                    ])
                                @endcan
                            </div>

                        </div>
                    </div>

                    <div class="card-body py-3">

                        <table id="dataTable" class="table border table-rounded table-row-bordered gy-5 gs-7">
                            <thead>
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th>{{ __('cruds.subject.title_singular') }}
                                        {{ __('cruds.subject.fields.subj_code') }}</th>
                                    <th>{{ __('cruds.subject.title_singular') }}
                                        {{ __('cruds.subject.fields.subj_name') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_section') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_schedule') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_term_id') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_acadYear') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_inst_id') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_total_student') }}</th>
                                    <th>{{ __('cruds.gradesheet.fields.class_total_slots') }}</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>F
    </x-slot:content>

    <x-slot:scripts>
        <script type="text/javascript">
            KTUtil.onDOMContentLoaded((function() {

                initializedTagify(document.querySelector("#filterSubject"), @json($filterSubjects));
                initializedTagify(document.querySelector("#filterRoom"), @json($filterRooms));
                initializedTagify(document.querySelector("#filterSemester"), @json($filterSemesters));
                initializedTagify(document.querySelector("#filterAcadYear"), @json($filterAcadYears));
                initializedTagify(document.querySelector("#filterInstructor"), @json($filterInstructors));

                var filterCreatedAt = initializedFlatpickr("#filterCreatedAt", "range", true);
                var filterUpdatedAt = initializedFlatpickr("#filterUpdatedAt", "range", true);

                initializedNoSlider("#filterTotalStudents");
                initializedNoSlider("#filterTotalSlots");

                const resource = "gradesheet";

                let table = $("#dataTable").DataTable({
                    buttons: $.extend(true, [], $.fn.dataTable.defaults.buttons),
                    serverSide: true,
                    processing: true,
                    retrieve: true,
                    searchDelay: 400,
                    ajax: {
                        url: "{{ route('gradesheets.index') }}",
                        data: {
                            "subject": function() {
                                return $("#filterSubject").val();
                            },
                            "room": function() {
                                return $("#filterRoom").val()
                            },
                            "semester": function() {
                                return $("#filterSemester").val();
                            },
                            "acad_year": function() {
                                return $("#filterAcadYear").val();
                            },
                            "instructor": function() {
                                return $("#filterInstructor").val();
                            },
                            "file_storge_type": function() {
                                return getCheckedValues(".filterFileStorageType");
                            },
                            "total_students": function() {
                                return getNoSliderValue("#filterTotalStudents");
                            },
                            "total_slots": function() {
                                return !$("#filterTotalSlots").is(":hidden") ? getNoSliderValue(
                                    "#filterTotalSlots") : "";
                            },
                            "created_at": function() {
                                return getFlatpickrDates(filterCreatedAt);
                            },
                            "updated_at": function() {
                                return getFlatpickrDates(filterUpdatedAt);
                            }
                        }
                    },
                    columns: [{
                            data: 'subject.subj_code',
                            className: "align-middle"
                        },
                        {
                            data: 'subject.subj_name',
                            className: "align-middle"
                        },
                        {
                            data: 'class_section',
                            className: "align-middle"
                        },
                        {
                            data: 'schedule',
                            searchable: false,
                            orderable: false,
                            className: "align-middle"
                        },
                        {
                            data: 'semester.term_name',
                            searchable: false,
                            className: "align-middle"
                        },
                        {
                            data: 'class_acadYear',
                            searchable: false,
                            className: "align-middle"
                        },
                        {
                            data: 'instructor',
                            searchable: false,
                            orderable: false,
                            className: "align-middle"
                        },
                        {
                            data: 'students_count',
                            searchable: false,
                            className: "align-middle"
                        },
                        {
                            data: 'pages_sum_grdsheetpg_row_no',
                            searchable: false,
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

                        $('[data-bs-toggle="tooltip"]').tooltip();

                        initializedFormSubmitConfirmation(`[${resource}-destroy="true"]`,
                            `-${resource}-destroy`,
                            "delete", "danger", "warning");
                    },
                });

                $(`#${resource}DataTableSearch`).on('keyup', function() {
                    table.search($(this).val()).draw();
                });

                $("#filterApplyBtn").on("click", function() {
                    table.ajax.reload();
                });

                $("#showGradesheetNoPages").on("click", function(e) {

                    if (!$("#filterTotalSlots").is(":hidden")) {
                        $("#filterTotalSlots").parent().prop("hidden", true);
                        $("#showGradesheetNoPagesLabel").text("Showing");
                    } else {
                        $("#filterTotalSlots").parent().prop("hidden", false);
                        $("#showGradesheetNoPagesLabel").text("Hidden");
                    }

                    table.ajax.reload();
                });
            }));
        </script>
    </x-slot:scripts>

</x-default-layout>
