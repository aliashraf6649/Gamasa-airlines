$(document).ready(function()
{
	$('img[usemap]').mapster(
	{
		mapkey: 'alt',
		fillOpacity: 0.4,
		fillColor: 'd42e16',
		stroke: true,
		strokeWidth: 2,
		singleSelect: true,
		clickNavigate: true,
		map: '#imagemap'
	});
	//from.addEventListener('selectionChange', ()=>
	//{
	//	if(from.value && from.value==to.value)
	//		alert("error");
	//});
	//to.addEventListener('selectionChange', ()=>
	//{
	//	if(to.value && to.value==from.value)
	//		alert("error");
	//});
	$('#from').on('input', ()=>
	{
		if(from.value && from.value==to.value)
			alert("error");
	});
	$('#to').on('input', ()=>
	{
		if(to.value && from.value==to.value)
			alert("error");
	});
});
const form=document.getElementById('form');
const from=document.getElementById('from');
const to=document.getElementById('to');
let wrote_once=false;
function country(selected)
{
	if((!from.value && !to.value) || (from.value && to.value && !wrote_once))
	{
		$('#from').val(selected);
		wrote_once=true;
	}
	else if((from.value && !to.value) || wrote_once)
	{
		$('#to').val(selected);
		wrote_once=false;
	}
}