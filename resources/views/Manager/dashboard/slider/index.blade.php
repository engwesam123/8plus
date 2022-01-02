@extends('Manager.included.header')

@section('content')

    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        @include('Manager.included.notfication')

        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                    <h3 class="kt-portlet__head-title">
                        {{ t("Sliders Table") }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="dropdown dropdown-inline">

                            <a href="{{ route('slider.add') }}">
                                <button type="button" class="btn btn-brand btn-icon-sm btn-index-add d-flex align-baseline"  aria-haspopup="true" aria-expanded="false">
                                    <i class="fal fa-plus"></i>  {{ t("Add New") }}
                                </button>
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            {{-- التنبيهات --}}
            <div class="kt-portlet__body">
            {{-- For Notfication --}}
            @include('Manager.included.notfication')

            <!--end: Search Form -->
            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">

                <!--begin: Datatable -->
                <div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded"
                     id="local_data">
                    <div class="card-body">

                      <div class="table-responsive">
                        <table id="adminDataTable" class="datatable table table-bordered table-striped text-center ">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ t("Image") }}</th>
                                <th>{{ t("Title") }}</th>
                                <th>{{ t("Status") }}</th>
                                <th>{{ t("Actions") }}</th>
                            </tr>
                            </thead>
                            <tbody>


                            </tbody>
                        </table>
                      </div>

                        <div id="confirmModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title"> {{ t('Confirmation') }} </h2>
                                    </div>
                                    <div class="modal-body">
                                        <h4 align="center" style="margin:0;">{{ t('Are you sure you want to remove this item ?') }} </h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" name="ok_button" id="ok_button"
                                                style="background-color: rgb(236, 67, 67);color:white" class="btn ">{{ t('Delete') }}
                                        </button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">{{ t('Cancle') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!--end: Datatable -->
                </div>
            </div>
        </div>

    @push('scripts')
                   {{-- For make Delete model --}}
                <script type="text/javascript">
                    var id;
                    $(document).on('click', '.delete', function(){
                         id = $(this).attr('id');
                            $('#confirmModal').modal('show');
                    });
                    $('#ok_button').click(function(){
                        var url = "{{ route('slider.delete',':id') }}";
                        url = url.replace(':id', id);
                        $.ajax({
                            url:url,
                            type: "POST",

                            success:function(data)
                            {
                                setTimeout(function(){
                                $('#confirmModal').modal('hide');
                                $('#adminDataTable').DataTable().ajax.reload();
                                }, 400);
                                toastr.success("{{ t("Success To Delete Item") }}")
                            }
                        })
                    });
                </script>

            <script type="text/javascript">

                $(function () {

                    var table = $('.datatable').DataTable({
                        language: {
                            url: "@lang('site.datatable_lang')"
                        },
                        processing: true,
                        lengthChange:false,
                        info: false,
                        serverSide: true,
                        ajax: "{{ route('slider.getSliderData') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'image', name: 'image'},
                            {data: 'title', name: 'title'},
                            {data: 'status_value', name: 'status_value'},
                            {data: 'action', name: 'action', orderable: false, searchable: false},
                        ]

                    });

                });
            </script>



    @endpush
@endsection
