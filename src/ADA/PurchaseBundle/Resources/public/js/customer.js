$(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#ticket_customers');

    var index = $container.find('input[placeholder="Nom"]').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('.ui-spinner-up').on('click',function(e) {
        addCustomer($container);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On supprime le dernier protoype à chaque clic sur le bouton bas.
    $('.ui-spinner-down').click(function(e) {
        if(index>0) {
            index--;
        }
        $('#ticket_customers>div.form-group:last-child').remove();
        $('.ui-spinner a.ui-spinner-up').attr('class', 'ui-button ui-widget ui-spinner-button ui-spinner-up ui-corner-tr ui-button-icon-only');

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // La fonction qui ajoute un formulaire CustomerType
    function addCustomer($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var value = $('.spinner').spinner('value');

        if(document.URL.indexOf("/en/") >= 0) {
            $billet = 'Ticket';
        }
        else{
            $billet = 'Billet';
        }

        var template = $container.attr('data-prototype')
            .replace(/<div class="form-group"><label class="control-label required">__name__label__/g, '<div class="form-group border"><label class="control-label required label1">__name__label__')
            .replace(/<label class="control-label required" for="ticket_customers___name___name">Name/g, '')
            .replace(/<label class="control-label required" for="ticket_customers___name___firstName">First name/g, '')
            .replace(/<label class="control-label required" for="ticket_customers___name___country">Country/g, '')
            .replace(/<label class="control-label required">Birth date/g, '<label class="control-label required label2">Birth date')
            .replace(/<label class="control-label required">Date de naissance/g, '<label class="control-label required label2">Date de naissance')
            // .replace(/<div class="form-group"><label class="control-label required">__name__label__/g, '<div class="form-horizontal"><label class="control-label required">__name__label__')
            .replace(/__name__label__/g, $billet + ' n°' + (value))
            .replace(/__name__/g, index);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);
        index++;

        if(value==10){
            $container.append($prototype);
            $('.ui-spinner a.ui-spinner-up').attr('class', 'ui-button ui-widget ui-spinner-button ui-spinner-up ui-corner-tr ui-button-icon-only ui-state-disabled');
        }

    }
});