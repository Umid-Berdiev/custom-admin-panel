<div id="weather-widget" class="">
    <div v-if="weatherData" class="row h-100">
        <div v-if="weatherIsLoading" class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div v-if="weatherData.weather && weatherData.main" class="col-auto my-auto">
            <img :src=`//openweathermap.org/img/w/${weatherData.weather[0].icon}.png` alt="">
            <span v-if="weatherData.main.temp > 0" class="">+</span><strong class="temp" v-text="weatherData.main.temp"></strong><small>°C</small>
        </div>
        <div class="col-auto my-auto">
            <select class="custom-select custom-select-sm" v-model="cityName" @change="getWeatherData(cityName)">
                <option v-for="region in regions"
                    v-if="region.id != 1"
                    :key="region.id"
                    :value="region.admincenterUz"
                    v-text="region.admincenterRu">
                </option>
            </select>
        </div>
    </div>
</div>
