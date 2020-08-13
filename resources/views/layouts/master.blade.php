<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>{{ env('APP_NAME', 'Laravel') }}</title>

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
		<header id="header">
            <div class="container-fluid header mb-4" style="background-image: linear-gradient(to right, #332D2D, #530F0F);">
                <div class="container">
                    {{ menu('main', 'partials.main_menu') }}
                </div>
            </div>
            <div class="container mb-3">
                <div class="home-banner"></div>
                <div class="row">
                    <div class="col-auto">
                        <!-- <weather-component /> -->
                        @include('partials.weather')
                    </div>
                    <div class="col-auto">
                        <!-- <exchange-component /> -->
                        @include('partials.exchange_rates')
                    </div>
                </div>
            </div>
        </header>
        <main id="main">
            <!-- <App /> -->
            @yield('content')
        </main>
        <footer id="footer">
            @include('partials.footer')
        </footer>
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

	<script>
        const layoutApp = new Vue({
            el:'#header',
            data() {
                return {
                    regions: [],
                    cityName: 'Toshkent sh.',
                    weatherData: [],
                    USD: null,
                    EUR: null,
                    RUB: null,
                }
            },
            methods: {
                async getUzRegions() {
                    const response = await axios('{{ route("get_regions") }}');
                    this.regions = await response.data;
                },
                async getWeatherData(cityName) {
                    let city_name = cityName.slice(0, cityName.indexOf(' '));
                    if (city_name == "Farg'ona")
                        city_name = "Fergana";
                    const apiKey = '2dfb7904f8b22cab6a7ecac7f5e3fea1';
                    const response = await axios(`https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?q=${city_name},UZ&units=metric&lang=ru&appid=${apiKey}`);
                    this.weatherData = await response.data;
                },
                async getExchangeRates() {
                    const response1 = await axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/`);
                    const response2 = await axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/EUR/`);
                    const response3 = await axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/`);
                    this.USD = await response1.data;
                    this.EUR = await response2.data;
                    this.RUB = await response3.data;
                }
            },
            mounted() {
                this.getUzRegions();
                axios({
                    method: 'get',
                    url: `https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?q=Tashkent,UZ&units=metric&lang=ru&appid=2dfb7904f8b22cab6a7ecac7f5e3fea1`,
                }).then(response => this.weatherData = response.data);
                this.getExchangeRates();
            }
        });
    </script>

    @yield('vue-scripts')
	@yield('swiper-scripts')

</body>
</html>
