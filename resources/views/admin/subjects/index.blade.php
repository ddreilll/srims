@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.list_of', ['attribute' => __('cruds.subject.title')]) }}
@endsection

@section('settings-page-title')
    {{ __('global.list_of', ['attribute' => __('cruds.subject.title')]) }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.subjects') }}
@endsection

@section('settings-content')
    <div class="card pt-4 mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                @include('partials.dataTables.search', [
                    'resourceDisplay' => __('cruds.subject.title_singular'),
                    'resource' => 'subject',
                ])
            </div>
            <div class="card-toolbar">
                @include('partials.buttons.create', [
                    'createRoute' => route('settings.subjects.create'),
                    'resourceDisplay' => __('cruds.subject.title_singular'),
                ])
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="dataTable" class="table border table-rounded table-row-bordered gy-5 gs-7">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>{{ __('cruds.subject.fields.subj_code') }}</th>
                        <th>{{ __('cruds.subject.fields.subj_name') }}</th>
                        <th>{{ __('cruds.subject.fields.subj_units') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('settings-scripts')
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            const resource = 'subject';

            let table = $("#dataTable").DataTable({
                buttons: $.extend(true, [], $.fn.dataTable.defaults.buttons),
                serverSide: true,
                processing: true,
                retrieve: true,
                searchDelay: 400,
                ajax: {
                    url: "{{ route('settings.subjects.index') }}"
                },
                columns: [{
                        data: 'subj_code',
                        className: "align-middle"
                    },
                    {
                        data: 'subj_name',
                        className: "align-middle"
                    },
                    {
                        data: 'subj_units',
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
                        "delete", "danger", "warning");
                }
            });

            $(`#${resource}DataTableSearch`).on('keyup', function() {
                table.search($(this).val()).draw();
            });
        }));
    </script>
@endsection
