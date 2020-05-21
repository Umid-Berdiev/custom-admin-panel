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

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
	
	<!-- SlickJs CSS -->
	<link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick.css') }}">
	<link rel="stylesheet" href="{{ asset('slick-1.8.1/slick/slick-theme.css') }}">
	
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

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

	<!-- SlickJs CSS -->
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
	
	<!-- Axios JS -->
	<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

	@yield('vue-scripts')

	<script type="text/javascript">
		let posts = @json($posts, JSON_UNESCAPED_UNICODE);

		const changeActiveFeed = function(item) {
			btns.forEach(btn => btn.classList.remove('active-feed'));
			item.classList.add('active-feed');
		}

		var slideIndex = 0;
		var clickedSlideIndex = 0;
		
		window.onload = () => {
			showSlides();
			showSlideOnClick(clickedSlideIndex);
		}

		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("homenews-feed-btn");
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";  
			}
			slideIndex++;
			if (slideIndex > slides.length) {slideIndex = 0}    
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active-feed", "");
			}
			if (slideIndex > 0) {
				slides[slideIndex-1].style.display = "block";  
				dots[slideIndex-1].className += " active-feed";
			} else {
				slides[slideIndex].style.display = "block";  
				dots[slideIndex].className += " active-feed";
			}
		  	setTimeout(showSlides, 3000); // Change image every 2 seconds
		}

		function currentSlide(n) {
			showSlideOnClick(clickedSlideIndex = n);
		}

		function showSlideOnClick(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("homenews-feed-btn");
			if (n > slides.length) {clickedSlideIndex = 1}    
				if (n < 1) {clickedSlideIndex = slides.length}
					for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";  
					}
					for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active-feed", "");
					}
					slides[clickedSlideIndex-1].style.display = "block";  
					dots[clickedSlideIndex-1].className += " active-feed";
				}
	</script>

</body>
</html>
