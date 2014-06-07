$(document).ready(function()
{
    // Scoate posibilitatea de a selecta textul pentru că încurcă.
    $("#contine").css({
        "-webkit-user-select": "none",
        "-khtml-user-select": "none",
        "-moz-user-select": "none",
        "-ms-user-select": "none",
        "-o-user-select": "none",
        "user-select": "none"
    });

    $('.g').mousedown(function()
    {
        $(this).find("div").remove();
    });
});
