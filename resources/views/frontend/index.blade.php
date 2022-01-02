@extends('frontend.front')

@section('title') {{ w('Home Page') }} @endsection

@section('content')

    <ma role="main" class="main">

        @if (isset($sliders))
            <div
                class="owl-carousel owl-carousel-light owl-carousel-light-init-fadeIn owl-theme manual dots-inside dots-horizontal-center show-dots-hover nav-style-diamond custom-nav-with-transparency nav-inside nav-inside-plus nav-dark nav-md nav-font-size-md show-nav-hover mb-0"
                data-plugin-options="{'autoplayTimeout': 7000}"
                data-dynamic-height="['700px','700px','700px','550px','500px']" style="height: 700px;">
                <div class="owl-stage-outer">
                    <div class="owl-stage">

                    @foreach ($sliders as $slider)

                        <!-- Carousel Slide 1 -->
                            <div class="owl-item position-relative"
                                 style="background:linear-gradient( rgba(0, 0, 0, 0.5) 100%, rgba(0, 0, 0, 0.5)100%),url({{ $slider->image}});
                                     background-size: cover; background-position: center;">

                                <div class="position-absolute bottom-10 w-100pct w-sm-75pct w-lg-50pct appear-animation"
                                     data-appear-animation=" @if (app()->getlocale() == "en") fadeInLeftShorter @else fadeInRightShorter @endif"
                                     data-appear-animation-delay="500" data-plugin-options="{'minWindowWidth': 0}"
                                     style="@if (app()->getlocale() == "en") left: -50px; @else right: -50px;  @endif ">
                                    <div class="bg-primary custom-skew-1 mb-5" style="height: 70px;"></div>
                                </div>

                                <div class="container position-relative z-index-1 h-100">
                                    <div class="row align-items-end h-100">
                                        <div
                                            class="col-10 col-sm-8 col-lg-5 @if (app()->getlocale() == "en")  mr-auto @else  ml-auto @endif">
                                            <h1 class="text-color-light font-weight-light mb-0 text-5 text-md-6 position-relative bottom-7 mb-5 pb-3 appear-animation"
                                                data-appear-animation=" @if (app()->getlocale() == "en") fadeInLeftShorter @else fadeInRightShorter @endif"
                                                data-appear-animation-delay="850"
                                                data-plugin-options="{'minWindowWidth': 0}">{{  $slider->title }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="owl-nav">
                    <button type="button" role="presentation" class="owl-prev"></button>
                    <button type="button" role="presentation" class="owl-next"></button>
                <!-- <a href="{{ route('UI.projects') }}">{{ w('Portfolio') }}>
                 <a href="{{ route('UI.contact') }}">{{ w('Contact') }}> -->
                </div>

            </div>
        @endif

        <br/><br/>



        <main id="main">
            <!-- ======= How Does 8plus works Section ======= -->
            <section id="how_does">
                <div class="container">
                    <div class="elementor-widget-wrap elementor-element-populated">
                        <div
                            class="elementor-element elementor-element-b36d63a elementor-widget elementor-widget-section_title"
                            data-id="b36d63a" data-element_type="widget" data-widget_type="section_title.default">
                            <div class="elementor-widget-container">

                                <div class="pt-section-title-1 text-center">

                                    <h4 class="pt-section-title" >{{ w('How Does') }} <span
                                            class="imp-word">{{ w('8PlusIT') }}</span> {{ w('Works') }}</h4>
                                    <br/> <br/>
                                </div>
                            </div>
                        </div>
                        <div
                            class="elementor-section elementor-inner-section elementor-element elementor-element-238ac48 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                            data-id="238ac48" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default" style="    justify-content: center;">
                                <?php $id = 1 ?>
                                @foreach($how_works as $how_work)
                                    @if($id % 2 ==0)
                                            <div
                                                class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-c0a0e2c animated fadeInUp"
                                                data-id="c0a0e2c" data-element_type="column"
                                                data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div
                                                        class="elementor-element elementor-element-d102f26 elementor-widget elementor-widget-Process_Step"
                                                        data-id="d102f26" data-element_type="widget"
                                                        data-widget_type="Process_Step.default">
                                                        <div class="elementor-widget-container"
                                                             style="    margin: 60px 0px 0px 0px;">
                                                            <div class="pt-process-step pt-process-2">
                                                                <div class="pt-process-icon">
                                                                    <img src="{{$how_work->image}}" alt="" width="60px"
                                                                         height="60px" style="margin-top: 20px">
                                                                    <span class="pt-process-number" >{{$id++}}</span></div>
                                                                <div class="pt-process-info">
                                                                    <h4 class="pt-process-title" style="color: #03256c;">{{$how_work->title }}</h4>
                                                                    <p class="pt-process-description" style=" color: #1768ac;     font-size: 12px;">{{ $how_work->description }} </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @else

                                            <div
                                                class="elementor-column elementor-col-25 elementor-inner-column elementor-element elementor-element-c0a0e2c animated fadeInUp"
                                                data-id="c0a0e2c" data-element_type="column"
                                                data-settings="{&quot;animation&quot;:&quot;fadeInUp&quot;,&quot;animation_delay&quot;:300}">
                                                <div class="elementor-widget-wrap elementor-element-populated">
                                                    <div
                                                        class="elementor-element elementor-element-d102f26 elementor-widget elementor-widget-Process_Step"
                                                        data-id="d102f26" data-element_type="widget"
                                                        data-widget_type="Process_Step.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="pt-process-step pt-process-2">

                                                                <div class="pt-process-icon"
                                                                     style="background: #dc2828">
                                                                    <img src="{{$how_work->image}}" alt="" width="60px"
                                                                         height="60px" style="margin-top: 20px">
                                                                    <span class="pt-process-number" >{{$id++}}</span></div>
                                                                <div class="pt-process-info">
                                                                    <h4 class="pt-process-title" style="color: #03256c;">{{$how_work->title }}</h4>
                                                                    <p class="pt-process-description" style=" color: #1768ac;     font-size: 12px;">{{ $how_work->description }} </p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                    @endif

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End How Does 8plus works Section -->

            <br/><br/> <br/><br/>
            <!-- ======= Services Section ======= -->
            <section id="services"  style="padding: 70px 0;     background: #F7F7F7 !important;">
                <div class="container">

                    <div class="section-title aos-init aos-animate" data-aos="fade-up">
                        <h4 class="main_title">{{ w('Our Services') }}</h4>
                    </div>
                    <br/><br/>
{{--                    <div class="row">--}}
{{--                        @foreach($services as $service)--}}
{{--                          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0 text-center">--}}
{{--                            <div data-aos="fade-up" class="aos-init aos-animate" data-aos-delay="100">--}}
{{--                                <div class="service_img">--}}
{{--                                    <img src=" {{ asset($service->image) }}" alt="" width="45px" height="45px">--}}
{{--                                </div>--}}
{{--                                <h4 class="title"><a href="#">{{ $service->name}}</a></h4>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
                    <div class="row">
                        @foreach($services as $service)
                        <div class="col-lg-3 col-md-6">
                            <div class="single_service wow fadeInLeft" data-wow-duration="1.2s" data-wow-delay=".5s" style="visibility: visible; animation-duration: 1.2s; animation-delay: 0.5s; animation-name: fadeInLeft;">
                                <div class="service_icon_wrap text-center">
                                    <div class="service_icon ">
                                        <img src="{{$service->image}}" alt="" width="60px" height="60px" data-pagespeed-url-hash="4005783399" onload="pagespeed.CriticalImages.checkImageForCriticality(this);">
                                    </div>
                                </div>
                                <div class="info text-center">
                                    <h4 class="title"><a href="https://8plusit.com/ar/services">{{ $service->name}}</a></h4>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </section>
            <!-- End Services Section -->

            <br/><br/> <br/><br/>

            <!-- End Partners Section -->
            <!-- ======= portfolio Section ======= -->
              <section id="portfolio" class="services">
                <div class="elementor-container elementor-column-gap-default">
                    <div class="elementor-row">
                        <div
                            class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-a5977f3"
                            data-id="a5977f3" data-element_type="column">
                            <div class="elementor-column-wrap elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                    <div
                                        class="elementor-element elementor-element-ffdecbc elementor-widget elementor-widget-spacer"
                                        data-id="ffdecbc" data-element_type="widget" data-widget_type="spacer.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-spacer">
                                                <div class="elementor-spacer-inner"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="elementor-element-custom_font_size elementor-element-custom_line_height elementor-element-custom_font_weight elementor-element elementor-element-95f9924 elementor-widget elementor-widget-text-editor"
                                        data-id="95f9924" data-element_type="widget"
                                        data-widget_type="text-editor.default">
                                        <div class="elementor-widget-container">
                                            <div class="elementor-text-editor elementor-clearfix">
                                            <!-- <h5>{{ w('Portfolio') }}</h5>		 -->
                                            </div>
                                        </div>
                                    </div>
{{--                                    <div--}}
{{--                                        class="elementor-element elementor-element-1168481 elementor-widget elementor-widget-heading"--}}
{{--                                        data-id="1168481" data-element_type="widget" data-widget_type="heading.default">--}}
{{--                                        <div class="elementor-widget-container">--}}
{{--                                            <h2 class="elementor-heading-title elementor-size-default">{{ w('Portfolio') }}</h2>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section portfolio-5">
                <div class="container">
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-10 text-center ">
                            <h2 class="main_title " style="color: #03256c">{{ w('Projects') }}</h2>
                        </div>
                    </div>

{{--                    <div class="row align-items-center mb-5">--}}
{{--                        <div class="col-12 text-center">--}}
{{--                            <div class="btn-group btn-group-toggle " data-toggle="buttons">--}}
{{--                                <label class="btn border-0 active">--}}
{{--                                    <input type="radio" name="shuffle-filter" value="all" checked="checked">All Projects--}}
{{--                                </label>--}}
{{--                                <label class="btn border-0">--}}
{{--                                    <input type="radio" name="shuffle-filter" value="design">UI/UX Design--}}
{{--                                </label>--}}
{{--                                <label class="btn border-0">--}}
{{--                                    <input type="radio" name="shuffle-filter" value="branding">branding--}}
{{--                                </label>--}}
{{--                                <label class="btn border-0">--}}
{{--                                    <input type="radio" name="shuffle-filter" value="illustration">Web Development--}}
{{--                                </label>--}}
{{--                                <label class="btn border-0">--}}
{{--                                    <input type="radio" name="shuffle-filter" value="photo">Photography--}}
{{--                                </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}


                <div class="container-fluid">
                    <?php  $i = 0; ?>
                    <div class="row shuffle-wrapper portfolio-gallery shuffle" style="position: relative; overflow: hidden;  transition: height 250ms cubic-bezier(0.4, 0, 0.2, 1) 0s;">
                        @foreach($projects as $project)
                            @if($i < 6)
                            <div class="col-lg-4 col-6 mb-4 shuffle-item shuffle-item--visible" data-groups="[&quot;design&quot;,&quot;illustration&quot;]" style=" visibility: visible; will-change: transform; opacity: 1; transition-duration: 250ms; transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1); transition-property: transform, opacity;">
                                <div class="position-relative inner-box">
                                    <div class="image position-relative ">
                                        <img src="{{ ($projects[$i]['image'])}}" alt="portfolio-image" class="img-fluid w-100 d-block">
                                        <div class="overlay-box">
                                            <div class="overlay-inner">
                                                <a class="overlay-content text-center" href="{{ route('UI.projectDetails',['id' => $project->id,'project_slug' => $project->project_slug ]) }}">
                                                    <h5 class="mb-0 text-white" >{{ $projects[$i]['project_name'] }}</h5>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </div>
                </div>
                </div>

            </section>
{{--            @if ($projects->count() > 0)--}}

{{--                <section class="pt-3 pb-4 home-concept-construction">--}}
{{--                    <div class="container">--}}
{{--                        <div class="row pt-4">--}}
{{--                            <div class="col">--}}
{{--                                <h2 class="main_title " style="color: #03256c">{{ w('Projects') }}</h2>--}}
{{--                                <p class="lead" style="color: #1768ac">{{ w('Indicate efficiency, accuracy and proficiency') }}.</p>--}}

{{--                                <div class="diamonds-wrapper lightbox  d-none d-md-block"--}}
{{--                                     data-plugin-options="{'delegate': '.diamond', 'type': 'image', 'gallery': {'enabled': true}}">--}}
{{--                                    <ul class="diamonds">--}}
{{--                                        @if (isset($projects))--}}

{{--                                            @if (isset($projects[0]))--}}

{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[0]['image'] }}" class="diamond">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[0]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[0]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}

{{--                                            @if (isset($projects[1]))--}}

{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[1]['image'] }}" class="diamond">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[1]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[1]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}

{{--                                            @if (isset($projects[2]))--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[2]['image'] }}" class="diamond">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[2]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[2]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                            @if (isset($projects[3]))--}}

{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[3]['image'] }}" class="diamond diamond-sm">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[3]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[3]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}

{{--                                            @if (isset($projects[4]))--}}

{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[4]['image'] }}" class="diamond">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[4]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[4]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}

{{--                                            @if (isset($projects[5]))--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[5]['image'] }}" class="diamond diamond-sm">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[5]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[5]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}
{{--                                            @if (isset($projects[6]))--}}
{{--                                                <li>--}}
{{--                                                    <a href="{{ $projects[6]['image'] }}" class="diamond diamond-sm">--}}
{{--                                                        <div class="content">--}}
{{--                                                            <img src="{{ $projects[6]['image'] }}"--}}
{{--                                                                 alt="{{ w('Blog Name') }} - {{ $projects[6]['project_name'] }}"--}}
{{--                                                                 class="img-fluid"/>--}}
{{--                                                        </div>--}}
{{--                                                    </a>--}}
{{--                                                </li>--}}
{{--                                            @endif--}}

{{--                                        @endif--}}

{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row row-diamonds-description justify-content-center justify-content-xl-start">--}}
{{--                            <div class="col-xl-6 col-lg-12">--}}
{{--                                <p style="color: #1768ac">--}}
{{--                                    {{ w("Commitment to the predetermined and agreed upon time frame, in accordance with the contracts concluded with the project owners, to actively contribute the urgency of the companies status.") }}</p>--}}
{{--                                <a class="btn btn-outline btn-primary"--}}
{{--                                   href="{{ route('UI.projects') }}">{{ w('View All Projects') }}</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </section>--}}
{{--            @endif--}}
        <!-- ======= who_are_we Section ======= -->

            @if (isset($manager_word))
                <section id="why_8plus" class="section section-background mb-5 pt-5"
                         style="background-image: url(('frontend/img/background/footer_bg1.jpg')); background-position: 50% 100%; background-size: cover;padding:30px 0; ">
                    <div class="container">

                        <div class="row  @if (app()->getlocale() == 'ar') justify-content-end  @else justify-content-start @endif align-items-center ">
                            <div class="col-lg-6 order-1 order-lg-1  order-md-1 order-sm-1 mb-4">
                                <div class="why8plus" style="   @if (app()->getlocale() == 'ar') text-align: right;  @else text-align: left; @endif ">{{ w('Why 8Plus ?') }}</div>

                                <div class="leader" style="color: #1768ac !important;">
                                    <p >{!! $manager_word->description !!}</p>
                                </div>
                            </div>

                            <div class="col-lg-6 order-2 order-lg-2 order-md-2 order-sm-2 ">
                                <img src="{{ $manager_word->image }}" class="img-fluid "
                                     alt="{{ $manager_word->name }}">
                            </div>

                        </div>
                </section>
            @endif
        <!-- End who_are_we Section -->

            <div
                class="elementor-element elementor-element-cfcaffa elementor-widget elementor-widget-gt3-core-portfolio"
                data-id="cfcaffa" data-element_type="widget"
                data-widget_type="gt3-core-portfolio.default">
                <div class="elementor-widget-container">
                    <div
                        class="portfolio_wrapper show_type_grid hover_type4 packery_type_2 elementor items4 grid_type_square testimonials_has_grid_gap"
                        data-settings="{&quot;pagination_en&quot;:false,&quot;show_title&quot;:true,&quot;show_category&quot;:true,&quot;use_filter&quot;:true,&quot;lazyload&quot;:&quot;yes&quot;,&quot;load_items&quot;:&quot;4&quot;,&quot;grid_gap&quot;:5,&quot;gap_value&quot;:5,&quot;gap_unit&quot;:&quot;px&quot;,&quot;query&quot;:{&quot;post_status&quot;:[&quot;publish&quot;],&quot;post_type&quot;:&quot;portfolio&quot;,&quot;posts_per_page&quot;:&quot;4&quot;,&quot;paged&quot;:1,&quot;exclude&quot;:[97,95,93,91,89,87]},&quot;type&quot;:&quot;grid&quot;,&quot;random&quot;:false,&quot;render_index&quot;:&quot;6&quot;,&quot;settings&quot;:{&quot;grid_type&quot;:&quot;square&quot;,&quot;cols&quot;:4,&quot;show_type&quot;:&quot;grid&quot;,&quot;packery_type&quot;:2,&quot;lazyload&quot;:&quot;yes&quot;,&quot;grid_gap&quot;:5},&quot;cols&quot;:4,&quot;grid_type&quot;:&quot;square&quot;}"
                        data-post-index="6">
                        <div class="isotope-filter isotope-filter--links">
                           <h2 class="main_title">
                                  {{ w('Success Partners') }}
                           </h2>

                        </div>

                        @if (isset($companies) && $companies->count() > 0)
                            <section class="pt-3 section-custom-construction-2">
                                <div class="container">
                                    <div class="row mb-5">
                                        <div class="col-lg-12 text-center">
                                            <div class="owl-carousel owl-theme stage-margin rounded-nav"
                                                 data-plugin-options="{'margin': 25, 'loop': true, 'nav': true, 'dots': false, 'stagePadding': 40, 'items': 5, 'autoplay': true, 'autoplayTimeout': 3000}">
                                                @foreach ($companies as $company)
                                                    <div>
                                                        <img alt="{{ w('Blog Name') }} - {{ $company->name }}" data-toggle="tooltip"
                                                             data-placement="bottom" class="img-fluid" title="{{ $company->name }}"
                                                             src="{{ $company->image}}" height="70px" width="70px">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        @endif

                        {{--                                                <div class="isotope_wrapper gt3_isotope_parent items_list gt3_clear" style="position: relative; height: 2476.13px;">--}}
                        {{--                                                 <div class="isotope_item packery_blog_item_1 loaded lazy_loaded" style="position: absolute; right: 0%; top: 0px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/moments-matter-event-studio/" class="lightbox" title="Moments Matter Event Studio"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#E05E6E;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works01-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works01-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works01-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works01-400x400.jpg" title="works01" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works01-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works01-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works01-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">Moments Matter Event Studio</h4></div></a></div></div><div class="isotope_item packery_blog_item_2 loaded lazy_loaded" style="position: absolute; right: 0%; top: 412.688px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/more-powered-macbook-pro-x/" class="lightbox" title="More Powered Macbook Pro X"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#1E2330;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works02-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works02-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works02-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works02-400x400.jpg" title="works02" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works02-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works02-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works02-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">More Powered Macbook Pro X</h4></div></a></div></div><div class="isotope_item packery_blog_item_3 loaded lazy_loaded" style="position: absolute; right: 0%; top: 825.376px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/stans-office-online-gateway/" class="lightbox" title="Stan’s Office Online Gateway"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#A87CB0;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works03-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works03-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works03-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works03-400x400.jpg" title="works03" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works03-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works03-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works03-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">Stan’s Office Online Gateway</h4></div></a></div></div><div class="isotope_item packery_blog_item_4 loaded lazy_loaded" style="position: absolute; right: 0%; top: 1238.06px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/david-courtney-ios-application/" class="lightbox" title="David Courtney IOS Application"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#9D678B;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works04-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works04-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works04-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works04-400x400.jpg" title="works04" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works04-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works04-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works04-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">David Courtney IOS Application</h4></div></a></div></div><div class="isotope_item packery_blog_item_5 lazy_loaded loaded" style="position: absolute; right: 0%; top: 1650.75px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/daria-e-commerce-ios-application/" class="lightbox" title="Daria e-Commerce IOS Application"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#A9C5C6;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works05-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works05-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works05-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works05-400x400.jpg" title="works05" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works05-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works05-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works05-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">Daria e-Commerce IOS Application</h4></div></a></div></div><div class="isotope_item packery_blog_item_6 loaded lazy_loaded" style="position: absolute; right: 0%; top: 2063.44px;"><div class="wrapper"><a href="https://afkaar-sa.com/index.php/portfolio/get-yo-tacos-ios-application/" class="lightbox" title="Get Yo Tacos IOS Application"><div class="img_wrap"><div class="img"><div class="gt3_portfolio_list__image-placeholder gt3_lazyload__placeholder" style="padding-bottom:100%;background-color:#DCCEE3;"></div><img data-srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works06-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works06-420x420.jpg 420w" data-src="https://afkaar-sa.com/wp-content/uploads/2020/03/works06-400x400.jpg" data-sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px" src="https://afkaar-sa.com/wp-content/uploads/2020/03/works06-400x400.jpg" title="works06" alt="" class="gt3_lazyload_loaded" srcset="https://afkaar-sa.com/wp-content/uploads/2020/03/works06-800x800.jpg 800w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-500x500.jpg 500w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-480x480.jpg 480w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-400x400.jpg 400w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-300x300.jpg 300w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-496x496.jpg 496w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-384x384.jpg 384w, https://afkaar-sa.com/wp-content/uploads/2020/03/works06-600x600.jpg 600w,https://afkaar-sa.com/wp-content/uploads/2020/03/works06-420x420.jpg 420w" sizes="(min-width: 2000px) 800px, (min-width: 1921px) 500px, (min-width: 1600px) 480px, (min-width: 1200px) 400px, (min-width: 992px) 300px, (min-width: 768px) 496px, (min-width: 600px) 384px, (min-width: 420px) 600px, (max-width: 600px) 420px"></div></div><div class="text_wrap"><h4 class="title">Get Yo Tacos IOS Application</h4></div></a></div></div>		</div>--}}
                    </div>
                </div>
            </div>


        <section id="subscribe" class="pt-3 section-custom-construction-2">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-lg-12 col-md-8 col-sm-4 text-center">
                        <div class="subscribe">
                            <h2 class="subscribe__title">{{   w('Let\'s keep in touch')}}</h2>
                            <p class="subscribe__copy">{{w('Subscribe to keep')}}</p>
                            <form class="form" action="#" >
                                <input type="email" class="form__email" placeholder="{{W('Enter your email address')}}" />
                                <button class="form__button">{{w('Send')}}</button>
                            </form>

                        </div>
                </div>
            </div>
        </section>
        </main>



@endsection
