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
                        <div class="tab-pane fade show active" role="tabpanel">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2><a href="{{ route('settings.documents.index') }}"
                                                class="btn btn-light me-1 btn-sm">
                                                <i class="fa-solid fa-arrow-left"></i></a>
                                            {{ __('global.show') }} {{ __('cruds.document.title') }}</h2>
                                    </div>
                                    <div class="card-toolbar">

                                        @include('partials.buttons.edit', [
                                            'editRoute' => route('settings.documents.edit', $document->docu_id),
                                            'resourceDisplay' => __('cruds.document.title_singular'),
                                        ])
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <div class="d-flex align-items-center bg-light-dark rounded p-5">
                                        <i class="fa-duotone fa-file-invoice me-5 fs-1"></i>
                                        <div>
                                            <p class="fw-bold text-gray-800 fs-6 mb-0">{{ $document->docu_name }}</p>
                                            <span
                                                class="text-muted fw-semibold d-block">{{ $document->docu_description }}</span>
                                        </div>
                                    </div>
                                    <div class="card card-flush h-lg-50 mb-10">

                                        <div class="card-header p-0">
                                            <h3 class="card-title text-gray-800">{{ __('cruds.documentType.title') }}</h3>
                                        </div>
                                        <div class="card-body p-0">
                                            @forelse ($document->types as $key => $type)
                                                @if ($key >= 1)
                                                    <div class="separator separator-dashed my-3"></div>
                                                @endif

                                                <div class="text-gray-700 fw-semibold fs-7"> <span
                                                        class="me-1">{{ $key + 1 }}.</span>
                                                    {{ $type->docuType_name }}</div>
                                            @empty
                                                <div class="text-gray-700 fw-semibold fs-7">
                                                    {{ __('global.no_available', ['attribute' => __('cruds.documentType.title')]) }}
                                                </div>
                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
