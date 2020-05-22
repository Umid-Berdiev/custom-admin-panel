let slideIndex = 0;
let clickedSlideIndex = 0;

window.onload = setInterval(showSlides, 3000); // Change image every 3 seconds

function showSlides(n) {
	let i;
	let slides = document.getElementsByClassName("mySlides");
	let dots = document.getElementsByClassName("homenews-feed-btn");
	if (n) {
		if (n > slides.length) clickedSlideIndex = 0;    
		if (n < 0) clickedSlideIndex = slides.length;
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";  
	}
	if (clickedSlideIndex > slides.length) clickedSlideIndex = 0;    
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active-feed", "");
	}
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
	clearInterval(showSlides);
	showSlides(clickedSlideIndex = n);
}
