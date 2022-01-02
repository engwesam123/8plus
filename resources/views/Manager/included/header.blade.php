<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    @php
        $setting = App\Setting::first();
    @endphp
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $setting->blog_name }}</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="icon" href="{{ $setting->miniLogo }}" type="image/x-icon"/>
    <meta name="google-site-verification" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('backend/css/perfect-scrollbar.rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/toastr/css/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}" />


    @if (app()->getlocale() == "ar")
		<link href="https://fonts.googleapis.com/earlyaccess/notokufiarabic.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('backend/css/bundle.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/css/datatables.bundle.css') }}" />
    @else
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="{{ asset('backend/css/bundle_en.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/css/datatables.bundle_en.css') }}" />
    @endif

    <link rel="stylesheet" href="{{ asset('backend/css/skins/header/base/light.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/skins/header/menu/light.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/skins/brand/dark.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/css/skins/aside/dark.css') }}" />

    <link href="{{ asset('backend/vendor/vendors/line-awesome/css/line-awesome.css')}}" rel="stylesheet" type="text/css" />

    @yield('style')

</head>

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="{{ route('dashboard') }}">
                <img width="50px" height="40px" alt="{{ isset($setting) ? $setting->blog_name : '' }}"
                 src="{{ isset($setting) ? $setting->miniLogo : '' }}" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler" id="kt_aside_mobile_toggler"><span></span></button>
        </div>
    </div>
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <button class="kt-aside-close " id="kt_aside_close_btn">
                <i class="fal fa-times"></i>
            </button>

            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
                <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
                    <div class="kt-aside__brand-logo">
                        <a href="{{ route('dashboard') }}">
                           <img  alt="{{ isset($setting) ? $setting->blog_name : '' }}"
                             src="{{ asset('backend/img/new_logo.png') }}" width="75px"/>
                        </a>
                    </div>
                    <div class="kt-aside__brand-tools">
                        <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
                            <span>
                                <i class="far fa-chevron-double-left kt-svg-icon"></i>
                            </span>
                            <span>
                                <i class="far fa-chevron-double-right kt-svg-icon"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
                    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
                        <ul class="kt-menu__nav ">

                            <li class="kt-menu__item  {{ Request::routeIs('dashboard') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('dashboard') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-tachometer-alt-slowest"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t('Dashboard') }}</span>
                                </a>
                            </li>

                            @if (auth()->user()->hasRole('super_admin'))
                                <li class="kt-menu__item  {{ Request::routeIs('user.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                    <a href="{{ route('user.index') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
                                            <i class="fal fa-user-shield"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{ t("Managers") }}</span>
                                    </a>
                                </li>
                            @endif


                            @if (auth()->user()->hasRole('super_admin'))

                                <li class="kt-menu__item  {{ Request::routeIs('employee.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                    <a href="{{ route('employee.index') }}" class="kt-menu__link ">
                                        <span class="kt-menu__link-icon">
                                            <i class="fal fa-user-tie"></i>
                                        </span>
                                        <span class="kt-menu__link-text">{{ t("Employees") }}</span>
                                    </a>
                                </li>
                            @endif

                            <li class="kt-menu__item  {{ Request::routeIs('slider.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('slider.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-images"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Slider") }}</span>
                                </a>
                            </li>
                            <li class="kt-menu__item  {{ Request::routeIs('how_works.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('how_works.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-briefcase"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("How work") }}</span>
                                </a>
                            </li>

                            <li class="kt-menu__item  {{ Request::routeIs('service.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('service.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-tools"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Services") }}</span>
                                </a>
                            </li>

                            <li class="kt-menu__item  {{ Request::routeIs('project.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('project.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-building"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Projects") }}</span>
                                </a>
                            </li>


                            <li class="kt-menu__item  kt-menu__item--submenu
                                {{ Request::routeIs('leader_ship.index') ? 'kt-menu__item--open' : ''}}
                                {{ Request::routeIs('partner.index') ? 'kt-menu__item--open' : ''}}
                                {{ Request::routeIs('history.edit',1) ? 'kt-menu__item--open' : ''}}
                                {{ Request::routeIs('about.edit',1) ? 'kt-menu__item--open' : ''}}
                                {{ Request::routeIs('visible.index') ? 'kt-menu__item--open' : ''}}
                                "
                                    aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                                <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                                <span class="kt-menu__link-icon">
                                <i class="fal fa-database"></i>
                                </span>
                                    <span class="kt-menu__link-text">{{ t("About Company") }}</span>
                                    <i class="kt-menu__ver-arrow far fa-angle-left"></i>
                                </a>
                                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                    <ul class="kt-menu__subnav">

                                        <li class="kt-menu__item  {{ Request::routeIs('about.edit',1) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                            <a href="{{ route('about.edit',1) }}" class="kt-menu__link ">
                                                <span class="kt-menu__link-icon">
                                                    <i class="fal fa-file-user"></i>
                                                </span>
                                                <span class="kt-menu__link-text">{{ t('About Us') }}</span>
                                            </a>
                                        </li>

                                        <li class="kt-menu__item  {{ Request::routeIs('visible.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                            <a href="{{ route('visible.index') }}" class="kt-menu__link ">
                                                <span class="kt-menu__link-icon">
                                                    <i class="fal fa-location"></i>
                                                </span>
                                                <span class="kt-menu__link-text">{{ t('Company Visible') }}</span>
                                            </a>
                                        </li>

                                        <li class="kt-menu__item  {{ Request::routeIs('history.edit',1) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                            <a href="{{ route('history.edit',1) }}" class="kt-menu__link ">
                                                <span class="kt-menu__link-icon">
                                                    <i class="fal fa-history"></i>
                                                </span>
                                                <span class="kt-menu__link-text">{{ t("values") }}</span>
                                            </a>
                                        </li>



                                        <li class="kt-menu__item  {{ Request::routeIs('leader_ship.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                            <a href="{{ route('leader_ship.index') }}" class="kt-menu__link ">
                                                <span class="kt-menu__link-icon">
                                                    <i class="fal fa-user-shield"></i>
                                                </span>
                                                <span class="kt-menu__link-text">{{ t("Our goals") }}</span>
                                            </a>
                                        </li>

