@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container">
		<div class="page-background-image"></div>
	    {{-- <h1 class="mt-3">{{ $page->getTranslatedAttribute('title', app()->getLocale()) }}</h1> --}}
	    <div class="page-content__wrap">
	      {!! $page->getTranslatedAttribute('body', app()->getLocale()) !!}
	    </div>
	</div>
</div>
@endsection

<style>
	.page-background-image {
		background-image: url('{{ Voyager::image($page->image) }}');
		background-position: center;
		background-repeat: no-repeat;
		background-size: cover;
		width: 100%; 
		height: 100px;
	}
</style>
