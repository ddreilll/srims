@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-xxl">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    @include('admin._partials.settings.menu')
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active">
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ __('cruds.instructor.title') }}</h2>
                                    </div>
                                    <div class="card-toolbar">
                                        <a href="{{ route('settings.instructors.create') }}"
                                            class="btn btn-sm btn-light-primary">
                                            <i class="fa-solid fa-plus me-2"></i>
                                            {{ __('global.add') }} {{ __('cruds.instructor.title') }}
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table id="kt_honor_table"
                                        class="table border table-rounded table-row-bordered gy-5 gs-7">
                                        <thead>
                                            <tr class="fw-bolder fs-6 text-gray-800 px-7">
                                                <th>{{ __('cruds.instructor.fields.inst_empNo') }}</th>
                                                <th>{{ __('cruds.instructor.fields.full_name') }}</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($instructors as $instructor)
                                                <tr>
                                                    <td class="align-middle">
                                                        {{ $instructor->inst_empNo }}
                                                    </td>
                                                    <td class="align-middle">
                                                        {{ $instructor->fullname }}
                                                    </td>
                                                    <td class="align-middle">
                                                        @include('admin._partials.tableActions', [
                                                            'viewGate' => false,
                                                            'editGate' => true,
                                                            'deleteGate' => true,
                                                            'row' => $instructor,
                                                            'crudRoutePart' => 'instructors',
                                                            'primaryKey' => 'inst_id',
                                                        ])
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="3" class="align-middle text-center">
                                                        {{ __('global.no_entries_in_table') }}
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>

                                    {!! $instructors->links() !!}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
