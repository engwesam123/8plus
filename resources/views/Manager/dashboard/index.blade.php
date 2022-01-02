@extends('Manager.included.header')
@section('content')

<style>
.h4, h4 {
    font-size: 1.2rem;
}
</style>
<div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">

    <!--begin:: Widgets/Stats-->
    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row  row-col-separator-xl">

                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('user.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Users') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $users->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('employee.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Employees') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $employees->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('company.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('clients') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $clients->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('partner.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Partners') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $partners->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet">
        <div class="kt-portlet__body  kt-portlet__body--fit">
            <div class="row  row-col-separator-xl">

                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('service.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Services') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $services->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('project.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Projects') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $projects->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('slider.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Sliders') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $sliders->count() }}
                            </span>
                        </div>


                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-xl-3">
                    <div class="kt-widget24">
                        <div class="kt-widget24__details">
                            <div class="kt-widget24__primary">
                                <a href="{{ route('contact.index') }}">
                                    <h4 class="kt-widget24__title">
                                        {{ t('Contacts') }}
                                    </h4>
                                </a>

                            </div>
                            <span class="kt-widget24__stats kt-font-primary">
                                {{ $contacts->count() }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-4">

            <!--begin:: Widgets/Support Tickets -->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ t('New Messages') }}
                        </h3>
                    </div>

                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget3">
                        @if ($latest_contacts->count() > 0)
                        @foreach ($latest_contacts as $latest_contact)
                            <div class="kt-widget3__item">
                                <div class="kt-widget3__header">
                                    <div class="kt-widget3__user-img">
                                       <i class="fal fa-user"></i>
                                    </div>
                                    <div class="kt-widget3__info">
                                        <a href="{{ route('contact.show',$latest_contact->id) }}" class="kt-widget3__username">
                                            {{ $latest_contact->full_name }}
                                        </a><br>
                                        <span class="kt-widget3__time">
                                            {{ $latest_contact->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                    <span class="kt-widget3__status kt-font-info">

                                    </span>
                                </div>
                                <div class="kt-widget3__body">
                                    <p class="kt-widget3__text">
                                       {{Str::limit( $latest_contact->message,100)}}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                        @else
                            <div class="alert alert-danger">{{ t("There are no new messages") }}</div>
                        @endif
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Support Tickets -->
        </div>
        <div class="col-xl-8">

            <!--begin:: Widgets/Best Sellers-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ t("New Projects") }}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <span class="badge badge-primary">{{ $latest_projects->count() }}</span>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget5_tab1_content" aria-expanded="true">
                            <div class="kt-widget5">
                                @if ($latest_projects->count() > 0)
                                @foreach ($latest_projects as $latest_project)
                                    <div class="kt-widget5__item">
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__pic">
                                                <img class="kt-widget7__img" src="{{ $latest_project->image }}" alt="">
                                            </div>
                                            <div class="kt-widget5__section">
                                                <a  class="kt-widget5__title" >
                                                    {{ $latest_project->project_name }}
                                                </a><br>
                                                <p class="kt-widget5__desc"></p>
                                                <div class="kt-widget5__info">
                                                    <span>{{ t("Project Bulid Date") }}:</span><br>
                                                    <span class="kt-font-info">{{ $latest_project->project_bulid_date }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="kt-widget5__content">
                                            <div class="kt-widget5__stats text-center">
                                                <span class="kt-widget5__number p-2">{{ $latest_project->project_cost }}</span>
                                                <span class="kt-widget5__sales">{{ t("Project Cost") }}</span>
                                            </div>
                                            {{-- 
                                                <div class="kt-widget5__stats text-center" >
                                                   <span class=" badge badge-primary widget5__service " style="margin-top: 5px" >{{ $latest_project->service_name }}</span>
                                                   <span class="kt-widget5__votes" style="margin-top: 10px">{{ t("Service") }}</span>
                                                </div>
                                            --}}
                                        </div>
                                    </div>
                                @endforeach

                                @else
                                    <div class="alert alert-danger">{{ t("There are no new Projects") }}</div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end:: Widgets/Best Sellers-->
        </div>
    </div>


    <div class="row">

        <div class="col-xl-4">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ t('Employees') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @if ($latest_employees->count() > 0)
                                    @foreach ($latest_employees as $latest_employee)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                <img src="{{ $latest_employee->image }}" alt="">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a  class="kt-widget4__username">
                                                    {{ $latest_employee->name }}
                                                </a>
                                                <p class="kt-widget4__text">
                                                    {{ $latest_employee->email }}
                                                </p>
                                            </div>
                                            <a  class="btn-label-brand" >{{ $latest_employee->phone }}</a>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger">{{ t("No Employees") }}</div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ t('Clients') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @if ($latest_clients->count() > 0)
                                    @foreach ($latest_clients as $latest_company)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                <img src="{{ $latest_company->image }}" alt="">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a  class="kt-widget4__username">
                                                    {{ $latest_company->name }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger">{{ t("No clients") }}</div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>
        <div class="col-xl-4">

            <!--begin:: Widgets/New Users-->
            <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ t('Patrners') }}
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="kt_widget4_tab1_content">
                            <div class="kt-widget4">
                                @if ($latest_partners->count() > 0)
                                    @foreach ($latest_partners as $latest_partner)
                                        <div class="kt-widget4__item">
                                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                                <img src="{{ $latest_partner->image }}" alt="">
                                            </div>
                                            <div class="kt-widget4__info">
                                                <a  class="kt-widget4__username">
                                                    {{ $latest_partner->name }}
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <div class="alert alert-danger">{{ t("No Partner") }}</div>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!--end:: Widgets/New Users-->
        </div>

    </div>


</div>



@endsection

