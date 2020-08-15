<div id="exchange-rates-widget" class="row h-100">
	<div v-if="USD && !exchangeRatesIsLoading" class="col-auto my-auto">
		<strong>USD </strong><span class="font-weight-bold" :class="USD[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="USD[0].Rate"></span>
	</div>
	<div v-if="RUB && !exchangeRatesIsLoading" class="col-auto my-auto">
		<strong>RUB </strong><span class="font-weight-bold" :class="RUB[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="RUB[0].Rate"></span>
	</div>
	<div v-if="EUR && !exchangeRatesIsLoading" class="col-auto my-auto">
		<strong>EUR </strong><span class="font-weight-bold" :class="EUR[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="EUR[0].Rate"></span>
    </div>
    <div v-if="exchangeRatesIsLoading" class="spinner-grow" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
