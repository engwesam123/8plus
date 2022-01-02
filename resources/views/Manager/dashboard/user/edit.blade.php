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
                                {{ t("Edit Manager") }}
                            </h3>
                        </div>
                    </div>


                    <!--begin::Form-->
                    <form autocomplete="off" id="form_input" class="kt-form" action="{{ route('user.update',$user->id) }}"
                          method="POST" enctype="multipart/form-data">

                        @csrf
                        <div class="kt-portlet__body">

                            <div class="row">
                                <div class="col-md-12 text-center mb-5">
                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle">
                                        <div class="kt-avatar__holder" id="imagePreview"
                                             style="background-image: url({{ $user->image }})"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title=""
                                               data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="image" id="imageUpload">
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title=""
                                              data-original-title="{{ t('change Image') }}">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-3">

                                    <div class="form-group">
                                        <label> {{ old('Name') }} </label>
                                        <input value="{{$user->name }}" type="text" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ old('Email') }} </label>
                                        <input value="{{$user->email }}" type="email" name="email" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>{{ old('Password') }}</label>
                                        <input value="" type="text" name="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>{{ t("Permissions") }}</label>
                                    <select class="form-control" name="role_id">
                                        <option value="" selected disabled>{{ t("Permissions") }}</option>
                                        @foreach ($roles as $role)
                                            <option {{ $user->hasRole($role->name) ? 'selected' : ''}}
                                            value="{{ $role->id }}">{{ t( $role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>




                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">{{ t('Update Data') }}</button>
                                <a href="{{ route('user.index') }}">
                                    <button type="button" class="btn btn-secondary">{{ t('Reverse') }}</button>
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



