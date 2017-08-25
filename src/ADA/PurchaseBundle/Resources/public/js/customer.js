$(document).ready(function() {
    // On récupère la balise <div> en question qui contient l'attribut « data-prototype » qui nous intéresse.
    var $container = $('div#ticket_customers');

    // On définit un compteur unique pour nommer les champs qu'on va ajouter dynamiquement
    var index = $container.find(':input').length;

    // On ajoute un nouveau champ à chaque clic sur le lien d'ajout.
    $('.ui-spinner-up').click(function(e) {
        addCustomer($container);

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // On supprime le dernier protoype à chaque clic sur le bouton bas.
    $('.ui-spinner-down').click(function(e) {

        $('#ticket_customers>div.form-group:last-child').remove();
        $('.ui-spinner-up').show();

        e.preventDefault(); // évite qu'un # apparaisse dans l'URL
        return false;
    });

    // La fonction qui ajoute un formulaire CustomerType
    function addCustomer($container) {
        // Dans le contenu de l'attribut « data-prototype », on remplace :
        // - le texte "__name__label__" qu'il contient par le label du champ
        // - le texte "__name__" qu'il contient par le numéro du champ
        var value = $('.spinner').spinner('value');
        var template = $container.attr('data-prototype')
            .replace(/__name__label__/g, 'Billet n°' + (value))
            .replace(/__name__/g, index);

        // On crée un objet jquery qui contient ce template
        var $prototype = $(template);

        // On ajoute le prototype modifié à la fin de la balise <div>
        $container.append($prototype);
        index++;

        if(value==10){
            $container.append($prototype);
            $('.ui-spinner-up').hide();
        }
    }
});

/*public function createTicket(Client $client)
{
    $iTickets = $client->getNbrTicket()-count($client->getTickets());
    print_r($iTickets);
    for ($i = 0; $i < $iTickets; $i++)
    {
        $tickets[$i] = new Ticket();
        $tickets[$i]->setClient($client);
        $client->getTickets()->add($tickets[$i]);
    }
}
}*/