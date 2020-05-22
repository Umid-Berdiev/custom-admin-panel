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
	const USD = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/USD/';
	const EUR = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/EUR/';
	const RUB = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/';
	const URL = 'https://api/entries';

	export default {

		data() {
			return {
				usd: null,
				eur: null,
				rub: null,
			}
		},

		methods: {
			async getCurrencyRates(url) {
				
				await fetch(url, {
					mode: 'no-cors' // no-cors, *cors, same-origin
				}).then(response => console.log(response.JSON));

				// axios({
				//   	method: 'GET',
				//   	url: PROXY_URL,
				// 	mode: 'no-cors',
				// 	headers: {
				// 		'Access-Control-Allow-Origin': '*',
				// 	},
				// 	// responseType: 'json'
				// })
				// .then(function (response) {
				// 	console.log(response.data)
				// });

				// return response;
			},

			getCurrencyRatesByAjax(url) {
				let oReq = new XMLHttpRequest();
				oReq.open("GET", url, true);
				oReq.addEventListener("load", console.log(this.responseText));
				oReq.send();
			}

		},

		mounted() {
			console.log('Component mounted');
			// this.getCurrencyRatesByAjax(USD);
			// console.log(this.getCurrencyRates(USD));
			// this.usd = this.getCurrencyRates(USD);
			// this.eur = this.getCurrencyRates(EUR);
			// this.rub = this.getCurrencyRates(RUB);
		}
	}
</script>

<style lang="css" scoped>

</style>
