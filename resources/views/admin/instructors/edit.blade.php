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
                                        <h2>{{ __('global.edit') }} {{ __('cruds.instructor.title_singular') }}</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <form method="POST"
                                        action="{{ route('settings.instructors.update', $instructor->inst_id) }}"
                                        enctype="multipart/form-data">
                                        @method('PUT')
                                        @csrf

                                        <div class="fv-row mb-7">
                                            <label
                                                class="required fs-6 fw-bold mb-2">{{ __('cruds.instructor.fields.inst_empNo') }}</label>
                                            <input type="text"
                                                class="form-control {{ $errors->has('inst_empNo') ? 'is-invalid' : '' }}"
                                                placeholder="" name="inst_empNo"
                                                value="{{ old('inst_empNo', $instructor->inst_empNo) }}" required />
                                            @if ($errors->has('inst_empNo'))
                                                <span class="text-danger">{{ $errors->first('inst_empNo') }}</span>
                                            @endif
                                        </div>

                                        <div class="row mb-7">
                                            <div class="col-sm-4">
                                                <div class="fv-row">
                                                    <label
                                                        class="required fs-6 fw-bold mb-2">{{ __('cruds.instructor.fields.inst_firstName') }}</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('inst_firstName') ? 'is-invalid' : '' }}"
                                                        placeholder="" name="inst_firstName"
                                                        value="{{ old('inst_firstName', $instructor->inst_firstName) }}"
                                                        required />
                                                    @if ($errors->has('inst_firstName'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('inst_firstName') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="fv-row">
                                                    <label
                                                        class="fs-6 fw-bold mb-2">{{ __('cruds.instructor.fields.inst_middleName') }}</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('inst_middleName') ? 'is-invalid' : '' }}"
                                                        placeholder="" name="inst_middleName"
                                                        value="{{ old('inst_middleName', $instructor->inst_middleName) }}" />
                                                    @if ($errors->has('inst_middleName'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('inst_middleName') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="fv-row">
                                                    <label
                                                        class="required fs-6 fw-bold mb-2">{{ __('cruds.instructor.fields.inst_lastName') }}</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('inst_lastName') ? 'is-invalid' : '' }}"
                                                        placeholder="" name="inst_lastName"
                                                        value="{{ old('inst_lastName', $instructor->inst_lastName) }}"
                                                        required />
                                                    @if ($errors->has('inst_lastName'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('inst_lastName') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <a href="{{ route('settings.instructors.index') }}"
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
