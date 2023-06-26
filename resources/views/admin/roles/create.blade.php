@extends('layouts.admin')

@section('header')
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col text-center text-md-start">
                    <div class="page-pretitle">
                        {{ __('cruds.userAccessManagement.title_singular') }}
                    </div>
                    <h2 class="page-title d-inline">
                        {{ __('global.add') }} {{ __('cruds.user.title_singular') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="title">{{ trans('cruds.role.fields.title') }}</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text"
                        name="title" id="title" value="{{ old('title', '') }}" required>
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.title_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all"
                            style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all"
                            style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('permissions') ? 'is-invalid' : '' }}"
                        name="permissions[]" id="permissions" multiple required>
                        @foreach ($permissions as $id => $permission)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('permissions', [])) ? 'selected' : '' }}>{{ $permission }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('permissions'))
                        <span class="text-danger">{{ $errors->first('permissions') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.role.fields.permissions_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">

        <div class="card-body">
            <form method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label class="required form-label" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                        name="name" id="name" value="{{ old('name', $user->name) }}" required>
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>

                <div class="form-group mb-3">
                    <label class="required form-label" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                        name="email" id="email" value="{{ old('email', $user->email) }}" required>
                    @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group mb-3">
                    <label class="required form-label" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password"
                        name="password" id="password">
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>

                <div class="form-group mb-3">
                    <div class="required form-label" for="roles">{{ trans('cruds.user.fields.roles') }}</div>
                    <select type="text" class="form-select {{ $errors->has('roles') ? 'is-invalid' : '' }}"
                        name="roles[]" id="roles" value="" multiple>
                        @foreach ($roles as $id => $role)
                            <option value="{{ $id }}"
                                {{ in_array($id, old('roles', [])) || $user->roles->contains($id) ? 'selected' : '' }}>
                                {{ $role }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('roles'))
                        <span class="text-danger">{{ $errors->first('roles') }}</span>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>

                </div>

                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                        {{ trans('global.cancel') }}
                    </a>
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-light fa-floppy-disk me-2"></i> {{ trans('global.save') }}
                        {{ trans('global.changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    @parent

    <script>
        $(function() {
            var el;

            window.TomSelect && (new TomSelect(el = document.getElementById('roles'), {
                copyClassesToDropdown: false,
                dropdownParent: 'body',
                controlInput: '<input>',
                render: {
                    item: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                    option: function(data, escape) {
                        if (data.customProperties) {
                            return '<div><span class="dropdown-item-indicator">' + data
                                .customProperties + '</span>' + escape(data.text) + '</div>';
                        }
                        return '<div>' + escape(data.text) + '</div>';
                    },
                },
            }));
        });
        // @formatter:on
    </script>
@endsection
