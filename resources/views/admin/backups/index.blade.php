@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.list_of', ['attribute' => __('Backups')]) }}
@endsection

@section('settings-page-title')
    {{ __('global.list_of', ['attribute' => __('Backups')]) }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.backups') }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <i class="fa-solid fa-hourglass-clock me-2"></i> {{ __('Automated Database Backup') }}
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <table id="dataTable" class="table border table-rounded table-row-bordered gy-5 gs-7">
                <thead>
                    <tr class="fw-bolder fs-6 text-gray-800 px-7">
                        <th>{{ __('Backup date') }}</th>
                        <th>{{ __('File Name') }}</th>
                        <th>{{ __('Size') }}</th>
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

            const resource = 'backup';

            let table = $("#dataTable").DataTable({
                buttons: $.extend(true, [], $.fn.dataTable.defaults.buttons),
                serverSide: true,
                processing: true,
                retrieve: true,
                searchDelay: 400,
                ajax: {
                    url: "{{ route('settings.backups.index') }}"
                },
                columns: [{
                        data: 'last_modified',
                        className: "align-middle",
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'file_name',
                        className: "align-middle",
                        searchable: false,
                        orderable: false,
                    },
                    {
                        data: 'file_size',
                        className: "align-middle",
                        searchable: false,
                        orderable: false,
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
        }));
    </script>
@endsection
