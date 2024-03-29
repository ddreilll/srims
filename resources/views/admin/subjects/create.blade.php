@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.add') }} {{ __('cruds.subject.title_singular') }}
@endsection

@section('settings-page-title')
    {{ __('global.add') }} {{ __('cruds.subject.title_singular') }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.subjects.create') }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>{{ __('global.add') }} {{ __('cruds.subject.title_singular') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <form method="POST" action="{{ route('settings.subjects.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">{{ __('cruds.subject.fields.subj_code') }}</label>
                    <input type="text" class="form-control {{ $errors->has('subj_code') ? 'is-invalid' : '' }}"
                        placeholder="" name="subj_code" value="{{ old('subj_code', '') }}" required />
                    @if ($errors->has('subj_code'))
                        <span class="text-danger">{{ $errors->first('subj_code') }}</span>
                    @endif
                </div>
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">{{ __('cruds.subject.fields.subj_name') }}</label>
                    <input type="text" class="form-control {{ $errors->has('subj_name') ? 'is-invalid' : '' }}"
                        placeholder="" name="subj_name" value="{{ old('subj_name', '') }}" required />
                    @if ($errors->has('subj_name'))
                        <span class="text-danger">{{ $errors->first('subj_name') }}</span>
                    @endif
                </div>
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">{{ __('cruds.subject.fields.subj_units') }}</label>
                    <input type="text" class="form-control {{ $errors->has('subj_units') ? 'is-invalid' : '' }}"
                        placeholder="" name="subj_units" value="{{ old('subj_units', '') }}" required />
                    @if ($errors->has('subj_units'))
                        <span class="text-danger">{{ $errors->first('subj_units') }}</span>
                    @endif
                </div>

                <div class="text-end">
                    <a href="{{ route('settings.subjects.index') }}"
                        class="btn btn-light me-3">{{ __('global.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">
                        <span>{{ __('global.submit') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
