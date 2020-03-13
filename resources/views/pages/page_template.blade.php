@extends('layouts.master')

@section('content')
<div class="flex-center position-ref full-height">
	<div class="container pt-5" style="padding-top: 5rem !important;">
		<div style="background-image: url('{{ asset("$page->image") }}'); width: 100%; height: 100px;"></div>
	    <h1>{{ $page->getTranslatedAttribute('title', app()->getLocale()) }}</h1>
	    <div class="page-content__wrap">
	      {!! $page->getTranslatedAttribute('body', app()->getLocale()) !!}
	    </div>
	</div>
</div>
@endsection