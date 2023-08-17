@extends('layout.master')

@section('title')
    <title>{{ $title ? $title . ' | ' . config('app.name_short') : config('app.name_short') }}</title>
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">
        <div class="d-flex flex-column flex-center flex-column-fluid">
            <div class="d-flex flex-column flex-center text-center p-10">

                <a href="#" class="mb-10 pt-lg-10">
                    <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main_color.svg') }}" class="h-80px mb-5" />
                </a>

                {{ $content }}

            </div>
        </div>
    </div>
@endsection


@isset($scripts)
    @push('scripts')
        {{ $scripts }}
    @endpush
@endisset