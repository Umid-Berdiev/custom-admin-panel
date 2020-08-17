<div id="digest" class="p-3 bg-danger digest-widget">
	<h4 class="text-uppercase text-white">{{ __('Собери свой дайджест') }}</h4>
	<select 
		v-model="selectedOrgs" 
		class="selectpicker form-control form-control-sm mb-3" 
		data-selected-text-format="count"
		multiple title="{{ __('Пресс-служба') }}">
	  <option v-for="org in organizations" :value="org.id" v-text="org.name"></option>
	</select>
	<select 
		v-model="selectedCats" 
		class="selectpicker form-control form-control-sm mb-3" 
		data-selected-text-format="count"
		multiple title="{{ __('Рубрика') }}">
	  <option v-for="cat in postCategories" :value="cat.id" v-text="cat.name"></option>
	</select>
	<div class="form-group row text-white">
		<div class="col-4">
			<label for="inputDate1" class="col-form-label">{{ __('Период') }}</label>			
		</div>
		<div class="col-8">
			<div class="row">
				<div class="col">
					<label for="inputDate1" class="col-form-label">{{ __('с') }}</label>			
					<input type="date" id="inputDate1" v-model="inputDate1" style="border: none; border-bottom: 1px solid white">
				</div>
				<div class="col">
					<label for="inputDate2" class="col-form-label">{{ __('до') }}</label>
					<input type="date" id="inputDate2" v-model="inputDate2" style="border: none; border-bottom: 1px solid white">
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-center">
		<button class="btn btn-light px-5" @click="getPosts">{{ __('Пуск') }}</button>
	</div>
</div>

@section('digest-vue-scripts')
	<script>
		let digestApp = new Vue({
			el:'#digest',
			data() {
				return {
					inputDate1: null,
					inputDate2: null,
					organizations: [],
                    postCategories: [],
                    selectedOrgs: [],
                    selectedCats: [],
                    filteredPosts: [],
				}
			},
			methods: {
				async getPosts() {
                    let params = {
                        "orgs": [...this.selectedOrgs],
                        "cats": [...this.selectedCats],
					}
					
					// window.location.href = `/pages/infodigest/{{ app()->getLocale() }}?orgs=${[...this.selectedOrgs]}&cats=${[...this.selectedCats]}`;
					
					axios.post('{{ route("from-home-to-infodigest"), app()->getLocale() }}', {params: params})
                    //     .then(response => {
                    //         if (response.data.length == 0)
                    //             alert("Нет данные!");

                    //         infodigest.filteredPosts = response.data
                    //         infodigest.isLoading = false;
                    //     });
				},
				
				datePickerFunc() {
					let pastDate = new Date();
					let pastDay = '01';
					let pastMonth = (pastDate.getMonth() + 1) < 10 ? "0" + (pastDate.getMonth() + 1) : (pastDate.getMonth() + 1);
					let pastYear = pastDate.getFullYear();
					
					let curDate = new Date();
					let curDay = curDate.getDate() < 10 ? "0" + curDate.getDate() : curDate.getDate();
					let curMonth = (curDate.getMonth() + 1) < 10 ? "0" + (curDate.getMonth() + 1) : (curDate.getMonth() + 1);
					let curYear = curDate.getFullYear();
					
					this.inputDate1 = `${pastYear}-${pastMonth}-${pastDay}`;
					this.inputDate2 = `${curYear}-${curMonth}-${curDay}`;
                }
			},

			updated() {
				$(this.$el).find('.selectpicker').selectpicker('refresh');
			},

			mounted () {
				this.organizations = {!! json_encode($orgs, JSON_UNESCAPED_UNICODE) !!}
                this.postCategories = {!! json_encode($post_categories, JSON_UNESCAPED_UNICODE) !!}
				this.datePickerFunc();
			},

		});
	</script>
@endsection
