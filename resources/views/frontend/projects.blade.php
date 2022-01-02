@extends('frontend.front')
@section('title')
    {{ w('Projects') }}
@endsection
@section('content')

<div role="main" class="main">
    <section class="section section-tertiary section-no-border pb-3 mt-0">
        <div class="container">
            <div class="row justify-content-end mt-4">
                <div class="col-lg-10 pt-4 mt-4  @if (app()->getlocale() == 'en') text-rigth  @else text-left @endif">
                    <h1 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">{{ w('Projects') }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row pt-2">
            <div class="col">
                <ul class="nav nav-pills sort-source mb-3 pb-2" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}"
                 style=" justify-content: center !important;">
                    <li class="nav-item active" data-option-value="*"><a class="nav-link active" href="#">{{ w('Show All') }}</a></li>
                    @if (isset($services))
                        @foreach ($services as $service)
                            @if($service->projects->count() !== 0)
                            <li class="nav-item" data-option-value=".service{{ $service->id }}"><a class="nav-link" href="#">{{  $service->name }}</a></li>
                            @endif
                        @endforeach
                    @endif

                </ul>

                <div class="sort-destination-loader sort-destination-loader-showing">
                    <div class="row mb-4 pt-1 portfolio-list sort-destination" data-sort-id="portfolio">
                    @foreach ($projects as $project)
                                @if ($project)
                                    <div class="col-md-6 col-lg-4 isotope-item mb-4 @foreach ($project->services as $pro_service ) service{{ $pro_service->id }} @endforeach">
                                    <a
                                        href="{{ route('UI.projectDetails',['id' => $project->id,'project_slug' => $project->project_slug ]) }}">
                                            <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                                                <span class="thumb-info-wrapper">
                                                    <img src="{{ $project->image }}" class="img-fluid"  alt="{{ w('Blog Name') }} - {{ $project->project_name }}">
                                                    <span class="thumb-info-title">
                                                        <span class="thumb-info-inner">{{ w('View Project...') }}</span>
                                                    </span>
                                                </span>
                                            </span>
                                        </a>
                                        <h4 class="mt-3 mb-0"> {{ $project->project_name }}</h4>
                                        <p class="mb-0">{{ $project->location }}</p>
                                    </div>
                                @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
