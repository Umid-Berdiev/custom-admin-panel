<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Laravel</title>

	<!-- Fontawesome -->
	<script src="{{ asset('js/fontawesome/dded8d9ada.js') }}"></script>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{ asset('css/all.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

	<!-- bootstrap-select CSS -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
	
	<!-- SlickJs CSS -->
	<link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick-theme.css') }}">
	
	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="{{ asset('swiper/css/swiper.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/swiper.css') }}">

	@yield('custom-css')

</head>
<body>
	<div id="app">
		<div class="container-fluid header mb-4" style="background-image: linear-gradient(to right, #332D2D, #530F0F);">
			<div class="container">
				{{ menu('main', 'partials.main_menu') }}
			</div>
		</div>
		{{-- <div id="gjs"></div> --}}
		@yield('content')

		@include('partials.footer')
	</div>

	<!-- Bootstrap JS -->
	<script src="{{ asset('js/all.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
	<script src="{{ asset('slick-1.8.1/slick/slick.min.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/custom.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/carousel.js') }}" charset="utf-8"></script>
	<script src="{{ asset('js/homeslider.js') }}" charset="utf-8"></script>
	
	<!-- bootstrap-select JS -->
	<script src="{{ asset('js/bootstrap-select.min.js') }}" charset="utf-8"></script>

	<!-- SlickJs JS -->
	<script src="{{ asset('slick-1.8.1/slick/slick.min.js') }}" charset="utf-8"></script>
	
	<!-- Axios JS -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	@yield('vue-scripts')
	@yield('swiper-scripts')

	<script type="text/javascript">
		axios("{{ route('get_currency', 'USD') }}").then(response => console.log(response.data));

	</script>

</body>
</html>
