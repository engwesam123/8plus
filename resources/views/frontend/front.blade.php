<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >
	<head>
	    @php
            $setting = App\Setting::first();
        @endphp
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimal-ui ,user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta property="og:image" content="">
        <meta property="og:url" content="{{ asset('') }}">
        <meta property="og:title" content="{{ isset($setting) ? $setting->blog_name : '' }} | @yield('title')">
        <title>{{ isset($setting) ? $setting->blog_name : '' }} | @yield('title')</title>
        <meta property="og:description" content="{{ isset($setting) ? $setting->description : '' }}">
        <meta name="author" content="elafsaihati.com">
        <meta name="description" content="{{ isset($setting) ? $setting->description : '' }}">
        <meta name="keywords" content="{{ isset($setting) ? str_replace(' ', ',', $setting->keywords)  : '' }}">
        <link rel="icon" href="{{ isset($setting) ? $setting->miniLogo : '' }}"/>
		<link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/animate/animate.compat.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/vendor/magnific-popup/magnific-popup.min.css') }}">
        @if (app()->getlocale() == "en")
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/theme-shop.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/css/demos/demo-construction.css') }}">
        @else
		<link href="https://fonts.googleapis.com/earlyaccess/notokufiarabic.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('frontend/rtl/css/rtl-theme.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/rtl/css/rtl-theme-elements.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/rtl/css/rtl-theme-shop.css') }}">
        <link rel="stylesheet" href="{{ asset('frontend/rtl/css/demos/rtl-demo-construction.css') }}">
        @endif
		<link id="skinCSS" rel="stylesheet" href="{{ asset('frontend/css/skins/skin-construction.css') }}">
		<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.css') }}" />


        <style>
            .section-custom-construction-2 .owl-carousel .owl-stage{
                display: flex;
                align-items: center;
            }
        </style>
	</head>
	<body data-spy="scroll" data-target="#sidebar" data-offset="120">


		<div class="body">
			<header id="header" class="header-narrow header-semi-transparent-light" ">
				<div class="header-body">
					<div class="header-container container">
						<div class="header-row">
							<div class="header-column">
								<div class="header-row">
									<div class="header-logo">
                                        @if (isset($setting))
                                            <a href="{{ route('UI.index') }}">
                                                <img class="logo-default" width="150" height="70" src="{{ $setting->default_logo }}">
                                            </a>
                                            <a href="{{ route('UI.index') }}">
                                                <img class="logo-small d-block d-md-none"  width="90" src="{{ $setting->miniLogo }}">
                                                <img class="logo-large d-none d-md-block mt-2"  width="150" src="{{ $setting->logo }}">
                                            </a>
                                        @endif
									</div>
								</div>
							</div>
							<div class="header-column justify-content-end">
								<div class="header-row">
									<div class="header-nav header-nav-stripe order-2 order-lg-1">
										<div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1">
											<nav class="collapse">
												<ul class="nav nav-pills" id="mainNav">
													<li>
														<a class="nav-link {{ Request::routeIs('UI.index') ? 'active' : '' }}"
                                                        href="{{ route('UI.index') }}">
												            {{ w('Home') }}
														</a>
													</li>
                                                    <li>
                                                        <a class="nav-link {{ Request::routeIs('UI.aboutCompany') ? 'active' : '' }}" href="{{ route('UI.aboutCompany') }}">
                                                            {{ w('About us') }}
                                                        </a>
                                                    </li>
													<li>
														<a class="nav-link {{ Request::routeIs('UI.services') ? 'active' : '' }}" href="{{ route('UI.services') }}">
												            {{ w('Services') }}
														</a>
													</li>

													<li>
														<a class="nav-link {{ Request::routeIs('UI.projects') ? 'active' : '' }}" href="{{ route('UI.projects') }}">
												            {{ w('Portfolio') }}
														</a>
													</li>
                                                    <li>
														<a class="nav-link {{ Request::routeIs('') ? 'active' : '' }}" href="">
												            {{ w('Blog') }}
														</a>
													</li>
													<li>
														<a class="nav-link {{ Request::routeIs('UI.contact') ? 'active' : '' }}" href="{{ route('UI.contact') }}">
												            {{ w('Contact') }}
														</a>
													</li>

                                                    <li>
                                                        @if (app()->getLocale() == "ar")
                                                            <a  class="nav-link data-toggle="tooltip" data-placement="bottom" title="{{ w('English language') }}"  href="{{ LaravelLocalization::getLocalizedURL('en') }}">
                                                                <img style="border-radius: 50px" width="25px" height="25px" src="{{ asset('backend/img/flags/012-uk.svg') }}" alt="{{ w('English language') }}">
                                                            </a>
                                                        @else
                                                            <a class="nav-link data-toggle="tooltip" data-placement="bottom" title="{{ w('Arabic language') }}"  href="{{ LaravelLocalization::getLocalizedURL('ar') }}">
                                                                <img style="border-radius: 50px"  width="25px" height="25px" src="{{ asset('backend/img/flags/008-saudi-arabia.svg') }}" alt="{{ w('Arabic language') }}">
                                                            </a>
                                                        @endif

													</li>
												</ul>
											</nav>
										</div>
										<button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main nav">
											<i class="fas fa-bars"></i>
										</button>
									</div>
									<div class="header-nav-features header-nav-features-no-border d-none d-sm-block order-1 order-lg-2">
										<ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean ml-0">
                                            @if (isset($setting))
                                                <li class="social-icons-facebook"><a href="{{ $setting->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li class="social-icons-twitter"><a href="{{ $setting->twitter }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                <li class="social-icons-linkedin"><a href="{{ $setting->linkedin }}" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li class="social-icons-instagram"><a href="https://www.instagram.com/8plusit/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                                                <li class="social-icons-telegram"><a href="https://t.me/eightplusit" target="_blank" title="telegram"><i class="fab fa-telegram"></i></a></li>
                                            @endif

										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>


            @yield('content')

			<footer id="footer" class="border-top-0" >
				<div class="container  py-4">
					<div class="row pt-0 pb-5">
						<div class="col-md-3">
							<a href="{{ route('UI.index') }}" class="mb-4">
								<img alt="{{ w('Blog Name') }}" class="img-fluid logo" width="110" src="{{ $setting->miniLogo }}">
							</a>
                            <p class="mt-3">
                                * بلس 8 .. معك في كل وقت تواصل معنا الآن
                                * مع بلس 8 .. أنت في المقدمة

                            </p>
                            <ul class="header-social-icons social-icons d-none d-sm-block social-icons-clean ml-0 mt-2">
                                @if (isset($setting))
                                    <li class="social-icons-facebook"><a href="{{ $setting->facebook }}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="social-icons-twitter"><a href="{{ $setting->twitter }}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                    <li class="social-icons-linkedin"><a href="{{ $setting->linkedin }}" target="_blank" title="Linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                    <li class="social-icons-instagram"><a href="https://www.instagram.com/8plusit/" target="_blank" title="instagram"><i class="fab fa-instagram"></i></a></li>
                                    <li class="social-icons-telegram"><a href="https://t.me/eightplusit" target="_blank" title="telegram"><i class="fab fa-telegram"></i></a></li>
                                @endif

                            </ul>
						</div>

						<div class="col-md-4">
							<div class="row">
								<div class="col-lg-6 mb-2 mt-4">
									<h4>{{ w('Navigation') }}</h4>
								</div>
							</div>
							<div class="row">
								<div class="col-6 mb-0">
									<ul class="list list-footer-nav">

										<li>
											<a href="{{ route('UI.index') }}">
												{{ w('Home') }}

											</a>
										</li>
                                        <li>
                                            <a href="{{ route('UI.aboutCompany') }}">
                                                {{ w('Company') }}
                                            </a>
                                        </li>
                                        <li>
											<a href="{{ route('UI.projects') }}">
												{{ w('Portfolio') }}
											</a>
										</li>



									</ul>
								</div>
								<div class="col-6">
									<ul class="list list-footer-nav">

                                        <li>
											<a target="_black" href="{{ $setting->file }}">
												{{ w('Company Profile') }}
											</a>
										</li>

{{--                                        <li>--}}
{{--											<a target="_black" href="{{ asset('frontend/img/organization-chart.jpg')}}">--}}
{{--												{{ w('Organizational Chart') }}--}}
{{--											</a>--}}
{{--										</li>--}}

										<li>
											<a href="{{ route('UI.contact') }}">
												{{ w('Contact') }}
											</a>
										</li>

									</ul>
								</div>
							</div>
						</div>
						<div class="col-md-5 mt-4">

                            @if (isset($setting))
                                <h4>{{ w('Contact Us') }}</h4>

                                <p> <i class="far fa-map-marker-alt   @if (app()->getlocale() == 'en') mr-2 @else ml-2 @endif "></i> <span dir="ltr">{{ $setting->address }}</span></p>
							    <p> <i class="far fa-phone @if (app()->getlocale() == 'en') mr-2 @else ml-2 @endif"></i> <span dir="ltr">{{ $setting->phone }}</span></p>
                                <p><i class="far fa-envelope @if (app()->getlocale() == 'en') mr-2 @else ml-2 @endif"></i> <a href="mailto:{{ $setting->email }}"> {{ $setting->email }}</a></p>
                            @endif

						</div>
					</div>

					<div class="footer-copyright">
						<div class="row">
							<div class="col-lg-12 text-center">
                                @if (isset($setting))
								    <p>{{ w("© Copyright 2021. All Rights Reserved") }} {{ $setting->blog_name }} </p>
                                @endif

							</div>
						</div>
					</div>

				</div>
			</footer>
		</div>

        <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<!-- Vendor -->
		<script   src="{{ asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/popper/umd/popper.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/isotope/jquery.isotope.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
		<script   src="{{ asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>

		<!-- Theme Base, Components and Settings -->
		<script   src="{{ asset('frontend/js/theme.js')}}"></script>

		<script   src="{{ asset('frontend/js/demos/demo-construction.js')}}"></script>
		<!-- Theme Custom -->
		<script   src="{{ asset('frontend/js/custom.js')}}"></script>

		<!-- Theme Initialization Files -->
		<script   src="{{ asset('frontend/js/theme.init.js')}}"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>

        <script>
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script  src="{{ asset('vendor/toastr/js/toastr.js') }}" type="text/javascript"></script>

            @if (app()->getlocale() =="ar")
                <script>
                    toastr.options = {
                        "closeButton" : true,
                        "debug" : false,
                        "newestOnTop" : true,
                        "progressBar" : true,
                        "positionClass" : "toast-top-left",
                        "preventDuplicates" : false,
                        "onclick" : null,
                        "showDuration" : "500",
                        "hideDuration" : "1800",
                        "timeOut" : "5000",
                        'rtl'   : true,
                        "extendedTimeOut" : "1800",
                        "showEasing" : "swing",
                        "hideEasing" : "linear",
                        "showMethod" : "fadeIn",
                        "hideMethod" : "fadeOut"
                    }
                </script>
            @else
                <script>
                    toastr.options = {
                        "closeButton" : true,
                        "debug" : false,
                        "newestOnTop" : true,
                        "progressBar" : true,
                        "positionClass" : "toast-top-right",
                        "preventDuplicates" : false,
                        "onclick" : null,
                        "showDuration" : "500",
                        "hideDuration" : "1800",
                        "timeOut" : "5000",
                        'rtl'   : false,
                        "extendedTimeOut" : "1800",
                        "showEasing" : "swing",
                        "hideEasing" : "linear",
                        "showMethod" : "fadeIn",
                        "hideMethod" : "fadeOut"
                    }
                </script>
            @endif

            {{-- For Toaster Delete  --}}
            {!! Toastr::message() !!}

            @stack('scripts')





	</body>
</html>
