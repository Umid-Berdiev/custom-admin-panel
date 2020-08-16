<div class="home-banner">
    <div class="row h-100">
        <div class="col-6 text-center my-auto">
            <h1 class="text-white">COVID - 19</h1>
        </div>
        <div v-if="covid19DataGlobal && covid19DataLocal" class="col-6 text-center my-auto">
            <nav>
                <div class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                    <a class="nav-item nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">{{ __('Узбекистан') }}</a>
                    <a class="nav-item nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">{{ __('Весь мир') }}</a>
                </div>
            </nav>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="row text-white">
                        <div class="col-4">
                            <small>{{ __('Подтверждено') }} </small><span class="h5" v-text="covid19DataLocal.TotalConfirmed"></span>
                        </div>
                        <div class="col-4">
                            <small>{{ __('Выздоровлено') }} </small><span class="h5" v-text="covid19DataLocal.TotalRecovered"></span>
                        </div>
                        <div class="col-4">
                            <small>{{ __('Летальные исходы') }} </small><span class="h5" v-text="covid19DataLocal.TotalDeaths"></span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="row text-white">
                        <div class="col-4">
                            <small>{{ __('Подтверждено') }} </small><span class="h5" v-text="covid19DataGlobal.TotalConfirmed"></span>
                        </div>
                        <div class="col-4">
                            <small>{{ __('Выздоровлено') }} </small><span class="h5" v-text="covid19DataGlobal.TotalRecovered"></span>
                        </div>
                        <div class="col-4">
                            <small>{{ __('Летальные исходы') }} </small><span class="h5" v-text="covid19DataGlobal.TotalDeaths"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
