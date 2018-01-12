$('#ticket_email div label').remove();

$('.stripe-button-el').attr('class', 'btn btn-success');

$('button span').attr('style', '');

function addErrorMessage(type, message) {
    // construit le html pour le message flash
    var appendCode = '<span class="help-block"><ul class="list-unstyled"><li><span class="glyphicon glyphicon-exclamation-sign"></span> '+message+'</li><li><span class="glyphicon glyphicon-exclamation-sign"></span> Veuillez saisir un nom valide.</li></ul></span>';
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

