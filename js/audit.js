function model(mContent)
{
    $( ".overlay" ).fadeIn();
    $('.mText').html(mContent);
    $( ".footer" ).on('click', function() {
        $( ".overlay" ).fadeOut();
    });
}

var bac = "heading"
var abc = '<div class="well"><h2>' + bac + '<h2></div>'
$(document).ready(function()
{
    model(abc);
});