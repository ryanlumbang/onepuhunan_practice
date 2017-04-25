$(document).ready(function() {
    var amountScrolled = 250;
    
    $('body').prepend('<a href="#" class="back-to-top">Back to Top</a>');
    
    $(window).scroll(function() {
       if( $(window).scrollTop() > amountScrolled ) {
           $('a.back-to-top').fadeIn('slow');
       } else {
           $('a.back-to-top').fadeOut('slow');
       }
    });

    $('a.back-to-top').click(function() {
       $('html, body').animate({
           scrollTop: 0
       }, 700); 
       return false;
    });

    //INPUT FIELD JS
        'use strict';

        $('.input-file').each(function() {
            var $input = $(this),
                $label = $input.next('.js-labelFile'),
                labelVal = $label.html();

            $input.on('change', function(element) {
                var fileName = '';
                if (element.target.value) fileName = element.target.value.split('\\').pop();
                fileName ? $label.addClass('has-file').find('.js-fileName').html(fileName) : $label.removeClass('has-file').html(labelVal);
            });
        });
    //END OF INPUT FIELD JS

});

//EXPORT VALIDATION IN MONTH

function myFunction()
{
    var year = document.getElementById("year").value;
    var months = document.getElementById("months").value;

    var days = ["01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12"];

    if (months == days[0])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else if (months == days[1])
    {
        if( (0 == year % 4) && (0 != year % 100) || (0 == year % 400) )
        {
            document.getElementById("text").value = year +"-"+ months +"-29";
        }
        else
        {
            document.getElementById("text").value = year +"-"+ months +"-28";
        }
    }

    else  if (months == days[2])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[3])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[4])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[5])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[6])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[7])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[8])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[9])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

    else  if (months == days[10])
    {
        document.getElementById("text").value = year +"-"+ months +"-30";
    }

    else  if (months == days[11])
    {
        document.getElementById("text").value = year +"-"+ months +"-31";
    }

}

function typeLoan()
{
    var loan = document.getElementById("loan").value;

    document.getElementById("loan_text").value = loan;

}

//END FOR EXPORT VALIDATION FOR MONTH

//VALIDATION FOR CSV FILE

    var _validFileExtensions = [".csv"];

function ValidateSingleInput(oInput)
{
    if (oInput.type == "file") {
        var sFileName = oInput.value;
        if (sFileName.length > 0) {
            var blnValid = false;
            for (var j = 0; j < _validFileExtensions.length; j++) {
                var sCurExtension = _validFileExtensions[j];
                if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                    blnValid = true;
                    break;
                }
            }

            if (!blnValid) {
                alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                oInput.value = "";
                return false;
            }
        }
    }
    return true;
}

//END VALIDATION FOR CSV FILE

//CSV VALIDATION FIELD ONLY
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
//END OF CSV VALIDATION FILE