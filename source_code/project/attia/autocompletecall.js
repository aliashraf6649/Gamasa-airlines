$(document).ready(function(){

    $("#from").autocomplete({
        source: "autocomplete.php"
    });
    $("#to").autocomplete({
        source: "autocomplete.php"
    });
});