<div class="container-fluid footer" style="background-image: linear-gradient(to right, #530F0F, #332D2D);">
	<div class="container">
		<div class="row">
			<div class="col-9">
                <ul class="list-group list-group-horizontal text-white">
                    <li class="list-group-item border-right bg-transparent p-1"><a href="" class="text-white">{{ __('О сайте') }}</a></li>
                    <li class="list-group-item border-right bg-transparent p-1"><a href="" class="text-white">{{ __('Реклама') }}</a></li>
                    <li class="list-group-item border-right bg-transparent p-1"><a href="" class="text-white">{{ __('Контакты') }}</a></li>
                    <li class="list-group-item border-right bg-transparent p-1"><a href="" class="text-white">{{ __('Вакансии') }}</a></li>
                    <li class="list-group-item bg-transparent p-1">{{ __('Прислать новости') }} <a href="" class="text-white ml-2"><i class="fab fa-facebook-square fa-lg"></i></a> <a href="" class="text-white"><i class="fab fa-instagram fa-lg"></i></a> <a href="" class="text-white"><i class="fab fa-telegram fa-lg"></i></a> <a href="" class="text-white"><i class="fab fa-youtube-square fa-lg"></i></a></li>
                </ul>
                <br>
                <div class="text-white small">
                    {{ __('Воспроизводство, копирование, тиражирование, распространение, и иное использование информации с сайта "INFOSPACE.UZ" возможно только с предварительного письменного разрешения редакции.') }}
                    {{ __('INFOSPACE.UZ') }} {{ __('Сведительство') }}: №0099, {{ __('Дата выдачи') }}:24.03.2020 {{ __('год') }}. {{ __('Учредитель: ООО "Kibera Technology"') }}, {{ __('Адрес редакции: 100000, Ташкент, проспект Мустакиллик 59') }}, {{ __('электронная почта') }}: info@infospace.uz
                </div>
			</div>
			<div class="col-3">
				{{-- Brand --}}
				<a class="navbar-brand text-white" href="{{ url('/', config('voyager.multilingual.default')) }}">
					{{-- {{ config('app.name') }} --}}
					<img src="{{ asset('/images/assets/logo2.png') }}" alt="Logo" width="180">
				</a>
			</div>
		</div>

	</div>
</div>
