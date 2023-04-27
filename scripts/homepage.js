//button_scrollback=document.getElementById("btn-back-to-top");
//button_scrollback.addEventListener("click", ()=>window.scrollTo(0, 0));
let slideIndex=1;
showSlides(slideIndex);
function showSlides(n)
{
	let slides=document.getElementsByClassName("mySlides");
	let dots=document.getElementsByClassName("dot");
	if(n>slides.length)
		slideIndex=1;
	if(n<1)
		slideIndex=slides.length;
	for(let i=0;i<slides.length;i++)
		slides[i].style.display="none";
	for(let i=0;i<dots.length;i++)
		dots[i].className=dots[i].className.replace(" active", "");
	slides[slideIndex-1].style.display="block";
	dots[slideIndex-1].className+=" active";
	timeout=setTimeout(autoSlides, 20000);
}
function autoSlides()
{
	let slides=document.getElementsByClassName("mySlides");
	let dots=document.getElementsByClassName("dot");
	for(let i=0;i<slides.length;i++)
		slides[i].style.display="none";
	for(let i=0;i<dots.length;i++)
		dots[i].className=dots[i].className.replace(" active", "");
	slideIndex++;
	if(slideIndex>slides.length)
		slideIndex=1;
	slides[slideIndex-1].style.display="block";
	dots[slideIndex-1].className+=" active";
	timeout=setTimeout(autoSlides, 20000);
}
function plusSlides(n)
{
	clearTimeout(timeout);
	showSlides(slideIndex+=n);
}
function currentSlide(n)
{
	clearTimeout(timeout);
	showSlides(slideIndex=n);
}
