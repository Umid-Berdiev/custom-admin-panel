@extends('layouts.master')

@section('content')
	<div id="infodigest" class="container my-5">
		<div class="row">
			<div class="col-4">
				<div class="bg-danger py-3">
                    <h5 class="text-uppercase text-white text-center">{{ __('Собери свой дайджест') }}</h5>
                </div>
                <div class="accordion" id="digestAccordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button @click="toggleRightDownNarrow" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span>{{ __('Пресс-служба') }}</span> <i class="fas fa-chevron-right mt-1"></i>
                            </button>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#digestAccordion">
                            <div class="card-body">
                                <div v-for="org in organizations" :key="org.id" class="custom-control custom-checkbox">
                                    <input v-model="selectedOrgs" :value="org.id" type="checkbox" class="custom-control-input" :id="org.id">
                                    <label class="custom-control-label" :for="org.id" v-text="org.name"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <button @click="toggleRightDownNarrow" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span>{{ __('Рубрика') }}</span> <i class="fas fa-chevron-right mt-1"></i>
                            </button>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#digestAccordion">
                            <div class="card-body">
                                <div v-for="category in categories" :key="category.id" class="custom-control custom-checkbox">
                                    <input v-model="selectedCats" :value="category.id" type="checkbox" class="custom-control-input" :id="'0' + category.order + '' + category.id">
                                    <label class="custom-control-label" :for="'0' + category.order + '' + category.id" v-text="category.name"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <button @click="toggleRightDownNarrow" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>{{ __('Рейтинг') }}</span> <i class="fas fa-chevron-right mt-1"></i>
                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#digestAccordion">
                            <div class="card-body">
                                <select name="rating" id="" class="custom-select">
                                    <option value="10">{{ __('Топ 10') }}</option>
                                    <option value="20">{{ __('Топ 20') }}</option>
                                    <option value="50">{{ __('Топ 50') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header row" id="headingThree">
                            {{-- <label for="datePicker" class="btn btn-link">
                                <span>{{ __('Период') }}</span>
                            </label>
                            <input id="datePicker" class="ml-auto" type="date" /> --}}
                            <div class="col-4">
                                <label for="inputDate1" class="col-form-label btn btn-link">{{ __('Период') }}</label>			
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col">
                                        <label for="inputDate1" class="col-form-label">{{ __('с') }}</label>			
                                        <input type="date" id="inputDate1" v-model="inputDate1">
                                    </div>
                                    <div class="col">
                                        <label for="inputDate2" class="col-form-label">{{ __('до') }}</label>
                                        <input type="date" id="inputDate2" v-model="inputDate2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="d-flex justify-content-around">
                    <button class="btn btn-light" @click="clearParams">
                        {{ __('Очистить') }}
                    </button>
                    <button class="btn btn-primary" @click="getPosts">
                        {{ __('Поиск') }}
                    </button>
                </div>
			</div>
			<div class="col-8 position-relative">
                <div v-if="isLoading" class="my-auto position-absolute" style="z-index: 1000; top: 30%; left: 45%;">
                    <div class="spinner-grow" style="width: 5rem; height: 5rem; background-color: brown;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
                <template v-else>
                    <div class="row border-bottom border-danger">
                        <div class="col-auto">
                            <h5 class="">{{ __('Найдено') }}: @{{ filteredPosts.length }} {{ __('новости') }}</h5>
                        </div>
                        <div class="col-auto ml-auto">
                            <span class="">
                                <i class="fas fa-file-pdf"></i> {{ __('экспорт в PDF') }}
                            </span>
                            <span class="">
                                <i class="fas fa-print"></i> {{ __('печать') }}
                            </span>
                        </div>
                    </div>
                    <br>
                    <div class="">
                        <a v-for="post in filteredPosts" :key="post.id" class="text-muted text-decoration-none" :href=`/pages/single_post/${post.id}/{{ app()->getLocale() }}`>
                            <div class="media mb-3 p-3 border border-light" style="box-shadow: 2px 2px 5px #ccc;">
                                <img :src="'/storage/' + post.image" class="mr-3" alt="post-image" width="150">
                                <div class="media-body">
                                    <h5 class="mt-0" v-text="post.title"></h5>
                                    <p class="small mb-2"><i class="fas fa-history"></i> @{{ post.created_at }}</p>
                                </div>
                            </div>
                        </a>
                        {{-- <div class="feed-btn">
                            <a href="{{ route('posts', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
                        </div> --}}
                    </div>
                    <div class="row">
                        {{-- {{ $result->links() }} --}}
                    </div>
                </template>
			</div>
		</div>
	</div>
@endsection

@section('infodigest-vue-scripts')
    <script>
        let digestApp = new Vue({
            el:'#infodigest',
            data() {
                return {
                    categories: [],
                    organizations: [],
                    selectedCats: [],
                    selectedOrgs: [],
                    filteredPosts: [],
                    isLoading: true,
                    inputDate1: null,
					inputDate2: null,
                }
            },
            methods: {
                async getPosts() {
                    this.isLoading = true;
                    let params = {
                        "orgs": [...this.selectedOrgs],
                        "cats": [...this.selectedCats],
                    }
                    axios('{{ route("filtered_posts") }}', {params: params})
                        .then(response => {
                            if (response.data.length == 0)
                                alert("Нет данные!");

                            this.filteredPosts = response.data
                            this.isLoading = false;
                        });
                },

                clearParams() {
                    this.selectedOrgs = []
                    this.selectedCats = []
                },

                toggleRightDownNarrow(element) {
                    let accicon = element.target.lastChild;

                    if (element.target.ariaExpanded == "true") {
                        accicon.classList.remove('fa-chevron-down');
                        accicon.classList.add('fa-chevron-right');
                    } else {
                        accicon.classList.remove('fa-chevron-right');
                        accicon.classList.add('fa-chevron-down');
                    }
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
            mounted() {
                this.categories = {!! json_encode($categories, JSON_UNESCAPED_UNICODE) !!}
                this.organizations = {!! json_encode($organizations, JSON_UNESCAPED_UNICODE) !!}
                this.filteredPosts = {!! json_encode($result, JSON_UNESCAPED_UNICODE) !!}
                this.selectedCats = {!! json_encode($selectedCats, JSON_UNESCAPED_UNICODE) !!}
                this.selectedOrgs = {!! json_encode($selectedOrgs, JSON_UNESCAPED_UNICODE) !!}
                this.isLoading = false;
                this.datePickerFunc();
            }
        });
    </script>
@endsection
