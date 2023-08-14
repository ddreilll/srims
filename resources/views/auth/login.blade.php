@extends('layouts.app')

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #009ef7">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="#" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}" class="h-60px" />
                        </a>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">

                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">

                        @if (strtoupper(config('app.env')) == 'TEST')
                            <div class="container-fluid mb-9 ">
                                <div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
                                    <div class="d-flex flex-stack flex-grow-1 ">
                                        <div class="fs-6 text-danger fw-semibold"><i
                                                class="fa-solid fa-triangle-exclamation fs-3 me-2 text-danger"></i>
                                            {!! __('panel.test_environment_advisory') !!}</div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (\Session::has('message'))
                            <p class="alert alert-secondary mb-10">
                                {{ \Session::get('message') }}
                            </p>
                        @endif
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}"
                            method="POST">
                            {{ csrf_field() }}

                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">{{ __('global.login') }}</h1>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">{{ __('global.login_email') }}</label>
                                <input
                                    class="form-control form-control-lg  {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    required autofocus type="text" name="email" autocomplete="off"
                                    value="{{ old('email', null) }}" />
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label
                                        class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('global.login_password') }}</label>
                                </div>
                                <input
                                    class="form-control form-control-lg  {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" required autocomplete="off" />
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="mb-8">
                                <label class="form-check">
                                    <input type="checkbox" class="form-check-input" name="remember" />
                                    <span class="form-check-label">{{ trans('global.remember_me') }}</span>
                                </label>
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    {{ __('global.proceed_to', ['attribute' => __('global.login')]) }}
                                </button>
                            </div>

                            <p class="text-center mt-5"> &copy; {{ date('Y') }}
                                <a href="." class="link-dark">{{ config('app.name') }}</a>. <br>
                                {{ __('global.allRightsReserved') }}
                            </p>
                            <p class="text-center">
                                @include('partials.version')
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
