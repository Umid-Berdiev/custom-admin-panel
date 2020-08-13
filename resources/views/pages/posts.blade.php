@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="mb-3 w-100" style="border-bottom: 1px solid red">
            <h2 class="text-uppercase">{{ __('Новости') }}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($posts as $post)
            <a class="col-3 card text-muted text-decoration-none" href="{{ route('single-post-show', [$post->id, app()->getLocale()]) }}">
                <img src="{{ Voyager::image($post->image) }}" class="card-img-top" alt="{{ $post->title}}" width="">
                <div class="card-body">
                    <h6 class="card-title">{{ $post->getTranslatedAttribute('title', app()->getLocale()) }}</h6>
                </div>
            </a>
        @endforeach
    </div>
    <div class="row">
        {{ $posts->links() }}
    </div>
</div>
@endsection
