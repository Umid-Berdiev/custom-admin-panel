let clickedSlideIndex = 0;
let slides = document.querySelectorAll(".mySlides");
let dots = document.querySelectorAll(".homenews-feed-btn");
let isPlaying = false;
let playResumeIcon = document.getElementById("play-resume");

let intervalID = setInterval(showSlides, 3000); // Change image every 3 seconds

function showSlides(n = 0) {
    isPlaying = true;
    if (slides && slides.length > 0) {
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-feed", "");
        }
        if (n > slides.length) clickedSlideIndex = 0;
        // if (n < 0) clickedSlideIndex = 0;
        if (clickedSlideIndex > slides.length) clickedSlideIndex = 0;
        if(clickedSlideIndex > 0) {
            slides[clickedSlideIndex-1].style.display = "block";
            dots[clickedSlideIndex-1].className += " active-feed";
        } else {
            slides[clickedSlideIndex].style.display = "block";
            dots[clickedSlideIndex].className += " active-feed";
        }
        clickedSlideIndex++;
    }
}

function currentSlide(n) {
    clearInterval(intervalID);
    showSlides(clickedSlideIndex = n);
    isPlaying = false;
    playResumeIcon.className = "fas fa-play-circle fa-2x";
}

function togglePlay() {
    if (isPlaying) {
        currentSlide(clickedSlideIndex-1);
    } else {
        intervalID = setInterval(showSlides, 3000);
        playResumeIcon.className = "fas fa-pause-circle fa-2x";
    }
}
