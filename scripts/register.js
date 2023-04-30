const form=document.getElementById('form');
const elements=document.getElementsByClassName('form-control');

const genders=document.getElementsByName('gender');
const mlabel=document.getElementById("mlabel");
const flabel=document.getElementById("flabel");
error_gender=document.getElementById('error-gender');

function color(element, background, border)
{
	element.style.backgroundColor=background;
	element.style.borderColor=border;
}
function showError(element, message)
{
	color(element, "lightcoral", "red");
	position=document.getElementById(element.name);
	if(message)
		position.innerHTML=message;
	position.style.visibility="revert";
	position.style.color="red";
}
function hideError(element)
{
	message=document.getElementById(element.name);
	message.style="";
	message.innerHTML='&nbsp;';
}
for(let k=0;k<elements.length;k++)
	elements[k].addEventListener("focus", ()=>color(elements[k], "white", "black"));
elements['bdate'].addEventListener("focus", ()=>elements['bdate'].type="date");
for(let k=0;k<=3;k++)//0:fname, 1:mname, 2:lname, 3:bdate
{
	elements[k].addEventListener("input", ()=>
	{
		if(elements[k].value)
			hideError(elements[k]);
	});
}
elements['bdate'].addEventListener("blur", ()=>
{
	if(!elements['bdate'].value)
		elements['bdate'].type="text";
});
elements['ssn'].addEventListener("input", ()=>
{
	if(elements['ssn'].value.length<14&&elements['ssn'].value)
	{
		color(elements['ssn'], "lightcoral", "red");
		showError(elements['ssn'], "*The National ID Must Have at Least 14 Digits");
	}
	else
	{
		color(elements['ssn'], "white", "black");
		hideError(elements['ssn']);
	}
});
genders[0].addEventListener("change", ()=>
{
	mlabel.style.color="green";
	//mlabel.style.boxShadow="0 15px 45px red";
	flabel.style.color="#4400ff";
	//flabel.style.boxShadow="none";
	error_gender.style="";

});
genders[1].addEventListener("change", ()=>
{
	mlabel.style.color="#4400ff";
	//mlabel.style.boxShadow="none";
	flabel.style.color="green";
	//flabel.style.boxShadow="0 15px 45px red";
	error_gender.style="";
});
elements['email'].addEventListener("blur", (event)=>
{
	if(elements['email'].value)
	{
		const regex=/^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		if(!regex.test(String(elements['email'].value).toLowerCase()))
		{
			color(elements['email'], "lightcoral", "red");
			showError(elements['email'], "*Expected A Valid Email Address");
		}
		else
			hideError(elements['email']);
	}
});
elements['pword1'].addEventListener("input", ()=>
{
	if(elements['pword1'].value.length>=8 && elements['pword1'].value)
	{
		color(elements['pword1'], "lightgreen", "green")
		hideError(elements['pword1']);
	}
	else if(elements['pword1'].value.length>4 && elements['pword1'].value)
		color(elements['pword1'], "moccasin", "yellow")
	else if(elements['pword1'].value.length<=4 && elements['pword1'].value)
	{
		color(elements['pword1'], "lightcoral", "red");
		showError(elements['pword1'], "*Password Must Have at Least 8 Characters");
	}
	else
		color(elements['pword1'], "white", "black");
});
elements['pword2'].addEventListener("input", ()=>
{
	if(elements['pword2'].value && elements['pword2'].value!=elements['pword1'].value)
	{
		color(elements['pword2'], "lightcoral", "red");
		showError(elements['pword2'], "*Passwords Don't Match");
	}
	else if(elements['pword2'].value && elements['pword2'].value==elements['pword1'].value)
	{
		color(elements['pword2'], "lightgreen", "green")
		hideError(elements['pword2']);
	}
	else
		color(elements['pword2'], "white", "black");
});
form.addEventListener("submit", (event)=>
{
	let errors=false;
	for(let k=0;k<elements.length;k++)
	{
		if(!elements[k].value)
		{
			switch (elements[k].name)
			{
			case 'ssn':
				showError(elements[k], "*Please Enter Your National ID");
				break;
			case 'email':
				showError(elements[k], "*Please Enter Your Email Address");
				break;
			case 'pword1':
				showError(elements[k], "*Please Enter A Password");
				break;
			case 'pword2':
				showError(elements[k], "*Please Re-enter The Password Correctly");
				break;
			default:
				break;
			}
			showError(elements[k]);
			errors=true;
		}
	}
	if(!genders[0].checked&&!genders[1].checked)
	{
		mlabel.style.color="lightcoral";
		flabel.style.color="lightcoral";
		error_gender.style.visibility="revert";
		error_gender.style.color="red";
		errors=true;
	}
	if(errors)
	{
		event.preventDefault();
		for(let k=0;k<elements.length;k++)
		{
			if(!elements[k].value)
			{
				elements[k].scrollIntoView({behavior:'smooth'});
				break;
			}
		}
	}
});