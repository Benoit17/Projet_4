$(document).ready(function() {
    // On récupère la balise <div> qui contient l'attribut « data-prototype ».
    var $container = $('div#ticket_customers');

    // Définition d'un compteur unique pour nommer les champs.
    if(document.URL.indexOf("/en/") >= 0) {
        var index = $container.find('input[placeholder="Name"]').length;
    }
    else {
        var index = $container.find('input[placeholder="Nom"]').length;
    }

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

        //Création d'une variable $billet à afficher suivant la lanque.
        if(document.URL.indexOf("/en/") >= 0) {
            $billet = 'Ticket';
        }
        else{
            $billet = 'Billet';
        }

        //Remplacement du texte "__name__label__" qu'il contient par le label du champ.
        //Remplacement du texte "__name__" qu'il contient par le numéro du champ.
        //Modification de la classe du label principal.
        //Suppression  des labels Name, firstName et Country.
        //Modification du label birthDate suivant la langue.
        var template = $container.attr('data-prototype')
            .replace(/<div class="form-group"><label class="control-label required">__name__label__/g, '<div class="form-group border"><label class="control-label required label1">__name__label__')
            .replace(/<label class="control-label required" for="ticket_customers___name___name">Name/g, '')
            .replace(/<label class="control-label required" for="ticket_customers___name___firstName">First name/g, '')
            .replace(/<label class="control-label required" for="ticket_customers___name___country">Country/g, '')
            .replace(/<label class="control-label required">Birth date/g, '<label class="control-label required label2">Birth date')
            .replace(/<label class="control-label required">Date de naissance/g, '<label class="control-label required label2">Date de naissance')
            .replace(/__name__label__/g, $billet + ' n°' + (index+1))
            .replace(/__name__/g, index);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);
        index++;

        //Récupération de la valeur du spinner
        var value = $('.spinner').spinner('value');

        //Desactive le bouton bas du spinner en cas de valeur superieur à 10.
        if(value==10){
            $container.append($prototype);
            $('.ui-spinner a.ui-spinner-up').attr('class', 'ui-button ui-widget ui-spinner-button ui-spinner-up ui-corner-tr ui-button-icon-only ui-state-disabled');
        }

    }
});