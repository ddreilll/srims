@extends('layout.master')

@section('title')
    <title>{{ $title ? $title . ' | ' . config('app.name_short') : config('app.name_short') }}</title>
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">

        <style>
            body {
                background-image: url('{{ asset('/assets/media/auth/background.jpeg') }}');
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>

        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-lg-row-fluid">
                <div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
                    <img class="mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20 text-dark"
                        src="{{ asset('/assets/media/logo/logo_main_color.svg') }}" alt="" />
                    <h1 class="text-gray-800 fs-2qx fw-bold text-center mb-3">Streamline. Retrieve. Excel.</h1>
                    <div class="text-gray-600 fs-3 text-center fw-semibold">Your Student Journey, Digitally Empowered
                    </div>
                </div>
            </div>
            <div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
                <div class="bg-body d-flex flex-column flex-center rounded-4 w-md-600px p-10">
                    <div class="d-flex flex-center flex-column align-items-stretch h-lg-100 w-md-400px">
                        <div class="d-flex flex-center flex-column flex-column-fluid pb-15 pb-lg-20">

                            @if (strtoupper(config('app.env')) == 'TEST')
                                <div
                                    class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6 mb-10">
                                    <div class="d-flex flex-stack flex-grow-1 ">
                                        <div class="fs-6 text-danger fw-semibold"><i
                                                class="fa-solid fa-triangle-exclamation fs-3 me-2 text-danger"></i>
                                            {!! __('panel.test_environment_advisory') !!}</div>
                                    </div>
                                </div>
                            @endif

                            @if (session()->has('message') || session()->has('status'))
                                <x-alerts.message class="w-100">
                                    <x-slot:message>
                                        {!! session()->has('message') ? session()->get('message') : session()->get('status') !!}
                                    </x-slot:message>
                                </x-alerts.message>
                            @endif

                            {{ $content }}

                        </div>
                        <div class="d-flex flex-stack">
                            @include('partials.version')

                            <div class="d-flex fw-semibold text-primary fs-base gap-5">
                                <a href="#" target="_blank">Terms</a>
                                <a href="#" target="_blank">About</a>
                                <a href="{{ config('app.version_changelog_link') }}" target="_blank">Changelogs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@isset($scripts)
    @push('scripts')
        {{ $scripts }}
    @endpush
@endisset
