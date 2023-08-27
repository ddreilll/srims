@extends('admin.settings.partials.template')

@section('settings-title')
    {{ __('global.edit') }} {{ __('cruds.honor.title_singular') }}
@endsection

@section('settings-page-title')
    {{ __('global.edit') }} {{ __('cruds.honor.title_singular') }}
@endsection

@section('settings-breadcrumbs')
    {{ Breadcrumbs::render('settings.honors.edit', $honor) }}
@endsection

@section('settings-content')
    <div class="card mb-6 mb-xl-9">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>{{ __('global.edit') }} {{ __('cruds.honor.title_singular') }}</h2>
            </div>
        </div>
        <div class="card-body pt-0 pb-5">
            <form method="POST" action="{{ route('settings.honors.update', [$honor->honor_id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="fv-row mb-7">
                    <label class="required fs-6 fw-bold mb-2">{{ __('cruds.honor.fields.honor_name') }}</label>
                    <input type="text" class="form-control {{ $errors->has('honor_name') ? 'is-invalid' : '' }}"
                        placeholder="" name="honor_name" value="{{ old('honor_name', $honor->honor_name) }}" required />
                    @if ($errors->has('honor_name'))
                        <span class="text-danger">{{ $errors->first('honor_name') }}</span>
                    @endif
                </div>

                <div class="text-end">
                    <a href="{{ route('settings.honors.index') }}"
                        class="btn btn-light me-3">{{ __('global.cancel') }}</a>
                    <button type="submit" class="btn btn-primary">
                        <span>{{ __('global.submit') }}</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
