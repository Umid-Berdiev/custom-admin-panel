@extends('layouts.master')

@section('content')
	<div class="container my-5">
		<div class="row">
			<div class="col-4">
				<div class="bg-danger py-3">
                    <h5 class="text-uppercase text-white text-center">{{ __('Собери свой дайджест') }}</h5>
                </div>
                <div class="accordion" id="digestAccordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <button onclick="toggleRightDownNarrow(this)" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
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
                            <button onclick="toggleRightDownNarrow(this)" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
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
                            <button onclick="toggleRightDownNarrow(this)" class="btn btn-link accordion-button d-flex justify-content-between w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span>{{ __('Рейтинг') }}</span> <i class="fas fa-chevron-right mt-1"></i>
                            </button>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#digestAccordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex" id="headingThree">
                            <label for="datePicker" class="btn btn-link">
                                <span>{{ __('Период') }}</span>
                            </label>
                            <input id="datePicker" class="ml-auto" type="date" />
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
			<div class="col-8">
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
			</div>
		</div>
	</div>
@endsection

@section('vue-scripts')
    <script>
        let digestApp = new Vue({
            el:'main',
            data() {
                return {
                    organizations: [],
                    categories: [],
                    selectedOrgs: [],
                    selectedCats: [],
                    filteredPosts: [],
                    locale: ''
                }
            },
            methods: {
                async getPosts() {
                    let params = {
                        "orgs": [...this.selectedOrgs],
                        "cats": [...this.selectedCats],
                    }
                    let response = await axios('{{ route("filtered_posts") }}', {params: params});
                    this.filteredPosts = await response.data;
                },

                clearParams() {
                    this.selectedOrgs = []
                    this.selectedCats = []
                }
            },
            mounted() {
                this.organizations = {!! json_encode($orgs, JSON_UNESCAPED_UNICODE) !!}
                this.categories = {!! json_encode($categories, JSON_UNESCAPED_UNICODE) !!}
                // this.locale = {!! config('app.locale') !!}
            }
        });
    </script>
@endsection
