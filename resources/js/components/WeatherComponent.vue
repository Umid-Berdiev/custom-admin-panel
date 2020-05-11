<template>
	<div id="weather-widget" class="weather">
		<div class="weatherIco"><img src="//openweathermap.org/img/w/03d.png" alt=""></div>
		<div class="weatherData">
			<div class="weatherT">
				<span class="sign">+</span><strong class="temp">28</strong><small>°C</small>
			</div>
			<div class="wRegions">
				<div class="WRSelected" @click="toggleDropdown = ! toggleDropdown">
					<span>Toshkent</span>
				</div>
				<ul class="{'d-none' : toggleDropdown}">
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
	    	toggleDropdown: false
	    }
	  }
	}
</script>

<style lang="css" scoped>
	/*weather widget*/
	.weather, .exchangeRates {
	    display: inline-block;
	    vertical-align: middle;
	}
	.weatherIco {
	    display: inline-block;
	    vertical-align: middle;
	    /**vertical-align: auto;
	    *zoom: 1;
	    *display: inline;*/
	    line-height: 40px;
	    padding: 0 5px 0 0;
	}
	.weatherData {
	    display: inline-block;
	    vertical-align: middle;
	    /**vertical-align: auto;
	    *zoom: 1;
	    *display: inline;*/
	    color: inherit;
	}
	.wRegions {
	    position: relative;
	    z-index: 9;
	}
	.WRSelected {
		font-size: 13px;
		color: #bab2b2;
		cursor: pointer;
		white-space: nowrap;
	}
	.wRegions ul {
		display: none;
		position: absolute;
		top: 100%;
		left: -55px;
		margin: 28px 0 0;
		width: 378px;
		min-width: 100%;
		background: #fff;
		border: 1px solid #e8e9ea;
		padding: 5px 8px;
		box-shadow: 0 10px 10px rgba(0,0,0,0.1);
		-o-box-shadow: 0 10px 10px rgba(0,0,0,0.1);
		-moz-box-shadow: 0 10px 10px rgba(0,0,0,0.1);
		-webkit-box-shadow: 0 10px 10px rgba(0,0,0,0.1);
	}
</style>