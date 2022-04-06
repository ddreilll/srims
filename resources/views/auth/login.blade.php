@extends('layouts.app')
@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative"
                style="background-color: #F2C98A">
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <a href="#" class="py-9 mb-5">
                            <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}" class="h-60px" />
                        </a>
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #986923;">PUP Quezon City Branch</h1>
                        <p class="fw-bold fs-2" style="color: #986923;">Non-SIS Student <br> Record Management System
                        </p>
                    </div>
                    <div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px"
                        style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
                </div>
            </div>
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                            action="{{ route('login') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="text-center mb-10">
                                <h1 class="text-dark mb-3">Sign In</h1>
                            </div>
                            <div class="fv-row mb-10">
                                <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                                <input
                                    class="form-control form-control-lg form-control-solid {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                    required autofocus type="text" name="email" autocomplete="off"
                                    value="{{ old('email', null) }}" />
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                            </div>
                            <div class="fv-row mb-10">
                                <div class="d-flex flex-stack mb-2">
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                                </div>
                                <input
                                    class="form-control form-control-lg form-control-solid {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                    type="password" name="password" required autocomplete="off" />
                                @if ($errors->has('password'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                @endif
                            </div>
                            <div class="text-center">
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">Continue</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
