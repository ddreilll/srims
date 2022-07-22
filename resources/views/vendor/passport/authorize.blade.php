@extends('layouts.app')

@section('title')
    <title>Authorization</title>
@endsection

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Signup Welcome Message -->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Content-->
            <div class="d-flex flex-column flex-column-fluid text-center p-10 py-lg-15">
                <!--begin::Logo-->
                <a href="#" class="mb-10 pt-lg-10">
                    <img alt="Logo" src="{{ asset('/assets/media/logo/logo_main.png') }}" class="h-80px mb-5" />
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                <div class="pt-lg-10 mb-10">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <div class="card card-default">
                                    <div class="card-header">
                                        Authorization Request
                                    </div>
                                    <div class="card-body">
                                        <!-- Introduction -->
                                        <p><strong>{{ $client->name }}</strong> is requesting permission to access your
                                            account.</p>

                                        <!-- Scope List -->
                                        @if (count($scopes) > 0)
                                            <div class="scopes">
                                                <p><strong>This application will be able to:</strong></p>

                                                <ul>
                                                    @foreach ($scopes as $scope)
                                                        <li>{{ $scope->description }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <div class="buttons">
                                            <!-- Authorize Button -->
                                            <form method="post" action="{{ route('passport.authorizations.approve') }}">
                                                @csrf

                                                <input type="hidden" name="state" value="{{ $request->state }}">
                                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                                                <button type="submit"
                                                    class="btn btn-success btn-approve">Authorize</button>
                                            </form>

                                            <!-- Cancel Button -->
                                            <form method="post" action="{{ route('passport.authorizations.deny') }}">
                                                @csrf
                                                @method('DELETE')

                                                <input type="hidden" name="state" value="{{ $request->state }}">
                                                <input type="hidden" name="client_id" value="{{ $client->id }}">
                                                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                                                <button class="btn btn-danger">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Wrapper-->
                </div>
            </div>
            <!--end::Content-->
        </div>
        <!--end::Authentication - Signup Welcome Message-->
    </div>

@endsection

