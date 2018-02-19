$(document).ready(function () {
    
// Enleve les labels email
// $('#ticket_email div label').remove();

    //Modification de la classe du bouton paiment Stripe
    $('.stripe-button-el').attr('class', 'btn btn-success');

    //Enlève le style du bouton Stripe par défaut
    $('button span').attr('style', '');

    //Ajoute la classe z aux classes du datepicker pour que le z-index soit au-dessus de celui de la modale
    $('#ui-datepicker-div').attr('class', 'ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all z');

    // //Ajout d'une bordure au premier client
    // $('.checkbox').attr('class', 'checkbox border');

    //Ajout d'un margin-bottom de 15px au label de checkbox
    $('.checkbox label').attr('style', 'margin-bottom: 15px; padding-bottom: 10px;');

    //Enlève la validation des erreurs par le navigateur
    $('form').attr('novalidate', 'novalidate');

    //Fonction qui ajoute les messages d'erreur si la validation n'est pas correcte.
    function addErrorMessage(type, message) {
        // construit le html pour le message flash
        var appendCode = '<span class="help-block"><ul class="list-unstyled"><li><span class="glyphicon glyphicon-exclamation-sign"></span> '+message+'</li>';
        // ajoute le message flash dans la div dédiée
        $('#errorMessage').html(appendCode);
        $('#close').replaceWith('');
    }

    //Post et rechargement de la page si le formulaire de de la modale est correctement rempli sinon affichage du message d'erreur adéquat.
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




