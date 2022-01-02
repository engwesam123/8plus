@extends('Manager.included.header')



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
                                {{ t("Add Company Visible") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('visible.store') }}"
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
                                        <span class="mt-3 d-block text-center">  W 50 / H 50</span>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Title") </label>

                                            <input type="text"  value="{{ old($local.'.title') }}" name="{{$local}}[title]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                 @endforeach
                            </div>
                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Description")</label>
                                            <textarea class="form-control" name="{{$local}}[description]"
                                                id="exampleFormControlTextarea1"
                                                rows="6">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{t('Add Data')}}</button>
                                <a href="{{ route('visible.index') }}">
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



    @endpush

@endsection



