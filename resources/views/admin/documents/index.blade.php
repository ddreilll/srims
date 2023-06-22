@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div id="kt_content_container" class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    @include('partials.settings-menu')
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ __('cruds.document.title') }}</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="{{ route('settings.documents.create') }}"
                                            class="btn btn-sm btn-flex btn-light-primary">
                                            <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.3" x="2" y="2" width="20"
                                                        height="20" rx="5" fill="black" />
                                                    <rect x="10.8891" y="17.8033" width="12" height="2"
                                                        rx="1" transform="rotate(-90 10.8891 17.8033)"
                                                        fill="black" />
                                                    <rect x="6.01041" y="10.9247" width="12" height="2"
                                                        rx="1" fill="black" />
                                                </svg>
                                            </span>
                                            {{ __('global.add') }} {{ __('cruds.document.title') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table id="kt_honor_table"
                                        class="table border table-rounded table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                                <th>{{ __('cruds.document.fields.docu_name') }}</th>
                                                <th>{{ __('cruds.document.fields.docu_category') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($documents as $document)
                                                <tr>
                                                    <td class="align-middle">
                                                        <p class="font-weight-bold mb-0">{{ $document->docu_name }}</p>
                                                        @if ($document->docu_description)
                                                            <p class="mt-1 mb-0">{{ $document->docu_description }}</p>
                                                        @endif
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $document->docu_category }}
                                                    </td>
                                                    <td>
                                                        @include('admin._partials.tableActions', [
                                                            'viewGate' => true,
                                                            'editGate' => !$document->isPermanent,
                                                            'deleteGate' => !$document->isPermanent,
                                                            'row' => $document,
                                                            'crudRoutePart' => 'documents',
                                                            'primaryKey' => 'docu_id',
                                                        ])
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="align-middle text-center">
                                                        {{ __('global.no_entries_in_table') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {!! $documents->links() !!}

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

            $(`[documents-component="deleteBtn"]`).on("click", function() {

                var documentId = $(this).attr("data-id");

                Swal.fire({
                    text: "{{ __('modal.confirmation', ['action' => 'delete']) }}",
                    icon: 'warning',
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "{{ __('modal.confirm_btn', ['action' => 'delete']) }}",
                    cancelButtonText: "{{ __('modal.cancel_btn') }}",
                    customClass: {
                        confirmButton: 'btn btn-danger',
                        cancelButton: 'btn btn-active-light',
                    },
                }).then(function(t) {
                    if (t.value) {
                        $(`form#${documentId}-destroy`).submit();
                    }
                });
            });
        }));
    </script>
@endsection
