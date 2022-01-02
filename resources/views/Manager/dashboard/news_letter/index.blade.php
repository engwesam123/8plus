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
                        {{ t("Newsletter Table") }}
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
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
                                <th>{{ t("Email") }}</th>
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
                        ajax: "{{ route('news_letter.getNewsLetterData') }}",
                        columns: [
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            {data: 'email', name: 'email'},
                        ]

                    });

                });
            </script>



    @endpush
@endsection
