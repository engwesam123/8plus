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
                                {{ t("Edit About") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('about.update',$about->id) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">


                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Page Name") </label>

                                            <input type="text"  value="{{ $about->translate($local)->page_name }}"
                                            name="{{$local}}[page_name]" class="form-control" >
                                        </div>
                                    </div>
                                 @endforeach
                            </div>
                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Title") </label>

                                            <input type="text"  value="{{ $about->translate($local)->title }}"
                                            name="{{$local}}[title]" class="form-control" >
                                        </div>
                                    </div>
                                 @endforeach
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Short Content")</label>
                                            <textarea class="form-control " name="{{$local}}[short_content]"
                                                id="exampleFormControlTextarea1"
                                                rows="10">{{ $about->translate($local)->short_content  }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Long Content")</label>
                                            <textarea class="form-control summernote" name="{{$local}}[long_content]"
                                                id="exampleFormControlTextarea1"
                                                rows="10">{{ $about->translate($local)->long_content  }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{t('Update Data')}}</button>
                                <a href="{{ route('about.edit',1) }}">
                                    <button type="button" class="btn btn-secondary">{{t('Reverse')}}</button>
                                </a>
                            </div>
                        </div>
                    </form>


                    <div class="kt-portlet__body">
                        <h4>{{ t("Add Multi Image") }}</h4>
                        <br>
                        <form enctype="multipart/form-data" action="{{ route('about.storeImages',$about->id) }}" method="POST" class="dropzone" id="dropzone">
                            @csrf
                            <div class="fallback">
                              <input name="file" type="file" multiple />

                            </div>
                        </form>

                        <span class="mt-3 mb-2 d-block text-center">  W 1140 / H 430</span>

                        <div class="row text-center justify-content-center">
                            @foreach ($images as $image)
                                <div class="col-md-2 p-3 text-center ">
                                    <img class="img-thumbnail mr-2"  src="{{ $image->image }}" alt="">
                                    @if (auth()->user()->hasRole('super_admin'))
                                        <a href="{{ route('about.deleteImage',['id' => $image->id,'about_id' => $about->id]) }}"
                                            class="btn btn-outline-danger btn-sm text-center mt-3" >{{ t('Delete') }}
                                        </a>
                                    @else
                                        <a class="btn btn-outline-danger btn-sm text-center mt-3 disabled" >{{ t('Delete') }}
                                        </a>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                        <br><br>

                    </div>



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

<script type="text/javascript">

    Dropzone.options.dropzone =
     {
        maxFilesize: 12,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        timeout: 50000,
        addRemoveLinks: true,
        init: function () {
            this.on("queuecomplete", function (file) {
                setTimeout(function(){
                    location.reload()
                }, 1000);
            });
        },
        success: function(file, response)
        {
            toastr.success("{{ t('Add Success') }}");
        },
        error: function(file, response)
        {
           return false;
        }
    };


    </script>

@endpush

@endsection



