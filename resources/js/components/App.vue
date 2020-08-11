<template>
	<div>
        <h2>Hello world!</h2>
        <!-- <WeatherComponent /> -->
        <!-- <ExchangeComponent /> -->
    </div>
</template>

<script>
    import WeatherComponent from './WeatherComponent';
    import ExchangeComponent from './ExchangeComponent';

    export default {
        data() {
            return {
                posts: null
            }
        },
        components: {
            WeatherComponent,
            ExchangeComponent
        },
        mounted() {
            axios.get({
                url: 'https://jsonplaceholder.typicode.com/posts',
                crossDomain: true,
                mode: 'no-cors',
                responseType: 'json',
                headers: {
                    'Access-Control-Allow-Origin': '*'
                }
            }).then(response => (this.posts = response.data))
        }
    }
</script>

<style>

</style>