<!DOCTYPE html>


<html lang="{{ app()->getLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" >
	<head>
		<meta charset="utf-8" />
		<title>{{ t('Error : 403') }}</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="{{ asset('backend/css/bundle.css') }}" />
		<link rel="stylesheet" href="{{ asset('backend/css/style.css') }}" />
		@if (app()->getlocale() == "ar")
		<link href="https://fonts.googleapis.com/earlyaccess/notokufiarabic.css" rel="stylesheet">
        @else
		<link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">
        @endif
	</head>

	<body>
		<div class="row justify-content-center align-items-center vh-100 text-center">
			<div class="col-lg-5 col-md-6 col-sm-8">
				<div class="error-page">
					<h1>403</h2>
					<p>{{ t("You do not have permission to access this page") }}<br>🤔🤔🤔</p>
					<a href="{{ route('UI.index') }}">
						<button>{{ t("Home") }}</button>
					</a>
			    </div>
			</div>
        </div>
	</body>

</html>
