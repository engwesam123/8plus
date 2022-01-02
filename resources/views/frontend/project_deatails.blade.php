@extends('frontend.front')
@section('title')@if (isset($project)){{ $project->project_name }}@endif @endsection

@section('content')

<div role="main" class="main">
    <section class="section section-tertiary section-no-border pb-3 mt-0">
        <div class="container">
            <div class="row col-lg-10 pt-4 mt-4">
                <div class="col mt-4">
                    <h2 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">{{ w('Projects') }}</h2>
                </div>
            </div>

        </div>
    </section>
    @if (isset($project))

        <div class="container">
            <div class="row mb-4 mt-5">
                <div class="col-lg-5">
                    <div class="thumb-gallery">
                        <div class="lightbox" data-plugin-options="{'delegate': 'a', 'type': 'image', 'gallery': {'enabled': true}}">
                            <div class="owl-carousel owl-theme manual thumb-gallery-detail show-nav-hover" id="thumbGalleryDetail">

                                <div>
                                    <a href="{{ $project->image }}">
                                        <span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
                                            <span class="thumb-info-wrapper text-4">
                                                <img alt="{{ w('Blog Name') }} - {{ $project->project_name }}"  src="{{ $project->image }}" class="img-fluid">
                                                <span class="thumb-info-title text-4">
                                                    <span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                @if ($project->images->count() > 0)
                                    @foreach ($project->images as $project_image)
                                        <div>
                                            <a href="{{ $project_image->image }}">
                                                <span class="thumb-info thumb-info-centered-info thumb-info-no-borders text-4">
                                                    <span class="thumb-info-wrapper text-4">
                                                        <img  alt="{{ w('Blog Name') }} - {{ $project->project_name }}" src="{{ $project_image->image }}" class="img-fluid">
                                                        <span class="thumb-info-title text-4">
                                                            <span class="thumb-info-inner text-4"><i class="icon-magnifier icons text-4"></i></span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>

                        <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                            <div>
                                <img  alt="{{ w('Blog Name') }} - {{ $project->project_name }}" src="{{ $project->image }}" class="img-fluid cur-pointer">
                            </div>
                            @if ($project->images->count() > 0)
                                @foreach ($project->images as $project_image)
                                    <div>
                                        <img  alt="{{ w('Blog Name') }} - {{ $project->project_name }}" src="{{ $project_image->image }}" class="img-fluid cur-pointer">
                                    </div>

                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-lg-7">

                    <div class="project-detail-construction">

                        <h1 class="h6 mb-0">{!! $project->description !!}</h1>

                        <div class="row">
                            <div class="col-lg-12">

                                <ul class="list-project-details">
                                    <li>
                                        <label>{{ w('Client Name') }} :</label> {{ $project->client_name }}
                                    </li>

                                    <li>
                                        <label>{{ w('Project Location') }} :</label> {{ $project->location }}
                                    </li>
                                    <li>
                                        <label>{{ w('Project Type') }} :</label> {{ $project->project_type }}
                                    </li>


                                </ul>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    @endif

</div>



@endsection
