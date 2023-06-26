@extends('layouts.fluid')

@section('content')
    <div class="post d-flex flex-column-fluid">
        <div id="kt_content_container" class="container-fluid">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">

                    @include('admin.settings.partials.menu')
                </div>
                <div class="flex-lg-row-fluid ms-lg-15">
                    <div class="tab-content">

                        <div class="tab-pane fade show active"  role="tabpanel">
                            <div class="card mb-6 mb-xl-9">
                                <div class="card-header border-0">
                                    <div class="card-title">
                                        <h2>Add Semester</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <form method="POST" action="{{ route('settings.semesters.store') }}"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="fv-row mb-7">
                                                    <label class="required fs-6 fw-bold mb-2">Order</label>
                                                    <input type="number"
                                                        class="form-control {{ $errors->has('term_order') ? 'is-invalid' : '' }}"
                                                        placeholder="" name="term_order" value="{{ old('term_order', '') }}"
                                                        required />
                                                    @if ($errors->has('term_order'))
                                                        <span class="text-danger">{{ $errors->first('term_order') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="fv-row mb-7">
                                                    <label class="required fs-6 fw-bold mb-2">Name</label>
                                                    <input type="text"
                                                        class="form-control {{ $errors->has('term_name') ? 'is-invalid' : '' }}"
                                                        placeholder="" name="term_name" value="{{ old('term_name', '') }}"
                                                        required />
                                                    @if ($errors->has('term_name'))
                                                        <span class="text-danger">{{ $errors->first('term_name') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                        <div class="text-end">
                                            <a href="{{ route('settings.semesters.index') }}"
                                                class="btn btn-light me-3">Discard</a>
                                            <button type="submit" class="btn btn-primary">
                                                <span>Submit</span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
