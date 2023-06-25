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
                                        @include('partials.dataTables.search', [
                                            'resourceDisplay' => __('cruds.document.title_singular'),
                                            'resource' => 'document',
                                        ])
                                    </div>
                                    <div class="card-toolbar">
                                        @include('partials.buttons.create', [
                                            'createRoute' => route('settings.documents.create'),
                                            'resourceDisplay' => __('cruds.document.title_singular'),
                                        ])
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table id="dataTable" class="table border table-rounded table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th>{{ __('cruds.document.fields.docu_name') }}</th>
                                                <th>{{ __('cruds.document.fields.docu_category') }}</th>
                                                <th>{{ __('cruds.document.fields.docu_types') }}</th>
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

            const resource = 'document';

            let table = $("#dataTable").DataTable({
                buttons: $.extend(true, [], $.fn.dataTable.defaults.buttons),
                serverSide: true,
                processing: true,
                retrieve: true,
                searchDelay: 400,
                ajax: {
                    url: "{{ route('settings.documents.index') }}"
                },
                columns: [{
                        data: 'docu_name',
                        className: "align-middle"
                    },
                    {
                        data: 'docu_category',
                        className: "align-middle"
                    },
                    {
                        data: 'docu_types',
                        className: "align-middle",
                        searchable: false,
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
