@extends('admin.messenger.template')

@section('title', trans('global.new_message'))

@section('messenger-content')

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('messenger.reply', [$topic->id]) }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row mb-7">
                            <div class="col-lg-12 form-group">
                                <label for="content" class="control-label form-label">
                                    {{ trans('global.content') }}
                                </label>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                        </div>
                        <p class="text-end">
                            <input type="submit" value="{{ trans('global.reply') }}" class="btn btn-success" />
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
