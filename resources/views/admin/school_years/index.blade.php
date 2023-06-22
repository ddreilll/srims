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

                        <div class="tab-pane fade show active"  role="tabpanel">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>School Years</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="{{ route('settings.school-years.create') }}"
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
                                            Add School Year
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table id="kt_honor_table"
                                        class="table border table-rounded table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                                <th>Year</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($schoolYears as $schoolYear)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ $schoolYear->syear_year }}
                                                    </td>
                                                    <td>
                                                        <div class="d-flex justify-content-end flex-shrink-0">
                                                            <form
                                                                action="{{ route('settings.school-years.destroy', $schoolYear->syear_id) }}"
                                                                method="POST" id="{{ $schoolYear->syear_id }}-destroy">
                                                                @method('DELETE')
                                                                @csrf
                                                                <a href="#"
                                                                    class="btn btn-icon btn-light-danger btn-active-danger btn-sm deleteBtn"
                                                                    data-id="{{ $schoolYear->syear_id }}">
                                                                    <span class="svg-icon">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </span>
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="2" class="align-middle text-center">
                                                        No available entries
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {!! $schoolYears->links() !!}
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

            $(".deleteBtn").on("click", function() {

                var schoolYearId = $(this).attr("data-id");

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
                        $(`form#${schoolYearId}-destroy`).submit();
                    }
                });
            });
        }));
    </script>
@endsection
