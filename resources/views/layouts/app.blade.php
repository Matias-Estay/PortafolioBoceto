<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>App JRI</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="w-100 h-100">
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="z-index:10;">
			<a class="navbar-brand" href="/">Bienvenida</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
				aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					{{-- @if (0 > 1) --}}
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Formularios
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/formularios/FHT">Ficha VT</a>
						</div>
					</li>
					{{-- @endif --}}
				</ul>
				<ul class="navbar-nav ml-auto">
					@if (Route::has('login'))
					@auth
					<li class="nav-item">
						<a class="nav-link active" href="{{ url('/inicio') }}">Inicio</a>
					</li>
					@else
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">Ingresar</a>
					</li>
					@if (Route::has('register'))
						@if (0 > 1)<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">Registrarse</a>
						</li>
						@endif
					@endif
					@endauth
					@endif
				</ul>
			</div>
		</nav>
	</header>
	<main id="app" class="h-100 w-100 position-fixed">
		@yield('content')
	</main>
</body>
<script>
	var isChromium = window.chrome;
	var winNav = window.navigator;
	var vendorName = winNav.vendor;
	var isOpera = typeof window.opr !== "undefined";
	var isIEedge = winNav.userAgent.indexOf("Edge") > -1;
	var isIOSChrome = winNav.userAgent.match("CriOS");
	if (isIOSChrome) {
	// is Google Chrome on IOS
	} else if(
	isChromium !== null &&
	typeof isChromium !== "undefined" &&
	vendorName === "Google Inc." &&
	isOpera === false &&
	isIEedge === false
	) {
	} else {
		alert('Por favor utilizar está aplicación en Google Chrome');
	}
</script>
</html>