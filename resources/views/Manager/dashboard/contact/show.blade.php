
@extends('Manager.included.header')

@section('content')


<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">

                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-xl-3 col-lg-3 col-form-label">{{ t("Full Name") }}</label>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="alert-text">{{ $contact->full_name }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-lg-12 col-xl-12 col-form-label">{{ t("Email") }}</label>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="alert-text">{{ $contact->email }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="col-lg-12 col-xl-12 col-form-label">{{ t("Subject") }}</label>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="alert-text">{{ $contact->subject }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-lg-12 col-xl-12 col-form-label">{{ t("Message") }}</label>
                                        <div class="col-lg-12 col-xl-12">
                                            <div class="alert alert-secondary" role="alert">
                                                <div class="alert-text">{{ $contact->message }}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


@endsection

