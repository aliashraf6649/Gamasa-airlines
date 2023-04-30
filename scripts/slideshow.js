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

{
	let slideshow1=document.querySelectorAll('.slideshow1-slides');
	let slideshow2=document.querySelectorAll('.slideshow2-slides');
	let slideshow1_dots=document.querySelectorAll('.slideshow1-dot');
	let slideshow2_dots=document.querySelectorAll('.slideshow2-dot');
	var slideshows=[slideshow1, slideshow2];
	var slideshows_dots=[slideshow1_dots, slideshow2_dots];
}//curly braces are used to free slideshow1 & slideshow2 from memory
var slide_index=[0,0];
/*
let slide1_interval=setInterval(autoSlide1, 5000);
let slide2_interval=setInterval(autoSlide2, 5000);
function autoSlide1()
{
	slideshows[current][current].className=' ';
	current=(current+1)%slides.length;
	slides[current].className='active';
}
function autoSlide2()
{
	element[currentSlide].className=' ';
	currentSlide=(currentSlide+1)%slides.length;
	slides[currentSlide].className='active';
}
*/
slideshows[0][0].className+=' active';
slideshows[1][0].className+=' active';
slideshows_dots[0][0].className+=' active';
slideshows_dots[1][0].className+=' active';
function slide_change(slideshow, offset)
{
	if(offset<0)
		offset+=slideshows[slideshow].length;
	slideshows[slideshow][slide_index[slideshow]].className=
	slideshows[slideshow][slide_index[slideshow]].className.replace(' active','');
	slideshows_dots[slideshow][slide_index[slideshow]].className=
	slideshows_dots[slideshow][slide_index[slideshow]].className.replace(' active','');
	slide_index[slideshow]=(slide_index[slideshow]+offset)%slideshows[slideshow].length;
	slideshows[slideshow][slide_index[slideshow]].className+=' active';
	slideshows_dots[slideshow][slide_index[slideshow]].className+=' active';
}
function slide_set(slideshow, slide)
{
	slide--;
	slideshows[slideshow][slide_index[slideshow]].className=
	slideshows[slideshow][slide_index[slideshow]].className.replace(' active','');
	slideshows_dots[slideshow][slide_index[slideshow]].className=
	slideshows_dots[slideshow][slide_index[slideshow]].className.replace(' active','');
	slide_index[slideshow]=slide;
	slideshows[slideshow][slide_index[slideshow]].className+=' active';
	slideshows_dots[slideshow][slide_index[slideshow]].className+=' active';
}