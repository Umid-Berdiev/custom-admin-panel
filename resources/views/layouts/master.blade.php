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
                <div class="row">
                    @include('partials.covid19banner')
                </div>

                <div class="row mt-2">
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

        if (!localStorage.regions)
            localStorage.setItem("regions", JSON.stringify({!! json_encode($regions, JSON_UNESCAPED_UNICODE) !!}));

        const headerApp = new Vue({
            el:'#header',
            data() {
                return {
                    regions: [],
                    cityName: 'Toshkent sh.',
                    weatherData: [],
                    USD: null,
                    EUR: null,
                    RUB: null,
                    weatherIsLoading: true,
                    exchangeRatesIsLoading: true,
                    covid19DataGlobal: [],
                    covid19DataLocal: [],
                }
            },
            methods: {
                async getWeatherData(cityName) {
                    this.weatherIsLoading = true;
                    let city_name = cityName.slice(0, cityName.indexOf(' '));
                    if (city_name == "Farg`ona") {
                        city_name = "Fergana";
                    }
                    const apiKey = '2dfb7904f8b22cab6a7ecac7f5e3fea1';
                    const response = await axios(`https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?q=${city_name},UZ&units=metric&lang=ru&appid=${apiKey}`);
                    this.weatherData = await response.data;
                    this.cityName = cityName;
                    localStorage.weatherData = JSON.stringify(response.data);
                    localStorage.cityName = cityName;
                    this.weatherIsLoading = false;
                },

                async getExchangeRates() {
                    axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/EUR/`)
                        .then(response => {
                            localStorage.EUR = JSON.stringify(response.data);
                            this.EUR = response.data;
                        });
                    axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/`)
                        .then(response => {
                            localStorage.RUB = JSON.stringify(response.data);
                            this.RUB = response.data;
                        });
                    axios(`https://cors-anywhere.herokuapp.com/https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/`)
                        .then(response => {
                            localStorage.USD = JSON.stringify(response.data);
                            this.USD = response.data;
                        });

                    this.exchangeRatesIsLoading = false;
                },

                fetchCovi19Data() {
                    axios("https://cors-anywhere.herokuapp.com/https://api.covid19api.com/summary")
                        .then(response => {
                            localStorage.covid19Data = JSON.stringify(response.data);
                            this.covid19DataGlobal = response.data.Global;
                            this.covid19DataLocal = response.data.Countries.filter(item => item.CountryCode == "UZ")[0];
                        })
                        .catch(e => {
                            console.log("covid19 data fetching error: ", e);
                            this.covid19DataGlobal = JSON.parse(localStorage.covid19Data).Global;
                            this.covid19DataLocal = JSON.parse(localStorage.covid19Data).Countries.filter(item => item.CountryCode == "UZ")[0];
                        });
                },

                getLastTuesdayDate() {
                    let lastTuesday = new Date();
                    let day = lastTuesday.getDay();
                    let diff = (day <= 2) ? (7 - 2 + day ) : (day - 2);

                    lastTuesday.setDate(lastTuesday.getDate() - diff);
                    lastTuesday.setHours(0);
                    lastTuesday.setMinutes(0);
                    lastTuesday.setSeconds(0);

                    return lastTuesday;
                }
            },

            mounted() {
                if (localStorage.regions) {
                    this.regions = JSON.parse(localStorage.regions);
                }

                if (localStorage.USD && localStorage.RUB && localStorage.EUR) {
                    if (Date.now() - this.getLastTuesdayDate() > 604800000) {
                        this.getExchangeRates();
                    }
                    else {
                        this.EUR = JSON.parse(localStorage.EUR);
                        this.RUB = JSON.parse(localStorage.RUB);
                        this.USD = JSON.parse(localStorage.USD);
                        this.exchangeRatesIsLoading = false;
                    }
                } else {
                    console.log('step4');
                    this.getExchangeRates();
                }

                if (localStorage.weatherData && localStorage.cityName) {
                    if (Date.now() - localStorage.weatherData.dt * 1000 >= 3600000) {
                        this.getWeatherData(localStorage.cityName);
                    } else {
                        this.weatherData = JSON.parse(localStorage.weatherData);
                        this.cityName = localStorage.cityName;
                        this.weatherIsLoading = false;
                    }
                } else {
                    axios({
                        method: 'get',
                        url: `https://cors-anywhere.herokuapp.com/http://api.openweathermap.org/data/2.5/weather?q=Tashkent,UZ&units=metric&lang=ru&appid=2dfb7904f8b22cab6a7ecac7f5e3fea1`,
                    }).then(response => {
                        localStorage.weatherData = JSON.stringify(response.data);
                        localStorage.cityName = this.cityName;
                        this.weatherData = response.data;
                        this.weatherIsLoading = false;
                    });
                }

                if (localStorage.covid19Data) {
                    let covid19DataDate = JSON.parse(localStorage.covid19Data).Date;
                    if (Date.now() - (new Date(covid19DataDate)) > 18000000) {
                        this.fetchCovi19Data();
                    } else {
                        this.covid19DataGlobal = JSON.parse(localStorage.covid19Data).Global;
                        this.covid19DataLocal = JSON.parse(localStorage.covid19Data).Countries.filter(item => item.CountryCode == "UZ")[0];
                    }
                } else {
                    this.fetchCovi19Data();
                }
            }
        });

    </script>

    @yield('presscenter-news-vue-scripts')
    @yield('infodigest-vue-scripts')
    @yield('locals-vue-scripts')
	@yield('digest-vue-scripts')
	@yield('directory-vue-scripts')

</body>
</html>
