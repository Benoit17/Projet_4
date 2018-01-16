$('#ticket_email div label').remove();

$('.stripe-button-el').attr('class', 'btn btn-success');

$('button span').attr('style', '');

$('#ui-datepicker-div').attr('class', 'ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all z');

$('.checkbox').attr('class', 'checkbox border');

$('.checkbox label').attr('style', 'margin-bottom: 15px;');

//Enlève lka validation des erreurs par le navigateur
$('form').attr('novalidate', 'novalidate');

function addErrorMessage(type, message) {
    // construit le html pour le message flash
    var appendCode = '<span class="help-block"><ul class="list-unstyled"><li><span class="glyphicon glyphicon-exclamation-sign"></span> '+message+'</li>';
    // ajoute le message flash dans la div dédiée
    $('#errorMessage').html(appendCode);
    $('#close').replaceWith('');
}

$(document).ready(function () {
    
    $('#ticket-form').on('submit', function(e){
        e.preventDefault();
        var $form = $(this);
        var url = $('.btn-success').attr('url');
        $.ajax({
            type: 'POST',
            url: url,
            data: $form.serialize(),
            success: function () {
                location.reload(true);
            },
            error: function (jqxhr) {
                addErrorMessage('danger', jqxhr.responseText);
            }
        })
    })
    
});


