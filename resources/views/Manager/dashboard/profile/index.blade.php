@extends('Manager.included.header')


@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="kt-portlet">
                    <form id="form_input" action="{{ route('updateProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="kt-portlet__body">
                        @include('Manager.included.notfication')
                            <!--begin::Widget -->
                            <div class="row">
                                <div class="col-md-12 mb-5 text-center">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle" >
                                        <div class="kt-avatar__holder" id="imagePreview"
                                             style="background-image: url({{ $user->image }})">
                                        </div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="تغير الصورة">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="image"  id="imageUpload">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="تغير الصورة">
                                                <i class="fa fa-times"></i>
                                            </span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t("Name") }}</label>
                                        <input  type="text" name="name" value="{{ $user->name  }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t("Email") }}</label>
                                        <input  type="text" name="email"  value="{{ $user->email  }}" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t("Current Password") }}</label>
                                        <input type="password" name="current_password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t("New Password") }}</label>
                                        <input type="password" name="new_password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t("Confirm Password") }}</label>
                                        <input type="password" name="confirm_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        <!--end::Widget -->
                    </div>
                    <div class="kt-portlet__foot">

                        <div class="kt-form__actions">
                            <button type="submit" class="btn btn-primary">{{ t("Update Data") }}</button>
                        </div>
                    </div>
                    </form>

                </div>
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        {!! $validator->selector('#form_input') !!}


    @endpush
@endsection

