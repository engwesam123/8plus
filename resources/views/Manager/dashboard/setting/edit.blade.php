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
                                {{ t("Settings") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('setting.update',1) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">

                            <div class="row text-center">

                                <div class="col-md-3 ">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview3" style="background-image: url({{ $setting->default_logo }});"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="default_logo" id="imageUpload3" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div><br>
                                    <label for="">{{ t("Default Logo") }}</label>
                                </div>

                                <div class="col-md-3 ">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview" style="background-image: url({{ $setting->logo }});"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="logo" id="imageUpload" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div><br>
                                    <label for="">{{ t("Logo") }}</label>
                                </div>

                                <div class="col-md-3  ">

                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview2" style="background-image: url({{ $setting->miniLogo }});"></div>
                                        <label  class="kt-avatar__upload mr-4" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="miniLogo" id="imageUpload2" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div><br>
                                    <label class="ml-3" for="">{{ t("Mini Logo") }}</label>

                                </div>

                                <div class="col-md-3  ">

                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview4" style="background-image: url({{ $setting->file_image }});"></div>
                                        <label  class="kt-avatar__upload mr-4" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="file" id="imageUpload4" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div><br>
                                    <label class="ml-3" for="">{{ t("Pdf File") }}</label>

                                </div>

                            </div><br>
                            <h3 style="margin-bottom: 30px">{{ t("Main Data") }}</h3>

                            <div class="row">

                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Site Name") </label>

                                            <input type="text" value="{{ $setting->translate($local)->blog_name }}"
                                            name="{{$local}}[blog_name]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Email') }} </label>
                                        <input value="{{ $setting->email }}" type="text" name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Phone') }} </label>
                                        <input value="{{ $setting->phone }}" type="text" name="phone" class="form-control">
                                    </div>
                                </div>


                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Address") </label>

                                            <input type="text" value="{{ $setting->translate($local)->address }}"
                                            name="{{$local}}[address]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                            <h3 style="margin-bottom: 30px">{{ t("Socila Media") }}</h3>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Instagram') }} </label>
                                        <input value="{{ $setting->instagram }}" type="text" name="instagram" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Linkedin') }} </label>
                                        <input value="{{ $setting->linkedin }}" type="text" name="linkedin" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Facebook') }} </label>
                                        <input value="{{ $setting->facebook }}" type="text" name="facebook" class="form-control" >
                                    </div>
                                </div>
                               {{-- 
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Twitter') }} </label>
                                        <input value="{{ $setting->twitter }}" type="text" name="twitter" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('Whatsapp') }} </label>
                                        <input value="{{ $setting->whatsapp }}" type="text" name="whatsapp" class="form-control" >
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ t('SnapChat') }} </label>
                                        <input value="{{ $setting->snapchat }}" type="text" name="snapchat" class="form-control" >
                                    </div>
                                </div> 
                                --}}
                               
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Description")</label>
                                            <textarea class="form-control" name="{{$local}}[description]"
                                                id="exampleFormControlTextarea1"
                                                rows="6">{{ $setting->translate($local)->description }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Keywords") </label>

                                            <input type="text" value="{{ $setting->translate($local)->keywords }}"
                                            name="{{$local}}[keywords]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach
                            </div>



                            {{-- <div class="col-md-12">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d927755.0517647963!2d47.3830102151434!3d24.725398118602715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2IDExNTY02Iwg2KfZhNiz2LnZiNiv2YrYqQ!5e0!3m2!1sar!2s!4v1614458613610!5m2!1sar!2s"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div> --}}

                        </div>

                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{t('Update Data')}}</button>
                                <a href="{{ route('dashboard') }}">
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



