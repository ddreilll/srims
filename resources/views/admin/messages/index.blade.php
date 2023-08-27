@extends('admin.messages.partials.template')

@section('messages-title', $title)

@section('messages-page-title', $title)

@section('messages-breadcrumbs')

    @if (request()->routeIs('messages.index'))
        {{ Breadcrumbs::render('messages') }}
    @elseif(request()->routeIs('messages.showInbox'))
        {{ Breadcrumbs::render('messages.showInbox') }}
    @elseif(request()->routeIs('messages.showOutbox'))
        {{ Breadcrumbs::render('messages.showOutbox') }}
    @endif
@endsection

@section('messenger-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="list-group">
                @forelse($topics as $topic)
                    <div class="row list-group-item d-flex">
                        <div class="col-lg-4">
                            <p class="my-auto"><a href="{{ route('messages.showMessages', [$topic->id]) }}">
                                    @php($receiverOrCreator = $topic->receiverOrCreator())
                                    @if ($topic->hasUnreads())
                                        <strong>
                                            {{ $receiverOrCreator !== null ? $receiverOrCreator->email : '' }}
                                        </strong>
                                    @else
                                        {{ $receiverOrCreator !== null ? $receiverOrCreator->email : '' }}
                                    @endif
                                </a>
                            </p>
                        </div>
                        <div class="col-lg-5">
                            <a href="{{ route('messages.showMessages', [$topic->id]) }}">
                                @if ($topic->hasUnreads())
                                    <strong>
                                        {{ $topic->subject }}
                                    </strong>
                                @else
                                    {{ $topic->subject }}
                                @endif
                            </a>
                        </div>
                        <div class="col-lg-2 text-right">{{ $topic->created_at->diffForHumans() }}</div>
                        <div class="col-lg-1 text-center">
                            <form action="{{ route('messages.destroyTopic', [$topic->id]) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');">
                                <input type="hidden" name="_method" value="DELETE">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger btn-icon"
                                    value="{{ trans('global.delete') }}"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="row list-group-item text-center">
                        <p class="my-2">{{ trans('global.you_have_no_messages') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
