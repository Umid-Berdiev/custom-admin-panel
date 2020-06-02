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
</div>
