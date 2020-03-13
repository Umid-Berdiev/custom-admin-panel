{{-- <div class="language-selector">
    <div class="btn-group btn-group-sm" role="group" data-toggle="buttons">
        @foreach(config('voyager.multilingual.locales') as $lang)
            <label class="btn btn-primary{{ ($lang === config('voyager.multilingual.default')) ? " active" : "" }}">
                <input type="radio" name="i18n_selector" id="{{$lang}}" autocomplete="off"{{ ($lang === config('voyager.multilingual.default')) ? ' checked="checked"' : '' }}> {{ strtoupper($lang) }}
            </label>
        @endforeach
    </div>
</div> --}}

<form class="m-auto">
	<select class="custom-select custom-select-sm" id="lang-select" onchange="javascript:location.href = this.value;">
		@foreach (config('voyager.multilingual.locales') as $locale)
		@php
		$url = str_replace(request()->segment(count(request()->segments())), $locale, request()->url());
		@endphp
		<option value="{{ $url }}" {{ (app()->getLocale() == $locale) ? "selected" : "" }}>
			{{ strtoupper($locale) }}
		</option>
		@endforeach
	</select>
</form>
