@extends('admin.messenger.template')

@section('title', trans('global.new_message'))

@section('messenger-content')
    <div class="row">
        <div class="col-md-12">
            <form action="{{ route('messenger.storeTopic') }}" method="POST">
                @csrf
                <div class="card card-default">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-12 form-group mb-7">
                                <label for="recipient" class="control-label form-label">
                                    {{ trans('global.recipient') }}
                                </label>
                                <select name="recipient" class="form-control">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->email }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-lg-12 form-group mb-7">
                                <label for="subject" class="control-label form-label">
                                    {{ trans('global.subject') }}
                                </label>
                                <input type="text" name="subject" class="form-control" />
                            </div>

                            <div class="col-lg-12 form-group mb-7">
                                <label for="content" class="control-label form-label">
                                    {{ trans('global.content') }}
                                </label>
                                <textarea name="content" class="form-control"></textarea>
                            </div>
                        </div>
                        <p class="text-end">
                            <input type="submit" value="{{ trans('global.submit') }}" class="btn btn-success" />
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
