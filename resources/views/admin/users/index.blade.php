@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                        <div class="card-body">
                            <i class="fa-duotone fa-circle-user text-gray-100 fs-2x ms-n1"></i>
                            <div class="text-gray-100 fw-bold fs-2 mb-2 mt-5">{{ $onlineUsers }}</div>
                            <div class="fw-semibold text-gray-100">Online {{ pluralized('user', $onlineUsers) }}</div>
                        </div>
                    </a>

                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <div class="card-header align-items-center border-0 mt-4">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="fw-bold text-dark">Two-Factor Authentication</span>
                                <span class="text-muted mt-1 fw-semibold fs-7">Extra layer, heightened security.</span>
                            </h3>
                        </div>
                        <div class="card-body pt-3">
                            <a href="#" class="btn btn-danger">
                                <i class="fa-duotone fa-lock-keyhole-open me-2"></i>
                                Unsecured
                            </a>
                        </div>
                    </div>

                    <div class="card card-xl-stretch mb-5 mb-xl-8">

                        <div class="card-body">
                            <div class="d-flex">
                                <span class="d-flex align-items-center bg-light-dark rounded p-4 me-3">
                                    <i class="fa-duotone fa-envelope-circle-check fs-1"></i>
                                </span>
                                <div class="d-flex flex-row-fluid align-items-center flex-wrap my-lg-0 me-2">
                                    <div class="flex-grow-1 my-lg-0 my-2 me-2">
                                        <a href="#" class="text-gray-800 fw-bold text-hover-primary fs-6">Email
                                            verification</a>
                                        <span class="text-muted fw-bold d-block pt-1">Enhanced security and <br>
                                            trust.</span>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <a href="#" class="btn btn-icon btn-danger btn-sm border-0">
                                            <i class="fa-solid fa-xmark fs-2"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-xl-stretch">
                        <div class="card-header pt-7 pb-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-gray-800">User's Logs</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-7">as of {{ formatDatetime(now()) }}</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="#" class="btn btn-sm btn-light">Show More</a>
                            </div>
                        </div>
                        <div class="card-body pt-5">
                            @foreach ($activityLogs as $key => $activityLog)
                                @if ($key >= 1)
                                    <div class="separator separator-dashed my-4"></div>
                                @endif
                                <div class="d-flex flex-stack">
                                    <div class="d-flex align-items-center me-1">
                                        <div class="flex-grow-1">
                                            <span
                                                class="text-gray-800 fw-semibold d-block fs-7">{{ $activityLog->description }}</span>
                                        </div>
                                    </div>
                                    <span
                                        class="text-gray-800 fw-bold fs-7">{{ formatDatetime($activityLog->created_at) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0 pt-6">
                                    <div class="card-title">
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                        height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                        fill="black" />
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

                                            <a href="{{ route('users.create') }}" class="btn btn-primary">Add User
                                                Account</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body py-3">
                                    <table id="dataTable" class="table table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Status</th>
                                                <th>Last seen</th>
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
                        data: 'is_active',
                        searchable: false,
                    },
                    {
                        data: 'last_seen',
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

                    initializedFormSubmitConfirmation(`[user-destroy="true"]`, "-user-destroy", "delete", "danger", "warning");
                    initializedFormSubmitConfirmation(`[user-update-status="true"]`, "-user-update-status", "update", "warning", "warning");
                }
            });

            $('#dataTableSearch').on('keyup', function() {
                table.search($(this).val()).draw();
            });
        }));
    </script>
@endsection
