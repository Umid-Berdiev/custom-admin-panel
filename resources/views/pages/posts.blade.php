@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container pt-5" style="padding-top: 5rem !important;">
		<div class="page-background-image"></div>
	    <h1>{{ $post->getTranslatedAttribute('title', app()->getLocale()) }}</h1>
	    <div class="page-content__wrap">
	      {!! $post->getTranslatedAttribute('body', app()->getLocale()) !!}
	    </div>
	</div>
</div>
@endsection