{{--                                        <li class="kt-menu__item  {{ Request::routeIs('partner.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">--}}
{{--                                            <a href="{{ route('partner.index') }}" class="kt-menu__link ">--}}
{{--                                                <span class="kt-menu__link-icon">--}}
{{--                                                    <i class="fal fa-handshake-alt"></i>--}}
{{--                                                </span>--}}
{{--                                                <span class="kt-menu__link-text">{{ t("Partners") }}</span>--}}
{{--                                            </a>--}}
{{--                                        </li>--}}
                                    </ul>
                                </div>
                            </li>



                            <li class="kt-menu__item  {{ Request::routeIs('manager_word.edit',1) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('manager_word.edit',1) }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-file-alt"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Manager Word") }}</span>
                                </a>
                            </li>


                            <li class="kt-menu__item  {{ Request::routeIs('company.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('company.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-home-lg"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Clients") }}</span>
                                </a>
                            </li>




                            <li class="kt-menu__item  {{ Request::routeIs('contact.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('contact.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-envelope"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Contacts") }}</span>
                                </a>
                            </li>

                            {{-- <li class="kt-menu__item  {{ Request::routeIs('news_letter.index') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('news_letter.index') }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-paper-plane"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("NewsLetter") }}</span>
                                </a>
                            </li> --}}

                            <li class="kt-menu__item  {{ Request::routeIs('userProfile') ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                    <a href="{{ route('userProfile') }}" class="kt-menu__link ">
                                <span class="kt-menu__link-icon">
                                    <i class="fal fa-file-user"></i>
                                </span>
                                    <span class="kt-menu__link-text">{{ t('User Profile') }}</span>
                                </a>
                            </li>


                            <li class="kt-menu__item  {{ Request::routeIs('setting.edit',1) ? 'kt-menu__item--active' : ''}}" aria-haspopup="true">
                                <a href="{{ route('setting.edit',1) }}" class="kt-menu__link ">
                                    <span class="kt-menu__link-icon">
                                        <i class="fal fa-cog"></i>
                                    </span>
                                    <span class="kt-menu__link-text">{{ t("Web Settings") }}</span>
                                </a>
                            </li>




                            <li class="kt-menu__item" aria-haspopup="true">
                                <form action="{{ route('logout') }}" method="POST"  class="kt-menu__link ">
                                    @csrf
                                    <span class="kt-menu__link-icon">
                                       <i class="fal fa-door-open text-danger"></i>
                                    </span>
                                    <button type="submit" class="kt-menu__link-text text-danger" >{{ t('Logout') }}</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>




            <div class="kt-grid__item  kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">
					<!-- begin:: Header Menu -->
					<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
					<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper" style="opacity: 1;">
						<div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
							<ul class="kt-menu__nav ">
								<li class="kt-nav-top kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu
                                    kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active">
                                    <a href="{{ route('dashboard') }}" class="mr-2">{{ t("Dashboard") }}</a>
								</li>
                                <li class="kt-nav-top kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu
                                    kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active">
                                    <a href="{{ route('UI.index') }}" >{{ t('Home') }}</a>
                                </li>
							</ul>
						</div>
					</div>


                    <div class="kt-header__topbar">
						<!--begin: Language bar -->
						<div class="kt-header__topbar-item kt-header__topbar-item--langs">
							<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
								<span class="kt-header__topbar-icon">
									<img class="" src="@lang('site.sampleImg')" alt="">
								</span>
							</div>
							<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
								<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
                                    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        @if ($properties['native'] == 'English')
                                            <li class="kt-nav__item kt-nav__item--active" >
                                                <a hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="kt-nav__link">
                                                    <span class="kt-nav__link-icon"><img src="{{ asset('8plus/public/'.'backend/img/flags/012-uk.svg') }}" alt=""></span>
                                                    <span class="kt-nav__link-text">{{ $properties['native'] }}</span>
                                                </a>
                                            </li>
                                        @else
                                            <li class="kt-nav__item kt-nav__item--active" hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                <a hreflang="{{ $localeCode }}"
                                                href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="kt-nav__link">
                                                    <span class="kt-nav__link-icon"><img src="{{ asset('8plus/public/'.'backend/img/flags/008-saudi-arabia.svg') }}" alt=""></span>
                                                    <span class="kt-nav__link-text">{{ $properties['native'] }}</span>
                                                </a>
                                            </li>
                                        @endif


                                    @endforeach
								</ul>
							</div>
						</div>
					</div>


				</div>


                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                    <div class="kt-content  kt-grid__item kt-grid__item--fluid">
                        @yield('content')
                    </div>
                </div>

            </div>
        </div>
    </div>



