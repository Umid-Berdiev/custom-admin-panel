@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container mb-3">
		<div class="home-banner"></div> 
		<div class="row">
			<div class="col-auto">
				{{-- <weather-component /> --}}
				@include('partials.weather')
			</div>
			<div class="col-auto">
				@include('partials.kurs')
			</div>
		</div>
		<br>
		
	</div>
</div>
<div class="container">
	<div class="row single-post-block">
		<div class="col-7">
			<div class="row border-bottom border-danger">
				<div class="col-12">
					<h4>Узбекистан прошёл пик количества болеющих COVID-19 неделю назад</h4>
					{{-- <h4>{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}</h4> --}}
				</div>
				<div class="col-auto">
					<p class="small">
						<i class="fas fa-time"></i>
						<span>{{ $post->created_at->format('h:m') }}|{{ $post->created_at->format('d.m.Y') }}</span>
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
							{{ $category->getTranslatedAttribute('name', app()->getLocale()) . ', ' }}
						@endforeach
					</span>
				</div>
				<div class="col-auto">
					<span>{!! $post->author->organization->getTranslatedAttribute('name', app()->getLocale()) !!}</span>
				</div>
				<div class="col-auto ml-auto">
					<i class="fab fa-facebook-square fa-lg"></i>
					<i class="fab fa-instagram fa-lg"></i>
					<i class="fab fa-telegram fa-lg"></i>
					<i class="fab fa-youtube fa-lg"></i>
				</div>
			</div>
			<div class="row">
				<img src="{{ Voyager::image($post->image) }}" alt="post_image" width="100%">
				{!! $post->getTranslatedAttribute('body', app()->getLocale()) !!}
			</div>
			<div class="row border-top border-bottom border-secondary">
				<div class="col-auto">
					{!! $post->getTranslatedAttribute('meta_keywords', app()->getLocale()) !!}
				</div>
				<div class="col-auto ml-auto">
					<i class="fab fa-facebook-square fa-lg"></i>
					<i class="fab fa-instagram fa-lg"></i>
					<i class="fab fa-telegram fa-lg"></i>
					<i class="fab fa-youtube fa-lg"></i>
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="container-fluid mb-3">
				<div class="bg-info text-center py-3">
					<h5 class="my-3">{{ __('Карточка пресс-службы') }}</h5>
				</div>
				<div class="row no-gutters justify-content-center" style="background-color: lightgrey;">
					<h6>{{ $post->author->organization->avatar }} {!! $post->author->organization->getTranslatedAttribute('name', app()->getLocale()) !!}</h6>
				</div>
				<div class="row no-gutters p-3 border-bottom justify-content-center">
					<div class="col-8">
						<h6><i class="fas fa-file-alt"></i><span>{{ __('Количество новостей') }}</span></h6>
					</div>
					<div class="col-3">10978</div>
					<div class="col-8">
						<h6><i class="fas fa-chart-line"></i><span>{{ __('Рейтинг') }}</span></h6>
					</div>
					<div class="col-3">12</div>
				</div>
				<div class="row no-gutters p-3 border-bottom justify-content-center">
					<div class="col-8">
						<h6><i class="fas fa-eye"></i><span>{{ __('Средний просмотр') }}</span></h6>
					</div>
					<div class="col-3">1983</div>
					<div class="col-8">
						<h6><i class="fas fa-chart-line"></i><span>{{ __('Рейтинг просмотров') }}</span></h6>
					</div>
					<div class="col-3">16</div>
				</div>
				<div class="row no-gutters p-3  justify-content-center text-center">
					{{ $post->author->organization->website }}
					<div class="col-12">
						<i class="fab fa-facebook-square fa-lg"></i>
						<i class="fab fa-instagram fa-lg"></i>
						<i class="fab fa-telegram fa-lg"></i>
						<i class="fab fa-youtube fa-lg"></i>
					</div>
				</div>
			</div>
			<div class="container-fluid mb-3">
				<div class="bg-danger text-center py-3">
					<h5 class="text-white">{{ __('Популярные новости пресс-службы') }}</h5>
				</div>
				@foreach($posts as $post)
				<div class="media p-3" style="border: 1px solid lightgrey;">
					<img src="{{ Voyager::image($post->image) }}" class="mr-3 rounded-circle" alt="post-image" width="75" height="75">
					<div class="media-body">
						<h5 class="mt-0">{{ $post->title}}</h5>
						<p>{{ $post->excerpt }}</p>
					</div>
				</div>
				@endforeach
			</div>

			<div class="container-fluid">
				@include('partials.digest_widget')
			</div>
		</div>
	</div>

	<div class="row other-news-block">
		<div class="col-12 border-bottom border-danger mb-4">
			<h2 class="text-uppercase">{{ __('Другие новости') }}</h2>
		</div>
		<div class="col-3">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (36).jpg"
				alt="Card image cap">
				<div class="media-body">
					<p>Жители Каракуля, поверив в дезинформацию о наводнении, пытались эвакуироваться</p>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (34).jpg"
				alt="Card image cap">
				<div class="media-body">
					<p>Жители Каракуля, поверив в дезинформацию о наводнении, пытались эвакуироваться</p>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (38).jpg"
				alt="Card image cap">
				<div class="media-body">
					<p>Жители Каракуля, поверив в дезинформацию о наводнении, пытались эвакуироваться</p>
				</div>
			</div>
		</div>
		<div class="col-3">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (29).jpg"
				alt="Card image cap">
				<div class="media-body">
					<p>Жители Каракуля, поверив в дезинформацию о наводнении, пытались эвакуироваться</p>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
