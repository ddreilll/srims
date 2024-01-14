@extends('auth.user-account.partials.template')

@section('user-account-title')
    {{ __('Account Overview') }}
@endsection

@section('user-account-page-title')
    {{ __('Account Overview') }}
@endsection

@section('user-account-content')
    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
        <div class="card-header">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
            <a href="../../demo8/dist/account/settings.html" class="btn btn-sm btn-primary align-self-center">Edit
                Profile</a>
        </div>
        <div class="card-body p-9">
            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Full Name</label>
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->name }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-semibold text-muted">Email Address</label>
                <div class="col-lg-8 d-flex align-items-center">
                    <span class="fw-bold fs-6 text-gray-800 me-2">{{ auth()->user()->email }}</span>
                    @if (auth()->user()->email_verified_at)
                        <span class="badge badge-success">Verified</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
