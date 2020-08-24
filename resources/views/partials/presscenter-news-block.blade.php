<div id="presscenter-news" class="col-8">
    <div class="mb-3 border-bottom border-danger">
        <h2 class="text-uppercase">{{ __('Сообщения пресс-центра') }}</h2>
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-auto">
                <select class="custom-select" v-model="selectedOrgs" @change="getData">
                    <option value="" selected>{{ __('Все пресс-службы') }}</option>
                    <option v-for="org in orgs" :value="org.id" v-text="org.name"></option>
                </select>
            </div>
            <div class="col-auto">
                <select class="custom-select" v-model="selectedCats" @change="getData">
                    <option value="" selected>{{ __('Все рубрики') }}</option>
                    <option v-for="cat in cats" :value="cat.id" v-text="cat.name"></option>
                </select>
            </div>
        </div>
    </div>
    <div v-if="arePostsLoading" class="my-auto position-absolute" style="z-index: 1000; top: 25%; left: 45%;">
        <div class="spinner-grow" style="width: 5rem; height: 5rem; background-color: brown;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div v-else>
        <a v-for="post in posts" class="text-muted text-decoration-none" :href=`/single_post/${post.id}/{{ app()->getLocale() }}`>
            <div class="media mb-3 p-3 border border-light posts-list">
                <img :src="'/storage/' + post.image" class="mr-3" alt="post-image" width="150">
                <div class="media-body">
                    <h5 class="mt-0" v-text="post.title"></h5>
                    <p class="small mb-2"><i class="fas fa-history"></i> @{{ post.created_at }}</p>
                    <small class="text-primary">@{{ post.author.organization.name }}</small>
                    {{-- <p v-text="post.excerpt"></p> --}}
                </div>
            </div>
        </a>
        <div class="feed-btn">
            <a href="{{ route('posts', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
        </div>
    </div>
</div>

@section('presscenter-news-vue-scripts')
	<script>
		let presscenterNewsApp = new Vue({
            el:'#presscenter-news',

			data() {
				return {
					orgs: [],
                    cats: [],
                    posts: [],
                    selectedOrgs: '',
                    selectedCats: '',
                    arePostsLoading: false,
				}
            },

			methods: {
				async getData() {
                    this.arePostsLoading = true;
                    axios('{{route("filtered_posts")}}', {params: {'orgs': [this.selectedOrgs], 'cats': [this.selectedCats]}})
                        .then(response => {
                            if (response.data.length == 0)
                                alert("Нет данные!");

                            this.posts = response.data;
                            this.arePostsLoading = false;
                        })
                        .catch(e => {
                            console.log(e)
                            this.arePostsLoading = false;
                        })
                }
			},

			mounted () {
				this.orgs = {!! json_encode($orgs, JSON_UNESCAPED_UNICODE) !!}
                this.cats = {!! json_encode($post_categories, JSON_UNESCAPED_UNICODE) !!}
                this.posts = {!! json_encode($posts, JSON_UNESCAPED_UNICODE) !!}
			},
		});
	</script>
@endsection
