@extends('auth.user-account.partials.template')

@section('user-account-title')
    {{ __('Account Settings') }}
@endsection

@section('user-account-page-title')
    {{ __('Account Settings') }}
@endsection

@section('user-account-styles')
    <style>
        .image-input-placeholder {
            background-image: url('{{ getAvatarPlaceholder() }}');
        }
    </style>
@endsection

@section('user-account-content')
    <div class="card mb-5 mb-xl-10">
        <div class="card-header border-0" aria-expanded="true" aria-controls="kt_account_profile_details">
            <div class="card-title m-0">
                <h3 class="fw-bold m-0">Profile Details</h3>
            </div>
        </div>
        <div id="kt_account_settings_profile_details">
            <form class="form" method="POST" action="{{ route('account.update_profile') }}" enctype="multipart/form-data">
                @method('POST')
                @csrf

                <div class="card-body border-top p-9">
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                        <div class="col-lg-8">

                            <div class="image-input image-input-empty shadow" id="user-avatar"
                                style="background-image: url('{{ getAvatarPlaceholder() }}')">

                                <div class="image-input-wrapper w-125px h-125px" style="">
                                </div>

                                <label
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="change" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span
                                            class="path2"></span></i>

                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>

                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="cancel" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>

                                <span
                                    class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                    data-kt-image-input-action="remove" data-bs-toggle="tooltip" data-bs-dismiss="click"
                                    title="Remove avatar">
                                    <i class="ki-outline ki-cross fs-3"></i>
                                </span>
                            </div>
                            <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            <div class="form-text">Allowed file size: less than 1MB.</div>

                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="fv-row">
                                    <input type="text" name="name" class="form-control form-control-lg"
                                        placeholder="Full name" value="{{ old('name', auth()->user()->name) }}" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-6">
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                            <span class="required">Email Address</span>
                        </label>
                        <div class="col-lg-8 fv-row">
                            <input type="email" name="email" class="form-control form-control-lg"
                                placeholder="Email address" value="{{ old('email', auth()->user()->email) }}" />
                        </div>
                    </div>
                </div>
                
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                    <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('user-account-scripts')
    <script>
        var imageInputElement = document.querySelector("#user-avatar");
        var imageInput = new KTImageInput(imageInputElement);
    </script>
@endsection
