<header class="blog-header">
	<div class="row flex-nowrap">
		<div class="col-3">
			{{-- Brand --}}
			<a class="navbar-brand text-white" href="{{ url('/', config('voyager.multilingual.default')) }}">
				{{-- {{ config('app.name') }} --}}
				<img src="{{ asset('/images/assets/logo2.png') }}" alt="Logo" width="180">
			</a>
		</div>
		<div class="col-6 pt-4">
			<div class="row">
				<button class="btn btn-sm btn-danger">Прямой эфир</button>
			</div>
			<div class="row justify-content-between align-items-end mt-4">
				@foreach($items as $menu_item)
				<a class="text-white" href="{{ url($menu_item->link(), app()->getLocale()) }}">
					{{ $menu_item->getTranslatedAttribute('title', app()->getLocale()) }}
				</a>	
				@endforeach
			</div>
		</div>
		<div class="col-3 pt-4">
			<div class="row justify-content-end">
				<div class="col-auto">
					@include('partials.language-selector')
				</div>
				<div class="col-auto">
					<a class="btn btn-sm btn-danger" href="{{ route('voyager.login') }}">Войти в кабинет</a>
				</div>
			</div>
			<div class="row mt-4">
				<a class="text-white ml-auto" href="#">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
				</a>
			</div>
			
		</div>
	</div>
</header>
