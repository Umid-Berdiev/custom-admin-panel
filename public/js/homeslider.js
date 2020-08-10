let clickedSlideIndex = 0;
let slides = document.getElementsByClassName("mySlides");
let dots = document.getElementsByClassName("homenews-feed-btn");

window.onload = () => {
    const intervalID = setInterval(showSlides, 3000); // Change image every 3 seconds
};
function showSlides(n = 0) {
	for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (let i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active-feed", "");
    }
    if (n > slides.length) clickedSlideIndex = 0;
    if (n < 0) clickedSlideIndex = slides.length;
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

function currentSlide(n) {
	clearInterval(setInterval(showSlides, 3000));
	showSlides(clickedSlideIndex = n);
}
