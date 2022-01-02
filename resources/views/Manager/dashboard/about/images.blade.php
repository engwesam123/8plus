@extends('Manager.included.header')
@section('style')
<link href="{{ asset('backend/vendor/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css')}}" rel="stylesheet" type="text/css" />
<link href="{{ asset('backend/vendor/vendors/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css" />

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
                                {{ t("Add Mutli Image For - ") }} {{ $project->project_name }}
                            </h3>
                        </div>
                    </div>




                        <div class="kt-portlet__body">
                            <form enctype="multipart/form-data" action="{{ route('project.storeImages',$project->id) }}" method="POST" class="dropzone" id="dropzone">
                                @csrf
                                <div class="fallback">
                                  <input name="file" type="file" multiple />

                                </div>
                            </form>


                            <div class="row text-cente">
                                @foreach ($images as $image)
                                    <div class="col-md-2 p-3 text-center">
                                        <img class="img-thumbnail mr-2"  src="{{ $image->image }}" alt="">
                                        <a href="{{ route('project.deleteImage',['id' => $image->id,'project_id' => $project->id]) }}"
                                             class="btn btn-outline-danger btn-sm text-center mt-3" >{{ t('Delete') }}
                                        </a>
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
		<script src="{{ asset('dashboard/assets/js/demo1/pages/crud/forms/widgets/dropzone.js')}}" type="text/javascript"></script>


    <script type="text/javascript">
        // Dropzone.autoDiscover = false;
        // $(".dropzone").dropzone({
        //     init: function() {
        //         myDropzone = this;
        //         $.ajax({
        //         url:  "{{ route('project.uplodedImages',$project->id) }}",
        //         type: 'get',
        //         data: {request: 2},
        //         dataType: 'json',
        //         success: function(response){
        //             $.each(response.data, function(key,value) {
        //                 var mockFile = { filename: value.image, size: value.image };
        //                 myDropzone.emit("addedfile", mockFile);
        //                 myDropzone.emit("thumbnail", mockFile,value.image);
        //                 myDropzone.emit("complete", mockFile,value.image);
        //             });

        //         }
        //     });
        //     }
        // });

        Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            timeout: 5000,
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



