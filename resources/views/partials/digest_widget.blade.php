<div class="p-3 bg-danger digest-widget">
	<h4 class="text-uppercase text-white">{{ __('Собери свой дайджест') }}</h4>
	<select class="selectpicker form-control form-control-sm mb-3">
		<option value="" disabled selected>{{ __('Пресс-служба') }}</option>
		<option value="1">Option 1</option>
		<option value="2">Option 2</option>
		<option value="3">Option 3</option>
	</select>
	<select class="selectpicker form-control form-control-sm mb-3">
		<option value="" disabled selected>{{ __('Рубрика') }}</option>
		<option value="1">Option 1</option>
		<option value="2">Option 2</option>
		<option value="3">Option 3</option>
	</select>
	<div class="form-group row text-white justify-content-between">
		<label for="inputDate1" class="col-auto col-form-label">{{ __('Период') }} с </label>
		<div class="col-3">
			<input type="date" id="inputDate1" style="border: none; border-bottom: 1px solid white">
		</div>
		<label for="inputDate2" class="col-auto col-form-label">{{ __('до') }}</label>
		<div class="col-3">
			<input type="date" id="inputDate2" style="border: none; border-bottom: 1px solid white">
		</div>
	</div>
	<div class="row justify-content-center">
		<button class="btn btn-light px-5">{{ __('Пуск') }}</button>
	</div>
</div>