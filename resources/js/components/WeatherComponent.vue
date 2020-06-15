<template>
	<div id="weather-widget" class="weather">
		<div class="weatherIco"><img src="//openweathermap.org/img/w/03d.png" alt=""></div>
		<div class="weatherData">
			<div class="weatherT">
				<span class="sign">+</span><strong class="temp">28</strong><small>°C</small>
			</div>
			<div class="wRegions">
				<div class="WRSelected" @click="toggle = !toggle">
					<span>Toshkent</span>
				</div>
				<ul :class="{'display-none': toggle}">
					<li><a href="#" data-temp="31" data-sign="+" data-icon="02d">Andijon</a></li>
					<li><a href="#" data-temp="29" data-sign="+" data-icon="10d">Buxoro</a></li>
					<li><a href="#" data-temp="30" data-sign="+" data-icon="10d">Farg'ona</a></li>
					<li><a href="#" data-temp="27" data-sign="+" data-icon="10d">Jizzakh</a></li>
					<li><a href="#" data-temp="32" data-sign="+" data-icon="02d">Namangan</a></li>
					<li><a href="#" data-temp="29" data-sign="+" data-icon="04d">Navoiy</a></li>
					<li><a href="#" data-temp="27" data-sign="+" data-icon="04d">Nukus</a></li>
					<li><a href="#" data-temp="28" data-sign="+" data-icon="10d">Qarshi</a></li>
					<li><a href="#" data-temp="25" data-sign="+" data-icon="10d">Samarqand</a></li>
					<li><a href="#" data-temp="29" data-sign="+" data-icon="03d">Sirdaryo</a></li>
					<li><a href="#" data-temp="33" data-sign="+" data-icon="10d">Termiz</a></li>
					<li><a href="#" data-temp="28" data-sign="+" data-icon="03d">Toshkent</a></li>
					<li><a href="#" data-temp="28" data-sign="+" data-icon="03d">Toshkent v.</a></li>
					<li><a href="#" data-temp="28" data-sign="+" data-icon="04d">Urgench</a></li>
				</ul>
			</div>
		</div>
	</div>
</template>

<script>
	export default {

		data () {
			return {
				wdata: [],
				toggle: true
			}
		},

        counted() {
            axios.get('http://meteo.uz/api/v2/current-weather_ru.json')
                .then(response => console.log('from master', response.data));
        },

		mounted() {
			console.log('Component mounted');
		}
	}
</script>
