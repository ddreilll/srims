@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.add') }} {{ __('cruds.schoolYear.title_singular') }}
@endsection

@section('settings-page-title')
    {{ __('global.add') }} {{ __('cruds.schoolYear.title_singular') }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.school-years.create') }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>{{ __('global.add') }} {{ __('cruds.schoolYear.title_singular') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <form method="POST" action="{{ route('settings.school-years.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">Year</label>
                    <input type="text" class="form-control {{ $errors->has('syear_year') ? 'is-invalid' : '' }}"
                        placeholder="" name="syear_year" value="{{ old('syear_year', '') }}" required />
                    @if ($errors->has('syear_year'))
                        <span class="text-danger">{{ $errors->first('syear_year') }}</span>
                    @endif
                </div>


                <div class="text-end">
                    <a href="{{ route('settings.school-years.index') }}" class="btn btn-light me-3">Discard</a>
                    <button type="submit" class="btn btn-primary">
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
