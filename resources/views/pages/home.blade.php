@php
	function shortenStr($str) {
		$tempStr = strval($str);
		$maxLen = 5;
		$strToArr = explode(" ", $tempStr);
		if (count($strToArr) > $maxLen) {
			$getSlicedArr = array_slice($strToArr, 0, $maxLen);
			$arrToStr = implode(" ", $getSlicedArr);
			return $arrToStr .= "...";
		} else return $tempStr;
	}
@endphp

@extends('layouts.master')

@section('custom-css')
    <style>
        .categories {
            background-color: #ffffff;
        }
        .mySlides {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="container mb-3">
    <br>
    <div class="row last-news-block">
        <div class="col-12">
            <h2 class="text-uppercase">{{ __('Последние новости') }}</h2>
        </div>

        @include('partials.home-news-slider')
    </div>
    <br>
    <div class="row">
        @include('partials.presscenter-news-block')
        <div class="col-4">
            <div class="ml-auto mb-3 border-bottom border-danger">
                <h2 class="text-uppercase">{{ __('Популярное') }}</h2>
            </div>
            <div class="pb-3 bg-white">
                @foreach($posts as $post)
                <a class="text-muted text-decoration-none" href="{{ route('single-post-page', [$post->id, App::getLocale()]) }}">
                    <div class="media p-3" style="border: 1px solid lightgrey;">
                        <img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="100" height="80">
                        <div class="media-body">
                            <h6 class="mt-0">{{ shortenStr($post->title) }}</h6>
							<p class="small mb-2"><i class="fas fa-history"></i> {{ $post->created_at->format('d-m-Y') }}</p>
							<small class="text-primary">{{ $post->author->organization->name }}</small>
                        </div>
                    </div>
                </a>
                @endforeach
                <br>
                <div class="feed-btn">
                    <a href="{{ route('posts', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
                </div>
            </div>
            <br>
            @include('partials.digest_widget')
        </div>
    </div>
</div>

<div class="container-fluid" style="background-image: linear-gradient(to right, #332D2D, #530F0F);">
	@include('partials.svg-map')
</div>

<div class="container-fluid opinions" style="background-color: #d3d3d333;">
	<div class="container py-4">
		<div class="row mb-3">
			<div class="col-12 border-bottom border-danger">
				<h4 class="float-left text-uppercase"><b>{{  __('Мнения') }}</b></h4>
				<a class="float-right text-reset" href="javascript:void(0);">{{ __('Еще мнения') }}</a>
			</div>
		</div>
		<div class="card-deck">
		  @for($i = 0; $i < 4; $i++)
		  <div class="card mx-2">
		    <img src="{{ Voyager::image($posts[$i]->author->avatar) }}" class="mx-auto card-img-top rounded-circle p-3" alt="post-image">
            <div class="card-body">
                <a class="text-muted text-decoration-none" href="{{ route('single-post-page', [$posts[$i]->id, App::getLocale()]) }}">
                <h5 class="card-title">{{ $posts[$i]->author->firstname . ' ' . $posts[$i]->author->lastname }}</h5>
                <p class="card-text">{{ $posts[$i]->title }}</p>
                <p class="card-text"><small class="text-muted">
                    @foreach($post->categories as $category)
                    {{ $category->getTranslatedAttribute('name') . ' ' }}
                    @endforeach
                </small></p>
                </a>
            </div>
		  </div>
		  @endfor
		</div>
	</div>
</div>

<div class="container-fluid categories">
	<div class="container">
		<div class="row justify-content-center py-3">
			@foreach($post_categories as $category)
				<div class="col-4">
					<h4 class="border-bottom border-danger text-uppercase">{{ $category->getTranslatedAttribute('name') }}</h4>
					@foreach($category->posts as $key => $post)
						@if($key === 0)
						<a class="text-muted text-decoration-none" href="{{ route('single-post-page', [$post->id, App::getLocale()]) }}">
							<div class="media p-2">
								<img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="100" height="80">
								<div class="media-body">
									<p class="mb-1">{{ $post->title }}</p>
									<p class="small mb-2"><i class="fas fa-history"></i> {{ $post->created_at->format('d-m-Y') }}</p>
								</div>
							</div>
						</a>
						@else
						<a class="text-muted text-decoration-none" href="{{ route('single-post-page', [$post->id, App::getLocale()]) }}">
							<div class="media">
								<div class="media-body p-2">
									<p class="mb-1">{{ $post->title }}</p>
									<p class="small mb-2"><i class="fas fa-history"></i> {{ $post->created_at->format('d-m-Y') }}</p>
								</div>
							</div>
						</a>
						@endif
                        @if ($key == 4)
                            @break
                        @endif
					@endforeach
				</div>
			@endforeach
			<div class="feed-btn col-auto">
				<a href="{{ route('posts', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
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
