<template>
	<div id="exchange-rates-widget" class="exchangeRates">
		<div class="valuta down">
			<strong>USD</strong><span>10130</span>
		</div>
		<div class="valuta down">
			<strong>EUR</strong><span>10960.66</span>
		</div>
		<div class="valuta down">
			<strong>RUB</strong><span>135.64</span>
		</div>
	</div>
</template>

<script>
	const PROXY_URL = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/';
	// const USD = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/';
	// const EUR = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/EUR/';
	// const RUB = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/';
	const USD = '/get_currency/USD';
	const URL = 'https://api/entries';
	export default {

		data() {
			return {
				usd: window.DATA,
				eur: null,
				rub: null,
			}
		},

		methods: {
			// async getDataUSD() {
				/*const response = await fetch("{{ route('get_currency', 'USD') }}");
				return await response.json();*/

			// },

		},

		mounted() {
			console.log('Component mounted');
			// console.log(this.getDataUSD());
		}
	}
</script>

<style lang="css" scoped>

</style>
