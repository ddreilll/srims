<x-default-layout>

    <x-slot:title>
        @yield('messages-title')
    </x-slot:title>

    <x-slot:pageTitle>
        @yield('messages-page-title')
    </x-slot:pageTitle>

    <x-slot:breadcrumbs>
        @yield('messages-breadcrumbs')
    </x-slot:breadcrumbs>

    <x-slot:content>
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
                                    <a href="{{ route('messages.index') }}"
                                        class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messages.index') ? 'text-active-primary active' : '' }}">{{ trans('global.all_messages') }}</a>
                                </div>
                                <div class="d-flex flex-stack">
                                    <a href="{{ route('messages.showInbox') }}"
                                        class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messages.showInbox') ? 'text-active-primary active' : '' }}">{{ trans('global.inbox') }}</a>
                                    @if ($unreads['inbox'] > 0)
                                        <div class="badge badge-light-primary">{{ $unreads['inbox'] }}</div>
                                    @endif
                                </div>
                                <div class="d-flex flex-stack">
                                    <a href="{{ route('messages.showOutbox') }}"
                                        class="fs-6 fw-bold text-gray-800 text-hover-primary {{ request()->routeIs('messages.showOutbox') ? 'text-active-primary active' : '' }}">{{ trans('global.outbox') }}</a>
                                    @if ($unreads['outbox'] > 0)
                                        <div class="badge badge-light-primary">{{ $unreads['outbox'] }}</div>
                                    @endif

                                </div>
                            </div>

                            <div class="separator my-7"></div>

                            <a href="{{ route('messages.createTopic') }}" class="btn btn-primary w-100">
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
    </x-slot:content>

</x-default-layout>
