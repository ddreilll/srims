@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.add') }} {{ __('cruds.course.title_singular') }}
@endsection

@section('settings-page-title')
    {{ __('global.add') }} {{ __('cruds.course.title_singular') }} 
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.courses.create') }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>{{ __('global.add') }} {{ __('cruds.course.title') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <form method="POST" action="{{ route('settings.courses.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row mb-7">
                    <div class="col-sm-3">
                        <div class="fv-row">
                            <label class="required fs-6 fw-bold mb-2">{{ __('cruds.course.fields.cour_code') }}</label>
                            <input type="text" class="form-control {{ $errors->has('cour_code') ? 'is-invalid' : '' }}"
                                placeholder="" name="cour_code" value="{{ old('cour_code', '') }}" required />
                            @if ($errors->has('cour_code'))
                                <span class="text-danger">{{ $errors->first('cour_code') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="fv-row">
                            <label class="required fs-6 fw-bold mb-2">{{ __('cruds.course.fields.cour_name') }}</label>
                            <input type="text" class="form-control {{ $errors->has('cour_name') ? 'is-invalid' : '' }}"
                                placeholder="" name="cour_name" value="{{ old('cour_name', '') }}" required />
                            @if ($errors->has('cour_name'))
                                <span class="text-danger">{{ $errors->first('cour_name') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <a href="{{ route('settings.courses.index') }}"
                        class="btn btn-light me-3">{{ __('global.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">
                        <span>{{ __('global.submit') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
