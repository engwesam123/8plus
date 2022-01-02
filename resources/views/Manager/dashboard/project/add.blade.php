@extends('Manager.included.header')
@section('style')
<link href="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />

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
                                {{ t("Add Project") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('project.store') }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">

                            <div class="row">
                                <div class="col-md-12 text-center mb-5">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview" style="background-image: url({{ asset('8plus/public/'.'backend/img/default.jpg') }});"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input  type="file" name="image" id="imageUpload" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>

                                        <span class="mt-3 d-block">  W 740 / H 740</span>

                                    </div>
                                </div>


                            </div>




                            <div class="row">


                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Project Name") </label>
                                            <input type="text" value="{{ old($local.'.project_name') }}" name="{{$local}}[project_name]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach


                                @foreach (config('translatable.locales') as $local)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>@lang("site." . $local . ".Client Name") </label>
                                        <input type="text" value="{{ old($local.'.client_name') }}"
                                         name="{{$local}}[client_name]" class="form-control" aria-describedby="emailHelp">
                                    </div>
                                </div>
                            @endforeach

                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Location") </label>
                                            <input type="text" value="{{ old($local.'.location') }}"
                                            name="{{$local}}[location]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach

                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang("site." . $local . ".Project Type") </label>
                                            <input type="text" value="{{ old($local.'.project_type') }}"
                                            name="{{$local}}[project_type]" class="form-control" aria-describedby="emailHelp">
                                        </div>
                                    </div>
                                @endforeach



                                 <div class="col-md-4">
                                    <label>{{ t("Service") }}</label>
                                    <select class="form-control select2" multiple name="services_id[]">
                                        @foreach ($services as $service)
                                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                                        @endforeach
                                    </select>
                                 </div>

                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{t('Project Cost')}}</label>
                                        <input value="{{ old('project_cost') }}" type="text" name="project_cost" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{t('Project Bulid Date')}}</label>
                                        <input id="datetimepicker1" value="{{ old('project_bulid_date') }}" type="text" name="project_bulid_date" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <div class="form-group row align-items-center  mb-5">
                                        <label class="col-4 col-form-label">{{ t("Status") }}</label>
                                        <div class="col-8">
                                            <span class="kt-switch ">
                                                <label class="mb-0">
                                                    <input type="checkbox"  value="1"  name="status">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <br>
                                    <div class="form-group row align-items-center  mb-5">
                                        <label class="col-4 col-form-label">{{ t("View Status") }}</label>
                                        <div class="col-8">
                                            <span class="kt-switch ">
                                                <label class="mb-0">
                                                    <input type="checkbox"  value="1"  name="view_status">
                                                    <span></span>
                                                </label>
                                            </span>
                                        </div>
                                    </div>
                                </div>





                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Description")</label>
                                            <textarea class="form-control" name="{{$local}}[description]"
                                                id="exampleFormControlTextarea1"
                                                rows="6">{{ old($local.'.description') }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{t('Add Data')}}</button>
                                <a href="{{ route('project.index') }}">
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


        <script src="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"  type="text/javascript"></script>
        <script src="{{ asset('backend/vendor/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"
        type="text/javascript"></script>
        <script src="{{ asset('backend/vendor/vendors/select2/dist/js/select2.full.js')}}" type="text/javascript"></script>

        <script>
            $(function () {
                $('#datetimepicker1').datepicker({
                    autoclose : true,
                    orientation: "top left",
                    changeYear: true,
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years",
                });
            });


            $(document).ready(function () {
                $('.select2').select2();
            });



        </script>



    @endpush

@endsection



