@extends('layouts.app-2')

@section('title')
    <title>{{ __('Verify Your Email Address') }}</title>
@endsection

@section('content')
    <div class="card card-md">

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

            <h2 class="card-title text-center mb-20">{{ __('Verify Your Email Address') }}</h2>

            {{ __('Before proceeding, please check your email for a verification link.') }}

            <p class="text-muted my-10">{{ __('global.two_factor.sent_to', ['email' => maskEmail(Auth::user()->email)]) }}
            </p>

            <div class="form-footer">

                <form method="POST" action="{{ route('verification.resend') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary w-100">
                        {{ __('Not received? Request another') }}
                    </button>.
                </form>
            </div>
        </div>
    </div>

    <div class="text-center text-muted mt-3">
        Forget it, <a class="text-primary" onclick="event.preventDefault(); document.getElementById('logoutform').submit();"
            href="#">send me back</a> to the log in screen.
    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
@endsection
