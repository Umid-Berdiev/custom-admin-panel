@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="bg-danger py-3">
                    <h5 class="text-uppercase text-white text-center">{{ __('Собери свой дайджест') }}</h5>
                </div>

			</div>
			<div class="col-8">
                <div class="border-bottom border-danger">
                    <h5 class="">{{ __('Найдено') }}: 4 {{ __('новости') }}</h5>
                    <span class="">

                    </span>
                </div>
                <br>
                <div class="">
                    @foreach($posts as $post)
                        <a class="text-muted text-decoration-none" href="{{ route('single-post-show', [$post->id, App::getLocale()]) }}">
                            <div class="media mb-3 p-3 border border-light" style="box-shadow: 2px 2px 5px #ccc;">
                                <img src="{{ Voyager::image($post->image) }}" class="mr-3" alt="post-image" width="150">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $post->title}}</h5>
                                    <p>{{ $post->excerpt }}</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                    <div class="feed-btn">
                        <a href="https://uzreport.news/news-feed" class="btn btn-sm btn-outline-secondary">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
                    </div>
                </div>
			</div>
		</div>
	</div>
@endsection
