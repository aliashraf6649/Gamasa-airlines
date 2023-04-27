$(document).ready(function(){

    $("#from").autocomplete({
        source: "autocompletehomepage.php"
    });
    $("#to").autocomplete({
        source: "autocompletehomepage.php"
    });
});