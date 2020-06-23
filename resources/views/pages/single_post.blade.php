@extends('layouts.master')

@section('content')
<div class="container mb-3">
	<div class="row single-post-block">
		<div class="col-8 shadow">
			<div class="row mx-2 mt-3 no-gutters border-bottom border-danger mb-3 justify-content-between">
				<div class="col-12">
					<h4>{{ $post->title }}</h4>
					{{-- <h4>{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}</h4> --}}
				</div>
				<div class="col-auto">
					<p class="small">
						<i class="fas fa-history"></i>
						<span class="align-middle">{{ $post->created_at->format('h:m') }}|{{ $post->created_at->format('d.m.Y') }}</span>
					</p>
				</div>
				<div class="col-auto">
					<i class="fas fa-eye"></i>
					<span>3210</span>
				</div>
				<div class="col-auto">
					<i class="fas fa-folder"></i>
					<span>
						@foreach($post->categories as $category)
							{{ $category->getTranslatedAttribute('name', app()->getLocale()) }}
								@if($category !== $post->categories->last()) {{ "," }} @endif
						@endforeach
					</span>
				</div>
				<div class="col-auto">
					<span>{!! $post->author->organization->getTranslatedAttribute('name', app()->getLocale()) !!}</span>
				</div>
				<div class="col-auto ml-auto">
					<a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
					<a href="#"><i class="fab fa-instagram fa-lg"></i></a>
					<a href="#"><i class="fab fa-telegram fa-lg"></i></a>
					<a href="#"><i class="fab fa-youtube fa-lg"></i></a>
				</div>
			</div>
			<div class="row mx-2">
				<img src="{{ Voyager::image($post->image) }}" alt="post_image" width="100%">
				{!! $post->getTranslatedAttribute('body', app()->getLocale()) !!}
			</div>
			<div class="row mx-2 border-top border-bottom border-secondary">
				<div class="col-auto">
					{!! $post->getTranslatedAttribute('meta_keywords', app()->getLocale()) !!}
				</div>
				<div class="col-auto ml-auto">
					<a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
					<a href="#"><i class="fab fa-instagram fa-lg"></i></a>
					<a href="#"><i class="fab fa-telegram fa-lg"></i></a>
					<a href="#"><i class="fab fa-youtube fa-lg"></i></a>
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="bg-info text-center text-white py-3">
				<h5 class="my-1">{{ __('Карточка пресс-службы') }}</h5>
			</div>
			<div class="org-cart shadow">
				<div class="media p-2" style="background-color: #e1e1e1;">
					<img class="align-self-center mx-2" src="{{ Voyager::image($post->author->organization->logo) }}" alt="organization logo" width="50">
					<div class="media-body text-center">
						<h6 class="mt-3">{!! $post->author->organization->getTranslatedAttribute('name', app()->getLocale()) !!}</h6>
					</div>
				</div>
				<div class="row no-gutters p-3 border-bottom">
					<div class="row w-100">
						<div class="col-2 text-right"><i class="fas fa-file-alt"></i></div>
						<div class="col-7"><span>{{ __('Количество новостей') }}</span></div>
						<div class="col-3"><span>10978</span></div>
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
					<a href="{{ $post->author->organization->website }}">{{ $post->author->organization->website }}</a>
					<div class="col-12">
						@foreach($post->author->organization->media_channels as $channel)
							<a href="{{ $channel->url }}">
								<span style="color: dodgerblue;">
									<i class="{{ $channel->icon }} fa-lg"></i>
								</span>
							</a>
						@endforeach
					</div>
				</div>
			</div>
			<br>
			<div class="container mb-3 shadow p-0">
				<div class="bg-danger text-center py-3">
					<h5 class="text-white">{{ __('Популярные новости пресс-службы') }}</h5>
				</div>
				@foreach($posts as $post)
				<a class="text-muted text-decoration-none" href="{{ route('single-post-show', [$post->id, App::getLocale()]) }}">
					<div class="media p-3" style="border: 1px solid lightgrey;">
						<img src="{{ Voyager::image($post->image) }}" class="mr-3 rounded-circle" alt="post-image" width="75" height="75">
						<div class="media-body">
							<h5 class="mt-0">{{ $post->title}}</h5>
							<p>{{ $post->excerpt }}</p>
						</div>
					</div>
				</a>
				@endforeach
			</div>

			<div class="container mb-3 shadow p-0">
				@include('partials.digest_widget')
			</div>
		</div>
	</div>
</div>

<div class="container other-news-block mb-3">
	<div class="row">
		<div class="col-12 border-bottom border-danger mb-4">
			<h2 class="text-uppercase">{{ __('Другие новости') }}</h2>
		</div>
	</div>
	<div class="card-deck">
		@foreach($other_posts as $post)
		<div class="card shadow-sm">
			<a class="text-muted text-decoration-none" href="{{ route('single-post-show', [$post->id, App::getLocale()]) }}">
				<img src="{{ Voyager::image($post->image) }}" class="card-img-top" alt="post image">
				<div class="card-body">
				  <p class="card-text">{{ $post->excerpt }}</p>
				</div>
			</a>
		  </div>
		@endforeach
	</div>
</div>

@endsection
