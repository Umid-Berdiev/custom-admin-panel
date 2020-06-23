<header class="blog-header">
	<div class="row flex-nowrap">
		<div class="col-3">
			{{-- Brand --}}
			<a class="navbar-brand text-white" href="{{ url('/', app()->getLocale()) }}">
				{{-- {{ config('app.name') }} --}}
				<img src="{{ asset('/images/assets/logo2.png') }}" alt="Logo" width="180">
			</a>
		</div>
		<div class="col-9">
			<div class="row">
				<div class="col-8 pt-4">
                    <button class="btn btn-sm btn-danger">Прямой эфир</button>
                </div>
                <div class="col-4 pt-4">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            @include('partials.language-selector')
                        </div>
                        <div class="col-auto">
                            <a class="btn btn-sm btn-danger" href="{{ route('voyager.dashboard') }}" target="_blank">{{ __('Войти в кабинет') }}</a>
                        </div>
                    </div>
                </div>
			</div>
			<div class="row justify-content-between align-items-end mt-3">
				<nav class="navbar navbar-expand-lg navbar-dark w-100">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown1" aria-controls="navbarNavDropdown1" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavDropdown1">
						<div class="navbar-nav w-100">
							@foreach($items as $key => $item)
							<a class="nav-item nav-link mr-3 @if($item->children->count()) dropdown-toggle @endif @if(url()->current() == $item->link()) active @endif" href="{{ url($item->link(), app()->getLocale()) }}" @if($item->children->count()) id="navbarDropdownMenuLink-{{$key}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endif>
								{{ $item->getTranslatedAttribute('title', app()->getLocale()) }}
							</a>
							@if($item->children->count())
							<div class="dropdown-menu py-0" aria-labelledby="navbarDropdownMenuLink-{{$key}}">
								<div class="row">
									@foreach($item->children as $subItem)
									<div class="col-4">
										<a class="dropdown-item" href="{{ url($subItem->link(), app()->getLocale()) }}">
											{{ $subItem->getTranslatedAttribute('title', app()->getLocale()) }}
										</a>
										<div class="dropdown-divider my-0"></div>
									</div>
									@endforeach
								</div>
							</div>
							@endif
							@endforeach
                            <form class="search nav-item nav-link ml-auto">
                                <div class="search__wrapper">
                                    <input type="text" name="" placeholder="Search for..." class="search__field">
                                    <button type="submit" class="fa fa-search search__icon"></button>
                                </div>
                            </form>
						</div>
					</div>
				</nav>
			</div>
		</div>
	</div>
</header>
