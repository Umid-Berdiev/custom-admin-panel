<div id="exchange-rates-widget" class="exchangeRates">
	<div v-if="USD" class="valuta">
		<strong>USD</strong><span class="font-weight-bold" :class="USD[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="USD[0].Rate"></span>
	</div>
	<div v-if="RUB" class="valuta">
		<strong>RUB</strong><span class="font-weight-bold" :class="RUB[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="RUB[0].Rate"></span>
	</div>
	<div v-if="EUR" class="valuta">
		<strong>EUR</strong><span class="font-weight-bold" :class="EUR[0].Diff > 0 ? 'text-success' : 'text-danger'" v-text="EUR[0].Rate"></span>
	</div>
</div>
