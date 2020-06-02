@extends('layouts.master')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-3">
				<div class="border-bottom border-danger">
                    <h4 class="text-uppercase">{{ __('Директория') }}</h4>
                </div>
                <br>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action active d-flex justify-content-between align-items-center" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Министерства <i class="fas fa-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Комитеты <i class="fas fa-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">Агенства <i class="fas fa-chevron-right"></i></a>
                    <a class="list-group-item list-group-item-action d-flex justify-content-between align-items-center" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Ассоциации <i class="fas fa-chevron-right"></i></a>
                </div>
			</div>
			<div class="col-9">
                <div class="border-bottom border-danger">
                    <h4 class="text-uppercase">{{ __('Карточка пресс-службы организации') }}</h4>
                </div>
                <br>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="row">
                            <div class="col-4">
                                <div class="org-cart shadow">
                                    <div class="media p-2" style="background-color: #e1e1e1;">
                                        <img class="align-self-center mx-2" src="{{ asset('/images/logo-minzdrav.png') }}" alt="organization logo" width="50">
                                        <div class="media-body text-center">
                                            <h6 class="mt-1">Министерство обороны Республики Узбекистан</h6>
                                        </div>
                                    </div>
                                    <div class="row no-gutters p-3 border-bottom">
                                        <div class="row w-100">
                                            <div class="col-2 text-right"><i class="fas fa-file-alt"></i></div>
                                            <div class="col-7"><span>{{ __('Количество новостей') }}</span></div>
                                            <div class="col-3"><span>10978</span></div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-2 text-right"><i class="fas fa-chart-line"></i></div>
                                            <div class="col-7"><span>{{ __('Рейтинг') }}</span></div>
                                            <div class="col-2">12</div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters p-3 border-bottom">
                                        <div class="row w-100">
                                            <div class="col-2 text-right"><i class="fas fa-eye"></i></div>
                                            <div class="col-7"><span>{{ __('Средний просмотр') }}</span></div>
                                            <div class="col-2">1983</div>
                                        </div>
                                        <div class="row w-100">
                                            <div class="col-2 text-right"><i class="fas fa-chart-line"></i></div>
                                            <div class="col-7"><span>{{ __('Рейтинг просмотров') }}</span></div>
                                            <div class="col-2">16</div>
                                        </div>
                                    </div>
                                    <div class="row no-gutters p-3  justify-content-center text-center">
                                        www.mudofaa.uz
                                        <div class="col-12">
                                            <a href="#"><i class="fab fa-facebook-square fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-instagram fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-telegram fa-lg"></i></a>
                                            <a href="#"><i class="fab fa-youtube fa-lg"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">2</div>
                    <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">3</div>
                    <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">4</div>
                </div>
			</div>
		</div>
	</div>
@endsection