</body>



<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#22b9ff",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#2488f1",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#df1b4c"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>


<script  src="{{ asset('backend/js/jquery.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/popper.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/bootstrap.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/js.cookie.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/moment.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script  src="{{ asset('backend/js/sticky.js') }}" type="text/javascript"></script>
<script  src="{{ asset('vendor/toastr/js/toastr.js') }}" type="text/javascript"></script>
<script src="{{ asset('backend/js/scripts.bundle.js')}}"></script>
<script src="{{ asset('backend/js/datatables.bundle.js')}}"></script>

{{-- For Tooltip --}}
<script>
    $('table').on('draw.dt', function() {
        $('[data-toggle="tooltip"]').tooltip({
             trigger: "hover"
        });
    })
</script>

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

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>


<script>
    $(".image").change(function () {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function (e) {

                // $('.image_preview').attr('src', e.target.result);
                $('.image_preview').css('bacground-image', 'url(' + e.target.result + ')');

            }

            reader.readAsDataURL(this.files[0]);
        }
    });


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }

    }
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview2').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview2').hide();
                $('#imagePreview2').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview3').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview3').hide();
                $('#imagePreview3').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function readURL4(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imagePreview4').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview4').hide();
                $('#imagePreview4').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imageUpload").change(function () {
        readURL(this);
    });

    $("#imageUpload2").change(function () {
        readURL2(this);
    });
    $("#imageUpload3").change(function () {
        readURL3(this);
    });
    $("#imageUpload4").change(function () {
        readURL4(this);
    });


</script>



@stack('scripts')


</body>

</html>




