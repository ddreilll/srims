<x-default-layout title="{{ __('Account Settings') }}" pageTitle="{{ __('Account Settings') }}">

    <x-slot:content>
        @can('profile_details_edit')
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('global.update_profile') }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('account.update_password_profile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-7">
                            <label
                                class="col-lg-4 col-form-label required required fs-6 fw-bold">{{ __('cruds.user.fields.name') }}</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    name="name" value="{{ old('name', auth()->user()->name) }}" required />
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label
                                class="col-lg-4 col-form-label required required fs-6 fw-bold">{{ __('cruds.user.fields.email') }}</label>
                            <div class="col-lg-8 fv-row">
                                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                    name="email" value="{{ old('email', auth()->user()->email) }}" required />
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ url('/home') }}" class="btn btn-light me-3">{{ __('global.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">
                                <span>{{ __('global.save_changes') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan

        @can('profile_password_edit')
            <div class="card {{ Gate::check(['profile_details_edit']) ? 'mt-10' : '' }}">
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{ __('global.change_password') }}</h2>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('account.update_password') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-7">
                            <label class="col-lg-4 col-form-label required required fs-6 fw-bold">New
                                {{ __('cruds.user.fields.password') }}</label>
                            <div class="col-lg-8 fv-row">
                                <x-inputs.password name="password" :$errors passwordMeter="true" />
                            </div>
                        </div>

                        <div class="row mb-7">
                            <label class="col-lg-4 col-form-label required required fs-6 fw-bold">Confirm New
                                {{ trans('cruds.user.fields.password') }}</label>
                            <div class="col-lg-8 fv-row">
                                <x-inputs.password name="password_confirmation" :$errors passwordMeter="false" />
                            </div>
                        </div>

                        <div class="text-end">
                            <a href="{{ url('/home') }}" class="btn btn-light me-3">{{ __('global.cancel') }}</a>
                            <button type="submit" class="btn btn-primary">
                                <span>{{ __('global.save_changes') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endcan
    </x-slot:content>

</x-default-layout>
