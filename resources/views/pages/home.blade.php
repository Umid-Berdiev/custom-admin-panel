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
		<div class="row last-news-block">
			<div class="col-12">
				<h2 class="text-uppercase">{{ __('Последние новости') }}</h2>
			</div>
			<!-- Slideshow container -->
			<div class="col-7 slideshow-container">

				<!-- Full-width images with number and caption text -->
				@foreach($posts as $post)
				<div class="mySlides">
					<img src="{{ Voyager::image($post->image) }}" width="100%" />
				</div>
				@endforeach
			</div>
			<div class="col-5">
				<div class="homenews_feed">
					<ul>
						@foreach($posts as $key => $post)
						<li class="row mob_newsfeed">
							<div class="mob-newsfeed-7">
								<div class="homenews_feed_time"><span class="visible-xs">{{ $post->created_at->format('d.m.Y') }} </span>{{ $post->created_at->format('h:m') }}</div>
								<a class="homenews-feed-btn" href="javascript:void(0);" onclick="currentSlide({{ $key + 1 }})"><div class="homenews_feed_ico hidden-xs empty"></div></a>
								{{-- <button class="homenews_feed_ico hidden-xs empty"></button> --}}
								<div class="homenews_feed_text">
									<p><a href="{{ route('single-post-show', [$post->id, App::getLocale()]) }}" title="{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}">{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}</a></p>
								</div>
							</div>
						</li>
						@endforeach	
					</ul>
					<div class="feed-btn">
						<a href="https://uzreport.news/news-feed" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row press-center-news-block">
			<div class="col-8">
				<div class="mb-3" style="border-bottom: 1px solid red">
					<h2 class="text-uppercase">{{ __('Сообщения пресс-центра') }}</h2>
				</div>
				<div class="mb-3">
					<div class="row">
						<div class="col-auto">
							<select class="custom-select">
								<option selected>{{ __('Все пресс-службы') }}</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
						<div class="col-auto">
							<select class="custom-select">
								<option selected>{{ __('Все рубрики') }}</option>
								<option value="1">One</option>
								<option value="2">Two</option>
								<option value="3">Three</option>
							</select>
						</div>
					</div>
				</div>
				@foreach($posts as $post)
				<div class="media mb-3 p-3 border border-light" style="box-shadow: 2px 2px 5px #ccc;">
				  	<img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="150">
				  	<div class="media-body">
				    	<h5 class="mt-0">{{ $post->title}}</h5>
				    	<p>{{ $post->excerpt }}</p>
				  	</div>
				</div>
				@endforeach
				<div class="feed-btn">
					<a href="https://uzreport.news/news-feed" class="btn btn-sm btn-outline-secondary">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="col-4">
				<div class="ml-auto mb-3" style="border-bottom: 1px solid red">
					<h2 class="text-uppercase">{{ __('Популярное') }}</h2>
				</div>
				<div class="pb-3" style="background-color: #d3d3d36e;">
					@foreach($posts as $post)
					<div class="media p-3" style="border: 1px solid lightgrey;">
					  	<img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="100">
					  	<div class="media-body">
					    	<h5 class="mt-0">{{ $post->title}}</h5>
					    	<p>{{ $post->excerpt }}</p>
					  	</div>
					</div>
					@endforeach
					<br>
					<div class="feed-btn">
						<a href="https://uzreport.news/news-feed" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
					</div>
				</div>
				<br>
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
			</div>
		</div>
	</div>
</div>
<div class="container-fluid" style="background-image: linear-gradient(to right, #332D2D, #530F0F);">
	@include('partials.svg-map')
</div>
<div class="container-fluid">
	<div class="container opinions py-4">
		<div class="row mb-3">
			<div class="col-12 border-bottom border-danger">
				<h4 class="float-left text-uppercase"><b>{{  __('Мнения') }}</b></h4>
				<a class="float-right text-reset" href="javascript:void(0);">{{ __('Еще мнения') }}</a>
			</div>
		</div>
		<div class="card-deck">
		  @foreach($posts as $post)
		  <div class="card">
		    <img src="{{ Voyager::image($post->author->avatar) }}" class="mx-auto card-img-top rounded-circle p-3 w-50 h-100" alt="post-image">
		    <div class="card-body">
		      <h5 class="card-title">{{ $post->author->name }}</h5>
		      <p class="card-text">{{ $post->excerpt }}</p>
		      <p class="card-text"><small class="text-muted">
		      	@foreach($post->categories as $category)
					{{ $category->getTranslatedAttribute('name') . ' ' }}
		      	@endforeach
		      </small></p>
		    </div>
		  </div>
		  @endforeach
		</div>
	</div>
	<div class="container">
		<div class="row justify-content-center py-3">
			@foreach($post_categories as $category)
				<div class="col-4">
					<h4 class="border-bottom border-danger text-uppercase">{{ $category->getTranslatedAttribute('name') }}</h4>
					@foreach($category->posts as $key => $post)
						@if($key === 0)
						<div class="media">
							<img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="100">
							<div class="media-body">
								<p>{{ $post->excerpt }}</p>
								<p>{{ $post->created_at->format('d-m-Y') }}</p>
							</div>
						</div>
						@else
						<div class="media">
							<div class="media-body">
								<p>{{ $post->excerpt }}</p>
								<p>{{ $post->created_at->format('d-m-Y') }}</p>
							</div>
						</div>
						@endif

					@endforeach
				</div>
			@endforeach
			<div class="feed-btn col-auto">
				<a href="https://uzreport.news/news-feed" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid bg-danger py-4">
	<div class="container mb-3">
		<div class="row text-white text-uppercase">
			<div class="col-auto mr-4">
				<div class="row no-gutters">
					<div class="col-auto mr-1">
						<i class="fas fa-play-circle fa-lg"></i>
					</div>
					<div class="col-auto">
						<h4 class="border-bottom text-right">{{ __('Видеоновости') }}</h4>
					</div>
				</div>
			</div>
			<div class="col-auto mr-4">
				<div class="row no-gutters">
					<div class="col-auto mr-1">
						<i class="fas fa-camera fa-lg"></i>
					</div>
					<div class="col-auto">
						<h4 class="border-bottom">{{ __('Фоторепортажы') }}</h4>
					</div>
				</div>
			</div>
			<div class="col-auto mr-4">
				<div class="row no-gutters">
					<div class="col-auto mr-1">
						<i class="fas fa-podcast fa-lg"></i>
					</div>
					<div class="col-auto">
						<h4 class="border-bottom">{{ __('Подкасты') }}</h4>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="carousel-example-multi">
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (36).jpg"
				alt="Card image cap">
			</div>
		</div>
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (34).jpg"
				alt="Card image cap">
			</div>
		</div>
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (38).jpg"
				alt="Card image cap">
			</div>
		</div>
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (29).jpg"
				alt="Card image cap">
			</div>
		</div>
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (30).jpg"
				alt="Card image cap">
			</div>
		</div>
		<div class="col">
			<div class="card mb-2">
				<img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Others/img (27).jpg"
				alt="Card image cap">
			</div>
		</div>
	</div>
</div>

@endsection
