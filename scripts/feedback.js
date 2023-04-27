const form=document.getElementById('form');
const elements=document.getElementsByClassName('form-control');

function color(element, background, border)
{
	element.style.backgroundColor=background;
	element.style.borderColor=border;
}
elements['email'].addEventListener("blur", ()=>
{
	if(elements['email'].value)
	{
		const regex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		if(!regex.test(String(elements['email'].value).toLowerCase()))
		{
			color(elements['email'], "lightcoral", "red");
			message=document.getElementById('email');
			message.style.visibility="revert";
			message.style.color="red";
		}
	}
});
for(let k=0;k<elements.length;k++)
	elements[k].addEventListener("focus", ()=>color(elements[k], "white", "black"));
form.addEventListener("submit", (event)=>
{
	let errors=false;
	for(let i=0;i<elements.length;i++)
	{
		if(!elements[i].value)
		{
			color(elements[i], "lightcoral", "red");
			message=document.getElementById(elements[i].name);
			message.style.visibility="revert";
			message.style.color="red";
			errors=true;
		}
	}
	if(errors)
		event.preventDefault()
});