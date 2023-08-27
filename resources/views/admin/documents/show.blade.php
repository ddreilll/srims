@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.view') }} {{ __('cruds.document.title_singular') }}
@endsection

@section('settings-page-title')
    {{ __('global.view') }} {{ __('cruds.document.title_singular') }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.documents.show', $document) }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header">
            <div class="card-title">
                <h2>{{ __('global.view') }} {{ __('cruds.document.title_singular') }}</h2>
            </div>
            <div class="card-toolbar">

                @include('partials.buttons.edit', [
                    'editRoute' => route('settings.documents.edit', $document->docu_id),
                    'resourceDisplay' => __('cruds.document.title_singular'),
                ])
            </div>
        </div>
        <div class="card-body pb-5">
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold mb-2">{{ __('cruds.document.fields.docu_name') }}</label>
                <input type="text" class="form-control" value="{{ $document->docu_name }}" readonly />
            </div>

            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold mb-2">{{ __('cruds.document.fields.docu_description') }}</label>
                <input type="text" class="form-control" value="{{ $document->docu_description }}" readonly />
            </div>

            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold mb-2">{{ __('cruds.document.fields.docu_category') }}</label>
                <input type="text" class="form-control"
                    value="{{ (new App\Enums\DocumentCategoriesEnum())->getDisplayNames()[$document->docu_category] }}"
                    readonly />
            </div>

            <div id="typesList" class="card card-flush h-lg-50 mb-7">

                <div class="card-header p-0">
                    <h3 class="card-title text-gray-800">{{ __('cruds.documentType.title') }}
                    </h3>
                </div>
                <div class="card-body p-0">
                    @if (sizeOf($document['types']) >= 1)
                        @foreach ($document['types'] as $key => $type)
                            <input type="text" class="form-control {{ $key >= 1 ? 'mt-4' : '' }}"
                                value="{{ $type['docuType_name'] }}" readonly />
                        @endforeach
                    @else
                        <div class="row mt-4">
                            <div class="text-center text-gray-700 fw-semibold fs-7">
                                {{ __('global.no_added', ['attribute' => __('cruds.documentType.title')]) }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
