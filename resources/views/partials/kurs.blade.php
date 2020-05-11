<div id="exchange-rates-widget" class="exchangeRates">
	<div class="valuta down">
		<strong>USD</strong><span>10130</span>
	</div>
	<div class="valuta down">
		<strong>RUB</strong><span>135.64</span>
	</div>
	<div class="valuta down">
		<strong>EUR</strong><span>10960.66</span>
	</div>
</div>

{{-- @section('vue-scripts')

	<script type="text/javascript">
		let currencyWidget = new Vue({
			el: "#exchange-rates-widget",

			data() {
				return {
					currencies: []
				}
			},

			methods: {
				getCurrencyRates() {
					axios({
						method: 'get',
						url: 'https://nbu.uz/exchange-rates/json/',
						responseType: 'json'
					})
					.then(function (response) {
						console.log(response.data)
					});
				}

			},

		})		
	</script>

@endsection --}}

{{-- @section('custom-css') --}}
	{{-- <style type="text/css">
		.exchangeRates {
		    margin: 0 30px 0 0;
		}
		.appLinks, .weather, .exchangeRates, .lSwitch {
		    display: inline-block;
		    vertical-align: middle;
		    /**vertical-align: auto;
		    *zoom: 1;
		    *display: inline;*/
		}
		.valuta {
		    display: inline-block;
		    vertical-align: middle;
		    /**vertical-align: auto;
		    *zoom: 1;
		    *display: inline;*/
		    color: inherit;
		    margin: 0 15px 0 0;
		    padding: 0 10px 0 0;
		    position: relative;
		}
		.valuta span, .valuta strong {
		    display: inline-block;
		    vertical-align: middle;
		    /**vertical-align: auto;
		    *zoom: 1;
		    *display: inline;*/
		    margin: 0 2px;
		}
		.valuta.down::after {
		    background: url(/images/assets/sDown.png) no-repeat center;
		}
		.valuta::after {
		    display: block;
		    position: absolute;
		    right: 0;
		    top: 50%;
		    width: 6px;
		    height: 10px;
		    margin-top: -5px;
		    content: "";
		}
	</style> --}}
{{-- @endsection --}}

