<div id="weather-widget" class="weather">
    <template v-if="weatherData">
        <div v-if="weatherData.weather" class="weatherIco"><img :src=`//openweathermap.org/img/w/${weatherData.weather[0].icon}.png` alt=""></div>
        <div class="weatherData">
            <div v-if="weatherData.main" class="weatherT">
                <span v-if="weatherData.main.temp > 0" class="sign">+</span><strong class="temp" v-text="weatherData.main.temp"></strong><small>°C</small>
            </div>
            <div class="wRegions">
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
    </template>
</div>
