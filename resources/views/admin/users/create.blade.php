@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="card mb-5 mb-xl-8">

                <div class="card-body">
                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-2 mb-5">
                            <div class="col-sm-6">
                                <div class="fv-row">
                                    <label class="required form-label"
                                        for="name">{{ trans('cruds.user.fields.name') }}</label>
                                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                        type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                                </div>

                            </div>
                            <div class="col-sm-6">
                                <div class="fv-row">
                                    <label class="required form-label"
                                        for="email">{{ trans('cruds.user.fields.email') }}</label>
                                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                        type="email" name="email" id="email" value="{{ old('email', '') }}"
                                        required>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="fv-row mb-5">
                            <label class="required form-label"
                                for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                                name="password" id="password">
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                        </div>

                        <div class="fv-row mb-10">
                            <div class="required form-label" for="roles">{{ trans('cruds.user.fields.roles') }}</div>
                            <select type="text" class="form-select {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                                name="roles[]" id="roles" value="">
                                @foreach ($roles as $id => $role)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>
                                        {{ $role }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('roles'))
                                <span class="text-danger">{{ $errors->first('roles') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>

                        </div>

                        <div class="text-end">
                            <a href="{{ route('users.index') }}" class="btn btn-secondary me-3">
                                {{ trans('global.cancel') }}
                            </a>
                            <button class="btn btn-primary" type="submit">
                                <i class="fa-light fa-floppy-disk me-2"></i> {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
