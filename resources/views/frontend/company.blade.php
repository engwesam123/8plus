@extends('frontend.front')
@section('title'){{ w('About Company') }}@endsection
@section('content')

<div role="main" class="main">
    <section class="section section-tertiary section-no-border pb-3 mt-0">
        <div class="container">

            <div class="row col-lg-10 pt-4 mt-4">
                <div class="col mt-4">
                    <h2 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">{{ w('Company') }}</h2>
                </div>
        </div>
        </div>
    </section>

    <div class="container">

        <div class="row pt-2">
            <div class="col-lg-3">
                <aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options="{'minWidth': 991, 'containerSelector': '.container', 'padding': {'top': 110}}">

                    <ul class="nav nav-list flex-column mb-4 show-bg-active">
                        <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="110" href="#who-we-are">{{ w('Who We Are') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="110" href="#mission-vision">{{ w('Mission') }} &amp; {{ w('Vision') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="110" href="#Values">{{ w('Values') }}</a></li>
                        <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="110" href="#Our_goals">{{ w('Our goals') }}</a></li>
{{--                        <li class="nav-item"><a class="nav-link" data-hash data-hash-offset="110" target="_black" href="{{ asset('frontend/img/organization-chart.jpg')}}">{{ w('Organizational Chart') }}</a></li>--}}

                    </ul>

                </aside>
            </div>

            <div class="col-lg-9">

                <section id="who-we-are" class="mb-4">
                    @if (isset($about))
                        @if ($about->images->count() > 0)
                            <div class="owl-carousel nav-inside show-nav-hover dots-inside mt-3 mb-4" data-plugin-options="{'items': 1, 'loop': true, 'autoplay': true, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'nav': true, 'dots': true, 'animateOut': 'fadeOut'}">
{{--                                @foreach ($about->images as $about_image)--}}
{{--                                    <div>--}}
{{--                                        <img src="{{ $about_image->image }}"  alt="{{ w('Blog Name') }} - {{ $about_image->page_name }}" />--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
                            </div>
                        @endif

                        <h2 class="mb-0 text-color-dark">{{ $about->page_name }}</h2>
                        <p class="lead mb-4 mt-4">{!! $about->short_content!!}</p>

                        {!! $about->long_content!!}
                    @endif
                </section>

                @if (isset($visibles))
                    <hr class="solid my-5">
                    <section id="mission-vision" class="mb-4">

                        <div class="row mt-4">
                            @foreach ($visibles as $visible)
                                <div class="col-sm-6 text-center">
                                    <div class="feature-box feature-box-style-4 justify-content-center mt-4 appear-animation" data-appear-animation="fadeInUp" data-appear-animation-delay="0">
                                        <span class="featured-boxes featured-boxes-style-4 p-0 m-0">
                                            <span class="featured-box featured-box-primary featured-box-effect-6 p-0 m-0">
                                                <span class="box-content p-0 m-0">
                                                    <img width="50px" height="50px" src="{{ $visible->image }}" alt="{{ w('Blog Name') }} - {{ $visible->title }}">
                                                </span>
                                            </span>
                                        </span>
                                        <div class="feature-box-info">
                                            <h2 class="mb-3 text-color-dark">{{ $visible->title }}</h2>
                                            <p class="mb-4">{!! $visible->description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </section>
                @endif

                @if (isset($history))
                    <hr class="solid my-5">
                    <section id="Values" class="mb-4 ">
                        <h2 class="mb-0 text-color-dark">{{ w('Values') }}</h2>

                        <div class="row mt-4">
                            {{--                                            <div class="col-lg-5">--}}
                            {{--                                                <img class=" mb-3 mt-4 appear-animation"  width="100%" data-appear-animation="fadeInUp" data-appear-animation-delay="0" src="{{ $history->image }}" alt="{{ w('Blog Name') }} - {{ $history->content }}">--}}
                            {{--                                            </div>--}}
                            <div class="col-lg-9">
                                <p class="lead mb-4 mt-4"> {!! $history->content !!}</p>
                            </div>
                        </div>
                    </section>
                @endif

                @if (isset($leader_ships) && $leader_ships->count() > 0)
                    <hr class="solid my-5">

                    <section id="Our_goals" class="mb-4">
                        <h2 class="mb-0 text-color-dark">{{ w('Our goals') }}</h2>
                        <div class="row mt-4">
                            @foreach ($leader_ships as $leader_ship)

                                <div class="col-lg-9">
                                    <p class="lead mb-4 mt-4"> {{  $leader_ship->description }}</p>
                                </div>
                            @endforeach

                        </div>

                    </section>
                @endif

{{--                @if (isset($partners) && $partners->count() > 0)--}}
{{--                <hr class="solid my-5">--}}
{{--                    <section id="partners" class="mb-4">--}}
{{--                        <h2 class="mb-0 text-color-dark">{{ w('Partners') }}</h2>--}}

{{--                        <div class="row">--}}

{{--                                <div class="row">--}}
{{--                                    @foreach ($partners as $partner)--}}

{{--                                        <div class="col-md-6 col-sm-12">--}}
{{--                                            <div class="p-4">--}}
{{--                                                <img  data-toggle="tooltip" data-placement="bottom" title="{{ $partner->name }}" width="100%" src="{{ $partner->image }}" alt="{{ w('Blog Name') }} - {{ $partner->name }}">--}}
{{--                                                <p class="mt-4 text-justify">{{ $partner->description }}</p>--}}
{{--                                            </div>--}}

{{--                                        </div>--}}
{{--                                    @endforeach--}}

{{--                                </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                @endif--}}

            </div>

        </div>

    </div>
</div>



@endsection
