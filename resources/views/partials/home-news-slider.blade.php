<!-- Slideshow container -->
<div class="col-8 slideshow-container">
    <!-- Full-width images with number and caption text -->
    @foreach($posts as $key => $post)
    <div class="mySlides">
        <a href="{{ route('single-post-page', [$post->id, App::getLocale()]) }}" title="{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}">
            <img src="{{ Voyager::image($post->image) }}" width="100%" />
        </a>
    </div>
    @endforeach
    <button class="btn btn-sm btn-outline-danger position-absolute play-btn" onclick="togglePlay()">
        <i id="play-resume" class="fas fa-pause-circle fa-2x"></i>
    </button>
</div>
<div class="col-4">
    <div class="homenews_feed">
        <ul>
            @foreach($posts as $key => $post)
            <li class="row mob_newsfeed">
                <div class="mob-newsfeed-7">
                    <div class="homenews_feed_time">{{ $post->created_at->format('Y-m-d') == date('Y-m-d') ? $post->created_at->format('h:i') : $post->created_at->format('d-M') }}</div>
                    <a class="homenews-feed-btn" href="javascript:void(0);" onclick="currentSlide({{ $key + 1 }})">
                        <div class="homenews_feed_ico hidden-xs empty"></div>
                        <div class="homenews_feed_text">
                            <p>{!! $post->getTranslatedAttribute('title', app()->getLocale()) !!}</p>
                        </div>
                    </a>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="feed-btn">
            <a href="{{ route('posts', app()->getLocale()) }}" class="btn btn-sm btn-outline-secondary ml-5">{{ __('Показать ещё') }} <i class="fa fa-angle-down visible-xs" aria-hidden="true"></i></a>
        </div>
    </div>
</div>
<!-- Slideshow container -->
