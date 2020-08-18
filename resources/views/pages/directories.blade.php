@extends('layouts.master')

@section('content')
	<div id="directory" class="container mb-3">
		<div class="row">
			<div class="col-3">
				<div class="border-bottom border-danger">
                    <h4 class="text-uppercase">{{ __('Директория') }}</h4>
                </div>
                <br>
                <div class="list-group" 
                    role="tablist" 
                    v-for="cat in orgCategory.children"
                    :id="'list-tab' + cat.id" 
                >
                    <button class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" 
                        @click.prevent="clickedCategory(cat.id, $event)"
                    >
                        @{{ cat.name }} <span class="badge badge-primary badge-pill" v-text="cat.organizations.length"></span>
                    </button>
                </div>
			</div>
			<div class="col-9">
                <div class="border-bottom border-danger">
                    <h4 class="text-uppercase">{{ __('Карточка пресс-службы организации') }}</h4>
                </div>
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="row">
                        <div class="col-4 mb-3" v-for="org in organizations">
                            <div class="org-cart shadow">
                                <div class="media p-2" style="background-color: #e1e1e1;">
                                    <img class="align-self-center mx-2" :src=`/storage/${org.logo}` alt="organization logo" width="50">
                                    <div class="media-body text-center">
                                        <h6 class="mt-1" v-text="org.name"></h6>
                                    </div>
                                </div>
                                <div class="row no-gutters p-3 border-bottom">
                                    <div class="row w-100">
                                        <div class="col-2 text-right"><i class="fas fa-file-alt"></i></div>
                                        <div class="col-7"><span>{{ __('Количество новостей') }}</span></div>
                                        <div class="col-3"><span v-text="org.user.posts.length"></span></div>
                                    </div>
                                    <div class="row w-100">
                                        <div class="col-2 text-right"><i class="fas fa-chart-line"></i></div>
                                        <div class="col-7"><span>{{ __('Рейтинг') }}</span></div>
                                        <div class="col-2">12</div>
                                    </div>
                                </div>
                                <div class="row no-gutters p-3 border-bottom">
                                    <div class="row w-100">
                                        <div class="col-2 text-right"><i class="fas fa-eye"></i></div>
                                        <div class="col-7"><span>{{ __('Средний просмотр') }}</span></div>
                                        <div class="col-2">1983</div>
                                    </div>
                                    <div class="row w-100">
                                        <div class="col-2 text-right"><i class="fas fa-chart-line"></i></div>
                                        <div class="col-7"><span>{{ __('Рейтинг просмотров') }}</span></div>
                                        <div class="col-2">16</div>
                                    </div>
                                </div>
                                <div class="row no-gutters p-3  justify-content-center text-center">
                                    @{{ org.website }}
                                    <div class="col-12">
                                        <template v-if="org.media_channels.length > 0">
                                            <a class="mr-1" v-for="ch in org.media_channels" :href="ch.url">
                                                <i :class="ch.icon + ' fa-lg'"></i>
                                            </a>
                                        </template>
                                        <template v-else>
                                            <a href="#"><i class="fab fa-facebook fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-youtube-square fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-telegram fa-lg"></i></a>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection

@section('directory-vue-scripts')
    <script>
        let directoryApp = new Vue({
            el:'#directory',
            data() {
                return {
                    organizations: [],
                    orgCategory: [],
                    selectedCat: {},
                    isLoading: true,
                }
            },
            methods: {
                clickedCategory(value, el) {
                    this.selectedCat = this.orgCategory.children.find(item => item.id == value);
                    this.organizations = this.selectedCat.organizations;
                }
            },
            mounted() {
                this.organizations = {!! json_encode($orgs, JSON_UNESCAPED_UNICODE) !!};
                this.orgCategory = {!! json_encode($org_category, JSON_UNESCAPED_UNICODE) !!};
                this.isLoading = false;

            },
        })
    </script>
@endsection
