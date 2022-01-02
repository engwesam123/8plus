<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >

	<!-- begin::Head -->
	<head>
		<!--begin::Base Path (base relative path for assets of this page) -->
		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>{{ t("Login") }}</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link href="{{ asset('backend/css/login/login-2.css') }}" rel="stylesheet" type="text/css" />

        @if (app()->getlocale() == "ar")
        <link rel="stylesheet" href="{{ asset('backend/css/bundle.css') }}" />
        @else
        <link rel="stylesheet" href="{{ asset('backend/css/bundle_en.css') }}" />

        @endif

	
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root kt-login kt-login--v2 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url({{ asset('backend/img/bg/bg-2.jpg') }});">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<a href="{{ route('login') }}">
									<i class="fa fa-user-shield fa-6x text-white"></i>
								</a>
                            </div>


							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h1 class="kt-login__title" style="font-size: 40px">{{ t("Login") }}</h1>
                                </div>

                                <form  class="kt-form" action="{{ route('login') }}" method="POST">
                                    @csrf

                                    @include('Manager.included.notfication')

                                    <style>
                                        .kt-login.kt-login--v2 .kt-login__wrapper .kt-login__container .kt-form .form-control{
                                            color: white;
                                        }
                                    </style>
									<div class="input-group">
										<input class="form-control" type="text" placeholder="{{ t("Email") }}" name="email" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="{{ t("Password") }}" name="password">
									</div>

									<div class="kt-login__actions">
										<button id="kt_login_signin_submit" class="btn btn-pill kt-login__btn-primary">{{ t("Login") }}</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->


	</body>

	<!-- end::Body -->
</html>
