<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>
	<div id="app">
		<header class="text-white">
			<div id="home-slider-bg">
				{{-- top-menu --}}
				<nav class="navbar navbar-expand-md navbar-light bg-transparent shadow-none">
					<div class="container">

						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							{{-- Left Side Of Navbar --}}
							<ul class="navbar-nav mr-auto">
								{{--  --}}
							</ul>

							{{-- Right Side Of Navbar --}}
							<div>
								<button type="submit" class="btn btn-warning btn-sm rounded-pill">
									@lang('Request a callback')
								</button>
							</div>
								
							<div>
								<p class="m-auto"><i class="fas fa-phone-alt fa-lg mr-2 ml-3"></i><span>71 200 00 05</span></p>
							</div>
							<div class="ml-3">
    							{{-- @include('voyager::multilingual.language-selector') --}}
								@include('partials.language-selector')
							</div>
						</div>
					</div>
				</nav>
				
				{{-- main-menu --}}
				{{ menu('main', 'partials.main_menu') }}
				{{-- /.Navbar --}}

		      	{{-- home slider --}}
		      	@yield('home-slider')
		  	</div>
		</header>
		{{-- <div id="gjs"></div> --}}
		@yield('content')   
	</div>
	
	{{-- <script src="{{ asset('js/grapes.min.js') }}"></script>
	<script src="{{ asset('js/grapesjs-preset-webpage.min.js') }}"></script> --}}
	<!-- Bootstrap JS -->
	<script src="{{ asset('js/all.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/app.js') }}" charset="utf-8"></script>

	<script type="text/javascript">
		var editor = grapesjs.init({
			container : '#gjs',
			plugins: ['gjs-preset-webpage'],
			pluginsOpts: {
				'gjs-preset-webpage': {
					blocks: ['link-block', 'quote', 'text-basic']
				}
			}
	  	});
	</script>

</body>
</html>
