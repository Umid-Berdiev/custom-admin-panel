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
	// const EUR = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/EUR/';
	// const RUB = 'https://cbu.uz/uz/arkhiv-kursov-valyut/json/RUB/';
	const URL = 'https://api/entries';
	export default {
        name: 'ExchangeComponent',

		data() {
			return {
				usd: null,
				eur: null,
                rub: null,
                info: null,
                posts: null
			}
		},

		methods: {
			async getData(url) {
				const response = await axios.get({
                    url: 'https://jsonplaceholder.typicode.com/posts',
                    // crossDomain: true,
                    mode: 'no-cors',
                    // responseType: 'json',
                    headers: {
                        'Access-Control-Allow-Origin': '*'
                    }
                });
                this.posts = await response.data;
			},
		},

		mounted() {
			console.log('Component mounted from ExcahngeComponent');
            this.getData(USD);
            
		}
	}
</script>

<style lang="css" scoped>

</style>
