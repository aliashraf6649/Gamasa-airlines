

// the point of this is hiding the return date input when choosing one way or the oppioste when choosing round
$(document).ready(function(){    $("#r").hide();
    
    $("#R").click(function()

    {
        $("#r").show();
    });
    $("#O").click(function()
    {
        $("#r").hide();
    });
});