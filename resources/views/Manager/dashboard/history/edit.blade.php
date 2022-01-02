@extends('Manager.included.header')

@section('style')
<link href="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
<style>
    .remove_button{
        width: 62px;
        height: 34px;
        margin-top: 27px;
        text-align: center;
    }
    .removes_buttons{
        width: 62px;
        height: 34px;
        margin-top: 27px;
        text-align: center;
    }

</style>

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
                                {{ t("Edit Values") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('history.update',$history->id) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">

                            <div class="row">
                                <div class="col-md-12 text-center mb-5">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" >
                                        <div class="kt-avatar__holder" id="imagePreview" style="background-image: url({{ $history->image }});"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="image" id="imageUpload" >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                        <span class="mt-3 d-block text-center">  W 300 / H 225</span>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach (config('translatable.locales') as $local)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">@lang("site." . $local . ".Content")</label>
                                            <textarea class="form-control" name="{{$local}}[content]"
                                                id="exampleFormControlTextarea1"
                                                rows="6">{{ $history->translate($local)->content }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="field_wrapper">
                                <a href="javascript:void(0);" class="add_button  btn btn-success"
                                title="Add field"> {{ t("Add") }}</a>
                                <br>
                                <br>
                                @if (isset($history->dates))
                                @foreach ($history->dates as $history_dates)
                                    <div class="row">
                                        <input type="hidden" name="old_history_date_id[]" value="{{ $history_dates->id }}">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ t('Year') }}</label>
                                                <input type="text" name="old_history_date[]"
                                                value="{{ $history_dates->history_date }}" class="form-control datetimepicker1" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ t('en.Content') }}</label>
                                                <input type="text" name="old_content_en[]" value="{{ $history_dates->content_en }}"  class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>{{ t('ar.Content') }}</label>
                                                <input type="text" name="old_content_ar[]" value="{{ $history_dates->content_ar }}"  class="form-control" >
                                            </div>
                                        </div>

                                        <a href='{{ route('history.deleteHistoryDate',$history_dates->id) }}' class='removes_buttons  btn btn-danger btn-sm' >{{ t('Delete') }}</a>

                                    </div>
                                    @endforeach
                                @endif
                            </div>


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
        <script src="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"  type="text/javascript"></script>
        <script src="{{ asset('backend/vendor/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js')}}"
        type="text/javascript"></script>

        <script>
            $(function () {
                $('.datetimepicker1').datepicker({
                    autoclose : true,
                    orientation: "top left",
                    changeYear: true,
                    format: "yyyy",
                    viewMode: "years",
                    minViewMode: "years"

                });
            });
        </script>

         <script type="text/javascript">
            $(document).ready(function(){
                var maxField = 50; //Input fields increment limitation
                var addButton = $('.add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper

                var fieldHTML = "<div class='row'>"+
                "<div class='col-md-3'><div class='form-group'><label>{{ t('Year') }}</label><input  type='text' name='history_date[]'  class='datetimepicker1 form-control '></div></div>" +
                "<div class='col-md-3'><div class='form-group'><label>{{ t('en.Content') }}</label><input type='text' name='content_en[]'  class='form-control' ></div></div>" +
                "<div class='col-md-3'><div class='form-group'><label>{{ t('ar.Content') }}</label><input type='text' name='content_ar[]' class='form-control' ></div></div>" +
                "<a  href='javascript:void(0);' class='remove_button  btn btn-danger btn-sm' >{{ t('Delete') }}</a></div>";

                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function(){
                    //Check maximum number of input fields
                    if(x < maxField){
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML).fadeIn(300); //Add field html
                        jQuery( ".datetimepicker1" ).datepicker({
                            autoclose : true,
                            orientation: "top left",
                            changeYear: true,
                            format: "yyyy",
                            viewMode: "years",
                            minViewMode: "years",
                        });
                    }



                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e){
                    e.preventDefault();
                    $(".datetimepicker1").datepicker("destroy");
                    $(this).parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });



            });


        </script>






    @endpush

@endsection



