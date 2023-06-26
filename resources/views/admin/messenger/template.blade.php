@extends('layouts.fluid')

@section('content')
    {{-- <div class="post d-flex flex-column-fluid">
        <div class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    <p>
                        <a href="{{ route('messenger.createTopic') }}" class="btn btn-primary btn-block">
                            {{ trans('global.new_message') }}
                        </a>
                    </p>
                    <div class="list-group">
                        <a href="{{ route('messenger.index') }}" class="list-group-item">
                            {{ trans('global.all_messages') }}
                        </a>
                        <a href="{{ route('messenger.showInbox') }}" class="list-group-item">
                            @if ($unreads['inbox'] > 0)
                                <strong>
                                    {{ trans('global.inbox') }}
                                    ({{ $unreads['inbox'] }})
                                </strong>
                            @else
                                {{ trans('global.inbox') }}
                            @endif
                        </a>
                        <a href="{{ route('messenger.showOutbox') }}" class="list-group-item">
                            @if ($unreads['outbox'] > 0)
                                <strong>
                                    {{ trans('global.outbox') }}
                                    ({{ $unreads['outbox'] }})
                                </strong>
                            @else
                                {{ trans('global.outbox') }}
                            @endif
                        </a>
                    </div>
                </div>

                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            @yield('messenger-content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row g-7">
            <div class="col-sm-3">
                <div class="card card-flush">
                    <div class="card-header pt-7" id="kt_chat_contacts_header">
                        <div class="card-title">
                            <h2>
                                {{ __('global.messages') }}
                            </h2>
                        </div>
                    </div>

                    <div class="card-body pt-5">
                        <div class="d-flex flex-column gap-5">
                            <div class="d-flex flex-stack">
                                <a href="{{ route('messenger.index') }}"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messenger.index') ? 'text-active-primary active' : '' }}">{{ trans('global.all_messages') }}</a>
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="{{ route('messenger.showInbox') }}"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messenger.showInbox') ? 'text-active-primary active' : '' }}">{{ trans('global.inbox') }}</a>
                                @if ($unreads['inbox'] > 0)
                                    <div class="badge badge-light-primary">{{ $unreads['inbox'] }}</div>
                                @endif
                            </div>
                            <div class="d-flex flex-stack">
                                <a href="{{ route('messenger.showOutbox') }}"
                                    class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messenger.showOutbox') ? 'text-active-primary active' : '' }}">{{ trans('global.outbox') }}</a>
                                @if ($unreads['outbox'] > 0)
                                    <div class="badge badge-light-primary">{{ $unreads['outbox'] }}</div>
                                @endif

                            </div>
                        </div>

                        <div class="separator my-7"></div>

                        <a href="{{ route('messenger.createTopic') }}" class="btn btn-primary w-100">
                            <i class="fa-solid fa-pen me-1"></i> {{ trans('global.new_message') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm-9">
                @yield('messenger-content')
            </div>
        </div>
    </div>

@stop
