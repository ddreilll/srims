@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-6">
                    <div class="card-title">
                        <div class="d-flex align-items-center position-relative my-1">
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <input type="text" id="dataTableSearch" class="form-control  w-250px ps-15"
                                placeholder="Search User Account" />
                        </div>
                    </div>
                    <div class="card-toolbar">
                        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">

                            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User Account</a>
                        </div>
                    </div>
                </div>

                <div class="card-body py-3">
                    <table id="dataTable" class="table table-row-bordered gy-5 gs-7">
                        <thead>
                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        KTUtil.onDOMContentLoaded((function() {

            var table = $("#dataTable").DataTable({
                processing: true,
                responsive: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('users.index') }}",
                },
                columns: [{
                        data: 'name'
                    },
                    {
                        data: 'email'
                    },
                    {
                        data: 'role',
                        searchable: false,
                        orderable: false
                    },
                    {
                        data: 'created_at',
                        searchable: false,
                    },
                    {
                        data: 'updated_at',
                        searchable: false,
                    },
                    {
                        data: 'actions',
                        searchable: false,
                        orderable: false,
                        className: "text-end"
                    },
                ],
                drawCallback: function(settings, json) {
                    KTMenu.createInstances();

                    $(".deleteBtn").on("click", function() {

                        var userId = $(this).attr("data-id");

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
                                $(`form#${userId}-destroy`).submit();
                            }
                        });
                    });
                }
            });

            $('#dataTableSearch').on('keyup', function() {
                table.search($(this).val()).draw();
            });

        }));
    </script>
@endsection
