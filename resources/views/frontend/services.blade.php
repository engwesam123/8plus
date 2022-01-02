@extends('frontend.front')
@section('title'){{ w('About Company') }}@endsection
@section('content')

<div role="main" class="main">

    <div class="container">

        <div class="row pt-5">
            <!-- End portfolio Section -->
                                @if ($services->count() > 0)
                                    <section class="section section-tertiary section-no-border section-custom-construction" style="background: none;">
                                        <div class="container">
                                            <div class="row col-lg-10 pt-4">
                                                <div class="col ">
                                                    <h2 class="text-uppercase font-weight-light mt-4 pt-3 text-color-primary">{{ w('Services') }}</h2>
                                                </div>
                                            </div>


                                        <div class="row mt-4">
                                            @if (isset($services))
                                        @foreach ($services as $service)
                                            <div class="col-lg-6 "  >
                                                <div class="feature-box feature-box-style-2 custom-feature-box mb-4 appear-animation" style="background: #F7F7F7 !important;     min-height: 350px; padding: 40px; "  data-appear-animation="fadeInUp" data-appear-animation-delay="300">
                                                    <div class="feature-box-icon w-auto" >
                                                        <img src="{{ $service->image}}" alt="{{ w('Blog Name') }} - {{ $service->name }} " class="img-fluid" width="55" />
                                                            </div>
                                                            <div class="feature-box-info ml-3">
                                                                <h4 class="mb-2">{{ $service->name }}</h4>
                                                                <p>{{ $service->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                    @endif

                            </div>
                            </div>
                            </section>
                            @endif

        </div>

    </div>
</div>



@endsection
