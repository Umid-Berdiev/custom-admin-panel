
<nav class="navbar navbar-expand-lg navbar-light bg-transparent shadow-none">
	<div class="container">
		{{-- Brand --}}
		<a class="navbar-brand text-white" href="{{ url('/', config('voyager.multilingual.default')) }}">
			{{-- {{ config('app.name') }} --}}
			<img src="{{ asset('/images/logo.png') }}" alt="Logo" width="150" class="mb-5 mr-5">
		</a>

		{{-- Collapse button --}}
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav1"
			aria-controls="basicExampleNav1" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		{{-- Collapsible content --}}
		<div class="collapse navbar-collapse" id="basicExampleNav1">
			{{-- Links --}}
			<ul class="navbar-nav mr-auto">
				@foreach($items as $menu_item)
			        <li class="nav-item"><a class="nav-link" href="{{ url($menu_item->link(), app()->getLocale()) }}">{{ $menu_item->getTranslatedAttribute('title', app()->getLocale()) }}</a></li>
			    @endforeach
          	</ul>
          	{{-- Links --}}
        </div>
  		{{-- Collapsible content --}}
	</div>
</nav>