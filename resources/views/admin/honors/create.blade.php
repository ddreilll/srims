@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    @include('admin._partials.settings.menu')
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active" role="tabpanel">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>{{ __('global.add') }} {{ __('cruds.honor.title_singular') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <form method="POST" action="{{ route('settings.honors.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="fv-row mb-7">
                                            <label
                                                class="required fs-6 fw-bold mb-2">{{ __('cruds.honor.fields.honor_name') }}</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('honor_name') ? 'is-invalid' : '' }}"
                                                placeholder="" name="honor_name" value="{{ old('honor_name', '') }}"
                                                required />
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
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection