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
                        <span class="text-gray-800 fw-semibold d-block fs-7">{{ $activityLog->description }}</span>
                    </div>
                </div>
                <span class="text-gray-800 fw-bold fs-7">{{ formatDatetime($activityLog->created_at) }}</span>
            </div>
        @endforeach
    </div>
</div>
