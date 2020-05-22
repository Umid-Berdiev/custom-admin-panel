{{-- <!-- Swiper -->
<div class="swiper-container">
	<div class="swiper-wrapper">
		<div class="swiper-slide">Slide 1</div>
		<div class="swiper-slide">Slide 2</div>
		<div class="swiper-slide">Slide 3</div>
		<div class="swiper-slide">Slide 4</div>
		<div class="swiper-slide">Slide 5</div>
		<div class="swiper-slide">Slide 6</div>
		<div class="swiper-slide">Slide 7</div>
		<div class="swiper-slide">Slide 8</div>
		<div class="swiper-slide">Slide 9</div>
		<div class="swiper-slide">Slide 10</div>
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
</div>
 --}}

<!-- Swiper -->
<div class="row no-gutters swiper-container">
	<div class="col-7 swiper-wrapper">
		@foreach($posts as $post)
			<div class="swiper-slide">
				<img src="{{ Voyager::image($post->image) }}" alt="">
			</div>
		@endforeach	
	</div>
	<!-- Add Pagination -->
	<div class="col-5 swiper-pagination"></div>
	<!-- <div class="col-5 homenews_feed">
		<ul>
		</ul>
	</div> -->
</div>
