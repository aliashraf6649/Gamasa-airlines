//button_scrollback=document.getElementById("btn-back-to-top");
//button_scrollback.addEventListener("click", ()=>window.scrollTo(0, 0));
/*
let slideIndex=[1,1];
let slideId=['slideshow-slides1','slideshow-slides2'];
showSlides(1, 0);
showSlides(1, 1);
function showSlides(n, id)
{
	let slides=document.getElementsByClassName(slideId[id]);
	//let dots=document.getElementsByClassName("dot");
	if(n>slides.length)
		slideIndex[id]=1;
	if(n<1)
		slideIndex[id]=slides.length;
	for(let i=0;i<slides.length;i++)
		slides[i].style.display="none";
	//for(let i=0;i<dots.length;i++)
	//	dots[i].className=dots[i].className.replace(" active", "");
	slides[slideIndex[id]-1].style.display="block";
	//dots[slideIndex[id]-1].className+=" active";
	timeout=setTimeout(autoSlides, 20000);
}
function autoSlides()
{
	let slides=document.getElementsByClassName("fade");
	//let dots=document.getElementsByClassName("dot");
	for(let i=0;i<slides.length;i++)
		slides[i].style.display="none";
	//for(let i=0;i<dots.length;i++)
	//	dots[i].className=dots[i].className.replace(" active", "");
	slideIndex[id]++;
	if(slideIndex[id]>slides.length)
		slideIndex[id]=1;
	slides[slideIndex[id]-1].style.display="block";
	//dots[slideIndex[id]-1].className+=" active";
	timeout=setTimeout(autoSlides, 20000);
}
function plusSlides(n, id)
{
	clearTimeout(timeout);
	showSlides(slideIndex[id]+=n, id);
}
function currentSlide(n, id)
{
	clearTimeout(timeout);
	showSlides(slideIndex[id]=n, id);
}
*/

//new code
let slides=document.querySelectorAll('.slideshow');
let currentSlide=0;
let slideInterval=setInterval(nextSlide, 5000);

function nextSlide()
{
	slides[currentSlide].className=' ';
	currentSlide=(currentSlide+1)%slides.length;
	slides[currentSlide].className='active';
}