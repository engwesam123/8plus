@extends('Manager.included.header')


@section('style')
    <link href="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/vendor/vendors/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('backend/vendor/vendors/summernote/dist/summernote-bs4.css')}}" rel="stylesheet" type="text/css" />



@endsection
@section('content')


    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <div class="row">
            <div class="col-md-12">
            @include('Manager.included.notfication')
            <!--begin::Portlet-->
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                {{ t("Add Service") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('service.store') }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">


                            <div class="row">
                                <div class="col-md-12 text-center mb-5">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview" style="background-image: url({{ asset('8plus/public/'.'backend/img/default.jpg') }});"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="image" id="imageUpload" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>

                                        <span class="mt-3 d-block">  W 63 / H 80</span>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Name") </label>

                                            <input type="text" value="{{ old($local.'.name') }}" name="{{$local}}[name]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                 @endforeach
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Description")</label>
                                            <textarea class="form-control summernote" name="{{$local}}[description]"
                                                id="exampleFormControlTextarea1"
                                                rows="6">{{ old($local.'.description')}}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{t('Add Data')}}</button>
                                <a href="{{ route('service.index') }}">
                                    <button type="button" class="btn btn-secondary">{{t('Reverse')}}</button>
                                </a>
                            </div>
                        </div>
                    </form>

                    <!--end::Form-->
                </div>

                <!--end::Portlet-->


                <!--end::Portlet-->
            </div>

        </div>
    </div>

    @push('scripts')
        <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

        {!! $validator->selector('#form_input') !!}
        <script src="{{ asset('backend/vendor/vendors/dropzone/dist/dropzone.js')}}" type="text/javascript"></script>



        <script src="{{ asset('backend/vendor/vendors/summernote/dist/summernote-bs4.js')}}" type="text/javascript"></script>

        <script>
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        </script>


    @endpush

@endsection



