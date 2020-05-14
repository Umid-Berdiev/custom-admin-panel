<form class="">
	<select class="selectpicker form-control form-control-sm" id="lang-select" onchange="javascript:location.href = this.value;" data-width="auto">
		@foreach (config('voyager.multilingual.locales') as $locale)
			@php
				$url = str_replace(request()->segment(count(request()->segments())), $locale, request()->url());
			@endphp
			<option value="{{ $url }}" {{ App::getLocale() == $locale ? "selected" : "" }}>
				{{ strtoupper($locale) }}
			</option>
		@endforeach
	</select>
</form>
