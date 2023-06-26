@extends('layouts.app-2')

@section('title')
    <title>{{ __('global.two_factor.title') }}</title>
@endsection


@section('content')
    <form class="card card-md" method="POST" action="{{ route('twoFactor.check') }}" autocomplete="off" novalidate>
        @csrf

        <div class="card-body bg-primary text-white py-15">

            <div class="text-center">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="{{ asset('/assets/media/logo/logo_white.png') }}"
                        height="30" alt=""></a>
            </div>
        </div>

        <div class="card-body">
            @if (session()->has('message'))
                <p class="alert alert-dark mb-10">
                    {{ session()->get('message') }}
                </p>
            @endif

            <h2 class="card-title text-center mb-20">{{ __('global.two_factor.title') }}</h2>
            <p class="text-muted mb-4">{{ __('global.two_factor.sub_title', ['minutes' => 15]) }}</p>

            <p class="text-muted mb-10">{{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}
            </p>

            <div class="mb-10">
                <label class="form-label">{{ trans('global.two_factor.code') }}</label>
                <input name="two_factor_code" type="text"
                    class="form-control{{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus>
                @if ($errors->has('two_factor_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('two_factor_code') }}
                    </div>
                @endif
            </div>
            <div class="form-footer">

                <button type="submit" class="btn btn-primary w-100">
                    {{ __('global.two_factor.verify') }}
                </button>

                <a href="{{ route('twoFactor.resend') }}" class="btn btn-secondary w-100 mt-2">
                    <i class="fa-solid fa-envelope me-1"></i>
                    {{ __('global.two_factor.resend') }}
                </a>
            </div>
        </div>
    </form>

    <div class="text-center text-muted mt-3">
        Forget it, <a class="text-primary" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
            href="#">send me back</a> to the log in screen.
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
