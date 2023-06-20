<a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end">Actions
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
    <span class="svg-icon svg-icon-5 m-0">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                fill="currentColor" />
        </svg>
    </span>
</a>
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
    data-kt-menu="true">
    <div class="menu-item px-3">
        <a href="{{ route('users.show', $row->id) }}" class="menu-link px-3">View</a>
    </div>
    <div class="menu-item px-3 ">
        <a href="{{ route('users.edit', $row->id) }}" class="menu-link px-3">Edit</a>
    </div>
    <div class="separator my-3 opacity-75"></div>
    <div class="menu-item px-3">

        <form action="{{ route('users.destroy', $row->id) }}" method="POST"
            id="{{ $row->id }}-destroy">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <a href="#" class="menu-link px-3 menu-hover-warning deleteBtn" data-id="{{ $row->id }}">
                <span class="menu-icon">
                    <i class="fa-duotone fa-trash fs-5"></i>
                </span>
                <span class="menu-title">Delete</span>
            </a>
        </form>
    </div>
</div>
